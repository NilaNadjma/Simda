<?php
	//memanggil file koneksi.php sebanyak satu kali
	require_once 'koneksi.php';

	//inisialisasi class
	$db = new Koneksi;

	//Memanggil fungsi
	$con = $db->connectMySQL();

	//membuat classn mahasiswa
	class validasilab {
		//membuat fungsi tambah data
		function tambah_validasilab($data_validasilab){
			global $con;

			$id_validasilab = $data_validasilab['id_validasilab'];
			$id_mhs = $data_validasiv['id_mhs'];
			$id_pegawailab = $data_validasilab['id_pegawailab'];
			$id_validasilab = $data_validasilab['id_validasilab'];  
			$tgl_validasilab = $data_validasilab['tgl_validasilab'];

			mysqli_query($con, "insert into tambah_validasilab(id_validasilab,id_mhs,id_pegawailab,id_validasilab,tgl_validasilab)
						values ('$id_validasilab','$id_mhs','$id_pegawailab','$id_validasilab','$tgl_validasilab')");
		}

		//membuat fungsi tampil data
		function tampil_validasilab(){
			global $con;

			$query=mysqli_query($con, "select * from tambah_validasilab");
			while($row=mysqli_fetch_array($query))
				$data[] = $row;

				return $data;
		}

		//membuat fungsi hapus data
		function hapus_validasilab($id_validasilab){
			global $con;

			mysqli_query($con, "delete from tambah_validasilab where id_validasilab = '$id_validasiva'");
		}

		//membuat preview sebelum proses ubah data
		function preview_validasilab($field,$id_validasilab) {
			$data = mysqli_fetch_array(mysqli_query($con, "select * from tambah_validasilab where id_validasilab = '$id_validasilablablab'"));

			if($field=='id_validasilablab') return $data['id_validasilab'];
			else if($field=='id_mhs') return $data['id_mhs'];
			else if($field=='id_pegawailablab') return $data['id_pegawailab'];
		}

		//membuat fungsi ubahn data
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