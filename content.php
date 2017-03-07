<?php
	include ('config/koneksi.php');

	//error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

	$halaman=$_GET['module'];
	if ($halaman=="home"){
        include("dir/beranda.php");		
		
	} elseif($halaman=="signin"){
		include("dir/signin.php");
		
	} elseif($halaman=="signup"){
		include("dir/signup.php");
		
	} elseif($halaman=="homeuser"){
		include("dir/jamaah/beranda.php");
		
	} elseif($halaman=="donasi"){
		include("dir/jamaah/donasi.php");
		
	} elseif($halaman=="riwayatdonasi"){
		include("dir/jamaah/donasi.php");
		
	} elseif($halaman=="detail_donasi"){
		include("dir/jamaah/detailDonasi.php");
		
	} elseif($halaman=="user"){
		include("dir/jamaah/userProfil.php");
		
	} elseif($halaman=="userprofiledit"){
		include("dir/jamaah/userProfil.php");
		
	} elseif($halaman=="list"){
		include("dir/data/dataJamaah.php");
		
	} elseif($halaman=="detail_d"){
		include("dir/data/dataJamaah.php");
		
	} elseif($halaman=="detail_p"){
		include("dir/data/dataJamaah.php");
		
	} elseif($halaman=="lap_kas"){
		include("dir/laporan/laporanKeuangan.php");
		
	} elseif($halaman=="lap_donasi"){
		include("dir/laporan/laporanDonasi.php");
		
	} elseif($halaman=="lap_santunan"){
		include("dir/laporan/laporanSantunan.php");
		
	} elseif($halaman=="zakatmall"){
		include("dir/zakatkalkulator/zakatmall.php");
		
	} elseif($halaman=="zakatuang"){
		include("dir/zakatkalkulator/zakatUang.php");
		
	}  else {
		include("dir/blank.php");
	}
	
?>