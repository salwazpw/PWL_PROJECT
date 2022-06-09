<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksis';
    protected $primaryKey = 'id';

    // protected $appends = [
    //     'jumlah',
    // ];

    protected $fillable = [
        'id',
        'reservasi_id',
        'kamar_id',
        'pengunjung_id',
        'tanggal_transaksi',
        'biaya_admin'
    ];

    // public function getJumlahAttribute(){
    //     return \Carbon\Carbon::parse($this->reservasi_id->tanggal_checkin)->diff(\Carbon\Carbon::parse($this->reservasi_id->tanggal_checkout))->format(idate, "%d");
    // }

    public function reservasi()
    {
    	return $this->belongsTo(Reservasi::class);
    }

    public function kamar()
    {
    	return $this->belongsTo(Kamar::class);
    }

    public function pengunjung()
    {
    	return $this->belongsTo(Pengunjung::class);
    }
}
