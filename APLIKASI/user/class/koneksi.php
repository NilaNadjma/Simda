<?php
	//membuka sesi
	session_start();

	//membuat koneksi database
	class Koneksi {
		//membuat fungsi untuk mengkoneksikan pada database
		function connectMysql () {
			$con = mysqli_connect('localhost','root','');
			mysqli_select_db($con, 'db_wisuda') or die (mysqli_error($con));
			return $con;
		}
	}
	
	//membuat class login
	class Login{
		function cek_login($username, $password) {
			$db = new Koneksi();
			$con=$db->connectMysql();
			
    		$result_mahasiswa = mysqli_query($con, "select * from tb_mahasiswa where nim = '$username' and password = '$password'");
    		$user_mahasiswa = mysqli_fetch_array($result_mahasiswa);
			
			$cek_rows = mysqli_num_rows($result_mahasiswa);
			
			if ($cek_rows == 1) {
				$_SESSION['Login'] = TRUE;
				$_SESSION['id_mhs'] = $user_mahasiswa['id_mhs'];
				$_SESSION['nim'] = $user_mahasiswa['nim'];
				$_SESSION['location']="mahasiswa.php";

				return TRUE;
				
			}
			else{
				return FALSE;
			}    		
    	}
		
		// Ambil Sesi 
    	function get_sesi() {
    		return $_SESSION['Login'];
    	}
    	
    	// Logout 
    	function user_logout() {
    		$_SESSION['Login'] = FALSE;
    		session_destroy();
    	}
	}
?>