<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = 'pegawais';
    protected $primaryKey = 'nip';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'nip',
        'nama_pegawai',
        'foto_pegawai',
        'alamat',
        'jenis_kelamin',
        'tanggal_lahir',      
        'no_telp',
        'jabatan',
        'gaji'
    ];
}
