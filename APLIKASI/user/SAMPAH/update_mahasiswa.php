<?php
	//Memanggil class mahasiswa
	include_once 'class/class_mahasiswa.php';
	
	//Inisialisasi baru
	$mahasiswa = new Mahasiswa();

	if (isset($_GET['aksi']))
	{
		//proses ubah data
		if ($_GET['aksi'] == 'ubah')
		{
			//baca ID
			$id_mhs = $_GET['id_mhs'];

			?>
			<!DOCTYPE html>
				<html lang="en">
				<body class="hold-transition sidebar-mini">
				<section class="content-header">
				  <div class="container-fluid">
					<div class="row mb-2">
					  <div class="col-sm-6">
						<h1>Update Mahasiswa</h1>
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
							<h3 class="card-title">Data Mahasiswa</h3>
						  </div>
						  <!-- /.card-header -->
						  <!-- form start -->
						  <form method="post" action="?page=update_mahasiswa&aksi=ubah&id_mhs=<?php echo $id_mhs; ?>">
							<div class="card-body">
							  <div class="form-group">
							  	<div class="form-group">
									<input name="id_mhs" type="hidden" class="form-control" value ="<?php echo $mahasiswa->preview_mahasiswa('id_mhs',$id_mhs); ?>" required>

							  	<div class="form-group">
							  		<label>NIM</label>
									<input name="nim" type="text" class="form-control" value ="<?php echo $mahasiswa->preview_mahasiswa('nim',$id_mhs); ?>" required>
							  	</div>

							  	<div class="form-group">
									<label>Password</label>
									<input name="password" type="password" class="form-control" value ="<?php echo $mahasiswa->preview_mahasiswa('password',$id_mhs); ?>" required>
							  	</div>

							  	<div class="form-group">
									<label>Nama Mahasiswa</label>
									<input name="nama_mhs" type="text" class="form-control" value ="<?php echo $mahasiswa->preview_mahasiswa('nama_mhs',$id_mhs); ?>" required>
							  	</div>

							  	<div  class="form-group">
									<label>Jenis Kelamin</label>
									<select name="jk" class="form-control" >
										<?php
											if ($mahasiswa->preview_mahasiswa('jk',$id_mhs) == "1")
											echo "<option value='1' selected>Laki-laki</option>";
											else echo "<option value='1'>Laki-laki</option>";
						 
											if ($mahasiswa->preview_mahasiswa('jk',$id_mhs) == "2")
											echo "<option value='2' selected>Perempuan</option>";
											else echo "<option value='2'>Perempuan</option>";
										?>
									</select>
							  	</div>

							  	<div class="form-group">
									<label>Alamat</label>
									<input name="alamat" type="text" class="form-control" value ="<?php echo $mahasiswa->preview_mahasiswa('alamat',$id_mhs); ?>" required>
							  	</div>

							  	<div class="form-group">
									<label>Email</label>
									<input name="email" type="email" class="form-control" value ="<?php echo $mahasiswa->preview_mahasiswa('email',$id_mhs); ?>" required>
							  	</div>

							  	<div class="form-group">
									<label>Tahun Masuk</label>
									<input name="thn_masuk" type="number" min="0" maxlength="4" class="form-control" value ="<?php echo $mahasiswa->preview_mahasiswa('thn_masuk',$id_mhs); ?>" required>
							  	</div>

							  	<div class="form-group">
									<label>Tahun Keluar</label>
									<input name="thn_keluar" type="number" min="0" maxlength="4" class="form-control" value ="<?php echo $mahasiswa->preview_mahasiswa('thn_keluar',$id_mhs); ?>" required>
							  	</div>

							  	<div class="form-group">
								<label>Nama Prodi</label>
								<select name="id_prodi" class="form-control">
									<option value=<?php echo $mahasiswa->preview_mahasiswa('id_prodi',$id_mhs); ?>><?php echo $mahasiswa->preview_mahasiswa('nama_prodi',$id_mhs); ?></option>

					           		<?php
						           		$query = mysqli_query($con, "SELECT * FROM tb_prodi where id_prodi NOT IN (SELECT id_prodi FROM tb_mahasiswa WHERE id_mhs='$id_mhs');");
						                
						                while ($row = mysqli_fetch_array($query))
						                {
						                	echo "<option value=$row[id_prodi]>$row[nama_prodi]</option>";
						                }
					           		?>
				           		</select>
							  </div>

							  </div>
							</div>
							<div class="card-footer">
							  <input type="submit" class="btn btn-success" name="submit" value="Simpan">
							  <a href="?page=tampil_mahasiswa" class="btn btn-warning">Kembali</a>
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
			//update data mahasiswa
			$data_mahasiswa['id_mhs'] = $_POST['id_mhs'];
			$data_mahasiswa['id_prodi'] = $_POST['id_prodi'];
			$data_mahasiswa['nim'] = $_POST['nim'];
			$data_mahasiswa['password'] = $_POST['password'];
			$data_mahasiswa['nama_mhs'] = $_POST['nama_mhs'];
			$data_mahasiswa['jk'] = $_POST['jk'];
			$data_mahasiswa['alamat'] = $_POST['alamat'];
			$data_mahasiswa['email'] = $_POST['email'];
			$data_mahasiswa['thn_masuk'] = $_POST['thn_masuk'];
			$data_mahasiswa['thn_keluar'] = $_POST['thn_keluar'];

			$mahasiswa->update_mahasiswa($data_mahasiswa);
					
			?>
				<script language="javascript">
					alert("Data berhasil diupdate");
					location = "?page=tampil_mahasiswa";
				</script>
			<?php
		}
	}
?>