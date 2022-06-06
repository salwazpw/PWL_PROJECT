@extends('layouts.main')
@section('title')
    Edit Data Makanan | QUEEN Z
@endsection
@section('content')
<div class="mt-5 col-md-8 mx-auto">
        <div class="card ">
            <h5 class="card-header bg-primary text-white">Edit Data Makanan</h5>
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
              <form method="POST" enctype="multipart/form-data"  action="{{route('makanan.update',$makanan->id)}}">
                @csrf
                @method('PUT')
                <div class="col">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Makanan</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="nama_makanan" name="nama_makanan" required value="{{$makanan->nama_makanan}}">
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="gambar_makanan">Gambar Makanan</label>
                            <input type="file" class="form-control" aria-describedby="emailHelp" placeholder="Gambar Makanan" name="gambar_makanan" required value="{{$makanan->gambar_makanan}}"><br>
                            <img width="150px" src="{{asset('storage/'. $makanan->gambar_makanan)}}" >
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Harga</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Harga" name="harga" required value="{{$makanan->harga}}"> 
                          </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-secondary" href="{{ route('makanan.index')}}">Cancel</a>
            </form>

         </div>
        </div>
    </div>
@endsection