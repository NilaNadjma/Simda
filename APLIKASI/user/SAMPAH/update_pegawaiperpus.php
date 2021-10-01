<?php
	//Memanggil class prodi
	include_once 'class/class_pegawaiperpus.php';
	
	//Inisialisasi baru
	$pegawaiperpus = new Pegawaiperpus();

	if (isset($_GET['aksi']))
	{
		//proses ubah data
		if ($_GET['aksi'] == 'ubah')
		{
			//baca ID
			$id_pegawaiperpus = $_GET['id_pegawaiperpus'];

			?>
			<!DOCTYPE html>
				<html lang="en">
				<body class="hold-transition sidebar-mini">

				<section class="content-header">
				  <div class="container-fluid">
					<div class="row mb-2">
					  <div class="col-sm-6">
						<h1>Update Pegawai perpus</h1>
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
							<h3 class="card-title">Data Pegawai perpus</h3>
						  </div>
						  <!-- /.card-header -->
						  <!-- form start -->
						  <form method="post" action="?page=update_pegawaiperpus&aksi=ubah&id_pegawaiperpus=<?php echo $id_pegawaiperpus; ?>">
							<div class="card-body">
							  <div class="form-group">
							  	<div class="form-group">
								</div>

								<input name="id_pegawaiperpus" type="hidden" class="form-control" value ="<?php echo $pegawaiperpus->preview_pegawaiperpus('id_pegawaiperpus',$id_pegawaiperpus); ?>" required>

							  <div class="form-group">
								<label>Nama Pegawai</label>
								<select name="id_pegawai" class="form-control">
									<option value=<?php echo $pegawaiperpus->preview_pegawaiperpus('id_pegawai',$id_pegawaiperpus); ?>><?php echo $pegawaiperpus->preview_pegawaiperpus('nama_pegawai',$id_pegawaiperpus); ?></option>

					           		<?php
						           		$query = mysqli_query($con, "SELECT * FROM tb_pegawai where id_pegawai NOT IN (SELECT id_pegawai FROM tb_pegawaiperpus WHERE id_pegawaiperpus='$id_pegawaiperpus');");
						                
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
							  <a href="?page=tampil_pegawaiperpus" class="btn btn-warning">Kembali</a>
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

		 	$data_pegawaiperpus['id_pegawaiperpus'] = $_POST['id_pegawaiperpus'];
			$data_pegawaiperpus['id_pegawai'] = $_POST['id_pegawai'];

			$pegawaiperpus->update_pegawaiperpus($data_pegawaiperpus);
					
			?>
				<script language="javascript">
					alert("Data berhasil diupdate");
					location = "?page=tampil_pegawaiperpus";
				</script>
			<?php
		}
	}
?>