<?php
require("../Model/session.php");
include('layout/header.php');
?>
<body>
<?php include('layout/navigation.php'); ?>
	<br/>
   <div class="alert alert-info">
  <h2><i class="glyphicon glyphicon-user"></i>  Tambah Pengguna
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
	$show = mysqli_query($connection,"select * from user_login where Id=$id");
	$lists = mysqli_fetch_assoc($show);
	?>
	
	<div class="container">
      <!-- Example row of columns -->

   <form class="form-horizontal" role="form" action="adduser.php" method="post" id="addform">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">username</label>
    <div class="col-sm-5">
	<input type="hidden" name='Id' value="<?php print $lists['Id']; ?>" />
      <input type="text" name="username" class="form-control" id="username" value="<?php print $lists['username']; ?>" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-5">
      <input type="password" name="password" class="form-control" id="password" required>
    </div>
  </div>
 <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Confirm</label>
    <div class="col-sm-5">
      <input type="password" name="conform" class="form-control" id="conform" placeholder="Confirm Password" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Status</label>
    <div class="col-sm-5">
	<input type="hidden" id="stat" value="<?php print $lists['status']; ?>" />
      <select name="status" id='status' class="form-control">
		<option value=""></option>
		<option value="administrator">Administrator</option>
		<option value="karyawan">Karyawan</option>
	  </select>
    </div>
  </div>
  <div class="form-group">
    <div class="modal-footer">
	  <button type="button" class="btn btn-primary btn-submit">Simpan</button>
        <a href="User.php" type="button" class="btn btn-warning">Batal</a>
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
			$('#status').val($('#stat').val());
	
	$('.btn-submit').click(function(){
		var pass=$('#password').val();
		var conf =$('#conform').val();
		if(conf==pass){
			$('#addform').submit();
		}else{
			alert('Password Not Valid');
		}
	});
});


	</script>
</body>
</html>