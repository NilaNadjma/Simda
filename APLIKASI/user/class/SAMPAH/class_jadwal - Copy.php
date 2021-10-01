<?php
	//memanggil file koneksi.php sebanyak satu kali
	require_once 'koneksi.php';
	include_once 'lib.php';

	//inisialisasi class
	$db = new Koneksi;

	//Memanggil fungsi
	$con = $db->connectMySQL();

	//membuat classn mahasiswa
	class Jadwal {
		//membuat fungsi tambah data
		function tambah_jadwal($data_jadwal){
			global $con;

			$id_jadwal = gen_uuid();
			$id_pegawai = $data_jadwal['id_pegawai'];
			$tgl_mulai = $data_jadwal['tgl_mulai'];
			$tgl_akhir = $data_jadwal['tgl_akhir'];
			$informasi = $data_jadwal['informasi'];

			mysqli_query($con, "insert into tb_jadwal(id_jadwal,id_pegawai,tgl_mulai,tgl_akhir,informasi)
						values ('$id_jadwal','$id_pegawai','$tgl_mulai','$tgl_akhir','$informasi')");
		}

		//membuat fungsi tampil data
		function tampil_jadwal(){
			global $con;

			$query=mysqli_query($con, "select * from tb_jadwal");
			while($row=mysqli_fetch_array($query))
				$data[] = $row;

				return $data;
		}

		//membuat fungsi hapus data
		function hapus_jadwal($id_jadwal){
			global $con;

			mysqli_query($con, "delete from tb_jadwal where id_jadwal = '$id_jadwal'");
		}

		//membuat preview sebelum proses ubah data
		function preview_jadwal($field,$id_jadwal) {
			global $con;

			$data = mysqli_fetch_array(mysqli_query($con, "select * from tb_jadwal where id_jadwal = '$id_jadwal'"));

			if($field=='id_jadwal') return $data['id_jadwal'];
			else if($field=='id_pegawai') return $data['id_pegawai'];
			else if($field=='tgl_mulai') return $data['tgl_mulai'];
			else if($field=='tgl_akhir') return $data['tgl_akhir'];
			else if($field=='informasi') return $data['informasi'];
		}
		//membuat fungsi ubahn data
		function update_jadwal($data_jadwal) {
			global $con;
			
			$id_jadwal = $data_jadwal['id_jadwal'];
			$id_pegawai = $data_jadwal['id_pegawai'];
			$tgl_mulai = $data_jadwal['tgl_mulai'];
			$tgl_akhir = $data_jadwal['tgl_akhir'];
			$informasi = $data_jadwal['informasi'];

			mysqli_query($con, "update tb_jadwal set id_pegawai='$id_pegawai', tgl_mulai='$tgl_mulai', tgl_akhir='$tgl_akhir', informasi='$informasi' where id_prodi='$id_prodi'");
		}
	}
?>