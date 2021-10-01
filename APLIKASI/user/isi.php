<?php
	include_once 'class/koneksi.php';
	
	// instance objek Login
	$Login_User = new Login();
	
	if (!$Login_User->get_sesi())
	{
		header("location:index.php");
	}
	
	$page=htmlentities($_GET['page']);
	
	$halaman="$page.php";

	if(!file_exists($halaman) || empty($page)){
		include "home.php";
	}else{
		include "$halaman";
	}
?>