<?php
	//Memanggil class pegawai
	include_once 'class/class_pegawai.php';
	
	//Inisialisasi baru
	$pegawai = new Pegawai();
?>

<!DOCTYPE html>
<html lang="en">
<body class="hold-transition sidebar-mini">

<section class="content-header">
  <div class="container-fluid">
	<div class="row mb-2">
	  <div class="col-sm-6">
		<h1>Tambah Pegawai</h1>
	  </div>
	</div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
	<div class="row">
	  <!-- left column -->
	  <div class="col-md-12">
		<!-- general form elements -->
		<div class="card card-primary">
		  <div class="card-header">
			<h3 class="card-title">Data Pegawai</h3>
		  </div>
		  <!-- /.card-header -->
		  <!-- form start -->
		  <form method="post" action="?page=tambah_pegawai">
			<div class="card-body">
			  <div class="form-group">
				<label>Nama Pegawai</label>
				<input name="nama_pegawai" type="text" class="form-control" required>
			  </div>
			  <div class="form-group">
				<label>Username</label>
				<input name="username" type="text" class="form-control" required>
			  </div>
			  <div class="form-group">
				<label>Password</label>
				<input name="password" type="password" class="form-control" required>
			  </div>
			</div>
			<div class="card-footer">
			  <input type="submit" class="btn btn-success" name="submit" value="Simpan">
			  <a href="?page=tampil_pegawai" class="btn btn-warning">Kembali</a>
			</div>
		  </form>
		</div>
		<!-- /.card -->
	  </div>
	</div>
	<!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</body>
</html>

<?php
	if($_POST['submit'])
	{
		//tambah data pegawai
		$data_pegawai['nama_pegawai'] = $_POST['nama_pegawai'];
		$data_pegawai['username'] = $_POST['username'];
		$data_pegawai['password'] = $_POST['password'];

		$pegawai->tambah_pegawai($data_pegawai);
				
		?>
			<script language="javascript">
				alert("Data berhasil disimpan");
				location = "?page=tampil_pegawai";
			</script>
		<?php
	}
?>