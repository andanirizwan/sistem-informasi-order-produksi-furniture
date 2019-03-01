<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = 'laporan';
    public $timestamps = false;

    protected $fillable = [
        'pengiriman', 'status', 'buyer_id', 'po_id', 'spk_id'
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
}
