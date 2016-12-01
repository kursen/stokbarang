<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
         
        </div>
        <div id="navbar" class="navbar-collapse collapse">
		 <ul class="nav navbar-nav">
            <li ><a href="Index.php">Dashboard</a></li>
			<li class="dropdown">
				<a href="#" data-toggle="dropdown">Barang Masuk<span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li> <a href="brgmasuk.php">Data Barang Masuk</a></li>
					<li> <a href="tambah.php">Tambah</a></li>
				</ul>
			</li>
			<li class="dropdown">
				<a href="#" data-toggle="dropdown">Barang Keluar<span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li> <a href="brgkeluar.php">Data Barang Keluar</a></li>
					<li><a href="pengeluaran.php">Tambah</a></li>
					
				</ul>
			</li>
			<li class="dropdown">
				<a href="#" data-toggle="dropdown">Barang Retur<span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="barangretur.php">Data Barang Retur</a></li>
					<li><a href="tambahreturn.php">Tambah</a></li>
				</ul>
			</li>
            
            <li><a href="User.php"><i class="glyphicon glyphicon-user"></i> Manajemen Pengguna</a>
			   </li>
			
			
          </ul>
		  <form class="navbar-form navbar-left" role="search" action="cari.php" id="form-cari">
			<div class="form-group">
				<input name="search" type="text" class="form-control" placeholder="Cari"> </div><button type="submit" class="btn btn-success">Submit</button>
		 </form>
		 
		 <ul class="nav navbar-nav navbar-right">
			<li><a href="../logout.php" title="LogOut" data-toggle="tooltip" data-placement="bottom"><i class="glyphicon glyphicon-off"></i></a></a></li>
		</ul>
        </div><!--/.navbar-collapse -->
		
      </div>
    </nav>
	
	<script type='text/javascript'>
		$(document).ready(function(){
			$('#form-cari').submit(function(e){
				e.preventDefault();
				$.ajax({
					type:'post',
					url: $(this).attr('action'),
					data: $(this).serialize(),
					dataType: 'json',
					success: function (data) {
						console.log(data);
						return false;
					},
					error:function(xhr,textStatus,errormessage){
						alert("Kesalahan! ","Error !!"+xhr.status+" "+textStatus+" "+errormessage);
					},
					complete:function(){
						
					}
				});
			});
		});
	</script>