@extends('layouts.main')
@section('title')
    Tambah Data Kamar
@endsection
@section('content')
<div class="mt-5 col-md-8 mx-auto">
    <div class="card ">
            <h5 class="card-header bg-primary text-white">Tambah Data Kamar</h5>
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
              <form method="POST" enctype="multipart/form-data" action="{{route('kamar.store')}}">
                @csrf
                <div class="col-md-12 col-xs-12">
                  <div class="col-md-12 col-xs-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">No. Kamar</label>
                        <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="No Kamar" name="id" required>
                      </div>
                </div>
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tipe Kamar</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Tipe Kamar" name="tipe_kamar" required>
                          </div>
                    </div>
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            <label for="foto_kamar">Foto Kamar</label>
                            <input type="file" class="form-control"  name="foto_kamar" required>
                          </div>
                    </div>
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Harga</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Harga" name="harga" required>
                          </div>
                    </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-secondary" href="{{ route('kamar.index')}}">Cancel</a>
            </form>
            </div>
          </div>
        </div>
    </div>
@endsection
