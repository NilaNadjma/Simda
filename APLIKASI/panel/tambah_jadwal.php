<?php
	//Memanggil class jadwal
	include_once 'class/class_jadwal.php';
	
	//Inisialisasi baru
	$jadwal = new Jadwal();
?>

<!DOCTYPE html>
<html lang="en">
<body class="hold-transition sidebar-mini">

<section class="content-header">
  <div class="container-fluid">
	<div class="row mb-2">
	  <div class="col-sm-6">
		<h1>Tambah Jadwal</h1>
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
			<h3 class="card-title">Data Jadwal</h3>
		  </div>
		  <!-- /.card-header -->
		  <!-- form start -->
		  <form method="post" action="?page=tambah_Jadwal">
			<div class="card-body">
				<div class="form-group">
					<label>ID Pegawai</label>
					<input name="id_pegawai" type="text" class="form-control" value="<?php echo $id_pegawai; ?>" readonly>
				</div>
				
				<div class="form-group">
					<label>Tanggal Mulai</label>
					<input name="tgl_mulai" type="date" class="form-control" required>
				</div>
				
				<div class="form-group">
					<label>Waktu Mulai</label>
					<input name="waktu_mulai" class="form-control" placeholder="00:00:00" required>
				</div>
				
				<div class="form-group">
					<label>Tanggal Akhir</label>
					<input name="tgl_akhir" type="date" class="form-control" required>
				</div>
				
				<div class="form-group">
					<label>Waktu Akhir</label>
					<input name="waktu_akhir" class="form-control" placeholder="00:00:00" required>
				</div>
			  
			  <div class="form-group">
				<label>Informasi</label>
				<input name="informasi" type="text" class="form-control" required>
			  </div>
			</div>
			<div class="card-footer">
			  <input type="submit" class="btn btn-success" name="submit" value="Simpan">
			  <a href="?page=tampil_jadwal" class="btn btn-warning">Kembali</a>
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
		//tambah data jadwal		
		$data_jadwal['id_pegawai'] = $_POST['id_pegawai'];
		$data_jadwal['tgl_mulai'] = $_POST['tgl_mulai'];
		$data_jadwal['waktu_akhir'] = $_POST['waktu_akhir'];
		$data_jadwal['tgl_akhir'] = $_POST['tgl_akhir'];
		$data_jadwal['waktu_mulai'] = $_POST['waktu_mulai'];
		$data_jadwal['informasi'] = $_POST['informasi'];
		
		$jadwal->tambah_jadwal($data_jadwal);
				
		?>
			<script language="javascript">
				alert("Data berhasil disimpan");
				location = "?page=tampil_jadwal";
			</script>
		<?php
	}
?>