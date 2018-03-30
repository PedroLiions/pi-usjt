<?php

use Illuminate\Database\Seeder;

class CreateToken extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('token_access')->insert([
            'token' => str_random(10),
            'estado' => 1
        ]);
    }
}
