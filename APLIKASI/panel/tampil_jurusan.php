<?php
	//Memanggil class jurusan
	include_once 'class/class_jurusan.php';
	
	//Inisialisasi baru
	$jurusan = new Jurusan();
	
	if ($_GET['aksi'] == 'hapus')
	{	
		$id_jurusan = $_GET['id_jurusan'];
		
		// proses hapus data via method		
		$jurusan->hapus_jurusan($id_jurusan);

		?>
			<script language="javascript">
				alert("Data berhasil dihapus");
				location = "?page=tampil_jurusan";
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
            <h1>Form Jurusan</h1>
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
                <a href="?page=tambah_jurusan" class="btn btn-success">Tambah Jurusan</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama Jurusan</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
					<?php
						//Tampilkan semua jurusan
						$arrayjurusan=$jurusan->tampil_jurusan();

						if (count($arrayjurusan)) {
							foreach($arrayjurusan as $data) {
								?>
									<tr>
										<td align="center"><?php echo $a=$a+1; ?>.</td>
										<td><?php echo $data['nama_jurusan']; ?></td>
										<td align="center">
											<a href="?page=update_jurusan&aksi=ubah&id_jurusan=<?php echo $data['id_jurusan']; ?>" title="Ubah"><input type="submit" class="btn btn-warning" value="Ubah"></a>
											<a href="?page=tampil_jurusan&aksi=hapus&id_jurusan=<?php echo $data['id_jurusan']; ?>" onclick="javascript: return confirm('Anda yakin hapus ?')"><input type="submit" class="btn btn-danger" value="Hapus"></a>
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
