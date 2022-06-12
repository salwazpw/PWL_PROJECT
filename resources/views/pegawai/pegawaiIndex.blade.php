@extends('layouts.main')
@section('title')
    Data Pegawai | QUEEN Z
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Pegawai</h1><br>
            <h3> <a class="btn btn-success" href="{{route('pegawai.create')}}">+ Tambah Data</a></h3>
          </div><!-- /.col -->
            <div class="col-md-6"><br><br><br>
                <div class="float-right">
                    <form class="form-inline my-23 my-lg-0" action="{{url()->current()}}" method="GET">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="keyword" value="{{request('keyword')}}">
                        {{-- <button class="btn btn-icons btn-warning" type="submit"><i class="glyphicon glyphicon-search"></i></button> --}}
                        <button type="submit" class="btn btn-primary" type="submit"><span class="fa fa-search"></span></button>
                    </form>
               </div>
           </div>
          </div><!-- /.col -->
    </div>
            <div class="alert-option">
                <div class="col-md-12">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{$message}}</p>
                    </div>
                @endif

                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">NIP</th>
                            <th scope="col">Nama Pegawai</th>
                            <th scope="col">Foto Pegawai</th>
                            <th scope="col">Alamat</th>                         
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Tanggal Lahir</th>
                            <th scope="col">No Telepon</th>
                            <th scope="col">Jabatan</th>
                            <th scope="col">Gaji</th>
                            <th scope="col" width="500px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pegawai as $data)
                    <tr>
                        <td>{{$data->nip}}</td>
                        <td>{{$data->nama_pegawai}}</td>
                        <td><img width="100px" height="100px" src="{{ asset('storage/' . $data->foto_pegawai) }}"></td>
                        <td>{{$data->alamat}}</td>
                        <td>{{$data->jenis_kelamin}}</td>
                        <td>{{date('j M Y', strtotime($data->tanggal_lahir))}}</td>                      
                        <td>{{$data->no_telp}}</td>
                        <td>{{$data->jabatan}}</td>
                        <td>Rp. {{number_format($data->gaji, 0, ",", ".")}}</td>
                        <td>
                            <form action="{{ route('pegawai.destroy',  $data->nip) }}" method="POST">
                                <a class="btn btn-icons btn-primary" href="{{route('pegawai.show', $data->nip)}}"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-icons btn-warning" href="{{route('pegawai.edit', $data->nip)}}"><i class="fa fa-edit"></i></a>
                                    @csrf
                                    @method('DELETE')
                                <button type="submit" class="btn btn-icons btn-danger"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="paginate">
                <div class="container">
                    <div class="row">
                        <div class="detail-data col-md-12">
                            <p>Page : {!! $pegawai->currentPage() !!} <br />
                                Jumlah Data : {!! $pegawai->total() !!} <br />
                                Data Per Halaman : {!! $pegawai->perPage() !!} <br />
                            </p>
                        </div>
                        <div class="mx-auto">
                            <div class="paginate-button col-md-12">
                                {{ $pegawai->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        $('#pegawai').addClass('active');
    </script>
@endsection