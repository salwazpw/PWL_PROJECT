<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;
    protected $table = 'kamars';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'tipe_kamar',
        'foto_kamar',
        'harga',
    ];

    public function pesanan()
    {
    	return $this->hasMany(Pesanan::class);
    }

    public function reservasi()
    {
    	return $this->hasMany(Reservasi::class);
    }

    public function transaksi()
    {
    	return $this->hasMany(Transaksi::class);
    }
}
