@extends('layouts.main')
@section('title')
    Detail Data Transaksi
@endsection
@section('content')
<div class="mt-5 col-md-8 mx-auto">
    <div class="card ">
            <h5 class="card-header bg-primary text-white">Detail Data Transaksi</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID</label>
                            <input type="text" class="form-control" id="id" name="id" value="{{$transaksi->id}}"  readonly >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID Reservasi</label>
                            <input type="text" class="form-control" id="reservasi_id" name="id" value="{{$transaksi->reservasi->id}}"  readonly >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">No. Kamar</label>
                            <input type="text" class="form-control" id="kamar_id" name="Kamar" value="{{$transaksi->kamar->id}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID Pengunjung</label>
                            <input type="text" class="form-control" id="pengunjung_id" name="id" value="{{$transaksi->pengunjung->id}}"  readonly >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Harga Kamar</label>
                            <input type="text" class="form-control" id="harga_kamar" value="{{$transaksi->kamar->harga}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Jumlah Hari</label>
                            <input type="text" class="form-control" id="jumlah_hari" value="{{$transaksi->reservasi->jumlah}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tanggal Transaksi</label>
                            <input type="text" class="form-control" id="tanggal_transaksi" name="tanggal_transaksi" value="{{$transaksi->tanggal_transaksi}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Biaya Admin</label>
                            <input type="text" class="form-control" id="biaya_admin" name="biaya_admin" value="{{$transaksi->biaya_admin}}" readonly>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Total Harga</label>
                                <input type="text" class="form-control" id="total_harga" name="total_harga" value="{{$transaksi->total_harga}}" readonly >
                            </div>
                        </div>
                    </div> 
                </div>
                <a class="btn btn-secondary" href="{{ route('transaksi.index')}}">Back</a>

         </div>
        </div>
    </div>
@endsection