<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Makanan extends Model
{
    use HasFactory;

    protected $table = 'makanans';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'nama_makanan',
        'gambar_makanan',
        'harga'   
    ];

    public function pesanan()
    {
    	return $this->hasMany(Pesanan::class);
    }

}
