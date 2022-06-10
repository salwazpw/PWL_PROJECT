<!DOCTYPE html>
<html>
    <head>
        <title>Nota Reservasi ID: {{ $reservasi->id}}</title>
    </head>

    <body>

        <center><h1><font size="5">ROOM RESERVATION QUEEN Z HOTEL</font></h1>
        <p>Jl. Raden Panji Suroso No.7, Purwodadi, Kec. Blimbing</p>
        <p>Kota Malang, Jawa Timur 65126</p>
        <p>Telp: (0341) - 3300000</p></center>

        <br><br>
        
        <font face="Courier New">

        <table style="align-content:center;">

            <td colspan="4">----------------------------------------------------------------------------------------------------------</td>

            <tr>
                <td>ID Reservasi</td>
                <td style="width: 20px">:</td>
                <td>{{ $reservasi->id }}</td>
            </tr>

            <tr>
                <td>Nama Pengunjung</td>
                <td>:</td>
                <td>{{ $reservasi->pengunjung->nama }}</td>
            </tr>

            <td colspan="4">----------------------------------------------------------------------------------------------------------</td>

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

            <td colspan="4">==============================================================</td>
        </table>

            <p style="padding-left: 379px">Tanggal Reservasi: {{ $reservasi->tanggal_booking }}</p>
        <br><br><br><br><br><br><br>

        <center>
            <p>********** Welcome To The Best Hotel of Choice Among Travelers **********</p>
            <p>Thank you.</p>
            <p>Email: Queenz@gmail.com</p>
        </center>
    </body>

    </html>
</div>
