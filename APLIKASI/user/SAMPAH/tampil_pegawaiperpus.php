<?php
  //Memanggil class prodi
  include_once 'class/class_pegawaiperpus.php';
  
  //Inisialisasi baru
  $pegawaiperpus = new Pegawaiperpus();
  
  if ($_GET['aksi'] == 'hapus')
  { 
    $id_pegawaiperpus = $_GET['id_pegawaiperpus'];
    
    // proses hapus data via method   
    $pegawaiperpus->hapus_pegawaiperpus($id_pegawaiperpus);

    ?>
      <script language="javascript">
        alert("Data berhasil dihapus");
        location = "?page=tampil_pegawaiperpus";
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
            <h1>Form Pegawai perpus</h1>
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
                <a href="?page=tambah_pegawaiperpus" class="btn btn-success">Tambah Pegawai perpus</a>
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
            $arraypegawaiperpus=$pegawaiperpus->tampil_pegawaiperpus();

            if (count($arraypegawaiperpus)) {
              foreach($arraypegawaiperpus as $data) {
                ?>
                  <tr>
                    <td align="center"><?php echo $a=$a+1; ?>.</td>
                    <td><?php echo $data['nama_pegawai']; ?></td>
                    <td align="center">
                      <a href="?page=update_pegawaiperpus&aksi=ubah&id_pegawaiperpus=<?php echo $data['id_pegawaiperpus']; ?>" title="Ubah"><input type="submit" class="btn btn-warning" value="Ubah"></a>
                      <a href="?page=tampil_pegawaiperpus&aksi=hapus&id_pegawaiperpus=<?php echo $data['id_pegawaiperpus']; ?>" onclick="javascript: return confirm('Anda yakin hapus ?')"><input type="submit" class="btn btn-danger" value="Hapus"></a>
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
