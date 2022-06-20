@extends('layouts.main')
@section('title')
    Detail Data Kamar
@endsection
@section('content')
<div class="mt-5 col-md-8 mx-auto">
    <div class="card ">
            <h5 class="card-header bg-primary text-white">Detail Data Kamar</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">No. Kamar</label>
                            <input type="text" class="form-control" id="id" name="id" readonly value="{{$kamar->id}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tipe Kamar</label>
                            <input type="text" class="form-control" id="tipe_kamar" name="tipe_kamar" value="{{$kamar->tipe_kamar}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Foto Kamar</label><br>
                            <img width="600px" height="500px" src="{{ asset('storage/' . $kamar->foto_kamar) }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Harga</label>
                            <input type="text" class="form-control" id="harga" name="harga" readonly value="{{$kamar->harga}}">
                        </div>
                    </div>
                </div>
                <a class="btn btn-secondary" href="{{ route('kamar.index')}}">Back</a>
         </div>
        </div>
    </div>
@endsection