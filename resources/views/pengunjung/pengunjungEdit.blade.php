@extends('layouts.main')
@section('title')
    Edit Data Pengunjung | QUEEN Z
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h5 class="card-header bg-yellow text-white">Edit Data Pengunjung</h5>
            <div class="card-body">
              @if ($errors->any())
              <div class="alert alert-danger">
                <strong>Whoops!</strong>There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
              </div>
            </div>
        </div>
              @endif
              <form method="POST" enctype="multipart/form-data"  action="{{route('pengunjung.update',$pengunjung->id)}}">
                @csrf
                @method('PUT')
                <div class="col">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="id">ID Pengunjung</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="ID" name="id" required value="{{$pengunjung->id}}">
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="NIK" name="nik" required value="{{$pengunjung->nik}}">
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Lengkap</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Nama Lengkap" name="nama" required value="{{$pengunjung->nama}}">
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label">Jenis Kelamin</label >
                                    <div class="form-group">
                                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="{{$pengunjung->jenis_kelamin}}">
                                            <option value="P">Perempuan</option>
                                            <option value="L">Laki</option>
                                        </select>
                                      </div>
                                </div>
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Alamat" name="alamat" required value="{{$pengunjung->alamat}}"> 
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="no_telp">No. Telepon</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Alamat" name="no_telp" required value="{{$pengunjung->no_telp}}"> 
                          </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-secondary" href="{{ route('pengunjung.index')}}">Cancel</a>
            </form>

         </div>
        </div>
    </div>
@endsection