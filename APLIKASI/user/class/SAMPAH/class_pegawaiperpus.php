<?php
	//memanggil file koneksi.php sebanyak satu kali
	require_once 'koneksi.php';
	include_once 'lib.php';

	//inisialisasi class
	$db = new Koneksi;

	//Memanggil fungsi
	$con = $db->connectMySQL();

	//membuat classn mahasiswa
	class Pegawaiperpus {
		//membuat fungsi tambah data
		function tambah_pegawaiperpus($data_pegawaiperpus){
			global $con;

			$id_pegawaiperpus = gen_uuid();
			$id_pegawai = $data_pegawaiperpus['id_pegawai'];  
			
			mysqli_query($con, "insert into tb_pegawaiperpus(id_pegawaiperpus,id_pegawai)
						values ('$id_pegawaiperpus','$id_pegawai')");
		}

		//membuat fungsi tampil data
		function tampil_pegawaiperpus(){
			global $con;

			$query=mysqli_query($con, "select pb.*, pg.*
										from tb_pegawaiperpus pb, tb_pegawai pg
										where pb.id_pegawai=pg.id_pegawai");
			while($row=mysqli_fetch_array($query))
				$data[] = $row;

				return $data;
		}

		//membuat fungsi hapus data
		function hapus_pegawaiperpus($id_pegawaiperpus){
			global $con;

			mysqli_query($con, "delete from tb_pegawaiperpus where id_pegawaiperpus = '$id_pegawaiperpus'");
		}

		//membuat preview sebelum proses ubah data
		function preview_pegawaiperpus($field,$id_pegawaiperpus) {
			global $con;

			$data = mysqli_fetch_array(mysqli_query($con, "select pb.*, pg.*
															from tb_pegawaiperpus pb, tb_pegawai pg
															where pb.id_pegawai=pg.id_pegawai
															and pb.id_pegawaiperpus = '$id_pegawaiperpus'"));

			if($field=='id_pegawaiperpus') return $data['id_pegawaiperpus'];
			else if($field=='id_pegawai') return $data['id_pegawai'];
			else if($field=='nama_pegawai') return $data['nama_pegawai'];
		}

		//membuat fungsi ubah data
		function update_pegawaiperpus($data_pegawaiperpus) {
			global $con;

			$id_pegawaiperpus = $data_pegawaiperpus['id_pegawaiperpus'];
			$id_pegawai = $data_pegawaiperpus['id_pegawai'];
	
			mysqli_query($con, "update tb_pegawaiperpus set id_pegawai='$id_pegawai'where id_pegawaiperpus='$id_pegawaiperpus'");
		}
	}
?>