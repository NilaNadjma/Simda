<?php
	//memanggil file koneksi.php sebanyak satu kali
	require_once 'koneksi.php';
	
	include_once 'lib.php';

	//inisialisasi class
	$db = new Koneksi;

	//Memanggil fungsi
	$con = $db->connectMySQL();

	//membuat classn mahasiswa
	class Validasilab {
		//membuat fungsi tambah data
		function tambah_validasilab($data_validasilab){
			global $con;
			
			$id_validasilab = gen_uuid();
			$id_mhs = $data_validasilab['id_mhs'];
			$id_pegawailab = $data_validasilab['id_pegawailab'];
			$validasi_lab = $data_validasilab['validasi_lab'];  
			$tgl_validasilab = $data_validasilab['tgl_validasilab'];

			mysqli_query($con, "insert into tb_validasilab(id_validasilab,id_mhs,id_pegawailab,validasi_lab,tgl_validasilab)
						values ('$id_validasilab','$id_mhs','$id_pegawailab','$validasi_lab','$tgl_validasilab')");
		}

		//membuat fungsi tampil data
		function tampil_validasilab($id_mhs){
			global $con;

			$query=mysqli_query($con, "select * from tb_validasilab where id_mhs = '$id_mhs'");
			while($row=mysqli_fetch_array($query))
				$data[] = $row;

				return $data;
		}

		//membuat fungsi hapus data no
		function hapus_validasilab($id_validasilab){
			global $con;

			mysqli_query($con, "delete from tb_validasilab where id_validasilab = '$id_validasiva'");
		}

		//membuat preview sebelum proses ubah data no
		function preview_validasilab($field,$id_validasilab) {
			$data = mysqli_fetch_array(mysqli_query($con, "select * from tambah_validasilab where id_validasilab = '$id_validasilablablab'"));

			if($field=='id_validasilablab') return $data['id_validasilab'];
			else if($field=='id_mhs') return $data['id_mhs'];
			else if($field=='id_pegawailablab') return $data['id_pegawailab'];
		}

		//membuat fungsi ubahn data no
		function ubah_validasilablab($data_validasilab) {
			$id_validasilab = $data_validasilab['id_validasilab'];
			$id_mhs = $data_validasilab['id_mhs'];
			$id_pegawailab = $data_validasilab['id_pegawailab'];
			$id_validasilab = $data_validasilab['id_validasilab'];  
			$tgl_validasilab = $data_validasilab['tgl_validasilab']; 
	
			mysqli_query($con, "update tambah_validasilab set id_mhs='$id_mhs', id_pegawailab='$id_pegawailab', id_validasilab='$id_validasilab', tgl_validasilab='$tgl_validasilab'");
		}
	}
?>