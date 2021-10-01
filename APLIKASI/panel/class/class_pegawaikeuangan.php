<?php
	//memanggil file koneksi.php sebanyak satu kali
	require_once 'koneksi.php';
	include_once 'lib.php';

	//inisialisasi class
	$db = new Koneksi;

	//Memanggil fungsi
	$con = $db->connectMySQL();

	//membuat classn mahasiswa
	class Pegawaikeuangan {
		//membuat fungsi tambah data
		function tambah_pegawaikeuangan($data_pegawaikeuangan){
			global $con;

			$id_pegawaikeuangan = gen_uuid();
			$id_pegawai = $data_pegawaikeuangan['id_pegawai'];  
			
			mysqli_query($con, "insert into tb_pegawaikeuangan(id_pegawaikeuangan,id_pegawai)
						values ('$id_pegawaikeuangan','$id_pegawai')");
		}

		//membuat fungsi tampil data
		function tampil_pegawaikeuangan(){
			global $con;

			$query=mysqli_query($con, "select pb.*, pg.*
										from tb_pegawaikeuangan pb, tb_pegawai pg
										where pb.id_pegawai=pg.id_pegawai");
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
			global $con;

			$data = mysqli_fetch_array(mysqli_query($con, "select pb.*, pg.*
															from tb_pegawaikeuangan pb, tb_pegawai pg
															where pb.id_pegawai=pg.id_pegawai
															and pb.id_pegawaikeuangan = '$id_pegawaikeuangan'"));

			if($field=='id_pegawaikeuangan') return $data['id_pegawaikeuangan'];
			else if($field=='id_pegawai') return $data['id_pegawai'];
			else if($field=='nama_pegawai') return $data['nama_pegawai'];
		}

		//membuat fungsi ubah data
		function update_pegawaikeuangan($data_pegawaikeuangan) {
			global $con;

			$id_pegawaikeuangan = $data_pegawaikeuangan['id_pegawaikeuangan'];
			$id_pegawai = $data_pegawaikeuangan['id_pegawai'];
	
			mysqli_query($con, "update tb_pegawaikeuangan set id_pegawai='$id_pegawai'where id_pegawaikeuangan='$id_pegawaikeuangan'");
		}
	}
?>