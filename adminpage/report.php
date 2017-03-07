<?php
	@session_start();
	if (empty($_SESSION['username'])){
		header("location:adminpage/");
	} else {        
		include "dir/laporan/controller/reportController.php";
		
        $halaman=$_GET['page'];
		$report = new reportController();
		
        if ($halaman=="report_kas_all"){
            $report->reportKasAll();
			
        } else if($halaman == 'report_per_kas'){
			$report->reportKasPer();
			
		}
	}
?>