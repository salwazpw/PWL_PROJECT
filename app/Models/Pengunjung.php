<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengunjung extends Model
{
    use HasFactory;
    protected $table = 'pengunjungs';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nik',
        'nama',
        'jenis_kelamin',
        'alamat',
        'no_telp',
    ];

    public function reservasi()
    {
    	return $this->hasMany(Reservasi::class);
    }
}
