<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TokenAccess extends Model
{
    protected $table = 'token_access';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

}
