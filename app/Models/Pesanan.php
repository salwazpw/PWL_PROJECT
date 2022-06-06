<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    protected $table = 'pesanans';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'kamar_id',
        'makanan_id',
        'minuman_id',
        'jumlah_makanan',
        'jumlah_minuman'
    ];

    public function makanan()
    {
    	return $this->belongsTo(Makanan::class);
    }

    public function minuman()
    {
    	return $this->belongsTo(Minuman::class);
    }

    public function kamar()
    {
    	return $this->belongsTo(Kamar::class);
    }

}
