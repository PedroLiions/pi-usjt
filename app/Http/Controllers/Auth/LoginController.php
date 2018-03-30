<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\TokenAccess;
use Carbon\Carbon;
use stdClass;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function authenticate(Request $request, stdClass $erro)
    {
        $token = TokenAccess::where('token', $request->token)->first();

        $input = $request->all();

        if( count($token) < 1 ) {
            $erro->tipo = 'danger';
            $erro->mensagem = 'O Token digitado é inválido';

            return back()->with(compact('erro', 'input'));
        }

        if( $token->estado == 0 ) {
            $erro->tipo = 'danger';
            $erro->mensagem = 'O Token digitado já foi utilizado';
            return back()->with(compact('erro', 'input'));
        }

        if( ! $this->validaTempoToken( $token ) ) {
            $erro->tipo = 'warning';
            $erro->mensagem = 'O Token digitado expirou, gere um novo Token e tente novamente';
            return back()->with(compact('erro', 'input'));
        }

        $autenticaUsuario = Auth::attempt(
            [
                'agencia' => $request->agencia,
                'conta' => $request->conta,
                'password' => $request->password
            ]);

        if( !$autenticaUsuario ) {
            $erro->tipo = 'warning';
            $erro->mensagem = 'Verifique se os dados digitados estão corretos';
            return back()->with('erro', $erro);
        }

        $token->estado = 0;
        $token->save();

        return redirect()->route('home');
    }

    public function validaTempoToken ( $token ){
        $tokenData = Carbon::parse($token->created_at)->format('Y-m-d H:i:s');
        $dataAtual = Carbon::now();

        if( $dataAtual->diffInMinutes($tokenData) > 60 ) :
            return true;
        else:
            return false;
        endif;

    }
}
