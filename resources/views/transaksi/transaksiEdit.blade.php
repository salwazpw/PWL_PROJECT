@extends('layouts.main')
@section('title')
    Edit Data Transaksi | QUEEN Z
@endsection
@section('content')
<div class="mt-5 col-md-8 mx-auto">
  <div class="card ">
          <h5 class="card-header bg-primary text-white">Edit Data Transaksi</h5>
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
              <form method="POST" enctype="multipart/form-data"  action="{{route('transaksi.update',$transaksi->id)}}">
                @csrf
                @method('PUT')
                <div class="col">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Reservasi">ID Reservasi</label>
                            <select name="Reservasi" class="form-control">
                            @foreach ($reservasi as $data)
                                <option value="{{ $data->id }}" {{ $transaksi->reservasi_id ? 'selected' : '' }}>{{ $data->id }}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Kamar">No. Kamar</label>
                            <select name="Kamar" class="form-control">
                            @foreach ($kamar as $data)
                                <option value="{{ $data->id }}" {{ $transaksi->reservasi_id ? 'selected' : '' }}>{{ $data->id }}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Pengunjung">ID Pengunjung</label>
                            <select name="Pengunjung" class="form-control">
                            @foreach ($pengunjung as $data)
                                <option value="{{ $data->id }}" {{ $transaksi->reservasi_id ? 'selected' : '' }}>{{ $data->id }} - {{ $data->nama }}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>No. Kamar - Harga Kamar</label>
                        <select type="number" class="form-control" id="harga_kamar" onkeyup="sum();">
                            @foreach ($kamar as $data)
                                <option value="{{ $data->harga }}" {{ $transaksi->kamar_id ? 'selected' : '' }}>{{ $data->id }} - {{ $data->harga }}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>ID Reservasi - Jumlah Hari</label>
                        <select type="number" class="form-control" id="jumlah_hari" onkeyup="sum();">
                            @foreach ($reservasi as $data)
                                <option value="{{ $data->jumlah }}" {{ $transaksi->reservasi_id ? 'selected' : '' }}>{{ $data->id }} - {{ $data->jumlah }}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tanggal Transaksi</label>
                            <input type="date" class="form-control" aria-describedby="emailHelp" placeholder="Tanggal Transaksi" name="tanggal_transaksi" required value="{{$transaksi->tanggal_transaksi}}">
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Biaya Admin</label>
                            <input type="number" class="form-control" aria-describedby="emailHelp" placeholder="Biaya Admin" onkeyup="sum();"  id ="biaya_admin" name="biaya_admin" required value="{{$transaksi->biaya_admin}}"> 
                          </div>
                    </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Total Harga</label>
                        <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Total Harga" onkeyup="sum();" id ="total_harga" name="total_harga" required value="{{$transaksi->total_harga}}" readonly> 
                      </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-secondary" href="{{ route('transaksi.index')}}">Cancel</a>
            </form>

         </div>
        </div>
    </div>

    <script>
      function sum(){
        var txFirstNumberValue = document.getElementById('harga_kamar').value;
        var txSecondNumberValue = document.getElementById('biaya_admin').value;
        var txThirdNumberValue = document.getElementById('jumlah_hari').value;
        var result = (parseInt(txFirstNumberValue) * parseInt(txThirdNumberValue)) + parseInt(txSecondNumberValue);
        if(!isNaN(result)){
          document.getElementById('total_harga').value = result;
        }
      }
    </script>
@endsection