<?php
require("../Model/session.php");
require("layout/header.php");
?>

<body>
     <?php include('layout/navigation.php'); ?>
    <!--end of nav-->
	<?php
	require("../Model/config.php");
	//$query = "";
	//$queryselect = mysql_query($query) or die("gagal mengambil data");
	$querycountmasterbrg = mysqli_query($connection,'select count(Id) as totalbarang from masterbarang');
	$countmasterbrg = mysqli_fetch_assoc($querycountmasterbrg);
	$querycountpenerimaan = mysqli_query($connection,"select count(no_transaksi)as totalpenerimaan from penerimaan_barang");
	$countpenerimaan = mysqli_fetch_assoc($querycountpenerimaan);
	$querycountpenjualan = mysqli_query($connection,"select count(no_transaksipenjualan) as totalpenjualan from penjualan_barang");
	$countpenjualan = mysqli_fetch_assoc($querycountpenjualan);
	$querycountretur = mysqli_query($connection,"select count(no_transaksi) as totalretur from retur_barang");
	$countretur = mysqli_fetch_assoc($querycountretur);
	?>
   <div class="jumbotron">
      <div class="container">
        <h1>Hello, <?php print $_SESSION['username'];?></h1>
        <p>Welcome To DashBoard Sistem Informasi Pengadaan Barang PT </p>
      </div>
    </div>
	<!--end of jumbotron-->
	<div class="container">
      <!-- Example row of columns -->
     <div class="row">
	 <div class="col-lg-3 col-md-6">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="glyphicon glyphicon-align-left"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php print $countmasterbrg['totalbarang']; ?></div>
                                    <div>Master Barang</div>
                                </div>
                            </div>
                        </div>
                        <a href="mstbrg.php">
                            <div class="panel-footer">
                                <span class="pull-left">Lihat</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="glyphicon glyphicon-random"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php print $countpenerimaan['totalpenerimaan'];?></div>
                                    <div>Barang Masuk</div>
                                </div>
                            </div>
                        </div>
                        <a href="brgmasuk.php">
                            <div class="panel-footer">
                                <span class="pull-left">Lihat</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="glyphicon glyphicon-arrow-left"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php print $countpenjualan['totalpenjualan']; ?></div>
                                    <div>Barang Keluar</div>
                                </div>
                            </div>
                        </div>
                        <a href="brgkeluar.php">
                            <div class="panel-footer">
                                <span class="pull-left">Lihat</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="glyphicon glyphicon-resize-full"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php print $countretur['totalretur'];  ?></div>
                                    <div>Barang retur</div>
                                </div>
                            </div>
                        </div>
                        <a href="barangretur.php">
                            <div class="panel-footer">
                                <span class="pull-left">Lihat</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

      <hr>
	  
	  <?php
		$querysaldo = mysqli_query($connection,"select masterbarang.kode_barang,masterbarang.nama_barang,ifnull(penerimaan_barang.jumlah,0) as jumlahmasuk,ifnull(penjualan_barang.jumlah,0) as jumlahkeluar,
ifnull(retur_barang.jumlah_retur,0) as jumlahretur,
ifnull(ifnull(penerimaan_barang.jumlah-penjualan_barang.jumlah,0)+retur_barang.jumlah_retur,0) as saldo from masterbarang left join 
penerimaan_barang on 
masterbarang.kode_barang = penerimaan_barang.kode_barang 
left join penjualan_barang on masterbarang.kode_barang = penjualan_barang.kode_barang 
left join retur_barang on masterbarang.kode_barang = retur_barang.kode_barang");
	  ?>
	  <div class="panel panel-success">
		<div class="panel-heading"> <h3 class="panel-title">DashBoard Barang</h3> </div>
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>
								Kode Barang
							</th>
							<th>
								Nama
							</th>
							<th>
								Jumlah Barang Masuk
							</th>
							<th>
								Jumlah Terjual
							</th>
							<th>
								Jumlah Barang Retur	
							</th>
							<th>
								Saldo
							</th>
						</tr>
					</thead>
					<tbody>
						<?php
							while($data = mysqli_fetch_array($querysaldo)){
								print "<tr>".
									"<td>".$data['kode_barang']."</td>".
									"<td>".$data['nama_barang']."</td>".
									"<td>".$data['jumlahmasuk']."</td>".
									"<td>".$data['jumlahkeluar']."</td>".
									"<td>".$data['jumlahretur']."</td>".
									"<td>".$data['saldo']."</td>"
								."</tr>";
							}
						?>
					</tbody>
				</table>
			</div>
	</div>
	  
      <footer>
        <p> PT.Win Acc@Company 2014</p>
      </footer>
    </div>
    
</body>
</html>