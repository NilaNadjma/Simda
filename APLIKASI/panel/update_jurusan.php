<?php
	//Memanggil class jurusan
	include_once 'class/class_jurusan.php';
	
	//Inisialisasi baru
	$jurusan = new Jurusan();

	if (isset($_GET['aksi']))
	{
		//proses ubah data
		if ($_GET['aksi'] == 'ubah')
		{
			//baca ID
			$id_jurusan = $_GET['id_jurusan'];

			?>
			<!DOCTYPE html>
				<html lang="en">
				<body class="hold-transition sidebar-mini">

				<section class="content-header">
				  <div class="container-fluid">
					<div class="row mb-2">
					  <div class="col-sm-6">
						<h1>Update Jurusan</h1>
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
							<h3 class="card-title">Data Jurusan</h3>
						  </div>
						  <!-- /.card-header -->
						  <!-- form start -->
						  <form method="post" action="?page=update_jurusan&aksi=ubah&id_jurusan=<?php echo $id_jurusan; ?>">
							<div class="card-body">
							  <div class="form-group">
							  	<div class="form-group">
							  </div>

								<input name="id_jurusan" type="hidden" class="form-control" value ="<?php echo $jurusan->preview_jurusan('id_jurusan',$id_jurusan); ?>" required>

							  <div>
								<label>Nama Jurusan</label>
								<input name="nama_jurusan" type="text" class="form-control" value ="<?php echo $jurusan->preview_jurusan('nama_jurusan',$id_jurusan); ?>" required>
							  </div>
							</div>
							<div class="card-footer">
							  <input type="submit" class="btn btn-success" name="submit" value="Simpan">
							  <a href="?page=tampil_jurusan" class="btn btn-warning">Kembali</a>
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
			//update data jurusan
			$data_jurusan['id_jurusan'] = $_POST['id_jurusan'];
			$data_jurusan['nama_jurusan'] = $_POST['nama_jurusan'];

			$jurusan->update_jurusan($data_jurusan);
					
			?>
				<script language="javascript">
					alert("Data berhasil diupdate");
					location = "?page=tampil_jurusan";
				</script>
			<?php
		}
	}
?>