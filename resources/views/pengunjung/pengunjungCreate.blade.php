@extends('layouts.main')
@section('title')
    Tambah Data Pengunjung
@endsection
@section('content')
<div class="mt-5 col-md-8 mx-auto">
  <div class="card ">
          <h5 class="card-header bg-primary text-white">Tambah Data Pengunjung</h5>
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
              <form method="POST" enctype="multipart/form-data" action="{{route('pengunjung.store')}}">
                @csrf
                <div class="col-md-12 col-xs-12">
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="NIK" name="nik" required>
                          </div>
                    </div>
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Nama Lengkap" name="nama" required>
                          </div>
                    </div>
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            <label class="col-form-label">Jenis Kelamin</label>
                           <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                        <option value="P">Perempuan</option>
                                        <option value="L">Laki</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                        <div class="col-md-12 col-xs-12">
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Alamat" name="alamat" required>
                              </div>
                        </div>
                        <div class="col-md-12 col-xs-12">
                            <div class="form-group">
                                <label for="nama">No. Telepon</label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="No. Telepon" name="no_telp" required>
                              </div>
                        </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-secondary" href="{{ route('pengunjung.index')}}">Cancel</a>
            </form>
            </div>
          </div>
        </div>
    </div>
@endsection
