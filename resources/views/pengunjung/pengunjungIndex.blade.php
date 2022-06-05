@extends('layouts.main')
@section('title')
    Data Pengunjung | QUEEN Z
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Pengunjung</h1><br>
            <h3> <a class="btn btn-success" href="{{route('pengunjung.create')}}">+ Tambah Data</a></h3>
          </div><!-- /.col -->
            <div class="col-md-6"><br><br><br>
                <div class="float-right">
                    <form class="form-inline my-23 my-lg-0" action="{{url()->current()}}" method="GET">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="keyword" value="{{request('keyword')}}">
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
                            <th scope="col">ID</th>
                            <th scope="col">NIK</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">No Telepon</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengunjung as $data)
                    <tr>
                        <td>{{$data->id}}</td>
                        <td>{{$data->nik}}</td>
                        <td>{{$data->nama}}</td>
                        <td>{{$data->jenis_kelamin}}</td>
                        <td>{{$data->alamat}}</td>
                        <td>{{$data->no_telp}}</td>
                        <td>
                            <form action="{{ route('pengunjung.destroy',  $data->id) }}" method="POST">
                                <a class="btn btn-icons btn-primary" href="{{route('pengunjung.show', $data->id)}}"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-icons btn-warning" href="{{route('pengunjung.edit', $data->id)}}"><i class="fa fa-edit"></i></a>
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
                            <p>Page : {!! $pengunjung->currentPage() !!} <br />
                                Jumlah Data : {!! $pengunjung->total() !!} <br />
                                Data Per Halaman : {!! $pengunjung->perPage() !!} <br />
                            </p>
                        </div>
                        <div class="mx-auto">
                            <div class="paginate-button col-md-12">
                                {{ $pengunjung->links() }}
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
        $('#pengunjung').addClass('active');
    </script>
@endsection
