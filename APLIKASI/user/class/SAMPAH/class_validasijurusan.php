<?php
	//memanggil file koneksi.php sebanyak satu kali
	require_once 'koneksi.php';

	//inisialisasi class
	$db = new Koneksi;

	//Memanggil fungsi
	$con = $db->connectMySQL();

	//membuat classn mahasiswa
	class validasijurusan {
		//membuat fungsi tambah data
		function tambah_validasijurusan($data_validasijurusan){
			global $con;

			$id_validasijurusan = $data_validasijurusan['id_validasijurusan'];
			$id_mhs = $data_validasijurusan['id_mhs'];
			$id_pegawaijurusan = $data_validasijurusan['id_pegawaijurusan'];
			$id_validasijurusan = $data_validasijurusan['id_validasijurusan'];  
			$tgl_validasijurusan = $data_validasijurusan['tgl_validasijurusan'];

			mysqli_query($con, "insert into tambah_validasijurusan(id_validasijurusan,id_mhs,id_pegawaijurusan,id_validasijurusan,tgl_validasijurusan)
						values ('$id_validasijurusan','$id_mhs','$id_pegawaijurusan','$id_validasijurusan','$tgl_validasijurusan')");
		}

		//membuat fungsi tampil data
		function tampil_validasijurusan(){
			global $con;

			$query=mysqli_query($con, "select * from tambah_validasijurusan");
			while($row=mysqli_fetch_array($query))
				$data[] = $row;

				return $data;
		}

		//membuat fungsi hapus data
		function hapus_validasijurusan($id_validasijurusan){
			global $con;

			mysqli_query($con, "delete from tambah_validasijurusan where id_validasijurusan = '$id_validasiva'");
		}

		//membuat preview sebelum proses ubah data
		function preview_validasijurusan($field,$id_validasijurusan) {
			$data = mysqli_fetch_array(mysqli_query($con, "select * from tambah_validasijurusan where id_validasijurusan = '$id_validasijurusan'"));

			if($field=='id_validasijurusan') return $data['id_validasijurusan'];
			else if($field=='id_mhs') return $data['id_mhs'];
			else if($field=='id_pegawaijurusan') return $data['id_pegawaijurusan'];
		}

		//membuat fungsi ubahn data
		function ubah_validasijurusan($data_validasijurusan) {
			$id_validasijurusan = $data_validasijurusan['id_validasijurusan'];
			$id_mhs = $data_validasijurusan['id_mhs'];
			$id_pegawaijurusan = $data_validasijurusan['id_pegawaijurusan'];
			$id_validasijurusan = $data_validasijurusan['id_validasijurusan'];  
			$tgl_validasijurusan = $data_validasijurusan['tgl_validasijurusan']; 
	
			mysqli_query($con, "update tambah_validasijurusan set id_mhs='$id_mhs', id_pegawaijurusan='$id_pegawaijurusan', id_validasijurusan='$id_validasijurusan', tgl_validasijurusan='$tgl_validasijurusan'");
		}
	}
?>