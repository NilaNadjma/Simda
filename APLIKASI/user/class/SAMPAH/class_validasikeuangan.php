<?php
	//memanggil file koneksi.php sebanyak satu kali
	require_once 'koneksi.php';

	//inisialisasi class
	$db = new Koneksi;

	//Memanggil fungsi
	$con = $db->connectMySQL();

	//membuat classn mahasiswa
	class validasikeuangan {
		//membuat fungsi tambah data
		function tambah_validasikeuangan($data_validasikeuangan){
			global $con;

			$id_validasikeuangan = $data_validasikeuangan['id_validasikeuangan'];
			$id_mhs = $data_validasikeuangan['id_mhs'];
			$id_pegawaikeuangan = $data_validasikeuangan['id_pegawaikeuangan'];
			$id_validasikeuangan = $data_validasikeuangan['id_validasikeuangan'];  
			$tgl_validasikeuangan = $data_validasikeuangan['tgl_validasikeuangan'];

			mysqli_query($con, "insert into tambah_validasikeuangan(id_validasikeuangan,id_mhs,id_pegawaikeuangan,id_validasikeuangan,tgl_validasikeuangan)
						values ('$id_validasikeuangan','$id_mhs','$id_pegawaikeuangan','$id_validasikeuangan','$tgl_validasikeuangan')");
		}

		//membuat fungsi tampil data
		function tampil_validasikeuangan(){
			global $con;

			$query=mysqli_query($con, "select * from tambah_validasikeuangan");
			while($row=mysqli_fetch_array($query))
				$data[] = $row;

				return $data;
		}

		//membuat fungsi hapus data
		function hapus_validasikeuangan($id_validasikeuangan){
			global $con;

			mysqli_query($con, "delete from tambah_validasikeuangan where id_validasikeuangan = '$id_validasiva'");
		}

		//membuat preview sebelum proses ubah data
		function preview_validasikeuangan($field,$id_validasikeuangan) {
			$data = mysqli_fetch_array(mysqli_query($con, "select * from tambah_validasikeuangan where id_validasikeuangan = '$id_validasikeuangan'"));

			if($field=='id_validasikeuangan') return $data['id_validasikeuangan'];
			else if($field=='id_mhs') return $data['id_mhs'];
			else if($field=='id_pegawaikeuangan') return $data['id_pegawaikeuangan'];
		}

		//membuat fungsi ubahn data
		function ubah_validasikeuangan($data_validasikeuangan) {
			$id_validasikeuangan = $data_validasikeuangan['id_validasikeuangan'];
			$id_mhs = $data_validasikeuangan['id_mhs'];
			$id_pegawaikeuangan = $data_validasikeuangan['id_pegawaikeuangan'];
			$id_validasikeuangan = $data_validasikeuangan['id_validasikeuangan'];  
			$tgl_validasikeuangan = $data_validasikeuangan['tgl_validasikeuangan']; 
	
			mysqli_query($con, "update tambah_validasikeuangan set id_mhs='$id_mhs', id_pegawaikeuangan='$id_pegawaikeuangan', id_validasikeuangan='$id_validasikeuangan', tgl_validasikeuangan='$tgl_validasikeuangan'");
		}
	}
?>