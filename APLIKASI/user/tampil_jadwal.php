<?php
	//Memanggil class
	include_once 'class/class_jadwal.php';	
	include_once 'class/class_pendaftaran.php';
	
	//Inisialisasi baru
	$jadwal = new Jadwal();
	$pendaftaran = new Pendaftaran();
	
	if ($_GET['aksi'] == 'hapus')
	{	
		$id_jadwal = $_GET['id_jadwal'];
		
		// proses hapus data via method		
		$jadwal->hapus_jadwal($id_jadwal);

		?>
			<script language="javascript">
				alert("Data berhasil dihapus");
				location = "?page=tampil_jadwal";
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
            <h1>Form Jadwal</h1>
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
              <div class="card-header">
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Akhir</th>
                    <th>Informasi</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
					<?php
						//Tampilkan semua jadwal
						$arrayjadwal=$jadwal->tampil_jadwal();

						if (count($arrayjadwal)) {
							foreach($arrayjadwal as $data) {
								?>
									<tr>
										<td align="center"><?php echo $a=$a+1; ?>.</td>
										<td><?php echo $data['tgl_mulai']; ?></td>
										<td><?php echo $data['tgl_akhir']; ?></td>
										<td><?php echo $data['informasi']; ?></td>

										<td align="center">
											<form method="post" action="?page=tampil_jadwal">
												<input type="hidden" name="id_jadwal" value="<?php echo $data['id_jadwal']; ?>">
												<input type="hidden" name="id_mhs" value="<?php echo $id_mhs ; ?>">
												
												<input type="submit" class="btn btn-success" name="submit" value="Daftar ?"  onclick="javascript: return confirm('Anda yakin melanjutkan pendaftaran ?')">
											</form>
										</td>
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

<?php
	if($_POST['submit'])
	{
		//tambah data jadwal
		$data_pendaftaran['id_jadwal'] = $_POST['id_jadwal'];
		$data_pendaftaran['id_mhs'] = $_POST['id_mhs'];
		
		date_default_timezone_set('Asia/Jakarta');
		$data_pendaftaran['tgl_daftar'] = date('Y-m-d H:i:s');
		
		$pendaftaran->tambah_pendaftaran($data_pendaftaran);
				
		?>
			<script language="javascript">
				alert("Data berhasil disimpan");
				location = "?page=tampil_pendaftaran";
			</script>
		<?php
	}
?>