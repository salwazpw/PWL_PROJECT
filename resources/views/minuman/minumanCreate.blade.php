@extends('layouts.main')
@section('title')
    Tambah Data Minuman
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h5 class="card-header bg-yellow text-white">Tambah Data Minuman</h5>
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
              <form method="POST" enctype="multipart/form-data" action="{{route('minuman.store')}}">
                @csrf
                <div class="col-md-12 col-xs-12">
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="ID" name="id" required>
                          </div>
                    </div>
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Minuman</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Nama minuman" name="nama_minuman" required>
                          </div>
                    </div>
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            <label for="gambar_minuman">Gambar Minuman</label>
                            <input type="file" class="form-control"  name="gambar_minuman" required>
                          </div>
                    </div>
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Harga</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Harga" name="harga" required>
                          </div>
                    </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-secondary" href="{{ route('minuman.index')}}">Cancel</a>
            </form>
            </div>
          </div>
        </div>
    </div>
@endsection