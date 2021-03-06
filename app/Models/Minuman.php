<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Minuman extends Model
{
    use HasFactory;

    protected $table = 'minumen';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'nama_minuman',
        'gambar_minuman',
        'harga'   
    ];

    public function pesanan()
    {
    	return $this->hasMany(Pesanan::class);
    }
}
