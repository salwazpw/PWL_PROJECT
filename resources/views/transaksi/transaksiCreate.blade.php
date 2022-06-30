<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'pwl_project');
?>

@extends('layouts.main')
@section('title')
    Tambah Data Transaksi
@endsection
@section('content')
<div class="mt-5 col-md-8 mx-auto">
        <div class="card ">
            <h5 class="card-header bg-primary text-white">Tambah Data Transaksi</h5>
            <div class="card-body">
              @if ($errors->any())
              <div class="alert alert-danger">
                <strong>Whoops!</strong>There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
              </div>
            </div>
        </div>
              @endif
              <form method="POST" enctype="multipart/form-data" action="{{route('transaksi.store')}}">
                @csrf
                <div class="col">
                <div class="col-md-12 col-xs-12">
                    <div class="form-group">
                      <label for="exampleInputEmail1">ID Reservasi</label>
                      <select class="form-control" id="reservasi_id" name="Reservasi" onchange='changeValue(this.value)'>
                        <option value="">--Pilih ID Reservasi--</option>
                        <?php
                        $query = mysqli_query($koneksi, 'select * from reservasis');
                        $jsArray = "var res = new Array();\n";
                        while ($row = mysqli_fetch_array($query)) {
                            echo '<option name="id"  value="' . $row['id'] . '">' . $row['id'] . '</option>';
                            $jsArray .= "res['" . $row['id'] . "'] = {kamar_id:'" . addslashes($row['kamar_id']) . "',pengunjung_id:'".addslashes($row['pengunjung_id'])."'};\n";
                        }
                        ?>
                      </select>
                  </div>
                  </div>
                  <div class="col-md-12 col-xs-12">
                    <div class="form-group">
                      <label for="exampleInputEmail1">No. Kamar</label>
                      <input type="number" class="form-control" id="kamar_id" name="kamar_id" ></input>
                  </div>
                  </div>
                  <div class="col-md-12 col-xs-12">
                    <div class="form-group">
                      <label for="exampleInputEmail1">ID Pengunjung</label>
                      <input type="number" class="form-control" id="pengunjung_id" name="pengunjung_id" ></input>
                  </div>
                  </div>
                  <div class="col-md-12 col-xs-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Harga Kamar</label>
                        <select type="number" class="form-control" id="harga_kamar" onkeyup="sum();">
                          @foreach ($kamar as $data)
                              <option value="{{ $data->harga}}">{{ $data->id }} - {{ $data->harga }}</option>
                          @endforeach
                      </select>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Jumlah Hari</label>
                        <select type="number" class="form-control" id="jumlah_hari" onkeyup="sum();">
                          @foreach ($reservasi as $data)
                              <option value="{{ $data->jumlah}}">{{ $data->id }} - {{ $data->jumlah }}</option>
                          @endforeach
                      </select>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12">
                      <div class="form-group">
                          <label for="exampleInputEmail1">Tanggal Transaksi</label>
                            <input type="date" class="form-control" aria-describedby="emailHelp" placeholder="Tanggal Transaksi" onkeyup="sum();" id="tanggal_transaksi" name="tanggal_transaksi" required>
                      </div>
                </div>
                <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Biaya Admin</label>
                            <input type="number" class="form-control" aria-describedby="emailHelp" placeholder="Biaya Admin" onkeyup="sum();" id="biaya_admin" name="biaya_admin" required>
                        </div>
                </div>    
                    <div class="col-md-12 col-xs-12">
                      <div class="form-group">
                          <label for="exampleInputEmail1">Total Harga</label>
                          <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Total Harga" onkeyup="sum();" id="total_harga" name="total_harga" required readonly>
                        </div>
                  </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-secondary" href="{{ route('pesanan.index')}}">Cancel</a>
            </form>
            </div>
          </div>
        </div>
    </div>

      <script>
      function sum(){
        var txFirstNumberValue = document.getElementById('harga_kamar').value;
        var txSecondNumberValue = document.getElementById('biaya_admin').value;
        var txThirdNumberValue = document.getElementById('jumlah_hari').value;
        var result = (parseInt(txFirstNumberValue) * parseInt(txThirdNumberValue)) + parseInt(txSecondNumberValue);
        if(!isNaN(result)){
          document.getElementById('total_harga').value = result;
        }
      }
    </script>
@endsection

<script type="text/javascript">
  <?php echo $jsArray; ?>

  function changeValue(id) {
      document.getElementById('kamar_id').value = res[id].kamar_id;
      document.getElementById('pengunjung_id').value = res[id].pengunjung_id;
  };
</script>