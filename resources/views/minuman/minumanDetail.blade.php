@extends('layouts.main')
@section('title')
    Detail Data Minuman
@endsection
@section('content')
<div class="mt-5 col-md-8 mx-auto">
        <div class="card ">
            <h5 class="card-header bg-primary text-white">Detail Data Minuman</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID</label>
                            <input type="text" class="form-control" id="id" name="id" readonly value="{{$minuman->id}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama Minuman</label>
                            <input type="text" class="form-control" id="nama_minuman" name="nama_minuman" value="{{$minuman->nama_minuman}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Gambar Minuman</label><br>
                            <img width="150px" src="{{ asset('storage/' . $minuman->gambar_minuman) }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Harga</label>
                            <input type="text" class="form-control" id="harga" name="harga" readonly value="{{$minuman->harga}}">
                        </div>
                    </div>
                </div>
                <a class="btn btn-secondary" href="{{ route('minuman.index')}}">Back</a>
         </div>
        </div>
    </div>
@endsection