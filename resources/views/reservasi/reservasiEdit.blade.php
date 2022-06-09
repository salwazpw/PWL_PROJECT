@extends('layouts.main')
@section('title')
    Edit Data Reservasi | QUEEN Z
@endsection
@section('content')
<div class="mt-5 col-md-8 mx-auto">
  <div class="card ">
          <h5 class="card-header bg-primary text-white">Edit Data Reservasi</h5>
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
              <form method="POST" enctype="multipart/form-data" action="{{route('reservasi.update',$reservasi->id)}}">
                @csrf
                @method('PUT')
                <div class="col">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Pengunjung">ID Pengunjung</label>
                        <select name="Pengunjung" class="form-control">
                            @foreach ($pengunjung as $data)
                                <option value="{{ $data->id }}" {{ $reservasi->pengunjung_id ? 'selected' : '' }}>{{ $data->id }}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Kamar">No. Kamar</label>
                        <select name="Kamar" class="form-control">
                            @foreach ($kamar as $data)
                                <option value="{{ $data->id }}" {{ $reservasi->kamar_id ? 'selected' : '' }}>{{ $data->id }}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tanggal Booking</label>
                            <input type="date" class="form-control" aria-describedby="emailHelp" placeholder="Tanggal Booking" name="tanggal_booking" required value="{{$reservasi->tanggal_booking}}">
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tanggal Check In</label>
                            <input type="date" class="form-control" aria-describedby="emailHelp" placeholder="Tanggal Check In" name="tanggal_checkin" required value="{{$reservasi->tanggal_checkin}}">
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tanggal Check Out</label>
                            <input type="date" class="form-control" aria-describedby="emailHelp" placeholder="Tanggal Check Out" name="tanggal_checkout" required value="{{$reservasi->tanggal_checkout}}">
                          </div>
                    </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-secondary" href="{{ route('pesanan.index')}}">Cancel</a>
            </form>

         </div>
        </div>
    </div>

    {{-- <script>
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
      </script> --}}
@endsection