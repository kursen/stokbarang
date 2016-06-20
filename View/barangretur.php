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
  <h3><i class="glyphicon glyphicon-refresh"></i> Barang Retur
  <a href="tambahreturn.php" class="btn btn-default pull-right" 
  data-toggle="tooltip" data-placement="left" title="Tambah">
	<i class="glyphicon glyphicon-plus"></i>
  </a>
  </h3>
  
    </div>
	<!--end of jumbotron-->
	<!--php code-->
	<?php
	require("../Model/config.php");
	$queryselect = mysqli_query($connection,"select retur_barang.no_transaksi,
retur_barang.harga_satuan,
retur_barang.jumlah_retur,
nullif(retur_barang.keterangan,'kosong') as keterangan,
retur_barang.kode_barang,retur_barang.tanggal_penjualan,
masterbarang.nama_barang,nullif(retur_barang.jumlah_retur*retur_barang.harga_satuan,0)as total from retur_barang inner join masterbarang on retur_barang.kode_barang = masterbarang.kode_barang");
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
				Tanggal Penjualan
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
			<tr><td colspan="7"><center>Data Kosong</center></td></tr>
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
		<?php print $data['jumlah_retur']." x ".$data['harga_satuan']; ?>
		</td>
		<td>
		<?php print $data['total']; ?>
		</td>
		<td>
		<?php print $data['tanggal_penjualan']; ?>
		</td>
		<td>
		<?php print $data['keterangan']; ?>
		</td>
		<td>
		<a class="btn btn-primary" href="../View/tambahreturn.php?id=<?php print $data['no_transaksi']; ?>">Edit</a> <a class="btn btn-danger" href="../Controller/HapusBrgRetur.php?id=<?php print $data['no_transaksi']; ?>" onclick="return confirm('Yakin?')">Hapus</a>
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