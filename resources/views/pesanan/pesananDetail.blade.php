@extends('layouts.main')
@section('title')
    Detail Data Pesanan
@endsection
@section('content')
<div class="mt-5 col-md-8 mx-auto">
    <div class="card ">
            <h5 class="card-header bg-primary text-white">Detail Data Pesanan</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID</label>
                            <input type="text" class="form-control" id="id" name="id" value="{{$pesanan->id}}"  readonly >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">No. Kamar</label>
                            <input type="text" class="form-control" id="kamar_id" name="Kamar" value="{{$pesanan->kamar->id}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Menu Makanan</label>
                            <input type="text" class="form-control" id="makanan_id" name="Makanan" value="{{$pesanan->makanan->nama_makanan}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Harga Makanan</label>
                            <input type="text" class="form-control" id="harga_makanan" value="{{$pesanan->makanan->harga}}" readonly>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Jumlah Makanan</label>
                                <input type="text" class="form-control" id="jumlah_makanan" name="jumlah_makanan" value="{{$pesanan->jumlah_makanan}}" readonly >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Menu Minuman</label>
                            <input type="text" class="form-control" id="minuman_id" name="Minuman" value="{{$pesanan->minuman->nama_minuman}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Harga Minuman</label>
                            <input type="text" class="form-control" id="harga_minuman" value="{{$pesanan->minuman->harga}}" readonly>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Jumlah Minuman</label>
                                <input type="text" class="form-control" id="jumlah_minuman" name="jumlah_minuman" value="{{$pesanan->jumlah_minuman}}" readonly >
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Total Harga</label>
                                <input type="text" class="form-control" id="total_harga" name="total_harga" value="{{$pesanan->total_harga}}" readonly >
                            </div>
                        </div>
                    </div> 
                </div>
                <a class="btn btn-secondary" href="{{ route('pesanan.index')}}">Back</a>

         </div>
        </div>
    </div>
@endsection