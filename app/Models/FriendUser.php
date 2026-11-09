<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FriendUser extends Model
{
    protected $connection = 'mysql_friend';

    protected $table = 'users';

    protected $guarded = [];
}