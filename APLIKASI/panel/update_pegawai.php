<?php
	//Memanggil class pegawai
	include_once 'class/class_pegawai.php';
	
	//Inisialisasi baru
	$pegawai = new Pegawai();

	if (isset($_GET['aksi']))
	{
		//proses ubah data
		if ($_GET['aksi'] == 'ubah')
		{
			//baca ID
			$id_pegawai = $_GET['id_pegawai'];
			//var_dump($id_pegawai);
			//exit;

			?>
			<!DOCTYPE html>
				<html lang="en">
				<body class="hold-transition sidebar-mini">

				<section class="content-header">
				  <div class="container-fluid">
					<div class="row mb-2">
					  <div class="col-sm-6">
						<h1>Update Pegawai</h1>
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
							<h3 class="card-title">Data Pegawai</h3>
						  </div>
						  <!-- /.card-header -->
						  <!-- form start -->
						  <form method="post" action="?page=update_pegawai&aksi=ubah&id_pegawai=<?php echo $id_pegawai; ?>">
							<div class="card-body">
							  <div class="form-group">
							  	<div class="form-group">
								<label>Id Pegawai</label>
								<input name="id_pegawai" type="text" class="form-control" value ="<?php echo $pegawai->preview_pegawai('id_pegawai',$id_pegawai); ?>" readonly>
							  </div>
								<label>Nama Pegawai</label>
								<input name="nama_pegawai" type="text" class="form-control" value ="<?php echo $pegawai->preview_pegawai('nama_pegawai',$id_pegawai); ?>" required>
							  </div>
							  <div class="form-group">
								<label>Username</label>
								<input name="username" type="text" class="form-control" value ="<?php echo $pegawai->preview_pegawai('username',$id_pegawai); ?>" required>
							  </div>
							  <div class="form-group">
								<label>Password</label>
								<input name="password" type="password" class="form-control" value ="<?php echo $pegawai->preview_pegawai('password',$id_pegawai); ?>" required>
							  </div>							  
							  <div class="form-group">
								<label>Level Pengelola</label>
								<select name="level" class="form-control">
									<?php
										if ($pegawai->preview_pegawai('level',$id_pegawai) == "1")
										echo "<option value='1' selected>Administrator</option>";
										else echo "<option value='1'>Administrator</option>";
					 
										if ($pegawai->preview_pegawai('level',$id_pegawai) == "2")
										echo "<option value='2' selected>Pengelola</option>";
										else echo "<option value='2'>Pengelola</option>";
									?>
								</select>
							  </div>
							</div>
							<div class="card-footer">
							  <input type="submit" class="btn btn-success" name="submit" value="Simpan">
							  <a href="?page=tampil_pegawai" class="btn btn-warning">Kembali</a>
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
			//update data pegawai
			$data_pegawai['id_pegawai'] = $_POST['id_pegawai'];
			$data_pegawai['nama_pegawai'] = $_POST['nama_pegawai'];
			$data_pegawai['username'] = $_POST['username'];
			$data_pegawai['password'] = $_POST['password'];

			$pegawai->update_pegawai($data_pegawai);
					
			?>
				<script language="javascript">
					alert("Data berhasil diupdate");
					location = "?page=tampil_pegawai";
				</script>
			<?php
		}
	}
?>