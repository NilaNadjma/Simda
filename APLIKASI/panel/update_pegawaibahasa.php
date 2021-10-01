<?php
	//Memanggil class prodi
	include_once 'class/class_pegawaibahasa.php';
	
	//Inisialisasi baru
	$pegawaibahasa = new Pegawaibahasa();

	if (isset($_GET['aksi']))
	{
		//proses ubah data
		if ($_GET['aksi'] == 'ubah')
		{
			//baca ID
			$id_pegawaibahasa = $_GET['id_pegawaibahasa'];

			?>
			<!DOCTYPE html>
				<html lang="en">
				<body class="hold-transition sidebar-mini">

				<section class="content-header">
				  <div class="container-fluid">
					<div class="row mb-2">
					  <div class="col-sm-6">
						<h1>Update Pegawai Bahasa</h1>
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
							<h3 class="card-title">Data Pegawai Bahasa</h3>
						  </div>
						  <!-- /.card-header -->
						  <!-- form start -->
						  <form method="post" action="?page=update_pegawaibahasa&aksi=ubah&id_pegawaibahasa=<?php echo $id_pegawaibahasa; ?>">
							<div class="card-body">
							  <div class="form-group">
							  	<div class="form-group">
								</div>

								<input name="id_pegawaibahasa" type="hidden" class="form-control" value ="<?php echo $pegawaibahasa->preview_pegawaibahasa('id_pegawaibahasa',$id_pegawaibahasa); ?>" required>

							  <div class="form-group">
								<label>Nama Pegawai</label>
								<select name="id_pegawai" class="form-control">
									<option value=<?php echo $pegawaibahasa->preview_pegawaibahasa('id_pegawai',$id_pegawaibahasa); ?>><?php echo $pegawaibahasa->preview_pegawaibahasa('nama_pegawai',$id_pegawaibahasa); ?></option>

					           		<?php
						           		$query = mysqli_query($con, "SELECT * FROM tb_pegawai where id_pegawai NOT IN (SELECT id_pegawai FROM tb_pegawaibahasa WHERE id_pegawaibahasa='$id_pegawaibahasa');");
						                
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
							  <a href="?page=tampil_pegawaibahasa" class="btn btn-warning">Kembali</a>
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

		 	$data_pegawaibahasa['id_pegawaibahasa'] = $_POST['id_pegawaibahasa'];
			$data_pegawaibahasa['id_pegawai'] = $_POST['id_pegawai'];

			$pegawaibahasa->update_pegawaibahasa($data_pegawaibahasa);
					
			?>
				<script language="javascript">
					alert("Data berhasil diupdate");
					location = "?page=tampil_pegawaibahasa";
				</script>
			<?php
		}
	}
?>