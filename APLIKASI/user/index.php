<?php
	session_start();
	error_reporting(0);
	
	//Memanggil class koneksi
	include_once 'class/koneksi.php';
	
	//Inisialisasi baru
	$db = new Koneksi();
	
	//Inisialisasi baru
	$Login_User = new Login();
	
	//Memanggil fungsi koneksi
	$db->connectMysql();
	
	if($_POST['submit_login']) {	
		$login=$Login_User->cek_login($_POST['username'], $_POST['password']);
		
		if($login) {
			// login sukses, arahkan ke lokasi
			$lokasi = $_SESSION['location'];
			header("location:$lokasi");
		}
		else {
			// login gagal, beri peringatan dan kembali ke file index.php
			?>
				<script language="javascript">
					alert("Identitas tersebut tidak cocok dengan data kami");
					location = "index.php";
				</script>
			<?php
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIMDA | PNC</title>
  <link rel="shortcut icon" type="image/png" href="dist/img/logo_pnc.png">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
	  <img src="dist/img/logo_pnc.png" width="80" alt="Logo PNC"><br/>
      <a href="index.php" class="h1"><b>Login</b>&nbsp;SIMDA</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Silahkan masukan username dan password.</p>

      <form method="post">
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="Username" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-4">
			<input type="submit" name="submit_login" class="btn btn-primary btn-block" value="Masuk">
          </div>
		  
		  <div class="col-4">
			<input type="reset" class="btn btn-default btn-block" value="Reset">
          </div>
          <!-- /.col -->
        </div>
      </form>
      <!-- /.social-auth-links -->
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
