<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class buyer extends Model
{
    protected $table = 'buyer';
    protected $fillable = [
        'perusahaan', 'alamat', 'telepon', 'create_at'
    ];

    function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
