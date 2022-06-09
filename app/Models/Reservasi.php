<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;
    protected $table = 'reservasis';
    protected $primaryKey = 'id';

    protected $appends = [
        'jumlah',
    ];

    protected $fillable = [
        'id',
        'pengunjung_id',
        'kamar_id',
        'tanggal_booking',
        'tanggal_checkin',
        'tanggal_checkout',

    ];

    public function getJumlahAttribute(){
        return \Carbon\Carbon::parse($this->tanggal_checkin)->diff(\Carbon\Carbon::parse($this->tanggal_checkout))->format('%d hari');
    }

    public function pengunjung()
    {
    	return $this->belongsTo(Pengunjung::class);
    }

    public function kamar()
    {
    	return $this->belongsTo(Kamar::class);
    }
}
