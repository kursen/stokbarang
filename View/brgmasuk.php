<?php
require("../Model/session.php");
include('layout/header.php');
?>

<body>

     <?php
	 include('layout/navigation.php');
	 ?>
	<br/>
   <div class="alert alert-info">
  <h3><i class="glyphicon glyphicon-retweet"></i> Barang Masuk
  <a href="tambah.php" class="btn btn-default pull-right" 
  data-toggle="tooltip" data-placement="left" title="Tambah">
	<i class="glyphicon glyphicon-plus"></i>
  </a>
  </h3>
  
    </div>
	<!--end of jumbotron-->
	<!--php code-->
	<?php
	require("../Model/config.php");
	$queryselect = mysqli_query($connection,"select masterbarang.nama_barang,penerimaan_barang.no_transaksi, 
penerimaan_barang.kode_barang,(penerimaan_barang.harga_satuan * penerimaan_barang.jumlah) as totalharga,penerimaan_barang.jumlah,penerimaan_barang.harga_satuan,
penerimaan_barang.tanggal_penerimaan from penerimaan_barang inner join masterbarang on penerimaan_barang.kode_barang = masterbarang.kode_barang");
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
				Jumlah x Harga Satuan
			</th>
			<th>
				Total Harga
			</th>
			<th>
				Tanggal Masuk
			</th>
			<th>
			
			</th>
		</tr>
		</thead>
		<tbody>
		<?php
		if(mysqli_num_rows($queryselect)==0){
			?>
			<tr><td colspan="6"><center>Data Kosong</center></td></tr>
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
		<?php print $data['jumlah']." x ".$data['harga_satuan']; ?>
		</td>
		<td>
		<?php print $data['totalharga']; ?>
		</td>
		<td>
		<?php print $data['tanggal_penerimaan']; ?>
		</td>
		<td>
		<a class="btn btn-primary" href="../View/tambah.php?id=<?php print $data['no_transaksi']; ?>">Edit</a> <a class="btn btn-danger" href="../Controller/HapusBrgMsk.php?id=<?php print $data['no_transaksi']; ?>" onclick="return confirm('Yakin?')">Hapus</a>
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