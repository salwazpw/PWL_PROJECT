@extends('layouts.main')
@section('title')
    Tambah Data Makanan
@endsection
@section('content')
<div class="mt-5 col-md-8 mx-auto">
  <div class="card ">
      <h5 class="card-header bg-primary text-white">Tambah Data Makanan</h5>
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
              <form method="POST" enctype="multipart/form-data" action="{{route('makanan.store')}}">
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
                            <label for="exampleInputEmail1">Nama Makanan</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Nama Makanan" name="nama_makanan" required>
                          </div>
                    </div>
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            <label for="gambar_makanan">Gambar Makanan</label>
                            <input type="file" class="form-control"  name="gambar_makanan" required>
                          </div>
                    </div>
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Harga</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Harga" name="harga" required>
                          </div>
                    </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-secondary" href="{{ route('makanan.index')}}">Cancel</a>
            </form>
            </div>
          </div>
        </div>
    </div>
@endsection
