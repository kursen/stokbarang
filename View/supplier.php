<?php
require("../Model/session.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Master Barang</title>
<!--bootstrap css-->
<link rel="stylesheet" type="text/css" href="../Content/bootstrap/css/bootstrap.min.css" />
<!--js = javascript-->
<script src="../Scripts/jquery/jquery-min.js" type="text/javascript"></script>
<script src="../Content/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
});
</script>
</head>
<body>

      <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">ERP Pengadaan Barang</a>
        </div>
         <div id="navbar" class="navbar-collapse collapse">
		 <ul class="nav navbar-nav">
            <li class="active"><a href="Index.php">Dashboard</a></li>
			 <li><a href="kontak.php">Kontak</a></li>
            <li class="dropdown">
			<a href="#" data-toggle="dropdown">Barang<span class="caret"></span></a>
			<ul class="dropdown-menu">
			<li> <a href="brgmasuk.php">Barang Masuk</a></li>
			<li> <a href="brgkeluar.php">Barang Keluar</a></li>
			<li><a href="mstbrg.php">Master Barang</a></li>
			</ul>
			</li>
            <li><a href="../User/index.php"><i class="glyphicon glyphicon-user"></i> User Management</a>
			   </li>
			<li><a href="../logout.php" title="LogOut" data-toggle="tooltip" data-placement="bottom"><i class="glyphicon glyphicon-off"></i></a></a></li>
			
          </ul>
        </div><!--/.navbar-collapse -->
		
      </div>
    </nav>
    <!--end of nav-->
	<br/>
   <div class="alert alert-info">
  <h3><i class="glyphicon glyphicon-trash"></i>Data Supplier
  
  </h3>
    </div>
	<?php
	require("../Model/config.php");
	$id=0;
	$url= $_SERVER['QUERY_STRING'];
	if($url!=''){
		$id=substr($url,3);
	}
	$show = mysql_query("select * from supplier where kd_supplier=$id");
	$lists = mysql_fetch_assoc($show);
	?>
	<form class="form-horizontal" action="../Controller/svsupplier.php" method="post">
  <div class="form-group">
  <input type="hidden" name="id" value="<?php echo $id; ?>">
    <label for="" class="col-sm-2 control-label">Nama Supplier</label>
    <div class="col-sm-2">
       <input type="text" class="form-control" name="nama" value="<?php print $lists['nama'] ;?>" required>
    </div>
  </div>
   <div class="form-group">
    <label for="" class="col-sm-2 control-label" >Alamat</label>
    <div class="col-sm-2">
      <textarea class="form-control" name="alamat"><?php print htmlspecialchars($lists['alamat']) ;?></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="" class="col-sm-2 control-label">No Telp./Hp</label>
    <div class="col-sm-2">
      <input type="text" class="form-control" name="notelp" value="<?php print $lists['notelp'] ;?>" required>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-3">
      <button type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="left" title="Simpan">Simpan</button>
	  <a href="mstbrg.php" class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Cancel">Cancel</a>
    </div>
  </div>
</form>
	<!--end of jumbotron-->
	<!--php code-->
	<?php
	$queryselect = mysql_query("select * from supplier" ) or DIE("Gagal "+mysql_error());
	?>
	<!--end code-->
	<div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <table class="table table-bordered">
		<thead>
		<tr>
		<th>
		Kode
		</th>
			<th>
				Nama 
			</th>
			<th>
				Alamat
			</th>
			<th>
				No Telp./Hp
			</th>
			<th>
			</th>
		</tr>
		</thead>
		<tbody>
		<?php
		if(mysql_num_rows($queryselect)==0){
			?>
			<tr><td colspan="5"><center>Data Kosong</center></td></tr>
			<?php
		}else{
			while($data=mysql_fetch_array($queryselect)){
		?>
		<tr>
		<td>
		<?php print $data[0]; ?>
		</td>
		<td>
		<?php print $data[1]; ?>
		</td>
		<td>
		<?php print $data[2]; ?>
		</td>
		<td>
		<?php print $data[3]; ?>
		</td>
		<td>
		<a class="btn btn-primary" href="supplier.php?id=<?php print $data[0]; ?>">Edit</a> <a class="btn btn-danger" href="../Controller/delsupplier.php?id='<?php print $data[0]; ?>'" onclick="return confirm(\'Yakin?\')">Hapus</a>
		</td>
		
		</tr>
		<?php
		}
		}
		?>
		</tbody>
		</table>
      </div>

      <hr>

     <footer>
        <p> PT.Win Acc@Company 2014</p>
      </footer>
    </div>
    
</body>
</html>