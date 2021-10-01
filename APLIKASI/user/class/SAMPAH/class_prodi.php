<?php
	//memanggil file koneksi.php sebanyak satu kali
	require_once 'koneksi.php';
	include_once 'lib.php';

	//inisialisasi class
	$db = new Koneksi;

	//Memanggil fungsi
	$con = $db->connectMySQL();

	//membuat classn prodi
	class Prodi {
		//membuat fungsi tambah data
		function tambah_prodi($data_prodi){
			global $con;

			$id_prodi = gen_uuid();
			$id_jurusan = $data_prodi['id_jurusan']; 
			$nama_prodi = $data_prodi['nama_prodi'];
			
			mysqli_query($con, "insert into tb_prodi(id_prodi,id_jurusan,nama_prodi)
						values ('$id_prodi','$id_jurusan','$nama_prodi')");
		}

		//membuat fungsi tampil data
		function tampil_prodi(){
			global $con;

			$query=mysqli_query($con, "select a.*, b.* from tb_prodi a, tb_jurusan b where a.id_jurusan=b.id_jurusan");
			while($row=mysqli_fetch_array($query))
				$data[] = $row;

				return $data;
		}

		//membuat fungsi hapus data
		function hapus_prodi($id_prodi){
			global $con;

			mysqli_query($con, "delete from tb_prodi where id_prodi = '$id_prodi'");
		}

		//membuat preview sebelum proses ubah data
		function preview_prodi($field,$id_prodi) {
			global $con;
			
			$data = mysqli_fetch_array(mysqli_query($con, "select a.*, b.* 
															from tb_prodi a, tb_jurusan b
															where a.id_jurusan=b.id_jurusan
															and a.id_prodi = '$id_prodi'"));

			if($field=='id_prodi') return $data['id_prodi'];
			else if($field=='id_jurusan') return $data['id_jurusan'];
			else if($field=='nama_prodi') return $data['nama_prodi'];
			else if($field=='nama_jurusan') return $data['nama_jurusan'];
		}

		//membuat fungsi ubahn data
		function update_prodi($data_prodi) {
			global $con;
			
			$id_prodi = $data_prodi['id_prodi'];
			$id_jurusan = $data_prodi['id_jurusan']; 
			$nama_prodi = $data_prodi['nama_prodi']; 
	
			mysqli_query($con, "update tb_prodi set id_jurusan='$id_jurusan', nama_prodi='$nama_prodi' where id_prodi='$id_prodi'");
		}
	}
?>