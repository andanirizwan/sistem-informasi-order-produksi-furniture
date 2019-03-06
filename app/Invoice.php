<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoice';
    public $timestamps = false;

    protected $fillable = [
        'no_invoice', 'file', 'buyer_id','po_id'
    ];

    function buyer()
    {
        return $this->belongsTo('App\buyer', 'buyer_id', 'id');
    }
    function po()
    {
        return $this->belongsTo('App\Po', 'po_id', 'id');
    }
    function spk()
    {
        return $this->belongsTo('App\Spk', 'spk_id', 'id');
    }
    function user()
    {
        return $this->belongsTo('App\User', 'users_id', 'id');
    }
}
