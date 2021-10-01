<?php
	//Memanggil class mahasiswa
	include_once 'class/class_mahasiswa.php';
	
	//Inisialisasi baru
	$mahasiswa = new Mahasiswa();
	
	if ($_GET['aksi'] == 'hapus')
	{	
		$id_mhs = $_GET['id_mhs'];
		
		// proses hapus data via method		
		$mahasiswa->hapus_mahasiswa($id_mhs);

		?>
			<script language="javascript">
				alert("Data berhasil dihapus");
				location = "?page=tampil_mahasiswa";
			</script>
		<?php
	}
?>

<!DOCTYPE html>
<html lang="en">
<body class="hold-transition sidebar-mini">
	<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Mahasiswa</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
				<?php
					if($level == 1){
						?>
							<div class="card-header">
								<a href="?page=tambah_mahasiswa" class="btn btn-success">Tambah Mahasiswa</a>
							</div>
						<?php
					}
				?>
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>NIM</th>
                    <th>Nama Mahasiswa</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>Tahun Masuk</th>
                    <th>Tahun Keluar</th>
                    <th>Nama Prodi</th>
					<?php
						if($level == 1){
							?>
								<th>Aksi</th>
							<?php
						}
					?>
                  </tr>
                  </thead>
                  <tbody>
					<?php
						//Tampilkan semua mahasiswa
						$arraymahasiswa=$mahasiswa->tampil_mahasiswa();

						if (count($arraymahasiswa)) {
							foreach($arraymahasiswa as $data) {
								?>
									<tr>
										<td align="center"><?php echo $a=$a+1; ?>.</td>
										<td><?php echo $data['nim']; ?></td>
										<td><?php echo $data['nama_mhs']; ?></td>
										<td>
											<?php 
											  if($data['jk'] == 1){
												echo 'Laki-laki';
											  }
											  else if($data['jk'] == 2){
												echo 'Perempuan';
											  }
											?>                       
										</td>
										<td><?php echo $data['alamat']; ?></td>
										<td><?php echo $data['email']; ?></td>
										<td><?php echo $data['thn_masuk']; ?></td>
										<td><?php echo $data['thn_keluar']; ?></td>
										<td><?php echo $data['nama_prodi']; ?></td>
										<?php
											if($level == 1){
												?>
													<td align="center">
														<a href="?page=update_mahasiswa&aksi=ubah&id_mhs=<?php echo $data['id_mhs']; ?>" title="Ubah"><input type="submit" class="btn btn-warning" value="Ubah"></a>
														<a href="?page=tampil_mahasiswa&aksi=hapus&id_mhs=<?php echo $data['id_mhs']; ?>" onclick="javascript: return confirm('Anda yakin hapus ?')"><input type="submit" class="btn btn-danger" value="Hapus"></a>
													</td>
												<?php
											}
										?>
									</tr>
								<?php
							}
						}
					?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</body>
</html>
