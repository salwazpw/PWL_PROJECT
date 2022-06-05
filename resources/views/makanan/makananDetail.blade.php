@extends('layouts.main')
@section('title')
    Detail Data Makanan
@endsection
@section('content')
    <div class="mt-5 col-md-8 mx-auto">
        <div class="card ">
            <h5 class="card-header bg-primary text-white">Detail Data Makanan</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID</label>
                            <input type="text" class="form-control" id="id" name="id" readonly value="{{$makanan->id}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama Makanan</label>
                            <input type="text" class="form-control" id="nama_makanan" name="nama_makanan" value="{{$makanan->nama_makanan}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Gambar Makanan</label><br>
                            <img width="150px" src="{{ asset('storage/' . $makanan->gambar_makanan) }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Harga</label>
                            <input type="text" class="form-control" id="harga" name="harga" readonly value="{{$makanan->harga}}">
                        </div>
                    </div>
                </div>
                <a class="btn btn-secondary" href="{{ route('makanan.index')}}">Back</a>
         </div>
        </div>
    </div>
@endsection