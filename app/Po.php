<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Po extends Model
{
    protected $table = 'po';

    protected $fillable = [
        'no_po', 'pengiriman', 'file_po',
    ];

    function buyer()
    {
        return $this->belongsTo('App\buyer', 'buyer_id', 'id');
    }
    function user()
    {
        return $this->belongsTo('App\User', 'users_id', 'id');
    }
    
}
