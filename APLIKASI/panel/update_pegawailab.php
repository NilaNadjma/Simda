<?php
	//Memanggil class prodi
	include_once 'class/class_pegawailab.php';
	
	//Inisialisasi baru
	$pegawailab = new Pegawailab();

	if (isset($_GET['aksi']))
	{
		//proses ubah data
		if ($_GET['aksi'] == 'ubah')
		{
			//baca ID
			$id_pegawailab = $_GET['id_pegawailab'];

			?>
			<!DOCTYPE html>
				<html lang="en">
				<body class="hold-transition sidebar-mini">

				<section class="content-header">
				  <div class="container-fluid">
					<div class="row mb-2">
					  <div class="col-sm-6">
						<h1>Update Pegawai lab</h1>
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
						  <form method="post" action="?page=update_pegawailab&aksi=ubah&id_pegawailab=<?php echo $id_pegawailab; ?>">
							<div class="card-body">
							  <div class="form-group">
							  	<div class="form-group">
								</div>

								<input name="id_pegawailab" type="hidden" class="form-control" value ="<?php echo $pegawailab->preview_pegawailab('id_pegawailab',$id_pegawailab); ?>" required>

							  <div class="form-group">
								<label>Nama Pegawai</label>
								<select name="id_pegawai" class="form-control">
									<option value=<?php echo $pegawailab->preview_pegawailab('id_pegawai',$id_pegawailab); ?>><?php echo $pegawailab->preview_pegawailab('nama_pegawai',$id_pegawailab); ?></option>

					           		<?php
						           		$query = mysqli_query($con, "SELECT * FROM tb_pegawai where id_pegawai NOT IN (SELECT id_pegawai FROM tb_pegawailab WHERE id_pegawailab='$id_pegawailab');");
						                
						                while ($row = mysqli_fetch_array($query))
						                {
						                	echo "<option value=$row[id_pegawai]>$row[nama_pegawai]</option>";
						                }
					           		?>
				           		</select>
							  </div>


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
		}

		if($_POST['submit'])
		 {
			//update data prodi

		 	$data_pegawailab['id_pegawailab'] = $_POST['id_pegawailab'];
			$data_pegawailab['id_pegawai'] = $_POST['id_pegawai'];

			$pegawailab->update_pegawailab($data_pegawailab);
					
			?>
				<script language="javascript">
					alert("Data berhasil diupdate");
					location = "?page=tampil_pegawailab";
				</script>
			<?php
		}
	}
?>