<?php
	//Memanggil class jadwal
	include_once 'class/class_jadwal.php';
	include_once 'class/lib.php';
	
	//Inisialisasi baru
	$jadwal = new Jadwal();

	if (isset($_GET['aksi']))
	{
		//proses ubah data
		if ($_GET['aksi'] == 'ubah')
		{
			//baca ID
			$id_jadwal = $_GET['id_jadwal'];

			?>
			<!DOCTYPE html>
				<html lang="en">
				<body class="hold-transition sidebar-mini">

				<section class="content-header">
				  <div class="container-fluid">
					<div class="row mb-2">
					  <div class="col-sm-6">
						<h1>Update Jadwal</h1>
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
						  <form method="post" action="?page=update_jadwal&aksi=ubah&id_jadwal=<?php echo $id_jadwal; ?>">
							<div class="card-body">
							  <div class="form-group">
							  	<div class="form-group">
							  	</div>

								<input name="id_jadwal" type="hidden" class="form-control" value ="<?php echo $jadwal->preview_jadwal('id_jadwal',$id_jadwal); ?>" required>

								<div class="form-group">
								<label>Id Pegawai</label>
								<input name="id_pegawai" type="text" class="form-control" value ="<?php echo $jadwal->preview_jadwal('id_pegawai',$id_jadwal); ?>" readonly>
							  	</div>

							  <div class="form-group">
								<label>Tanggal Mulai</label>
								<input name="tgl_mulai" type="date" class="form-control" value ="<?php echo substr($jadwal->preview_jadwal('tgl_mulai',$id_jadwal),0,10); ?>" required>
							  </div>
							  
							  <div class="form-group">
								<label>Waktu Mulai</label>
								<input name="waktu_mulai" type="text" class="form-control" value ="<?php echo substr($jadwal->preview_jadwal('tgl_mulai',$id_jadwal),-8); ?>" required>
							  </div>

							  <div class="form-group">
								<label>Tanggal Akhir</label>
								<input name="tgl_akhir" type="date" class="form-control" value ="<?php echo substr($jadwal->preview_jadwal('tgl_akhir',$id_jadwal),0,10); ?>" required>
							  </div>
							  
							  <div class="form-group">
								<label>Waktu Akhir</label>
								<input name="waktu_akhir" type="text" class="form-control" value ="<?php echo substr($jadwal->preview_jadwal('tgl_mulai',$id_jadwal),-8); ?>" required>
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
		}

		if($_POST['submit'])
		 {
			//update data Jadwal
		 	$data_jadwal['id_jadwal'] = $_POST['id_jadwal'];
			$data_jadwal['id_pegawai'] = $_POST['id_pegawai'];
			$data_jadwal['tgl_mulai'] = $_POST['tgl_mulai'];
			$data_jadwal['waktu_akhir'] = $_POST['waktu_akhir'];
			$data_jadwal['tgl_akhir'] = $_POST['tgl_akhir'];
			$data_jadwal['waktu_mulai'] = $_POST['waktu_mulai'];
			$data_jadwal['informasi'] = $_POST['informasi'];

			$jadwal->update_jadwal($data_jadwal);
					
			?>
				<script language="javascript">
					alert("Data berhasil diupdate");
					location = "?page=tampil_jadwal";
				</script>
			<?php
		}
	}
?>