@extends('layouts.main')
@section('title')
    Edit Data Minuman | QUEEN Z
@endsection
@section('content')
<div class="mt-5 col-md-8 mx-auto">
        <div class="card ">
            <h5 class="card-header bg-primary text-white">Edit Data Minuman</h5>
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
              <form method="POST" enctype="multipart/form-data"  action="{{route('minuman.update',$minuman->id)}}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Minuman</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="nama_minuman" name="nama_minuman" required value="{{$minuman->nama_minuman}}">
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="gambar_minuman">Gambar Minuman</label>
                            <input type="file" class="form-control" aria-describedby="emailHelp" placeholder="Gambar Minuman" name="gambar_minuman" required value="{{$minuman->gambar_minuman}}">
                            <img width="150px" src="{{asset('storage/'. $minuman->gambar_minuman)}}" >
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Harga</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Harga" name="harga" required value="{{$minuman->harga}}"> 
                          </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-secondary" href="{{ route('minuman.index')}}">Cancel</a>
            </form>

         </div>
        </div>
    </div>
@endsection