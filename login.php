<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <!-- Bootstrap -->
    <link href="Content/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
 <link href="Content/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet"/>
 <script src="Scripts/jquery/jquery-min.js" type="text/javascript"></script>
<script src="Content/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</head>

<body>
<p><br/><br/><br/><br/></p>
<div class="col-md-4"></div>
 <div class="container">
      <div class="row">  
  <div class="col-md-4">
       <div class="panel panel-default">
       <div class="panel-body">
          <div class="page-header">
         <h3>Login</h3>
      </div>
      <form action="processlogin.php" method="post" accept-charset="utf-8" role="form">
         <div class="form-group">
            <label for="username">Username</label>
            <div class="input-group">
           <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
           <input type="text" class="form-control" name="username" placeholder="Enter username" required />
        </div>
         </div>
         <div class="form-group">
            <label for="password">Password</label>
            <div class="input-group">
           <span class="input-group-addon"><span class="glyphicon glyphicon-star"></span></span>
           <input type="password" class="form-control" name="password" placeholder="Password" required />
        </div>
         </div>
		 <div class="form-group">
            <label for="password">Status</label>
            <div class="input-group">
           <span class="input-group-addon"><span class="glyphicon glyphicon-sort-by-attributes-alt"></span></span>
           <select name="status" class="form-control">
			<option value="">Status</option>
			<option value="administrator">administrator</option>
			<option value="karyawan">karyawan</option>
		   </select>
        </div>
         </div>
         <hr/>
         
         <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-lock"></span> Login</button> <a href="index.php" class="btn btn-default"><i class="glyphicon glyphicon-log-out"></i> Kembali</a>
         <p>
</p>
      </form>
       </div>
    </div>
    
     </div>
  </div>
    </div>
 
 
</body>
</html>