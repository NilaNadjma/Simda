<?php
	//Memanggil class mahasiswa
	include_once 'class/class_mahasiswa.php';
	include_once 'class/class_validasilab.php';
	include_once 'class/class_validasijurusan.php';
	include_once 'class/class_validasibahasa.php';
	include_once 'class/class_validasiperpus.php';
	include_once 'class/class_validasikeuangan.php';
	include_once 'class/lib.php';
	
	//Inisialisasi baru
	$mahasiswa = new Mahasiswa();
	$validasilab = new Validasilab();
	$validasijurusan = new Validasijurusan();
	$validasibahasa = new Validasibahasa();
	$validasiperpus = new Validasiperpus();
	$validasikeuangan = new Validasikeuangan();
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
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>NIM</th>
                    <th>Nama Mahasiswa</th>
                    <th>Jenis Kelamin</th>
                    <th>Tahun Masuk</th>
                    <th>Tahun Keluar</th>
                    <th>Nama Prodi</th>
                    <th>Val. Laborat</th>
                    <th>Val. Jurusan</th>
                    <th>Val. Perpus</th>
                    <th>Val. Bahasa</th>
                    <th>Val. Keuangan</th>
                  </thead>
                  <tbody>
					<?php
						//Tampilkan semua mahasiswa
						$arraymahasiswa=$mahasiswa->tampil_mahasiswa();

						if (count($arraymahasiswa)) {
							foreach($arraymahasiswa as $data) {
								$id_mhs = $data['id_mhs'];
								
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
										<td><?php echo $data['thn_masuk']; ?></td>
										<td><?php echo $data['thn_keluar']; ?></td>
										<td><?php echo $data['nama_prodi']; ?></td>
										<td>
											<?php
												$arrayvlab=$validasilab->tampil_validasilab($id_mhs);
												
												foreach($arrayvlab as $data_lab) {
													echo tgl_eng_to_ind2($data_lab['tgl_validasilab']); 
												}
											?>
										</td>
										<td>
											<?php
												$arrayvjurusan=$validasijurusan->tampil_validasijurusan($id_mhs);	
												
												foreach($arrayvjurusan as $data_jurusan) {
													echo tgl_eng_to_ind2($data_jurusan['tgl_validasijurusan']); 
												}
											?>
										</td>
										<td>
											<?php
												$arrayvbahasa=$validasibahasa->tampil_validasibahasa($id_mhs);			
												
												foreach($arrayvbahasa as $data_bahasa) {
													echo tgl_eng_to_ind2($data_bahasa['tgl_validasibahasa']); 
												}
											?>
										</td>
										<td>
											<?php
												$arrayvperpus=$validasiperpus->tampil_validasiperpus($id_mhs);			
												
												foreach($arrayvperpus as $data_perpus) {
													echo tgl_eng_to_ind2($data_perpus['tgl_validasiperpus']); 
												}
											?>
										</td>
										<td>
											<?php
												$arrayvkeuangan=$validasikeuangan->tampil_validasikeuangan($id_mhs);		
												
												foreach($arrayvkeuangan as $data_keuangan) {
													echo tgl_eng_to_ind2($data_keuangan['tgl_validasikeuangan']); 
												}
											?>
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
