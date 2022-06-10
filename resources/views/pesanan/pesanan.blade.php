@extends('layouts.main')
@section('title')
    Cetak Data Pesanan
@endsection
@section('content')
    <div class="container mt-3">
        <html>

        <head >
            <h1>
            <center><font face="Courier New" size="5">CATERING HOTEL QUEEN Z</font></center>
            </h1>
        </head>
        <body>
            <font face="Courier New" />

            <table align="center">

                <td colspan="4">------------------------------------------------------</td>

                <tr>
                    <td>ID Pesanan</td>
                    <td>:</td>
                    <td>{{ $pesanan->id }}</td>
                </tr>

                <tr>
                    <td>No Kamar</td>
                    <td>:</td>
                    <td>{{ $pesanan->kamar->id }}</td>
                </tr>

                <td colspan="4">------------------------------------------------------</td>

                <tr>
                    <td>Menu Makanan</td>
                    <td>:</td>
                    <td>{{ $pesanan->makanan->nama_makanan }}</td>
                </tr>

                <tr>
                    <td>Menu Minuman</td>
                    <td>:</td>
                    <td>{{ $pesanan->minuman->nama_minuman }}</td>
                </tr>

                <tr>
                    <td>Jumlah Makanan</td>
                    <td>:</td>
                    <td>{{$pesanan->jumlah_makanan}}</td>
                </tr>

                <tr>
                    <td>Jumlah Minuman</td>
                    <td>:</td>
                    <td>{{$pesanan->jumlah_minuman}}</td>
                </tr>

                <tr>
                    <td>Harga Makanan</td>
                    <td>:</td>
                    <td style="padding-left: 180px">Rp. {{number_format($pesanan->makanan->harga , 0, ",", ".")}} * {{$pesanan->jumlah_makanan}}</td>
                </tr>

                <tr>
                    <td>Harga Minuman</td>
                    <td>:</td>
                    <td style="padding-left: 180px">Rp. {{number_format($pesanan->minuman->harga , 0, ",", ".")}}  * {{$pesanan->jumlah_minuman}}</td>
                </tr>

                <td colspan="4">------------------------------------------------------ (+)</td>

                <tr>
                    <td>Total Harga</td>
                    <td>:</td>
                    <td style="padding-left: 180px">Rp. {{number_format($pesanan->total_harga, 0, ",", ".")}}</td>
                </tr>

                <td colspan="4">------------------------------------------------------</td>

            </table>
        </body>

        </html>
    </div>

    <br><br>
    <center><a class="btn btn-icons btn-warning" target="_blank" href="{{ route('cetakpdf', $pesanan->id) }}"><i class="fas fa-print"></i> Cetak Nota Pesanan </a></center>
@endsection
