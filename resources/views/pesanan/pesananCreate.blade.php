@extends('layouts.main')
@section('title')
    Tambah Data Pesanan
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h5 class="card-header bg-yellow text-white">Tambah Data Pesanan</h5>
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
              <form method="POST" enctype="multipart/form-data" action="{{route('pesanan.store')}}">
                @csrf
                <div class="col">
                  <div class="col-md-12 col-xs-12">
                    <div class="form-group">
                      <label for="exampleInputEmail1">No. Kamar</label>
                      <select class="form-control" id="kamar_id" name="Kamar">
                          @foreach ($kamar as $data)
                              <option value="{{ $data->id }}">{{ $data->id }}</option>
                          @endforeach
                      </select>
                  </div>
                  </div>
                  <div class="col-md-12 col-xs-12">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Menu Makanan</label>
                      <select class="form-control" id="makanan_id" name="Makanan">
                          @foreach ($makanan as $data)
                              <option value="{{ $data->id }}">{{ $data->nama_makanan }}</option>
                          @endforeach
                      </select>
                  </div>
                  </div>
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jumlah Makanan</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Jumlah Makanan" name="jumlah_makanan" required>
                          </div>
                    </div>
                    <div class="col-md-12 col-xs-12">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Menu Minuman</label>
                        <select class="form-control" id="minuman_id" name="Minuman">
                            @foreach ($minuman as $data)
                              <option value="{{ $data->id }}">{{ $data->nama_minuman}}</option>
                            @endforeach
                        </select>
                    </div>
                  </div>
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jumlah Minuman</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Jumlah Minuman" name="jumlah_minuman" required>
                          </div>
                    </div>
                    <div class="col-md-12 col-xs-12">
                      <div class="form-group">
                          <label for="exampleInputEmail1">Total Harga</label>
                          <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Total Harga" name="total_harga" required>
                        </div>
                  </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-secondary" href="{{ route('pesanan.index')}}">Cancel</a>
            </form>
            </div>
          </div>
        </div>
    </div>
@endsection