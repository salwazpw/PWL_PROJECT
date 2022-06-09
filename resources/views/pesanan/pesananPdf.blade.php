<!DOCTYPE html>
<html>

<head>
    <title>LAPORAN DATA PESANAN {{ $pesanan->id}} {{ $pesanan->kamar->id}}</title>
</head>

<body>
    <center>
        <h2>DATA PESANAN</h2>
    </center>
    <br>
        <b>ID Pesanan   :</b> {{$pesanan->id}}<br>
        <b>No Kamar     : </b>{{$pesanan->kamar->id}}<br>

        <br><br><br>
        <h5>Menu Makanan    :{{$pesanan->makanan->nama_makanan }}</h1>
        <h5>Harga Makanan   :{{$pesanan->makanan->harga}}</h5>
        <h5>Jumlah Makanan  :{{$pesanan->minuman->nama_minuman }}</h5>
        <h5>Menu Minuman    :{{$pesanan->minuman->harga}}</h5>
        <h5>Harga Minuman   :{{$pesanan->total_harga}}</h5>
        <h5>Jumlah Minuman  :{{$pesanan->jumlah_minuman}}</h5>
        <h5>Total Harga     :{{$pesanan->total_harga}}</h5>
</body>

</html>
