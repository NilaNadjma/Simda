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
			
    		$result_pengelola = mysqli_query($con, "select * from tb_pegawai where username = '$username' and password = '$password'");
    		$user_pengelola = mysqli_fetch_array($result_pengelola);
			
			$cek_rows = mysqli_num_rows($result_pengelola);
			
			if ($cek_rows == 1) {
				$_SESSION['Login'] = TRUE;				
				$level=$user_pengelola['level'];
				$_SESSION['id_pegawai'] = $user_pengelola['id_pegawai'];
				$_SESSION['level'] = $user_pengelola['level'];
				$id_pegawai = $user_pengelola['id_pegawai'];

				if($level == '1'){					
					$_SESSION['location']="pengelola.php";
					
					return TRUE;
				}
				else if($level == '2'){
					$result_perpus = mysqli_query($con, "select * from tb_pegawaiperpus where id_pegawai = '$id_pegawai'");
					$user_perpus = mysqli_fetch_array($result_perpus);
			
					$cek_perpus = mysqli_num_rows($result_perpus);
					
					if ($cek_perpus == 1){
						$_SESSION['plevel'] = 'perpus';
						$_SESSION['location']="pperpus.php";
						$_SESSION['id_pegawaiperpus']=$user_perpus['id_pegawaiperpus'];
					
						return TRUE;
					}
					else{
						$result_bahasa = mysqli_query($con, "select * from tb_pegawaibahasa where id_pegawai = '$id_pegawai'");
						$user_bahasa = mysqli_fetch_array($result_bahasa);
				
						$cek_bahasa = mysqli_num_rows($result_bahasa);
						
						if($cek_bahasa == 1){
							$_SESSION['plevel'] = 'bahasa';
							$_SESSION['location']="pbahasa.php";
							$_SESSION['id_pegawaibahasa']=$user_bahasa['id_pegawaibahasa'];
					
							return TRUE;
						}
						else{
							$result_jurusan = mysqli_query($con, "select * from tb_pegawaijurusan where id_pegawai = '$id_pegawai'");
							$user_jurusan = mysqli_fetch_array($result_jurusan);
					
							$cek_jurusan = mysqli_num_rows($result_jurusan);
							
							if($cek_jurusan == 1){
								$_SESSION['plevel'] = 'jurusan';
								$_SESSION['location']="pjurusan.php";
								$_SESSION['id_pegawaijurusan']=$user_jurusan['id_pegawaijurusan'];
						
								return TRUE;
							}
							else{								
								$result_lab = mysqli_query($con, "select * from tb_pegawailab where id_pegawai = '$id_pegawai'");
								$user_lab = mysqli_fetch_array($result_lab);
								
								$cek_lab = mysqli_num_rows($result_lab);
								
								if($cek_lab == 1){
									$_SESSION['plevel'] = 'lab';
									$_SESSION['location']="plab.php";
									$_SESSION['id_pegawailab']=$user_lab['id_pegawailab'];
							
									return TRUE;
								}
								else{
									$result_keuangan = mysqli_query($con, "select * from tb_pegawaikeuangan where id_pegawai = '$id_pegawai'");
									$user_keuangan = mysqli_fetch_array($result_keuangan);
									
									$cek_keuangan = mysqli_num_rows($result_keuangan);
									
									if($cek_keuangan == 1){
										$_SESSION['plevel'] = 'keuangan';
										$_SESSION['location']="pkeuangan.php";
										$_SESSION['id_pegawaikeuangan']=$user_keuangan['id_pegawaikeuangan'];
								
										return TRUE;
									}
									else{
										return FALSE;
									}
								}
							}
						}
					}
				}
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