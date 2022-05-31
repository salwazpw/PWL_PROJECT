@extends('layouts.main')
@section('title')
    Detail Data Kamar
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h5 class="card-header bg-yellow text-white">Detail Data Kamar</h5>
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
                            <img width="150px" src="{{ asset('storage/' . $kamar->foto_kamar) }}">
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