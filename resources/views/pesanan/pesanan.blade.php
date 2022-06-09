@extends('layouts.main')
@section('title')
    Detail Data Pesanan
@endsection
@section('content')
    <div class="container mt-3">
        <h3 class="text-center mb-5">QUEEN Z HOTEL</h3>
        <h2 class="text-center mb-4">DATA PESANAN</h2>

        <br><br><br>

        <b>ID Pesanan   :</b> {{$pesanan->id}}<br>
        <b>No Kamar     : </b>{{$pesanan->kamar->id}}<br>

        <h5>Menu Makanan    :{{$pesanan->makanan->nama_makanan }}</h1>
        <h5>Harga Makanan   :{{$pesanan->makanan->harga}}</h5>
        <h5>Jumlah Makanan  :{{$pesanan->minuman->nama_minuman }}</h5>
        <h5>Menu Minuman    :{{$pesanan->minuman->harga}}</h5>
        <h5>Harga Minuman   :{{$pesanan->total_harga}}</h5>
        <h5>Jumlah Minuman  :{{$pesanan->jumlah_minuman}}</h5>
        <h5>Total Harga     :{{$pesanan->total_harga}}</h5>
        
    </div>
    <center><a class="btn btn-danger" href="{{ route('cetakpdf', $pesanan->id) }}"> Cetak Ke PDF</a></center>
@endsection
