@extends('layouts.main')
@section('title')
    Cetak Data Reservasi
@endsection
@section('content')
    <div class="container mt-3">
        <h3 class="text-center mb-5">QUEEN Z HOTEL</h3>
        <h2 class="text-center mb-4">DATA RESERVASI</h2>

        <br><br><br>

        <b>ID Reservasi   :</b> {{$reservasi->id}}<br>
        <b>ID Pengunjung     : </b>{{$reservasi->pengunjung->id}}<br>

        <h5>No Kamar    :{{$reservasi->kamar->id }}</h1>
        <h5>Tanggal Booking :{{$reservasi->tanggal_booking}}</h5>
        <h5>Tanggal Check In  :{{$reservasi->tanggal_checkin}}</h5>
        <h5>Tanggal Check Out :{{$reservasi->tanggal_checkin}}</h5>
        
    </div>
    <center><a class="btn btn-icons btn-light" target="_blank" href="{{ route('pdfcetak', $reservasi->id) }}"><i class="fas fa-print"></i> Cetak Ke PDF </a></center>
@endsection
