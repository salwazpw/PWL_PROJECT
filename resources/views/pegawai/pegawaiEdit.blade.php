@extends('layouts.main')
@section('title')
    Edit Data Pegawai | QUEEN Z
@endsection
@section('content')
<div class="mt-5 col-md-8 mx-auto">
        <div class="card ">
            <h5 class="card-header bg-primary text-white">Edit Data Pegawai</h5>
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
              <form method="POST" enctype="multipart/form-data"  action="{{route('pegawai.update', $pegawai->nip)}}">
                @csrf
                @method('PUT')
                <div class="col">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">NIP</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="NIP" name="nip" required value="{{$pegawai->nip}}">
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Pegawai</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Nama Pegawai" name="nama_pegawai" required value="{{$pegawai->nama_pegawai}}">
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="foto_pegawai">Foto Pegawai</label>
                            <input type="file" class="form-control" aria-describedby="emailHelp" placeholder="Foto Pegawai" name="foto_pegawai"  value="{{$pegawai->foto_pegawai}}">
                            <img width="150px" src="{{asset('storage/'. $pegawai->foto_pegawai)}}" >
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Alamat</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Alamat" name="alamat" required value="{{$pegawai->alamat}}">
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Jenis Kelamin</label>
                            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="{{$pegawai->jenis_kelamin}}">
                                <option value="P">Perempuan</option>
                                <option value="L">Laki</option>
                            </select>
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tanggal Lahir</label>
                            <input type="date" class="form-control" aria-describedby="emailHelp" placeholder="Tanggal Lahir" name="tanggal_lahir" required value="{{$pegawai->tanggal_lahir}}">
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">No Telepon</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="No Telepon" name="no_telp" required value="{{$pegawai->no_telp}}">
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Jabatan</label>
                            <select class="form-control" id="jabatan" name="jabatan" value="{{$pegawai->jabatan}}">
                                <option value="Manager">Manager</option>
                                <option value="Front Office">Front Office</option>
                                <option value="Housekeeping">Housekeeping</option>
                                <option value="Food Production">Food Production</option>
                                <option value="Sales & Marketing">Sales & Marketing</option>
                                <option value="Admin">Admin</option>
                                <option value="Karyawan">Karyawan</option>
                            </select>
                            @if ($errors->has('jabatan'))
                            <div class="error">{{ $errors->first('jabatan') }}</div>
                        @endif
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Gaji</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Gaji" name="gaji" required value="{{$pegawai->gaji}}">
                          </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-secondary" href="{{ route('minuman.index')}}">Cancel</a>
            </form>

         </div>
        </div>
    </div>
@endsection