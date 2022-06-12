@extends('layouts.main')
@section('title')
    Print Data Transaksi
@endsection
@section('content')
    <div class="container mt-3">
        <html>

        <head >
            <h1>
            <center><font face="Courier New" size="5">TRANSAKSI HOTEL QUEEN Z</font></center>
            </h1>
        </head>
        <body>
            <font face="Courier New" />

            <table align="center">

                <td colspan="4">------------------------------------------------------</td>

                <tr>
                    <td>ID Transaksi</td>
                    <td>:</td>
                    <td>{{$transaksi->id}}</td>
                </tr>

                <tr>
                    <td>ID Reservasi</td>
                    <td>:</td>
                    <td>{{$transaksi->reservasi->id}}</td>
                </tr>

                <tr>
                    <td>No. Kamar</td>
                    <td>:</td>
                    <td>{{$transaksi->kamar->id }}</td>
                </tr>

                <tr>
                    <td>ID Pengunjung</td>
                    <td>:</td>
                    <td>{{$transaksi->pengunjung->id }}</td>
                </tr>

                <td colspan="4">------------------------------------------------------</td>

                <tr>
                    <td>Jumlah Hari</td>
                    <td>:</td>
                    <td>{{$transaksi->reservasi->jumlah}}</td>
                </tr>

                <tr>
                    <td>Tanggal Transaksi</td>
                    <td>:</td>
                    <td>{{date('d F Y', strtotime($transaksi->tanggal_transaksi))}}</td>
                </tr>

                <tr>
                    <td>Harga Kamar</td>
                    <td>:</td>
                    <td style="padding-left: 180px">Rp. {{number_format($transaksi->kamar->harga, 0, ",", ".")}} * {{$transaksi->reservasi->jumlah}}</td>
                </tr>

                <tr>
                    <td>Biaya Admin</td>
                    <td>:</td>
                    <td style="padding-left: 180px">Rp. {{number_format($transaksi->biaya_admin, 0, ",", ".")}}</td>
                </tr>

                <td colspan="4">------------------------------------------------------ (+)</td>

                <tr>
                    <td>Total Harga</td>
                    <td>:</td>
                    <td style="padding-left: 180px">Rp. {{number_format($transaksi->total_harga, 0, ",", ".")}}</td>
                </tr>

                <td colspan="4">------------------------------------------------------</td>

            </table>
        </body>

        </html>
    </div>

    <br><br>
    <center><a class="btn btn-icons btn-warning" target="_blank" href="{{ route('cetak_pdf', $transaksi->id) }}"><i class="fas fa-print"></i> Cetak Nota Transaksi </a></center>
@endsection
