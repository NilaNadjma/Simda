<?php
	//Memanggil class prodi
	include_once 'class/class_prodi.php';
	
	//Inisialisasi baru
	$prodi = new Prodi();
	
	if ($_GET['aksi'] == 'hapus')
	{	
		$id_prodi = $_GET['id_prodi'];
		
		// proses hapus data via method		
		$prodi->hapus_prodi($id_prodi);

		?>
			<script language="javascript">
				alert("Data berhasil dihapus");
				location = "?page=tampil_prodi";
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
            <h1>Form Prodi</h1>
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
                <a href="?page=tambah_prodi" class="btn btn-success">Tambah prodi</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama Jurusan</th>
                    <th>Nama Prodi</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
					<?php
						//Tampilkan semua prodi
						$arrayprodi=$prodi->tampil_prodi();

						if (count($arrayprodi)) {
							foreach($arrayprodi as $data) {
								?>
									<tr>
										<td align="center"><?php echo $a=$a+1; ?>.</td>
										<td><?php echo $data['nama_jurusan']; ?></td>
										<td><?php echo $data['nama_prodi']; ?></td>
										<td align="center">
											<a href="?page=update_prodi&aksi=ubah&id_prodi=<?php echo $data['id_prodi']; ?>" title="Ubah"><input type="submit" class="btn btn-warning" value="Ubah"></a>
											<a href="?page=tampil_prodi&aksi=hapus&id_prodi=<?php echo $data['id_prodi']; ?>" onclick="javascript: return confirm('Anda yakin hapus ?')"><input type="submit" class="btn btn-danger" value="Hapus"></a>
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
