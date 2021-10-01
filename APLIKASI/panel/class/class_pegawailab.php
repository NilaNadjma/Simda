<?php
	//memanggil file koneksi.php sebanyak satu kali
	require_once 'koneksi.php';
	include_once 'lib.php';

	//inisialisasi class
	$db = new Koneksi;

	//Memanggil fungsi
	$con = $db->connectMySQL();

	//membuat classn mahasiswa
	class Pegawailab {
		//membuat fungsi tambah data
		function tambah_pegawailab($data_pegawailab){
			global $con;

			$id_pegawailab = gen_uuid();
			$id_pegawai = $data_pegawailab['id_pegawai'];  
			
			mysqli_query($con, "insert into tb_pegawailab(id_pegawailab,id_pegawai)
						values ('$id_pegawailab','$id_pegawai')");
		}

		//membuat fungsi tampil data
		function tampil_pegawailab(){
			global $con;

			$query=mysqli_query($con, "select pb.*, pg.*
										from tb_pegawailab pb, tb_pegawai pg
										where pb.id_pegawai=pg.id_pegawai");
			while($row=mysqli_fetch_array($query))
				$data[] = $row;

				return $data;
		}

		//membuat fungsi hapus data
		function hapus_pegawailab($id_pegawailab){
			global $con;

			mysqli_query($con, "delete from tb_pegawailab where id_pegawailab = '$id_pegawailab'");
		}

		//membuat preview sebelum proses ubah data
		function preview_pegawailab($field,$id_pegawailab) {
			global $con;

			$data = mysqli_fetch_array(mysqli_query($con, "select pb.*, pg.*
															from tb_pegawailab pb, tb_pegawai pg
															where pb.id_pegawai=pg.id_pegawai
															and pb.id_pegawailab = '$id_pegawailab'"));

			if($field=='id_pegawailab') return $data['id_pegawailab'];
			else if($field=='id_pegawai') return $data['id_pegawai'];
			else if($field=='nama_pegawai') return $data['nama_pegawai'];
		}

		//membuat fungsi ubah data
		function update_pegawailab($data_pegawailab) {
			global $con;

			$id_pegawailab = $data_pegawailab['id_pegawailab'];
			$id_pegawai = $data_pegawailab['id_pegawai'];
	
			mysqli_query($con, "update tb_pegawailab set id_pegawai='$id_pegawai'where id_pegawailab='$id_pegawailab'");
		}
	}
?>