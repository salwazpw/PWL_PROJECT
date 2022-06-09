<!DOCTYPE html>
<html>

<head>
    <title>Laporan Transaksi</title>
</head>

<body>
<div class="container mt-3">
        <h3 class="text-center mb-5" align = "center" >QUEEN Z</h3>

        <b>ID Transaksi         :</b> {{$transaksi->id}}<br>
        <b>ID Reservasi         : </b>{{$transaksi->reservasi->id}}<br>

        <h5>ID Pengunjung       :{{$transaksi->pengunjung->id }}</h1>
        <h5>No. Kamar           :{{$transaksi->kamar->id }}</h5>
        <h5>Harga Kamar         :{{$transaksi->kamar->harga }}</h5>
        <h5>Jumlah Hari         :{{$transaksi->reservasi->jumlah}}</h5>
        <h5>Tanggal Transaksi   :{{$transaksi->tanggal_transaksi}}</h5>
        <h5>Biaya Admin         :{{$transaksi->biaya_admin}}</h5>
        <h5>Total Harga         :{{$transaksi->total_harga}}</h5>
        
</body>

</html>