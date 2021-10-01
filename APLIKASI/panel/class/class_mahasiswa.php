<?php
	//memanggil file koneksi.php sebanyak satu kali
	require_once 'koneksi.php';
	include_once 'lib.php';

	//inisialisasi class
	$db = new Koneksi;

	//Memanggil fungsi
	$con = $db->connectMySQL();

	//membuat classn mahasiswa
	class Mahasiswa {
		//membuat fungsi tambah data
		function tambah_mahasiswa($data_mahasiswa){
			global $con;

			$id_mhs = gen_uuid();
			$id_prodi = $data_mahasiswa['id_prodi'];
			$nim = $data_mahasiswa['nim'];
			$password = $data_mahasiswa['password'];
			$nama_mhs = $data_mahasiswa['nama_mhs'];
			$jk = $data_mahasiswa['jk'];
			$alamat = $data_mahasiswa['alamat'];
			$email = $data_mahasiswa['email'];
			$thn_masuk = $data_mahasiswa['thn_masuk'];
			$thn_keluar = $data_mahasiswa['thn_keluar'];

			mysqli_query($con, "insert into tb_mahasiswa(id_mhs,id_prodi,nim,password,nama_mhs,jk,alamat,email,thn_masuk,thn_keluar)
						values ('$id_mhs','$id_prodi','$nim','$password','$nama_mhs','$jk','$alamat','$email','$thn_masuk','$thn_keluar')");
		}

		//membuat fungsi tampil data
		function tampil_mahasiswa(){
			global $con;

			$query=mysqli_query($con, "SELECT a.*,b.*
										FROM tb_mahasiswa a,tb_prodi b 
										WHERE a.id_prodi=b.id_prodi");
			while($row=mysqli_fetch_array($query))
				$data[] = $row;

				return $data;
		}

		//membuat fungsi hapus data
		function hapus_mahasiswa($id_mhs){
			global $con;

			mysqli_query($con, "delete from tb_mahasiswa where id_mhs = '$id_mhs'");
		}

		//membuat preview sebelum proses ubah data
		function preview_mahasiswa($field,$id_mhs) {
			global $con;
			$data = mysqli_fetch_array(mysqli_query($con, "SELECT a.*, b.* FROM tb_mahasiswa a,tb_prodi b WHERE a.id_prodi=b.id_prodi AND a.id_mhs='$id_mhs'"));

			if($field=='id_mhs') return $data['id_mhs'];
			else if($field=='id_prodi') return $data['id_prodi'];
			else if($field=='nim') return $data['nim'];
			else if($field=='password') return $data['password'];
			else if($field=='nama_mhs') return $data['nama_mhs'];
			else if($field=='jk') return $data['jk'];
			else if($field=='alamat') return $data['alamat'];
			else if($field=='email') return $data['email'];
			else if($field=='thn_masuk') return $data['thn_masuk'];
			else if($field=='thn_keluar') return $data['thn_keluar'];
			else if($field=='nama_prodi') return $data['nama_prodi'];
			
		}

		//membuat fungsi ubah data
		function update_mahasiswa($data_mahasiswa) {
			global $con;

			$id_mhs = $data_mahasiswa['id_mhs'];
			$id_prodi = $data_mahasiswa['id_prodi'];
			$nim = $data_mahasiswa['nim'];
			$password = $data_mahasiswa['password'];
			$nama_mhs = $data_mahasiswa['nama_mhs'];
			$jk = $data_mahasiswa['jk'];
			$alamat = $data_mahasiswa['alamat'];
			$email = $data_mahasiswa['email'];
			$thn_masuk = $data_mahasiswa['thn_masuk'];
			$thn_keluar = $data_mahasiswa['thn_keluar'];


			mysqli_query($con, "update tb_mahasiswa set id_prodi='$id_prodi', nim='$nim', password='$password', nama_mhs='$nama_mhs', jk='$jk', alamat='$alamat', email='$email', thn_masuk='$thn_masuk', thn_keluar='$thn_keluar' where id_mhs='$id_mhs'");
		}
	}
?>