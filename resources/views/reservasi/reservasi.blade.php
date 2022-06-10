@extends('layouts.main')
@section('title')
    Cetak Data Reservasi
@endsection
@section('content')
    <div class="container mt-3">
        <html>

        <head >
            <h1>
            <center><font face="Courier New" size="5">ROOM RESERVATION QUEEN Z HOTEL</font></center>
            </h1>
        </head>
        <body>
            <font face="Courier New" />

            <table align="center">

                <td colspan="4">------------------------------------------------------</td>

                <tr>
                    <td>ID Reservasi</td>
                    <td>:</td>
                    <td>{{ $reservasi->id }}</td>
                </tr>

                <tr>
                    <td>Nama Pengunjung</td>
                    <td>:</td>
                    <td>{{ $reservasi->pengunjung->nama }}</td>
                </tr>

                <td colspan="4">------------------------------------------------------</td>

                <tr>
                    <td>Tanggal Booking</td>
                    <td>:</td>
                    <td>{{ $reservasi->tanggal_booking }}</td>
                </tr>

                <tr>
                    <td>Tanggal Check In</td>
                    <td>:</td>
                    <td>{{ $reservasi->tanggal_checkin }}</td>
                </tr>

                <tr>
                    <td>Tanggal Check Out</td>
                    <td>:</td>
                    <td>{{ $reservasi->tanggal_checkout }}</td>
                </tr>

                <td colspan="4">------------------------------------------------------</td>

            </table>
        </body>

        </html>
    </div>

    <br><br>
    <center><a class="btn btn-icons btn-warning" target="_blank" href="{{ route('pdfcetak', $reservasi->id) }}"><i class="fas fa-print"></i> Cetak Nota Reservasi </a></center>
@endsection
