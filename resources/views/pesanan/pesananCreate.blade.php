<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'pwl_project');
?>

@extends('layouts.main')
@section('title')
    Tambah Data Pesanan
@endsection
@section('content')
    <div class="mt-5 col-md-8 mx-auto">
        <div class="card ">
            <h5 class="card-header bg-primary text-white">Tambah Data Pesanan</h5>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong>There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
            </div>
        </div>
        @endif
        <form method="POST" enctype="multipart/form-data" action="{{ route('pesanan.store') }}">
            @csrf
            <div class="col">
                <div class="col-md-12 col-xs-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">No. Kamar</label>
                        <select class="form-control" id="kamar_id" name="Kamar">
                            @foreach ($kamar as $data)
                                <option value="{{ $data->id }}">{{ $data->id }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Menu Makanan</label>
                        <select type="number" class="form-control" id="makanan_id" name="Makanan" onchange='changeValue(this.value)'>
                            <option value="">--Pilih Menu Makanan--</option>
                            <?php
                            $query = mysqli_query($koneksi, 'select * from makanans');
                            $jsArray = "var hrg = new Array();\n";
                            while ($row = mysqli_fetch_array($query)) {
                                echo '<option name="id"  value="' . $row['id'] . '">' . $row['nama_makanan'] . '</option>';
                                $jsArray .= "hrg['" . $row['id'] . "'] = {harga:'" . addslashes($row['harga']) . "'};\n";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Harga Makanan</label>
                        <input type="number" class="form-control" id="harga" name="harga" onkeyup="sum();"></input>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Jumlah Makanan</label>
                        <input type="number" class="form-control" aria-describedby="emailHelp" placeholder="Jumlah Makanan"
                            onkeyup="sum();" id="jumlah_makanan" name="jumlah_makanan" required>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Menu Minuman</label>
                        <select class="form-control" id="minuman_id" onchange='changeVal(this.value)' name="Minuman">
                          <option value="">--Pilih Menu Makanan--</option>
                          <?php
                          $query1 = mysqli_query($koneksi, 'select * from minumen');
                          $jsArrays = "var harga = new Array();\n";
                          while ($rows = mysqli_fetch_array($query1)) {
                              echo '<option name="id"  value="' . $rows['id'] . '">' . $rows['nama_minuman'] . '</option>';
                              $jsArrays .= "harga['" . $rows['id'] . "'] = {harga:'" . addslashes($rows['harga']) . "'};\n";
                          }
                          ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Harga Minuman</label>
                        <input type="number" class="form-control" id="harga_minuman" name="harga_minuman" onkeyup="sum();"></input>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Jumlah Minuman</label>
                        <input type="number" class="form-control" aria-describedby="emailHelp" placeholder="Jumlah Minuman"
                            onkeyup="sum();" id="jumlah_minuman" name="jumlah_minuman" required>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Total Harga</label>
                        <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Total Harga"
                            onkeyup="sum();" id="total_harga" name="total_harga" required readonly>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-secondary" href="{{ route('pesanan.index') }}">Cancel</a>
        </form>
    </div>
    </div>
    </div>
    </div>

    <script>
        function sum() {
            var txFirstNumberValue = document.getElementById('jumlah_makanan').value;
            var txSecondNumberValue = document.getElementById('jumlah_minuman').value;
            var txThirdNumberValue = document.getElementById('harga').value;
            var txFourthNumberValue = document.getElementById('harga_minuman').value;
            var result = (parseInt(txFirstNumberValue) * parseInt(txThirdNumberValue)) + (parseInt(txSecondNumberValue) *
                parseInt(txFourthNumberValue));
            if (!isNaN(result)) {
                document.getElementById('total_harga').value = result;
            }
        }
    </script>
@endsection

    <script type="text/javascript">
        <?php echo $jsArray; ?>

        function changeValue(id) {
            document.getElementById('harga').value = hrg[id].harga;
        };

      <?php echo $jsArrays; ?>
        function changeVal(id){
          document.getElementById('harga_minuman').value = harga[id].harga;
        }
      </script>
