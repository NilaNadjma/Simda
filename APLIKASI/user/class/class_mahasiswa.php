<?php
	//memanggil file koneksi.php sebanyak satu kali
	require_once 'koneksi.php';
	include_once 'lib.php';

	//inisialisasi class
	$db = new Koneksi;

	//Memanggil fungsi
	$con = $db->connectMySQL();

	//membuat classn mahasiswa
	class Mahasiswa {
		//membuat fungsi tampil data
		function tampil_mahasiswa($id_mhs){
			global $con;

			$query=mysqli_query($con, "SELECT a.*,b.*
										FROM tb_mahasiswa a,tb_prodi b 
										WHERE a.id_prodi=b.id_prodi
										AND a.id_mhs='$id_mhs'");
			while($row=mysqli_fetch_array($query))
				$data[] = $row;

				return $data;
		}
	}
?>