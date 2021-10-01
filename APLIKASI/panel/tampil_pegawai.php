<?php
	//Memanggil class pegawai
	include_once 'class/class_pegawai.php';
	
	//Inisialisasi baru
	$pegawai = new Pegawai();
	
	if ($_GET['aksi'] == 'hapus')
	{	
		$id_pegawai = $_GET['id_pegawai'];
		
		// proses hapus data via method		
		$pegawai->hapus_pegawai($id_pegawai);

		?>
			<script language="javascript">
				alert("Data berhasil dihapus");
				location = "?page=tampil_pegawai";
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
            <h1>Form Pegawai</h1>
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
                <a href="?page=tambah_pegawai" class="btn btn-success">Tambah Pegawai</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama Pegawai</th>
                    <th>Level Pegawai</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
					<?php
						//Tampilkan semua pegawai
						$arraypegawai=$pegawai->tampil_pegawai();

						if (count($arraypegawai)) {
							foreach($arraypegawai as $data) {
								?>
									<tr>
										<td align="center"><?php echo $a=$a+1; ?>.</td>
										<td><?php echo $data['nama_pegawai']; ?></td>
										<td><?php 
												if($data['level'] == 1){
													echo 'Administrator';
												}
												else{
													echo 'Pengelola';
												}
											?>
										</td>
										<td align="center">
											<a href="?page=update_pegawai&aksi=ubah&id_pegawai=<?php echo $data['id_pegawai']; ?>" title="Ubah"><input type="submit" class="btn btn-warning" value="Ubah"></a>
											<a href="?page=tampil_pegawai&aksi=hapus&id_pegawai=<?php echo $data['id_pegawai']; ?>" onclick="javascript: return confirm('Anda yakin hapus ?')"><input type="submit" class="btn btn-danger" value="Hapus"></a>
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
