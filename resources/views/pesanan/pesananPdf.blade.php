<!DOCTYPE html>
<html>
    <head>
        <title>Nota Pesanan ID: {{ $pesanan->id}}</title>
    </head>

    <body>

        <center><h1><font size="5">CATERING HOTEL QUEEN Z</font></h1>
        <p>Jl. Raden Panji Suroso No.7, Purwodadi, Kec. Blimbing</p>
        <p>Kota Malang, Jawa Timur 65126</p>
        <p>Telp: (0341) - 3300000</p></center>

        <br><br>
        
        <font face="Courier New">

        <table style="align-content:center;">

            <td colspan="4">----------------------------------------------------------------------------------------------------------</td>

            <tr>
                <td>ID Pesanan</td>
                <td style="width: 20px">:</td>
                <td>{{ $pesanan->id }}</td>
            </tr>

            <tr>
                <td>No Kamar</td>
                <td>:</td>
                <td>{{ $pesanan->kamar->id }}</td>
            </tr>

            <td colspan="4">----------------------------------------------------------------------------------------------------------</td>

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
                <td style="padding-left: 178px">Rp. {{number_format($pesanan->makanan->harga , 0, ",", ".")}}* {{$pesanan->jumlah_makanan}}</td>
            </tr>

            <tr>
                <td>Harga Minuman</td>
                <td>:</td>
                <td style="padding-left: 178px">Rp. {{number_format($pesanan->minuman->harga , 0, ",", ".")}}* {{$pesanan->jumlah_minuman}}</td>
            </tr>

            <td colspan="4">--------------------------------------------------------------------------------------------------------- (+)</td>

            <tr>
                <td>Total Harga</td>
                <td>:</td>
                <td style="padding-left: 178px">Rp. {{number_format($pesanan->total_harga, 0, ",", ".")}}</td>
            </tr>

            <td colspan="4">==============================================================</td>
        </table>
        <br><br><br><br>
        <center>
            <p>********** I Hope You Will Find Everything in Your Taste **********</p>
            <p>One order from you mean one thousand happiness for us. Thank you.</p>
            <p>Email: Queenz@gmail.com</p>
        </center>
    </body>

    </html>
</div>
