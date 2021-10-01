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
            <h1>Form Validasi</h1>
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
					<th>Validasi</th>
                  </tr>
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
										<td><?php echo $data['alamat']; ?></td>
										<td><?php echo $data['email']; ?></td>
										<td><?php echo $data['thn_masuk']; ?></td>
										<td><?php echo $data['thn_keluar']; ?></td>
										<td><?php echo $data['nama_prodi']; ?></td>
										<?php
											$arrayvlab=$validasilab->tampil_validasilab($id_mhs);
											$jml_vlab=count($arrayvlab);
											
											$arrayvjurusan=$validasijurusan->tampil_validasijurusan($id_mhs);												
											$jml_vjurusan=count($arrayvjurusan);
											
											$arrayvbahasa=$validasibahasa->tampil_validasibahasa($id_mhs);												
											$jml_vbahasa=count($arrayvbahasa);
											
											$arrayvperpus=$validasiperpus->tampil_validasiperpus($id_mhs);												
											$jml_vperpus=count($arrayvperpus);
											
											$arrayvkeuangan=$validasikeuangan->tampil_validasikeuangan($id_mhs);												
											$jml_vkeuangan=count($arrayvkeuangan);
											
											if($plevel == 'lab'){	
												if($jml_vlab == 1){
													foreach($arrayvlab as $data_lab) {
														?>
															<td align="center">
																<span class="badge badge-success">Validasi Laborat/ <?php echo tgl_eng_to_ind2($data_lab['tgl_validasilab']); ?></span>
															</td>
														<?php
													}
												}
												else{
													?>
														<td align="center">
															<form method="post" action="?page=tampil_vlab&id_mhs=<?php echo $data['id_mhs']; ?>">
																<input type="submit" class="btn btn-warning" name="vlab" onclick="javascript: return confirm('Anda yakin melakukan validasi pada mahasiswa ini ?')" value="Validasi Laborat ?">
															</form>
														</td>
													<?php
												}													
											}
											else if($plevel == 'jurusan'){	
												if($jml_vjurusan == 1){
													foreach($arrayvjurusan as $data_jurusan) {
														?>
															<td align="center">
																<span class="badge badge-success">Validasi Jurusan/ <?php echo tgl_eng_to_ind2($data_jurusan['tgl_validasijurusan']); ?></span>
															</td>
														<?php
													}
												}
												else{
													if($jml_vlab == 0){
														?>
															<td align="center">
																<span class="badge badge-success">Belum Validasi Laborat</span>
															</td>
														<?php
													}
													else{
														?>
															<td align="center">
																<form method="post" action="?page=tampil_vlab&id_mhs=<?php echo $data['id_mhs']; ?>">
																	<input type="submit" class="btn btn-warning" name="vjurusan" onclick="javascript: return confirm('Anda yakin melakukan validasi pada mahasiswa ini ?')" value="Validasi Jurusan?">
																</form>
															</td>
														<?php
													}
												}												
											}
											else if($plevel == 'bahasa'){
												if($jml_vbahasa == 1){
													foreach($arrayvbahasa as $data_bahasa) {
														?>
															<td align="center">
																<span class="badge badge-success">Validasi Bahasa/ <?php echo tgl_eng_to_ind2($data_bahasa['tgl_validasibahasa']); ?></span>
															</td>
														<?php
													}
												}
												else{
													if($jml_vjurusan == 0){
														?>
															<td align="center">
																<span class="badge badge-success">Belum Validasi Jurusan</span>
															</td>
														<?php
													}
													else{
														?>
															<td align="center">
																<form method="post" action="?page=tampil_vlab&id_mhs=<?php echo $data['id_mhs']; ?>">
																	<input type="submit" class="btn btn-warning" name="vbahasa" onclick="javascript: return confirm('Anda yakin melakukan validasi pada mahasiswa ini ?')" value="Validasi Bahasa?">
																</form>
															</td>
														<?php
													}
												}
											}
											else if($plevel == 'perpus'){
												if($jml_vperpus == 1){
													foreach($arrayvperpus as $data_perpus) {
														?>
															<td align="center">
																<span class="badge badge-success">Validasi Perpus/ <?php echo tgl_eng_to_ind2($data_perpus['tgl_validasiperpus']); ?></span>
															</td>
														<?php
													}
												}
												else{
													if($jml_vbahasa == 0){
														?>
															<td align="center">
																<span class="badge badge-success">Belum Validasi Bahasa</span>
															</td>
														<?php
													}
													else{
														?>
															<td align="center">
																<form method="post" action="?page=tampil_vlab&id_mhs=<?php echo $data['id_mhs']; ?>">
																	<input type="submit" class="btn btn-warning" name="vperpus" onclick="javascript: return confirm('Anda yakin melakukan validasi pada mahasiswa ini ?')" value="Validasi Perpus?">
																</form>
															</td>
														<?php
													}
												}
											}
											else if($plevel == 'keuangan'){
												if($jml_vkeuangan == 1){
													foreach($arrayvkeuangan as $data_keuangan) {
														?>
															<td align="center">
																<span class="badge badge-success">Validasi Keuangan/ <?php echo tgl_eng_to_ind2($data_keuangan['tgl_validasikeuangan']); ?></span>
															</td>
														<?php
													}
												}
												else{
													if($jml_vperpus == 0){
														?>
															<td align="center">
																<span class="badge badge-success">Belum Validasi Perpus</span>
															</td>
														<?php
													}
													else{
														?>
															<td align="center">
																<form method="post" action="?page=tampil_vlab&id_mhs=<?php echo $data['id_mhs']; ?>">
																	<input type="submit" class="btn btn-warning" name="vkeuangan" onclick="javascript: return confirm('Anda yakin melakukan validasi pada mahasiswa ini ?')" value="Validasi Keuangan?">
																</form>
															</td>
														<?php
													}
												}
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

<?php
	date_default_timezone_set('Asia/Jakarta');
	$tgl_sekarang=date('Y-m-d H:i:s');
	
	if($_POST['vlab'])
	{
		//tambah data validasi lab
		$data_validasilab['id_mhs'] = $_GET['id_mhs'];
		$data_validasilab['id_pegawailab'] = $id_pegawailab;
		$data_validasilab['validasi_lab'] = '1';
		$data_validasilab['tgl_validasilab'] = $tgl_sekarang;
		
		$validasilab->tambah_validasilab($data_validasilab);
				
		?>
			<script language="javascript">
				alert("Data berhasil disimpan");
				location = "?page=tampil_vlab";
			</script>
		<?php
	}
	else if($_POST['vjurusan'])
	{
		//tambah data validasi jurusan
		$data_validasijurusan['id_mhs'] = $_GET['id_mhs'];
		$data_validasijurusan['id_pegawaijurusan'] = $id_pegawaijurusan;
		$data_validasijurusan['validasi_jurusan'] = '1';
		$data_validasijurusan['tgl_validasijurusan'] = $tgl_sekarang;
		
		$validasijurusan->tambah_validasijurusan($data_validasijurusan);
				
		?>
			<script language="javascript">
				alert("Data berhasil disimpan");
				location = "?page=tampil_vlab";
			</script>
		<?php
	}
	else if($_POST['vbahasa'])
	{
		//tambah data validasi bahasa
		$data_validasibahasa['id_mhs'] = $_GET['id_mhs'];
		$data_validasibahasa['id_pegawaibahasa'] = $id_pegawaibahasa;
		$data_validasibahasa['validasi_bahasa'] = '1';
		$data_validasibahasa['tgl_validasibahasa'] = $tgl_sekarang;
		
		$validasibahasa->tambah_validasibahasa($data_validasibahasa);
				
		?>
			<script language="javascript">
				alert("Data berhasil disimpan");
				location = "?page=tampil_vlab";
			</script>
		<?php
	}
	else if($_POST['vperpus'])
	{
		//tambah data validasi perpus
		$data_validasiperpus['id_mhs'] = $_GET['id_mhs'];
		$data_validasiperpus['id_pegawaiperpus'] = $id_pegawaiperpus;
		$data_validasiperpus['validasi_perpus'] = '1';
		$data_validasiperpus['tgl_validasiperpus'] = $tgl_sekarang;
		
		$validasiperpus->tambah_validasiperpus($data_validasiperpus);
				
		?>
			<script language="javascript">
				alert("Data berhasil disimpan");
				location = "?page=tampil_vlab";
			</script>
		<?php
	}
	else if($_POST['vkeuangan'])
	{
		//tambah data validasi perpus
		$data_validasikeuangan['id_mhs'] = $_GET['id_mhs'];
		$data_validasikeuangan['id_pegawaikeuangan'] = $id_pegawaikeuangan;
		$data_validasikeuangan['validasi_keuangan'] = '1';
		$data_validasikeuangan['tgl_validasikeuangan'] = $tgl_sekarang;
		
		$validasikeuangan->tambah_validasikeuangan($data_validasikeuangan);
				
		?>
			<script language="javascript">
				alert("Data berhasil disimpan");
				location = "?page=tampil_vlab";
			</script>
		<?php
	}
?>