<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spk extends Model
{
    protected $table = 'spk';

    protected $fillable = [
        'nama', 'foto', 'ukuran', 'material'
    ];

    public function barang()
    {
        return $this->belongsTo('App\Barang', 'barang_id', 'id');
    }
    public function buyer()
    {
        return $this->belongsTo('App\Buyer', 'buyer_id', 'id');
    }

}
