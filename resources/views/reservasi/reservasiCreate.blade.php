@extends('layouts.main')
@section('title')
    Tambah Data Reservasi
@endsection
@section('content')
<div class="mt-5 col-md-8 mx-auto">
        <div class="card ">
            <h5 class="card-header bg-primary text-white">Tambah Data Reservasi</h5>
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
              <form method="POST" enctype="multipart/form-data" action="{{route('reservasi.store')}}">
                @csrf
                <div class="col">
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                          <label for="exampleInputEmail1">ID Pengunjung</label>
                          <select class="form-control" id="pengunjung_id" name="Pengunjung">
                              @foreach ($pengunjung as $data)
                                  <option value="{{ $data->id }}">{{ $data->id }}</option>
                              @endforeach
                          </select>
                      </div>
                    </div>
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
                        <label for="exampleInputEmail1">Tanggal Booking</label>
                        <input type="date" class="form-control" aria-describedby="emailHelp" placeholder="Tanggal Booking" name="tanggal_booking" required>
                    </div>
                  </div>
                  <div class="col-md-12 col-xs-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Check In</label>
                        <input type="date" class="form-control" aria-describedby="emailHelp" placeholder="Tanggal Check In" id="tanggal_checkin" name="tanggal_checkin" onkeyup="sum();" required>
                    </div>
                  </div>
                  <div class="col-md-12 col-xs-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Check Out</label>
                        <input type="date" class="form-control" aria-describedby="emailHelp" placeholder="Tanggal Check Out" id="tanggal_checkout" name="tanggal_checkout" onkeyup="sum();" required>
                    </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-secondary" href="{{ route('reservasi.index')}}">Cancel</a>
            </form>
            </div>
          </div>
        </div>
    </div>
@endsection