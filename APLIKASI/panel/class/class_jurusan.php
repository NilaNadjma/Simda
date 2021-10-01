<?php
	//memanggil file koneksi.php sebanyak satu kali
	require_once 'koneksi.php';
	include_once 'lib.php';

	//inisialisasi class
	$db = new Koneksi;

	//Memanggil fungsi
	$con = $db->connectMySQL();

	//membuat classn mahasiswa
	class Jurusan {
		//membuat fungsi tambah data
		function tambah_jurusan($data_jurusan){
			global $con;

			$id_jurusan = gen_uuid();
			$nama_jurusan = $data_jurusan['nama_jurusan'];

			mysqli_query($con, "insert into tb_jurusan(id_jurusan,nama_jurusan)
						values ('$id_jurusan','$nama_jurusan')");
		}

		//membuat fungsi tampil data
		function tampil_jurusan(){
			global $con;

			$query=mysqli_query($con, "select * from tb_jurusan");
			while($row=mysqli_fetch_array($query))
				$data[] = $row;

				return $data;
		}

		//membuat fungsi hapus data
		function hapus_jurusan($id_jurusan){
			global $con;

			mysqli_query($con, "delete from tb_jurusan where id_jurusan = '$id_jurusan'");
		}

		//membuat preview sebelum proses ubah data
		function preview_jurusan($field,$id_jurusan) {
			global $con;

			$data = mysqli_fetch_array(mysqli_query($con, "select * from tb_jurusan where id_jurusan = '$id_jurusan'"));

			if($field=='id_jurusan') return $data['id_jurusan'];
			else if($field=='nama_jurusan') return $data['nama_jurusan'];
		}

		//membuat fungsi ubahn data
		function update_jurusan($data_jurusan) {
			global $con;
			
			$id_jurusan = $data_jurusan['id_jurusan'];
			$nama_jurusan = $data_jurusan['nama_jurusan'];

			mysqli_query($con, "update tb_jurusan set nama_jurusan='$nama_jurusan' where id_jurusan='$id_jurusan'");
		}
	}
?>