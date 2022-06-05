@extends('layouts.main')
@section('title')
    Detail Data Pengunjung
@endsection
@section('content')
<div class="mt-5 col-md-8 mx-auto">
    <div class="card ">
            <h5 class="card-header bg-primary text-white">Detail Data Pengunjung</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID Pengunjung</label>
                            <input type="text" class="form-control" id="id" name="id" value="{{$pengunjung->id}}"  readonly >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">NIK</label>
                            <input type="text" class="form-control" id="nik" name="nik" value="{{$pengunjung->nik}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{$pengunjung->nama}}" readonly>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Jenis Kelamin</label>
                                <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" readonly value="{{$pengunjung->jenis_kelamin}}">
                            </div>
                        </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{$pengunjung->alamat}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">No. Telepon</label>
                                    <input type="text" class="form-control" id="no_telp" name="no_telp" value="{{$pengunjung->no_telp}}" readonly>
                                </div>
                    </div>
                </div>
                <a class="btn btn-secondary" href="{{ route('pengunjung.index')}}">Back</a>

         </div>
        </div>
    </div>
@endsection