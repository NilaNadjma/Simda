<?php
	//memanggil file koneksi.php sebanyak satu kali
	require_once 'koneksi.php';

	//inisialisasi class
	$db = new Koneksi;

	//Memanggil fungsi
	$con = $db->connectMySQL();

	//membuat classn mahasiswa
	class validasibahasa {
		//membuat fungsi tambah data
		function tambah_validasibahasa($data_validasibahasa){
			global $con;

			$id_validasibahasa = $data_validasibahasa['id_validasibahasa'];
			$id_mhs = $data_validasibahasa['id_mhs'];
			$id_pegawaibahasa = $data_validasibahasa['id_pegawaibahasa'];
			$id_validasibahasa = $data_validasibahasa['id_validasibahasa'];  
			$tgl_validasibahasa = $data_validasibahasa['tgl_validasibahasa'];

			mysqli_query($con, "insert into tambah_validasibahasa(id_validasibahasa,id_mhs,id_pegawaibahasa,id_validasibahasa,tgl_validasibahasa)
						values ('$id_validasibahasa','$id_mhs','$id_pegawaibahasa','$id_validasibahasa','$tgl_validasibahasa')");
		}

		//membuat fungsi tampil data
		function tampil_validasibahasa(){
			global $con;

			$query=mysqli_query($con, "select * from tambah_validasibahasa");
			while($row=mysqli_fetch_array($query))
				$data[] = $row;

				return $data;
		}

		//membuat fungsi hapus data
		function hapus_validasibahasa($id_validasibahasa){
			global $con;

			mysqli_query($con, "delete from tambah_validasibahasa where id_validasibahasa = '$id_validasibahasa'");
		}

		//membuat preview sebelum proses ubah data
		function preview_validasibahasa($field,$id_validasibahasa) {
			$data = mysqli_fetch_array(mysqli_query($con, "select * from tambah_validasibahasa where id_validasibahasa = '$id_validasibahasa'"));

			if($field=='id_validasibahasa') return $data['id_validasibahasa'];
			else if($field=='id_mhs') return $data['id_mhs'];
			else if($field=='id_pegawaibahasa') return $data['id_pegawaibahasa'];
		}

		//membuat fungsi ubahn data
		function ubah_validasibahasa($data_validasibahasa) {
			$id_validasibahasa = $data_validasibahasa['id_validasibahasa'];
			$id_mhs = $data_validasibahasa['id_mhs'];
			$id_pegawaibahasa = $data_validasibahasa['id_pegawaibahasa'];
			$id_validasibahasa = $data_validasibahasa['id_validasibahasa'];  
			$tgl_validasibahasa = $data_validasibahasa['tgl_validasibahasa']; 
	
			mysqli_query($con, "update tambah_validasibahasa set id_mhs='$id_mhs', id_pegawaibahasa='$id_pegawaibahasa', id_validasibahasa='$id_validasibahasa', tgl_validasibahasa='$tgl_validasibahasa'");
		}
	}
?>