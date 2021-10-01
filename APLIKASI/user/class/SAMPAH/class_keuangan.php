<?php
	//memanggil file koneksi.php sebanyak satu kali
	require_once 'koneksi.php';

	//inisialisasi class
	$db = new Koneksi;

	//Memanggil fungsi
	$con = $db->connectMySQL();

	//membuat classn mahasiswa
	class pegawaikeuangan {
		//membuat fungsi tambah data
		function tambah_pegawaikeuangan($data_pegawaikeuangan){
			global $con;

			$id_pegawaikeuangan = $data_pegawaikeuangan['id_pegawaikeuangan'];
			$id_pegawai = $data_pegawaikeuangan['id_pegawai'];  
			
			mysqli_query($con, "insert into tb_pegawaikeuangan(id_pegawaikeuangan,id_pegawai)
						values ('$id_pegawaikeuangan','$id_pegawai')");
		}

		//membuat fungsi tampil data
		function tampil_pegawaikeuangan(){
			global $con;

			$squery=mysqli_query($con, "select * from tb_pegawaikeuangan");
			while($row=mysqli_fetch_array($query))
				$data[] = $row;

				return $data;
		}

		//membuat fungsi hapus data
		function hapus_pegawaikeuangan($id_pegawaikeuangan){
			global $con;

			mysqli_query($con, "delete from tb_pegawaikeuangan where id_pegawaikeuangan = '$id_pegawaikeuangan'");
		}

		//membuat preview sebelum proses ubah data
		function preview_pegawaikeuangan($field,$id_pegawaikeuangan) {
			$data = mysqli_fetch_array(mysqli_query($con, "select * from tb_pegawaikeuangan where id_pegawaikeuangan = '$id_pegawaikeuangan'"));

			if($field=='id_pegawaikeuangan')b return $data['id_pegawaikeuangan'];
			else if($field=='id_pegawai') return $data['id_pegawai'];
		}

		//membuat fungsi ubahn data
		function ubah_mahasiswa($data_mahasiwa) {
			$id_pegawaikeuangan = $data_pegawaikeuangan['id_pegawaikeuangan'];
			$id_pegawai = $data_pegawaikeuangan['id_pegawai'];  
	
			mysqli_query($con, "update tb_pegawaikeuangan set id_pegawaikeuangan='$id_pegawaikeuangan', id_pegawai='$id_pegawai'");
		}
	}
?>