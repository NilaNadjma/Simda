<?php
	//memanggil file koneksi.php sebanyak satu kali
	require_once 'koneksi.php';
	
	include_once 'lib.php';

	//inisialisasi class
	$db = new Koneksi;

	//Memanggil fungsi
	$con = $db->connectMysql();

	//membuat class pegawai
	class Pegawai {
		//membuat fungsi tambah data
		function tambah_pegawai($data_pegawai){
			global $con;

			$id_pegawai = gen_uuid();
			$username = $data_pegawai['username'];  
			$password = $data_pegawai['password'];
			$nama_pegawai = $data_pegawai['nama_pegawai'];
			$level = $data_pegawai['level'];

			mysqli_query($con, "insert into tb_pegawai(id_pegawai,username,password,nama_pegawai,level)
						values ('$id_pegawai','$username','$password','$nama_pegawai','$level')");
		}

		//membuat fungsi tampil data
		function tampil_pegawai(){
			global $con;

			$query=mysqli_query($con, "select * from tb_pegawai");
			while($row=mysqli_fetch_array($query))
				$data[] = $row;

				return $data;
		}
		
		//membuat fungsi tampil data pegawai berdasarkan akun
		function tampil_pegawai_akun($id_pegawai){
			global $con;
			
			$query=mysqli_query($con, "select * from tb_pegawai where id_pegawai='$id_pegawai'");
			while($row=mysqli_fetch_array($query))
				$data[] = $row;

				return $data;
		}

		//membuat fungsi hapus data
		function hapus_pegawai($id_pegawai){
			global $con;

			mysqli_query($con, "delete from tb_pegawai where id_pegawai = '$id_pegawai'");
		}

		//membuat preview sebelum proses ubah data
		function preview_pegawai($field,$id_pegawai) {
			global $con;
			$data = mysqli_fetch_array(mysqli_query($con, "select * from tb_pegawai where id_pegawai = '$id_pegawai'"));

			if($field=='id_pegawai') return $data['id_pegawai'];
			else if($field=='username') return $data['username'];
			else if($field=='password') return $data['password'];
			else if($field=='nama_pegawai') return $data['nama_pegawai'];
			else if($field=='level') return $data['level'];
		}

		//membuat fungsi ubahn data
		function update_pegawai($data_pegawai) {
			global $con;

			$id_pegawai = $data_pegawai['id_pegawai'];
			$username = $data_pegawai['username'];  
			$password = $data_pegawai['password'];
			$nama_pegawai = $data_pegawai['nama_pegawai'];
			$level = $data_pegawai['level'];

			mysqli_query($con, "update tb_pegawai set username='$username', password='$password', nama_pegawai='$nama_pegawai', level='$level' where id_pegawai='$id_pegawai'");
		}
	}
?>