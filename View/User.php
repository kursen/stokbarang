<?php
require("../Model/session.php");
require('layout/header.php');
?>
<body>
	<?php
	require('layout/navigation.php');
	?>
	<br/>
	 <div class="alert alert-info">
  <h3><i class="glyphicon glyphicon-user"></i> Pengaturan Pengguna
  
  </a>
  </h3>
  
    </div>
	
	<?php
	require("../Model/config.php");
	$queryselect = mysqli_query($connection,"select * from user_login" );
	?>
	<!--end code-->
	<div class="container">
      <!-- Example row of columns -->
      <div class="row">
	  <a href="tambahuser.php" class="btn btn-default add-user" data-toggle="tooltip" data-placement="right" title="Tambah User"><i class="glyphicon glyphicon-plus"></i></a>
	  <p/>
        <table class="table table-bordered">
		<thead>
		<tr>
			<th>
				UserName
			</th>
			<th>
				Password
			</th>
			<th>
				Status
			</th>
			<th>
			
			</th>
		</tr>
		</thead>
		<tbody>
		<?php
		if(mysqli_num_rows($queryselect)==0){
			?>
			<tr><td colspan="4"><center>Data Kosong</center></td></tr>
			<?php
		}else{
			while($data=mysqli_fetch_array($queryselect)){
		?>
		<tr>
		<td>
		<?php print $data['username']; ?>
		</td>
		<td>
		<?php print md5($data['password']); ?>
		</td>
		<td>
		<?php print ($data['status']); ?>
		</td>
		<td>
		<a class="btn btn-primary" href="tambahuser.php?id=<?php print $data['0']; ?>">Edit</a>
		 <a class="btn btn-danger" href="deluser?id=<?php print $data[0]; ?>" onclick="return confirm('Yakin?')">Hapus</a>
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
    <!--login admin-->
<div class="modal fade" id="add-user" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Tambah User</h4>
      </div>
      <div class="modal-body">

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

	<!--akhir-->
</body>
</html>