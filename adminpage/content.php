<?php
include ('config/koneksi.php');

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
 
            
        $halaman=$_GET['page'];
        if ($halaman=="home"){
            include("dir/dashboard.php");
			
        } elseif($halaman=="penerima"){
            include("dir/penerima/penerima.php");
               
        } elseif($halaman=="setup_penerima"){
            include("dir/penerima/setup_penerima.php");
               
        } elseif($halaman=="setup_jamaah"){
            include("dir/jamaah/setup_jamaah.php");
               
        } elseif($halaman=="jamaah"){
            include("dir/jamaah/jamaah.php");
                
        } elseif($halaman=="setup_pemasukan"){
            include("dir/kas/inputKas.php");
			
        } elseif($halaman=="setup_pengeluaran"){
            include("dir/kas/inputPengeluaran.php");
                
        } elseif($halaman=="jnsamal"){
            include("dir/amal/jns_amal.php");
                
        } elseif($halaman=="admin"){
            include ("dir/admin/admin.php");
                
        } elseif($halaman=="pembayaran"){
            include ("dir/pembayaran/pembayaran.php");
                
        } elseif($halaman=="santunan"){
            include("dir/santunan/santunan.php");
        }
		
		elseif($halaman=="detail"){
            include("dir/detailDonasi.php");
        }
		
		elseif($halaman=="lap_kas"){
            include("dir/laporan/view/lap_kas.php");
        }
		
		elseif($halaman=="bckres"){
            include("dir/backupres.php");
        }
        
?>