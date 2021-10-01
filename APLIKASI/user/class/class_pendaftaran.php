<?php
	//memanggil file koneksi.php sebanyak satu kali
	require_once 'koneksi.php';
	include_once 'lib.php';

	//inisialisasi class
	$db = new Koneksi;

	//Memanggil fungsi
	$con = $db->connectMySQL();

	//membuat classn mahasiswa
	class Pendaftaran {
		//membuat fungsi tambah data
		function tambah_pendaftaran($data_pendaftaran){
			global $con;

			$id_pendaftaran = gen_uuid();
			$id_jadwal = $data_pendaftaran['id_jadwal']; 
			$id_mhs = $data_pendaftaran['id_mhs'];
			$tgl_daftar = $data_pendaftaran['tgl_daftar'];
			
			mysqli_query($con, "insert into tb_pendaftaran(id_pendaftaran,id_jadwal,id_mhs,tgl_daftar,no_kursi,konfirmasi_kehadiran,tgl_konfirmasi,daftar_hadir)
						values ('$id_pendaftaran','$id_jadwal','$id_mhs','$tgl_daftar','','','','')");
		}

		//membuat fungsi tampil data 
		function tampil_pendaftaran($data_pendaftaran){
			global $con;
			
			$id_jadwal = $data_pendaftaran['id_jadwal'];
			$id_mhs = $data_pendaftaran['id_mhs'];

			$query=mysqli_query($con, "select * from tb_pendaftaran where id_jadwal='$id_jadwal' and id_mhs='$id_mhs'");
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
		function preview_pegawaibahasa($field,$id_pegawai) {
			$data = mysqli_fetch_array(mysqli_query($con, "select * from tb_pegawaibahasa where id_pegawaibahasa = '$id_pegawaibahasa'"));

			if($field=='id_pegawaibahasa') return $data['id_pegawaibahasa'];
			else if($field=='id_pegawaibahasa') return $data['id_pegawaibahasa'];
		}

		//membuat fungsi ubahn data
		function ubah_mahasiswa($data_mahasiwa) {
			$id_pegawaibahasa = $data_pegawaibahasa['id_pegawaibahasa'];
			$id_pegawai = $data_pegawaibahasa['id_pegawai'];  
	
			mysqli_query($con, "update tb_pegawaibahasa set id_pegawaibahasa='$id_pegawaibahasa', id_pegawai='$id_pegawai'");
		}
	}
?>