<!DOCTYPE html>
<html>

<head>
    <title>Data Transaksi ID : {{$transaksi->id}}</title>
    <h1>
        <center><font face="Courier New" size="5">TRANSAKSI QUEEN Z HOTEL</font></center>
    </h1>
</head>

<body>
        <center><p>Jl. Raden Panji Suroso No.7, Purwodadi, Kec. Blimbing</p>
        <p>Kota Malang, Jawa Timur 65126</p>
        <p>Telp: (0341) - 3300000</p></center>

        <br>
<font face="Courier New">

            <table style="align-content:center;">

                <tr>
                    <td>Tanggal Transaksi</td>
                    <td>:</td>
                    <td>{{date('d F Y', strtotime($transaksi->tanggal_transaksi))}}</td>
                </tr>

                <td colspan="4">----------------------------------------------------------------------------------------------------------------</td>

                <tr>
                    <td>ID Transaksi</td>
                    <td style="width: 20px;">:</td>
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
                    <td>{{$transaksi->pengunjung->id }} - {{$transaksi->pengunjung->nama }}</td>
                </tr>

                <td colspan="4">----------------------------------------------------------------------------------------------------------------</td>
                <tr>
                    <td>Jumlah Hari</td>
                    <td>:</td>
                    <td>{{$transaksi->reservasi->jumlah}}</td>
                </tr>

                

                <tr>
                    <td>Harga Kamar</td>
                    <td>:</td>
                    <td style="padding-left: 300px; width: 150px;">Rp. {{number_format($transaksi->kamar->harga, 0, ",", ".")}} * {{$transaksi->reservasi->jumlah}}</td>
                </tr>

                <tr>
                    <td>Biaya Admin</td>
                    <td>:</td>
                    <td style="padding-left: 300px">Rp. {{number_format($transaksi->biaya_admin, 0, ",", ".")}}</td>
                </tr>

                <td colspan="4">------------------------------------------------------------------------------------------------------------ (+)</td>

                <tr>
                    <td>Total Harga</td>
                    <td>:</td>
                    <td style="padding-left: 300px">Rp. {{number_format($transaksi->total_harga, 0, ",", ".")}}</td>
                </tr>

                <td colspan="4">==================================================================</td>
            </table>
            <br><br><br>
        <center>
            <p>***Thank you so much for your loyalty and understanding towards our hotel***</p>
            <p>Email: Queenz@gmail.com</p>
        </center>
</body>

</html>