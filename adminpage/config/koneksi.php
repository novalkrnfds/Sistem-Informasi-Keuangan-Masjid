<?php
	$host = "localhost";
	$root = "root";
	$pass = "";
	$db = "db_sikmasjid";
	
	$koneksi = mysql_connect($host,$root,$pass);
	mysql_select_db($db,$koneksi);
	
	if($koneksi){
		
	} else {
		echo "Koneksi Gagal";
	}
?>