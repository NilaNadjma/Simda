<?php
	//memanggil file koneksi.php sebanyak satu kali
	require_once 'koneksi.php';
	
	include_once 'lib.php';

	//inisialisasi class
	$db = new Koneksi;

	//Memanggil fungsi
	$con = $db->connectMySQL();

	//membuat classn mahasiswa
	class Validasiperpus {
		//membuat fungsi tambah data
		function tambah_validasiperpus($data_validasiperpus){
			global $con;

			$id_validasiperpus = gen_uuid();
			$id_mhs = $data_validasiperpus['id_mhs'];
			$id_pegawaiperpus = $data_validasiperpus['id_pegawaiperpus'];
			$validasi_perpus = $data_validasiperpus['validasi_perpus'];  
			$tgl_validasiperpus = $data_validasiperpus['tgl_validasiperpus'];

			mysqli_query($con, "insert into tb_validasiperpus(id_validasiperpus,id_mhs,id_pegawaiperpus,validasi_perpus,tgl_validasiperpus)
						values ('$id_validasiperpus','$id_mhs','$id_pegawaiperpus','$validasi_perpus','$tgl_validasiperpus')");
		}

		//membuat fungsi tampil data
		function tampil_validasiperpus($id_mhs){
			global $con;

			$query=mysqli_query($con, "select * from tb_validasiperpus where id_mhs = '$id_mhs'");
			while($row=mysqli_fetch_array($query))
				$data[] = $row;

				return $data;
		}

		//membuat fungsi hapus data no
		function hapus_validasiperpus($id_validasiperpus){
			global $con;

			mysqli_query($con, "delete from tambah_validasiperpus where id_validasiperpus = '$id_validasiva'");
		}

		//membuat preview sebelum proses ubah data no
		function preview_validasiperpus($field,$id_validasiperpus) {
			$data = mysqli_fetch_array(mysqli_query($con, "select * from tambah_validasiperpus where id_validasiperpus = '$id_validasiperpus'"));

			if($field=='id_validasiperpus') return $data['id_validasiperpus'];
			else if($field=='id_mhs') return $data['id_mhs'];
			else if($field=='id_pegawaiperpus') return $data['id_pegawaiperpus'];
		}

		//membuat fungsi ubahn data no
		function ubah_validasiperpus($data_validasiperpus) {
			$id_validasiperpus = $data_validasiperpus['id_validasiperpus'];
			$id_mhs = $data_validasiperpus['id_mhs'];
			$id_pegawaiperpus = $data_validasiperpus['id_pegawaiperpus'];
			$id_validasiperpus = $data_validasiperpus['id_validasiperpus'];  
			$tgl_validasiperpus = $data_validasiperpus['tgl_validasiperpus']; 
	
			mysqli_query($con, "update tambah_validasiperpus set id_mhs='$id_mhs', id_pegawaiperpus='$id_pegawaiperpus', id_validasiperpus='$id_validasiperpus', tgl_validasiperpus='$tgl_validasiperpus'");
		}
	}
?>