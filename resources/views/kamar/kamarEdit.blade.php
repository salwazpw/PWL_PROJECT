@extends('layouts.main')
@section('title')
    Edit Data Kamar | QUEEN Z
@endsection
@section('content')
<div class="mt-5 col-md-8 mx-auto">
  <div class="card ">
          <h5 class="card-header bg-primary text-white">Edit Data Kamar</h5>
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
              <form method="POST" enctype="multipart/form-data"  action="{{route('kamar.update',$kamar->id)}}">
                @csrf
                @method('PUT')
                <div class="col">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tipe Kamar</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Tipe Kamar" name="tipe_kamar" required value="{{$kamar->tipe_kamar}}">
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="foto_kamar">Foto Kamar</label>
                            <input type="file" class="form-control" aria-describedby="emailHelp" placeholder="Foto Kamar" name="foto_kamar" value="{{$kamar->foto_kamar}}"><br>
                            <img width="150px" src="{{asset('storage/'. $kamar->foto_kamar)}}" >
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Harga</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Harga" name="harga" required value="{{$kamar->harga}}"> 
                          </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-secondary" href="{{ route('kamar.index')}}">Cancel</a>
            </form>

         </div>
        </div>
    </div>
@endsection