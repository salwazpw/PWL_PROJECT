@extends('layouts.main')
@section('title')
    Detail Data Reservasi
@endsection
@section('content')
<div class="mt-5 col-md-8 mx-auto">
    <div class="card ">
            <h5 class="card-header bg-primary text-white">Detail Data Reservasi</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID</label>
                            <input type="text" class="form-control" id="id" name="id" value="{{$reservasi->id}}"  readonly >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">ID Pengunjung</label>
                            <input type="text" class="form-control" id="pengunjung_id" name="Pengunjung" value="{{$reservasi->pengunjung->id}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">No. Kamar</label>
                            <input type="text" class="form-control" id="kamar_id" name="Kamar" value="{{$reservasi->kamar->id}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tanggal Booking</label>
                            <input type="text" class="form-control" id="tanggal_booking" name="tanggal_booking" value="{{$reservasi->tanggal_booking}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tanggal Check In</label>
                            <input type="text" class="form-control" id="tanggal_checkin" name="tanggal_checkin" value="{{$reservasi->tanggal_checkin}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tanggal Check Out</label>
                            <input type="text" class="form-control" id="tanggal_checkout" name="tanggal_checkout" value="{{$reservasi->tanggal_checkout}}" readonly>
                        </div>
                    </div> 
                </div>
                <a class="btn btn-secondary" href="{{ route('reservasi.index')}}">Back</a>
         </div>
        </div>
    </div>
@endsection