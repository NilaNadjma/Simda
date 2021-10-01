<?php
	//Memanggil class prodi
	include_once 'class/class_pegawaijurusan.php';
	
	//Inisialisasi baru
	$pegawaijurusan = new Pegawaijurusan();

	if (isset($_GET['aksi']))
	{
		//proses ubah data
		if ($_GET['aksi'] == 'ubah')
		{
			//baca ID
			$id_pegawaijurusan = $_GET['id_pegawaijurusan'];

			?>
			<!DOCTYPE html>
				<html lang="en">
				<body class="hold-transition sidebar-mini">

				<section class="content-header">
				  <div class="container-fluid">
					<div class="row mb-2">
					  <div class="col-sm-6">
						<h1>Update Pegawai jurusan</h1>
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
							<h3 class="card-title">Data Pegawai jurusan</h3>
						  </div>
						  <!-- /.card-header -->
						  <!-- form start -->
						  <form method="post" action="?page=update_pegawaijurusan&aksi=ubah&id_pegawaijurusan=<?php echo $id_pegawaijurusan; ?>">
							<div class="card-body">
							  <div class="form-group">
							  	<div class="form-group">
								</div>

								<input name="id_pegawaijurusan" type="hidden" class="form-control" value ="<?php echo $pegawaijurusan->preview_pegawaijurusan('id_pegawaijurusan',$id_pegawaijurusan); ?>" required>

							  <div class="form-group">
								<label>Nama Pegawai</label>
								<select name="id_pegawai" class="form-control">
									<option value=<?php echo $pegawaijurusan->preview_pegawaijurusan('id_pegawai',$id_pegawaijurusan); ?>><?php echo $pegawaijurusan->preview_pegawaijurusan('nama_pegawai',$id_pegawaijurusan); ?></option>

					           		<?php
						           		$query = mysqli_query($con, "SELECT * FROM tb_pegawai where id_pegawai NOT IN (SELECT id_pegawai FROM tb_pegawaijurusan WHERE id_pegawaijurusan='$id_pegawaijurusan');");
						                
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
							  <a href="?page=tampil_pegawaijurusan" class="btn btn-warning">Kembali</a>
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

		 	$data_pegawaijurusan['id_pegawaijurusan'] = $_POST['id_pegawaijurusan'];
			$data_pegawaijurusan['id_pegawai'] = $_POST['id_pegawai'];

			$pegawaijurusan->update_pegawaijurusan($data_pegawaijurusan);
					
			?>
				<script language="javascript">
					alert("Data berhasil diupdate");
					location = "?page=tampil_pegawaijurusan";
				</script>
			<?php
		}
	}
?>