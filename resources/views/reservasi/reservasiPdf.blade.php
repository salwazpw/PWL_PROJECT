<!DOCTYPE html>
<html>

<head>
    <title>LAPORAN DATA RESERVASI {{ $reservasi->id}} {{ $reservasi->pengunjung->id}}</title>
</head>

<body>
    <center>
        <h2>DATA PESANAN</h2>
    </center>
    <br>
        <b>ID Reservasi   :</b> {{$reservasi->id}}<br>
        <b>ID Pengunjung     : </b>{{$reservasi->pengunjung->id}}<br>

        <br><br><br>
        <h5>No Kamar    :{{$reservasi->kamar->id }}</h1>
        <h5>Tanggal Booking :{{$reservasi->tanggal_booking}}</h5>
        <h5>Tanggal Check In  :{{$reservasi->tanggal_checkin}}</h5>
        <h5>Tanggal Check Out :{{$reservasi->tanggal_checkin}}</h5>
</body>

</html>