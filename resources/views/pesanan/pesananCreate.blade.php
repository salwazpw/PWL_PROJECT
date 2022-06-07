@extends('layouts.main')
@section('title')
    Tambah Data Pesanan
@endsection
@section('content')
<div class="mt-5 col-md-8 mx-auto">
        <div class="card ">
            <h5 class="card-header bg-primary text-white">Tambah Data Pesanan</h5>
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
                      <select type="number" class="form-control" id="makanan_id" onkeyup="sum();" name="Makanan">
                          @foreach ($makanan as $data)
                              <option value="{{ $data->id}}">{{ $data->nama_makanan }}</option>
                          @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12 col-xs-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Harga Makanan</label>
                        <select type="number" class="form-control" id="harga_makanan" onkeyup="sum();">
                          @foreach ($makanan as $data)
                              <option value="{{ $data->harga}}">{{ $data->nama_makanan }} - {{ $data->harga }}</option>
                          @endforeach
                      </select>
                    </div>
                </div>
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jumlah Makanan</label>
                            <input type="number" class="form-control" aria-describedby="emailHelp" placeholder="Jumlah Makanan" onkeyup="sum();" id="jumlah_makanan" name="jumlah_makanan" required>
                        </div>
                    </div>
                    <div class="col-md-12 col-xs-12">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Menu Minuman</label>
                        <select class="form-control" id="minuman_id" onkeyup="sum();" name="Minuman">
                            @foreach ($minuman as $data)
                              <option value="{{ $data->id }}">{{ $data->nama_minuman}}</option>
                            @endforeach
                        </select>
                    </div>
                  </div>
                  <div class="col-md-12 col-xs-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Harga Minuman</label>
                        <select type="number" class="form-control" id="harga_minuman" onkeyup="sum();">
                          @foreach ($minuman as $data)
                              <option value="{{ $data->harga}}">{{ $data->nama_minuman }} - {{ $data->harga }}</option>
                          @endforeach
                      </select>
                    </div>
                </div>
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jumlah Minuman</label>
                            <input type="number" class="form-control" aria-describedby="emailHelp" placeholder="Jumlah Minuman" onkeyup="sum();" id="jumlah_minuman" name="jumlah_minuman" required>
                          </div>
                    </div>
                    <div class="col-md-12 col-xs-12">
                      <div class="form-group">
                          <label for="exampleInputEmail1">Total Harga</label>
                          <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Total Harga" onkeyup="sum();" id="total_harga" name="total_harga" required readonly>
                        </div>
                  </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-secondary" href="{{ route('pesanan.index')}}">Cancel</a>
            </form>
            </div>
          </div>
        </div>
    </div>

      <script>
      function sum(){
        var txFirstNumberValue = document.getElementById('jumlah_makanan').value;
        var txSecondNumberValue = document.getElementById('jumlah_minuman').value;
        var txThirdNumberValue = document.getElementById('harga_makanan').value;
        var txFourthNumberValue = document.getElementById('harga_minuman').value;
        var result = (parseInt(txFirstNumberValue)*parseInt(txThirdNumberValue)) + (parseInt(txSecondNumberValue)*parseInt(txFourthNumberValue));
        if(!isNaN(result)){
          document.getElementById('total_harga').value = result;
        }
      }
    </script>
@endsection