<?php
	//Memanggil class prodi
	include_once 'class/class_prodi.php';
	
	//Inisialisasi baru
	$prodi = new Prodi();

	if (isset($_GET['aksi']))
	{
		//proses ubah data
		if ($_GET['aksi'] == 'ubah')
		{
			//baca ID
			$id_prodi = $_GET['id_prodi'];

			?>
				<!DOCTYPE html>
				<html lang="en">
				<body class="hold-transition sidebar-mini">

				<section class="content-header">
				  <div class="container-fluid">
					<div class="row mb-2">
					  <div class="col-sm-6">
						<h1>Update Prodi</h1>
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
						  <form method="post" action="?page=update_prodi&aksi=ubah&id_prodi=<?php echo $id_prodi; ?>">
							<div class="card-body">
							  <div class="form-group">
							  	<div class="form-group">
								</div>

								<input name="id_prodi" type="hidden" class="form-control" value ="<?php echo $prodi->preview_prodi('id_prodi',$id_prodi); ?>" required>
							  
							  <div class="form-group">
								<label>Nama Jurusan</label>
								<select name="id_jurusan" class="form-control">
								<option value=<?php echo $prodi->preview_prodi('id_jurusan',$id_prodi); ?>><?php echo $prodi->preview_prodi('nama_jurusan',$id_prodi); ?></option>
								
								<?php
									$query = mysqli_query($con, "SELECT * FROM tb_jurusan WHERE id_jurusan NOT IN (SELECT id_jurusan FROM tb_prodi WHERE id_prodi='$id_prodi')");
									
									while ($row = mysqli_fetch_array($query))
									{
										echo "<option value=$row[id_jurusan]>$row[nama_jurusan]</option>";
									}
								?>
								</select>
							  </div>
							  
							  <div class="form-group">
								<label>Nama Prodi</label>
								<input name="nama_prodi" type="text" class="form-control" value ="<?php echo $prodi->preview_prodi('nama_prodi',$id_prodi); ?>" required>
							  </div>
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
		}

		if($_POST['submit'])
		 {
			//update data prodi

		 	$data_prodi['id_prodi'] = $_POST['id_prodi'];
			$data_prodi['id_jurusan'] = $_POST['id_jurusan'];
			$data_prodi['nama_prodi'] = $_POST['nama_prodi'];

			$prodi->update_prodi($data_prodi);
					
			?>
				<script language="javascript">
					alert("Data berhasil diupdate");
					location = "?page=tampil_prodi";
				</script>
			<?php
		}
	}
?>