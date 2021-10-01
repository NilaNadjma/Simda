<?php
	//Memanggil class prodi
	include_once 'class/class_prodi.php';
	
	//Inisialisasi baru
	$prodi = new Prodi();
?>

<!DOCTYPE html>
<html lang="en">
<body class="hold-transition sidebar-mini">

<section class="content-header">
  <div class="container-fluid">
	<div class="row mb-2">
	  <div class="col-sm-6">
		<h1>Tambah Prodi</h1>
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
			<h3 class="card-title">Data Prodi</h3>
		  </div>
		  <!-- /.card-header -->
		  <!-- form start -->
		  <form method="post" action="?page=tambah_prodi">
			<div class="card-body">
			  <div class="form-group">
				<label>Nama Jurusan</label>
				<select name="id_jurusan" class="form-control">
           		<?php
					$query = mysqli_query($con, "SELECT * from tb_jurusan");
					while ($row = mysqli_fetch_array($query))
					{
						echo "<option value=$row[id_jurusan]>$row[nama_jurusan]</option>";
					}
           		?>
           		</select>
			  </div>
			  <div class="form-group">
				<label>Nama Prodi</label>
				<input name="nama_prodi" type="text" class="form-control" required>
			  </div>
			<div class="card-footer">
			  <input type="submit" class="btn btn-success" name="submit" value="Simpan">
			  <a href="?page=tampil_prodi" class="btn btn-warning">Kembali</a>
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
		//tambah data prodi
		$data_prodi['id_jurusan'] = $_POST['id_jurusan'];
		$data_prodi['nama_prodi'] = $_POST['nama_prodi'];
		
		$prodi->tambah_prodi($data_prodi);
				
		?>
			<script language="javascript">
				alert("Data berhasil disimpan");
				location = "?page=tampil_prodi";
			</script>
		<?php
	}
?>