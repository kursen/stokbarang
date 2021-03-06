<?php
require("../Model/session.php");
include('layout/header.php');
include('layout/datetimepicker.php');
?>
<body>
<?php include('layout/navigation.php'); ?>
	<br/>
   <div class="alert alert-info">
  <h2><i class="glyphicon glyphicon-refresh"></i>  Barang Retur
  </h2>
  
    </div>
	<!--end of jumbotron-->
	<?php
	require("../Model/config.php");
	$id=0;
	$url= $_SERVER['QUERY_STRING'];
	if($url!=''){
		$id=substr($url,3);
	}
	$show = mysqli_query($connection,"select * from retur_barang where no_transaksi=$id");
	$lists = mysqli_fetch_assoc($show);
	$query = mysqli_query($connection,"select penjualan_barang.kode_barang,masterbarang.nama_barang from masterbarang inner join penjualan_barang on masterbarang.kode_barang = penjualan_barang.kode_barang");
	?>
	
	<div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <form class="form-horizontal" action="../Controller/svretur.php" method="post">
  <div class="form-group">
  <input type="hidden" name="no_transaksi" value="<?php echo $id; ?>">
    <label for="" class="col-sm-2 control-label">Kode Barang</label>
	<input type="hidden" id="kdbrg" value="<?php print $lists['kode_barang'] ?>"/>
    <div class="col-sm-3">
      <select class="form-control" id="kodebrg" name="kode_barang" required>
	 <option value=""></option>
	  <?php
	  while($data =mysqli_fetch_array($query)){
		?>
		<option value="<?php print $data['kode_barang']; ?>"><?php print $data['nama_barang']; ?></option>
		<?php
	  }
	  ?>
	  </select>
    </div>
  </div>
  <div class="form-group">
    <label for="" class="col-sm-2 control-label">Harga Satuan</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" name="harga_satuan" value="<?php print $lists['harga_satuan']; ?>" required>
    </div>
  </div>
  
   <div class="form-group">
    <label for="" class="col-sm-2 control-label">Jumlah</label>
    <div class="col-sm-1">
      <input type="text" class="form-control" name="jumlah" value="<?php print $lists['jumlah_retur']; ?>" required>
    </div>
  </div>
  
  <div class="form-group">
    <label for="" class="col-sm-2 control-label">Tanggal Penjualan</label>
    <div class="col-sm-3">
	 <div class="input-group">
	 <div class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></div>
      <input type="text" class="form-control" id="dtpicker" name="tanggal_penjualan" value="<?php print $lists['tanggal_penjualan']; ?>" required>
	</div>
	</div>
  </div>
  
  <div class="form-group">
    <label for="" class="col-sm-2 control-label">Penerima</label>
    <div class="col-sm-4">
      <input class="form-control" type='text' name='penerima' value='<?php print $lists['penerima']; ?>' />
	</div>
  </div>
  
  <div class="form-group">
    <label for="" class="col-sm-2 control-label">Pelanggan</label>
    <div class="col-sm-4">
      <input class="form-control" type='text' name='pelanggan' value='<?php print $lists['pelanggan']; ?>' />
	</div>
  </div>
  
  <div class="form-group">
    <label for="" class="col-sm-2 control-label">Keterangan</label>
    <div class="col-sm-4">
      <textarea name="keterangan" class="form-control"><?php print $lists['keterangan']; ?></textarea>
	</div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-3">
      <button type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="left" title="Simpan">Simpan</button>
	  <a href="barangretur.php" class="btn btn-warning" data-toggle="tooltip" data-placement="right" title="Batal">Batal</a>
    </div>
  </div>
</form>
      </div>

      <hr>
 <footer>
        <p> PT.Win Acc@Company 2014</p>
      </footer>
    </div>
    <script type='text/javascript'>
		$(document).ready(function(){
			$('#kodebrg').val($('#kdbrg').val());
		});
	</script>
</body>
</html>