<?php
	//Memanggil class prodi
	include_once 'class/class_pegawaibahasa.php';
	
	//Inisialisasi baru
	$pegawaibahasa = new Pegawaibahasa();
	
	if ($_GET['aksi'] == 'hapus')
	{	
		$id_pegawaibahasa = $_GET['id_pegawaibahasa'];
		
		// proses hapus data via method		
		$pegawaibahasa->hapus_pegawaibahasa($id_pegawaibahasa);

		?>
			<script language="javascript">
				alert("Data berhasil dihapus");
				location = "?page=tampil_pegawaibahasa";
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
            <h1>Form Pegawai Bahasa</h1>
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
                <a href="?page=tambah_pegawaibahasa" class="btn btn-success">Tambah Pegawai Bahasa</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama Pegawai</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
					<?php
						//Tampilkan semua prodi
						$arraypegawaibahasa=$pegawaibahasa->tampil_pegawaibahasa();

						if (count($arraypegawaibahasa)) {
							foreach($arraypegawaibahasa as $data) {
								?>
									<tr>
										<td align="center"><?php echo $a=$a+1; ?>.</td>
										<td><?php echo $data['nama_pegawai']; ?></td>
										<td align="center">
											<a href="?page=update_pegawaibahasa&aksi=ubah&id_pegawaibahasa=<?php echo $data['id_pegawaibahasa']; ?>" title="Ubah"><input type="submit" class="btn btn-warning" value="Ubah"></a>
											<a href="?page=tampil_pegawaibahasa&aksi=hapus&id_pegawaibahasa=<?php echo $data['id_pegawaibahasa']; ?>" onclick="javascript: return confirm('Anda yakin hapus ?')"><input type="submit" class="btn btn-danger" value="Hapus"></a>
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
