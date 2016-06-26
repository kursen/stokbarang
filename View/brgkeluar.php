<?php
require("../Model/session.php");
include('layout/header.php');
?>
<body>
<?php include('layout/navigation.php'); ?>
	<br/>
   <div class="alert alert-info">
  <h3><i class="glyphicon glyphicon-resize-full"></i> Barang Keluar
  <a href="pengeluaran.php" class="btn btn-default pull-right" 
  data-toggle="tooltip" data-placement="left" title="Tambah">
	<i class="glyphicon glyphicon-plus"></i>
  </a>
  </h3>
  
    </div>
	<!--end of jumbotron-->
	<?php
	require("../Model/config.php");
	$queryselect = mysqli_query($connection,"select masterbarang.nama_barang,penjualan_barang.costumer,penjualan_barang.no_transaksipenjualan, 
penjualan_barang.kode_barang,(penjualan_barang.harga_penjualan * penjualan_barang.jumlah) as totalharga,penjualan_barang.jumlah,penjualan_barang.harga_penjualan,
penjualan_barang.tanggal_penjualan from penjualan_barang inner join masterbarang on penjualan_barang.kode_barang = masterbarang.kode_barang");
	?>
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
			<th>Costumer</th>
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
		<?php print $data['jumlah']." x ".$data['harga_penjualan']; ?>
		</td>
		<td>
		<?php print $data['totalharga']; ?>
		</td>
		<td>
		<?php print $data['tanggal_penjualan']; ?>
		</td>
		<td>
		<?php print $data['costumer']; ?>
		</td>
		<td>
		<a class="btn btn-primary" href="../View/pengeluaran.php?id=<?php print $data['no_transaksipenjualan']; ?>">Edit</a> <a class="btn btn-danger" href="../Controller/HapusBrgKlr.php?id=<?php print $data['no_transaksipenjualan']; ?>" onclick="return confirm(Yakin?)">Hapus</a>
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