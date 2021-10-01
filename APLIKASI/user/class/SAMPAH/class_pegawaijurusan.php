<?php
	//memanggil file koneksi.php sebanyak satu kali
	require_once 'koneksi.php';
	include_once 'lib.php';

	//inisialisasi class
	$db = new Koneksi;

	//Memanggil fungsi
	$con = $db->connectMySQL();

	//membuat classn mahasiswa
	class Pegawaijurusan {
		//membuat fungsi tambah data
		function tambah_pegawaijurusan($data_pegawaijurusan){
			global $con;

			$id_pegawaijurusan = gen_uuid();
			$id_pegawai = $data_pegawaijurusan['id_pegawai'];  
			
			mysqli_query($con, "insert into tb_pegawaijurusan(id_pegawaijurusan,id_pegawai)
						values ('$id_pegawaijurusan','$id_pegawai')");
		}

		//membuat fungsi tampil data
		function tampil_pegawaijurusan(){
			global $con;

			$query=mysqli_query($con, "select pb.*, pg.*
										from tb_pegawaijurusan pb, tb_pegawai pg
										where pb.id_pegawai=pg.id_pegawai");
			while($row=mysqli_fetch_array($query))
				$data[] = $row;

				return $data;
		}

		//membuat fungsi hapus data
		function hapus_pegawaijurusan($id_pegawaijurusan){
			global $con;

			mysqli_query($con, "delete from tb_pegawaijurusan where id_pegawaijurusan = '$id_pegawaijurusan'");
		}

		//membuat preview sebelum proses ubah data
		function preview_pegawaijurusan($field,$id_pegawaijurusan) {
			global $con;

			$data = mysqli_fetch_array(mysqli_query($con, "select pb.*, pg.*
															from tb_pegawaijurusan pb, tb_pegawai pg
															where pb.id_pegawai=pg.id_pegawai
															and pb.id_pegawaijurusan = '$id_pegawaijurusan'"));

			if($field=='id_pegawaijurusan') return $data['id_pegawaijurusan'];
			else if($field=='id_pegawai') return $data['id_pegawai'];
			else if($field=='nama_pegawai') return $data['nama_pegawai'];
		}

		//membuat fungsi ubah data
		function update_pegawaijurusan($data_pegawaijurusan) {
			global $con;

			$id_pegawaijurusan = $data_pegawaijurusan['id_pegawaijurusan'];
			$id_pegawai = $data_pegawaijurusan['id_pegawai'];
	
			mysqli_query($con, "update tb_pegawaijurusan set id_pegawai='$id_pegawai'where id_pegawaijurusan='$id_pegawaijurusan'");
		}
	}
?>