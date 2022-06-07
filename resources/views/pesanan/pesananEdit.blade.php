@extends('layouts.main')
@section('title')
    Edit Data Pesanan | QUEEN Z
@endsection
@section('content')
<div class="mt-5 col-md-8 mx-auto">
  <div class="card ">
          <h5 class="card-header bg-primary text-white">Edit Data Pesanan</h5>
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
              <form method="POST" enctype="multipart/form-data"  action="{{route('pesanan.update',$pesanan->id)}}">
                @csrf
                @method('PUT')
                <div class="col">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Kamar">No. Makanan</label>
                        <select name="Kamar" class="form-control">
                            @foreach ($kamar as $data)
                                <option value="{{ $data->id }}" {{ $pesanan->kamar_id ? 'selected' : '' }}>{{ $data->id }}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Makanan">Menu Makanan</label>
                        <select name="Makanan" class="form-control">
                            @foreach ($makanan as $data)
                                <option value="{{ $data->id }}" {{ $pesanan->makanan_id ? 'selected' : '' }}>{{ $data->nama_makanan }}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Harga Makanan</label>
                        <select type="number" class="form-control" id="harga_makanan" onkeyup="sum();">
                            @foreach ($makanan as $data)
                                <option value="{{ $data->harga }}" {{ $pesanan->makanan_id ? 'selected' : '' }}>{{ $data->nama_makanan }} - {{ $data->harga }}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jumlah Makanan</label>
                            <input type="number" class="form-control" aria-describedby="emailHelp" placeholder="Jumlah Makanan" onkeyup="sum();"  id ="jumlah_makanan" name="jumlah_makanan" required value="{{$pesanan->jumlah_makanan}}"> 
                          </div>
                    </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Minuman">Menu Minuman</label>
                    <select name="Minuman" class="form-control">
                        @foreach ($minuman as $data)
                            <option value="{{ $data->id }}" {{ $pesanan->minuman_id ? 'selected' : '' }}>{{ $data->nama_minuman }}</option>
                        @endforeach
                    </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Harga Minuman</label>
                    <select type="number" class="form-control" id="harga_minuman" onkeyup="sum();">
                        @foreach ($minuman as $data)
                            <option value="{{ $data->harga }}" {{ $pesanan->minuman_id ? 'selected' : '' }}>{{ $data->nama_minuman }} - {{ $data->harga }}</option>
                        @endforeach
                    </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Jumlah Minuman</label>
                        <input type="number" class="form-control" aria-describedby="emailHelp" placeholder="Jumlah Minuman" onkeyup="sum();"  id ="jumlah_minuman" name="jumlah_minuman" required value="{{$pesanan->jumlah_minuman}}"> 
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Total Harga</label>
                        <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Total Harga" onkeyup="sum();" id ="total_harga" name="total_harga" required value="{{$pesanan->total_harga}}" readonly> 
                      </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-secondary" href="{{ route('pesanan.index')}}">Cancel</a>
            </form>

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