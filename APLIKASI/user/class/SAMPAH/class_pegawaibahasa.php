<?php
	//memanggil file koneksi.php sebanyak satu kali
	require_once 'koneksi.php';
	include_once 'lib.php';

	//inisialisasi class
	$db = new Koneksi;

	//Memanggil fungsi
	$con = $db->connectMySQL();

	//membuat classn mahasiswa
	class Pegawaibahasa {
		//membuat fungsi tambah data
		function tambah_pegawaibahasa($data_pegawaibahasa){
			global $con;

			$id_pegawaibahasa = gen_uuid();
			$id_pegawai = $data_pegawaibahasa['id_pegawai'];  
			
			mysqli_query($con, "insert into tb_pegawaibahasa(id_pegawaibahasa,id_pegawai)
						values ('$id_pegawaibahasa','$id_pegawai')");
		}

		//membuat fungsi tampil data
		function tampil_pegawaibahasa(){
			global $con;

			$query=mysqli_query($con, "select pb.*, pg.*
										from tb_pegawaibahasa pb, tb_pegawai pg
										where pb.id_pegawai=pg.id_pegawai");
			while($row=mysqli_fetch_array($query))
				$data[] = $row;

				return $data;
		}

		//membuat fungsi hapus data
		function hapus_pegawaibahasa($id_pegawaibahasa){
			global $con;

			mysqli_query($con, "delete from tb_pegawaibahasa where id_pegawaibahasa = '$id_pegawaibahasa'");
		}

		//membuat preview sebelum proses ubah data
		function preview_pegawaibahasa($field,$id_pegawaibahasa) {
			global $con;

			$data = mysqli_fetch_array(mysqli_query($con, "select pb.*, pg.*
															from tb_pegawaibahasa pb, tb_pegawai pg
															where pb.id_pegawai=pg.id_pegawai
															and pb.id_pegawaibahasa = '$id_pegawaibahasa'"));

			if($field=='id_pegawaibahasa') return $data['id_pegawaibahasa'];
			else if($field=='id_pegawai') return $data['id_pegawai'];
			else if($field=='nama_pegawai') return $data['nama_pegawai'];
		}

		//membuat fungsi ubah data
		function update_pegawaibahasa($data_pegawaibahasa) {
			global $con;

			$id_pegawaibahasa = $data_pegawaibahasa['id_pegawaibahasa'];
			$id_pegawai = $data_pegawaibahasa['id_pegawai'];
	
			mysqli_query($con, "update tb_pegawaibahasa set id_pegawai='$id_pegawai'where id_pegawaibahasa='$id_pegawaibahasa'");
		}
	}
?>