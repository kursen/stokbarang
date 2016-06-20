<?php
require("../Model/session.php");
require("layout/header.php");
?>
<body>
<?php include('layout/navigation.php'); ?>
	<br/>
   <div class="alert alert-info">
  <h2><i class="glyphicon glyphicon-shopping-cart"></i>Tambah Data Barang
  </h2>
  
    </div>
	<!--end of jumbotron-->
	<!--php code-->
	<?php
	require("../Model/config.php");
	$id=0;
	$url= $_SERVER['QUERY_STRING'];
	if($url!=''){
		$id=substr($url,3);
	}
	$show = mysqli_query($connection,"select * from masterbarang where Id=$id");
	$lists = mysqli_fetch_assoc($show);
	?>
	<!--end code-->
	<div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <form class="form-horizontal" action="../Controller/savemstbrg.php" method="post">
  <div class="form-group">
  <input type="hidden" name="Id" value="<?php echo $id; ?>">
    <label for="" class="col-sm-2 control-label">Nama Barang</label>
    <div class="col-sm-3">
       <input type="text" class="form-control" name="nama_barang" value="<?php print $lists['nama_barang'] ;?>" required>
    </div>
  </div>
   <div class="form-group">
		  <label class="col-sm-2 control-label">Kode Barang</label>
		  <div class="col-sm-3">
		  <input type="text" maxlength="5" value="<?php print $lists['kode_barang'];?>" name="kode_barang" />
		  </div>
		  </div>
  <div class="form-group">
    <label for="" class="col-sm-2 control-label">Satuan</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" name="satuan" value="<?php print $lists['satuan'] ;?>" required>
    </div>
  </div>
 
   <div class="form-group">
    <label for="" class="col-sm-2 control-label" >Keterangan</label>
    <div class="col-sm-3">
      <textarea class="form-control" name="keterangan"><?php print htmlspecialchars($lists['keterangan']) ;?></textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-3">
      <button type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="left" title="Simpan">Simpan</button>
	  <a href="mstbrg.php" class="btn btn-warning" data-toggle="tooltip" data-placement="right" title="Batal">Batal</a>
    </div>
  </div>
</form>
      </div>

      <hr>

      <footer>
        <p> PT.Win Acc@Company 2014</p>
      </footer>
    </div>
    
</body>
</html>