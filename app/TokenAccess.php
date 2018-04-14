<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TokenAccess extends Model
{
    protected $table = 'tokens';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

}
