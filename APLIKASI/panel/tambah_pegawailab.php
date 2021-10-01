<?php
	//Memanggil class Pegawai lab
	include_once 'class/class_pegawailab.php';
	
	//Inisialisasi baru
	$pegawailab = new Pegawailab();
?>

<!DOCTYPE html>
<html lang="en">
<body class="hold-transition sidebar-mini">

<section class="content-header">
  <div class="container-fluid">
	<div class="row mb-2">
	  <div class="col-sm-6">
		<h1>Tambah Pegawai lab</h1>
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
			<h3 class="card-title">Data Pegawai lab</h3>
		  </div>
		  <!-- /.card-header -->
		  <!-- form start -->
		  <form method="post" action="?page=tambah_pegawailab">
			<div class="card-body">
			  <div class="form-group">
				<label>Nama Pegawai</label>
				<select name="id_pegawai" class="form-control">
	           		<?php
		           		$query = mysqli_query($con, "SELECT * from tb_pegawai");
		                while ($row = mysqli_fetch_array($query))
		                {
		                echo "<option value=$row[id_pegawai]>$row[nama_pegawai]</option>";
		            	}
	           		?>
           		</select>
			  </div>
			<div class="card-footer">
			  <input type="submit" class="btn btn-success" name="submit" value="Simpan">
			  <a href="?page=tampil_pegawailab" class="btn btn-warning">Kembali</a>
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
		$data_pegawailab['id_pegawai'] = $_POST['id_pegawai'];
		
		$pegawailab->tambah_pegawailab($data_pegawailab);
				
		?>
			<script language="javascript">
				alert("Data berhasil disimpan");
				location = "?page=tampil_pegawailab";
			</script>
		<?php
	}
?>