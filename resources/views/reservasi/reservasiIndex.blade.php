@extends('layouts.main')
@section('title')
    Data Reservasi | QUEEN Z
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Reservasi</h1><br>
            <h3> <a class="btn btn-success" href="{{route('reservasi.create')}}">+ Tambah Data</a></h3>
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
                            <th scope="col">ID</th>
                            <th scope="col">ID Pengunjung</th>
                            <th scope="col">No. Kamar</th>
                            <th scope="col">Tanggal Booking</th>
                            <th scope="col">Tanggal Check In</th>
                            <th scope="col">Tanggal Check Out</th>
                            <th scope="col">Jumlah Hari</th>
                            <th scope="col" width="200px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservasi as $data)
                    <tr>
                        <td>{{$data->id}}</td>
                        <td>{{$data->pengunjung->id }}</td>
                        <td>{{$data->kamar->id }}</td>
                        <td>{{$data->tanggal_booking }}</td>
                        <td>{{$data->tanggal_checkin}}</td>
                        <td>{{$data->tanggal_checkout }}</td>
                        <td>{{$data->jumlah}}</td>
                        <td>
                            <form action="{{ route('reservasi.destroy',  $data->id) }}" method="POST">
                                <a class="btn btn-icons btn-primary" href="{{route('reservasi.show', $data->id)}}"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-icons btn-warning" href="{{route('reservasi.edit', $data->id)}}"><i class="fas fa-edit"></i></a>
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
                            <p>Page : {!! $reservasi->currentPage() !!} <br />
                                Jumlah Data : {!! $reservasi->total() !!} <br />
                                Data Per Halaman : {!! $reservasi->perPage() !!} <br />
                            </p>
                        </div>
                        <div class="mx-auto">
                            <div class="paginate-button col-md-12">
                                {{ $reservasi->links() }}
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
        $('#reservasi').addClass('active');
    </script>
@endsection