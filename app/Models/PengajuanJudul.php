<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengajuanJudul extends Model
{
    protected $connection = 'mysql_friend';

    protected $table = 'pengajuan_juduls';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(FriendUser::class, 'user_id');
    }
}