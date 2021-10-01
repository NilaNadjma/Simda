<?php
	//Memanggil class mahasiswa
	include_once 'class/class_mahasiswa.php';
	
	//Inisialisasi baru
	$mahasiswa = new Mahasiswa();
?>

<!DOCTYPE html>
<html lang="en">
<body class="hold-transition sidebar-mini">

<section class="content-header">
  <div class="container-fluid">
	<div class="row mb-2">
	  <div class="col-sm-6">
		<h1>Tambah Mahasiswa</h1>
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
			<h3 class="card-title">Data Mahasiswa</h3>
		  </div>
		  <!-- /.card-header -->
		  <!-- form start -->
		  <form method="post" action="?page=tambah_mahasiswa">
			<div class="card-body">
			  <div class="form-group">
				<label>NIM</label>
				<input name="nim" type="text" class="form-control" required>
			  </div>
			  <div class="form-group">
				<label>Password</label>
				<input name="password" type="password" class="form-control" required>
			  </div>
			  <div class="form-group">
				<label>Nama Mahasiswa</label>
				<input name="nama_mhs" type="text" class="form-control" required>
			  </div>
			  <div class="form-group">
				<label>Jenis Kelamin</label>
				<select name="jk" class="form-control">
					<option value="1">Laki-Laki</option>
					<option value="2">Perempuan</option>
				</select>
			  </div>
			  <div class="form-group">
				<label>Alamat</label>
				<input name="alamat" type="text" class="form-control" required>
			  </div>
			  <div class="form-group">
				<label>Email</label>
				<input name="email" type="email" class="form-control" required>
			  </div>
			  <div class="form-group">
				<label>Tahun Masuk</label>
				<input name="thn_msk" min="0" maxlength="4" type="number" class="form-control" required>
			  </div>
			  <div class="form-group">
				<label>Tahun Keluar</label>
				<input name="thn_keluar" min="0" maxlength="4" type="number" class="form-control" required>
			  </div>
			  <div class="form-group">
				<label>Nama Prodi</label>
					<select name="id_prodi" class="form-control">
		           		<?php
		           			$query = mysqli_query($con, "SELECT * from tb_prodi");

		                	while ($row = mysqli_fetch_array($query))
			                {
			               		echo "<option value=$row[id_prodi]>$row[nama_prodi]</option>";
			                }
		           		?>
	           		</select>
           		</div>
			</div>
			<div class="card-footer">
			  <input type="submit" class="btn btn-success" name="submit" value="Simpan">
			  <a href="?page=tampil_mahasiswa" class="btn btn-warning">Kembali</a>
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
		//tambah data mahasiswa
		$data_mahasiswa['id_prodi'] = $_POST['id_prodi'];
		$data_mahasiswa['nim'] = $_POST['nim'];
		$data_mahasiswa['password'] = $_POST['password'];
		$data_mahasiswa['nama_mhs'] = $_POST['nama_mhs'];
		$data_mahasiswa['jk'] = $_POST['jk'];
		$data_mahasiswa['alamat'] = $_POST['alamat'];
		$data_mahasiswa['email'] = $_POST['email'];
		$data_mahasiswa['thn_masuk'] = $_POST['thn_msk'];
		$data_mahasiswa['thn_keluar'] = $_POST['thn_keluar'];

		$mahasiswa->tambah_mahasiswa($data_mahasiswa);
				
		?>
			<script language="javascript">
				alert("Data berhasil disimpan");
				location = "?page=tampil_mahasiswa";
			</script>
		<?php
	}
?>