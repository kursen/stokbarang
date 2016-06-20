<?php
require("../Model/session.php");
require("layout/header.php");
?>
<body>
<?php include('layout/navigation.php'); ?>
	<br/>
   <div class="alert alert-info">
  <h3><i class="glyphicon glyphicon-list-alt"></i> Master Barang
  <a href="tambahjenis.php" class="btn btn-default pull-right" 
  data-toggle="tooltip" data-placement="left" title="Tambah">
	<i class="glyphicon glyphicon-plus"></i>
  </a>
  </h3>
  
    </div>
	<!--end of jumbotron-->
	<!--php code-->
	<?php
	require("../Model/config.php");
	$queryselect = mysqli_query($connection,"select * from masterbarang" );
	?>
	<!--end code-->
	<div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <table class="table table-bordered">
		<thead>
		<tr>
			<th>
				Nama Barang
			</th>
			<th>
				Kode
			</th>
			<th>
				Satuan
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
		if(mysqli_num_rows($queryselect)==0){
			?>
			<tr><td colspan="5"><center>Data Kosong</center></td></tr>
			<?php
		}else{
			while($data=mysqli_fetch_array($queryselect)){
		?>
		<tr>
		<td>
		<?php print $data['nama_barang']; ?>
		</td>
		<td>
		<?php print $data['kode_barang']; ?>
		</td>
		<td>
		<?php print $data['satuan']; ?>
		</td>
		<td>
		<?php print $data['keterangan']; ?>
		</td>
		<td>
		<a class="btn btn-primary" href="../View/tambahjenis.php?id=<?php print $data[0]; ?>">Edit</a> <a class="btn btn-danger" href="../Controller/HapusMstBrg.php?id='<?php print $data[0]; ?>'" onclick="return confirm('Yakin?')">Hapus</a>
		</td>
		
		</tr>
		<?php
		}
		}
		?>
		</tbody>
		</table>
      </div>

    <footer>
        <p> PT.Win Acc@Company 2014</p>
      </footer>
    </div>
    
</body>
</html>