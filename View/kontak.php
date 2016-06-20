<?php
require("../Model/session.php");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Kontak</title>
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
  <h3><i class="glyphicon glyphicon-list-alt"></i>Data Pengirim Kontak
  </h3>
  
    </div>
	<!--end of jumbotron-->
	<?php
	require("../Model/config.php");
	$queryselect = mysql_query("select * from kontak" ) or DIE("Gagal "+mysql_error());
	?>
	<div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <table class="table table-bordered">
		<thead>
		<tr>
			<th>
				Nama Pengirim
			</th>
			<th>
				Nama Perusahaan
			</th>
			<th>
				Alamat 
			</th>
			<th>
				No Telp./Hp
			</th>
			<th>
				Email
			</th>
			<th>
				Keterangan
			</th>
			<th>
			
			</th>
		</tr>
		</thead>
		<tbody>
		<?php
		if(mysql_num_rows($queryselect)==0){
			?>
			<tr><td colspan="7"><center>Data Kosong</center></td></tr>
			<?php
		}else{
			while($data=mysql_fetch_array($queryselect)){
		?>
		<tr>
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
		<?php print $data[4]; ?>
		</td>
		<td>
		<?php print $data[5]; ?>
		</td>
		<td>
		<?php print $data[6]; ?>
		</td>
		<td>
		<a class="btn btn-danger" href="../Controller/delkontak.php?id=<?php print $data[0]; ?>" onclick="return confirm(\'Yakin?\')">Hapus</a>
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