@extends('layouts.main')
@section('title')
    Cetak Data Transaksi
@endsection
@section('content')
    <div class="container mt-3">
        <h3 class="text-center mb-5">QUEEN Z HOTEL</h3>
        <h2 class="text-center mb-4">DATA PESANAN</h2>

        <br><br><br>

        <b>ID Transaksi         :</b> {{$transaksi->id}}<br>
        <b>ID Reservasi         : </b>{{$transaksi->reservasi->id}}<br>

        <h5>ID Pengunjung       :{{$transaksi->pengunjung->id }}</h1>
        <h5>No. Kamar           :{{$transaksi->kamar->id }}</h5>
        <h5>Harga Kamar         :{{$transaksi->kamar->harga }}</h5>
        <h5>Jumlah Hari         :{{$transaksi->reservasi->jumlah}}</h5>
        <h5>Tanggal Transaksi   :{{$transaksi->tanggal_transaksi}}</h5>
        <h5>Biaya Admin         :{{$transaksi->biaya_admin}}</h5>
        <h5>Total Harga         :{{$transaksi->total_harga}}</h5>
        
    </div>
    <center><a class="btn btn-icons btn-light" target="_blank" href="{{ route('cetak_pdf', $transaksi->id) }}"><i class="fas fa-print"></i> Cetak Ke PDF </a></center>
@endsection