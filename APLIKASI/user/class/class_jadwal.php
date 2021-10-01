<?php
	//memanggil file koneksi.php sebanyak satu kali
	require_once 'koneksi.php';
	include_once 'lib.php';

	//inisialisasi class
	$db = new Koneksi;

	//Memanggil fungsi
	$con = $db->connectMySQL();

	//membuat classn mahasiswa
	class Jadwal {
		//membuat fungsi tampil data
		function tampil_jadwal(){
			global $con;

			$query=mysqli_query($con, "select * from tb_jadwal");
			while($row=mysqli_fetch_array($query))
				$data[] = $row;

				return $data;
		}
	}
?>