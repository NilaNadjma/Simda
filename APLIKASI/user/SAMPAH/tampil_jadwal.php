<?php
	//Memanggil class jadwal
	include_once 'class/class_jadwal.php';
	
	//Inisialisasi baru
	$jadwal = new Jadwal();
	
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
                <a href="?page=tambah_jadwal" class="btn btn-success">Tambah Jadwal</a>
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
											<a href="?page=update_jadwal&aksi=ubah&id_jadwal=<?php echo $data['id_jadwal']; ?>" title="Ubah"><input type="submit" class="btn btn-warning" value="Ubah"></a>
											<a href="?page=tampil_jadwal&aksi=hapus&id_jadwal=<?php echo $data['id_jadwal']; ?>" onclick="javascript: return confirm('Anda yakin hapus ?')"><input type="submit" class="btn btn-danger" value="Hapus"></a>
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
