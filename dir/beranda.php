<?php
	if(isset($_SESSION['email'])){
		header('Location:home.php?module=homeuser');
	} else {
		$dayList = array('Sun' => 'Minggu', 'Mon' => 'Senin', 'Tue' => 'Selasa', 'Wed' => 'Rabu', 'Thu' => 'Kamis', 'Fri' => 'Jumat', 'Sat' => 'Sabtu');
		$hari = date('D');
		$sekarangHari = $dayList[$hari];
		$sekarang = date('d M Y');
		
		$jamaah = mysql_fetch_array(mysql_query("select count(*) as jumlah from tbjamaah"));
		$masuk = mysql_fetch_array(mysql_query("select sum(saldo) as masuk from tbkeuangan"));
		$keluar = mysql_fetch_array(mysql_query("select sum(jumlah) as keluar from tbpengeluaran"));
		
		$jumat = mysql_fetch_array(mysql_query("select max(tbdetail_keuangan.id_amal),max(sub_saldo) as saldo
												from tbdetail_keuangan INNER JOIN tbjns_amal ON tbjns_amal.id_amal = tbdetail_keuangan.id_amal 
												and tbjns_amal.id_amal = 11 "));
		
		$akhir = ($masuk['masuk'] - $keluar['keluar']);
		if($akhir < 0){
			$akhir = "0";
		}
		
?>

<header id="head">
	<div class="container">
		<div class="row">
			<h2>SISTEM INFORMASI<br> KEUANGAN MASJID JAMI AL-MUKHLISIN</h2><br>
			<p class="text-muted"> Menginformasikan Laporan Keuangan Masjid Secara Transparan<br> Ingin menjadi donatur?
			</p>
			<p><a class="btn btn-action btn-lg" href="?module=signup" role="button">DAFTAR DISINI</a></p>
		</div>
	</div>
</header>
<!-- /Header -->

<!-- Intro -->
<div class="container text-center">

	<div class="row">
		<div class="col-md-12 col-sm-6 highlight">
			<div class="h-caption">
				<h3> Laporan Per Tanggal</h3>
				<h5> <b><?php echo $sekarangHari.", ".$sekarang; ?></h5><br>
			</div>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-3 col-sm-6 highlight">
			<div class="h-caption"><h3><i class="fa fa-user fa-5"></i><?php echo $jamaah['jumlah'];?></h3></div>
			<div class="h-body text-center">
				<p> <i>Total Jamaah/Donatur</i> </p>
			</div>
		</div>
		<div class="col-md-3 col-sm-6 highlight">
			<div class="h-caption"><h3><i class="fa fa-money fa-5"></i><?php echo "Rp. ".number_format($jumat['saldo'],0,',','.');?></h3></div>
			<div class="h-body text-center">
				<p> <i>Donasi dari para jamaah</i> </p>
			</div>
		</div>
		<div class="col-md-3 col-sm-6 highlight">
			<div class="h-caption"><h3><i class="fa fa-users fa-5"></i><?php echo "Rp. ".number_format($jumat['saldo'],0,',','.');?></h3></div>
			<div class="h-body text-center">
				<p> <i>Amal Jumat </i> </p>
			</div>
		</div>
		<div class="col-md-3 col-sm-6 highlight">
			<div class="h-caption"><h3><i class="fa fa-archive fa-5"></i><?php echo "Rp. ".number_format($akhir, 0, ',','.');?></h3></div>
			<div class="h-body text-center">
				<p> <i>Saldo Akhir</i> </b></p>
			</div>
		</div>
	</div> <!-- /row  -->
</div>
<!-- /Intro-->
	
<!-- Highlights - jumbotron -->
<div class="jumbotron top-space">
	<div class="container">
				
		<div class="row">
			<div class="col-md-10 col-sm-12 highlight">
				<div class="h-body text-center">
					<p>
						<i>Dan diriwayatkan dari Abu Hurairah Radhiyallahu ‘Anhu, 
						ia berkata: Rasulullah shallallaahu ‘alaihi wasallam bersabda: 
						<br><b><br>“Barangsiapa bersedekah senilai dengan sebiji Kurma dari penghasilan 
						yang baik (halal) – dan Allah hanya menerima sedekah yang baik (halal) -,
						maka sesungguhnya Allah akan menerima sedekahnya dengan tangan kanan-Nya, 
						kemudian Dia menumbuh-kembangkannya bagi pemiliknya sebagaimana salah seorang 
						dari kamu menumbuh-kembangkan anak kudanya sehingga menjadi seperti (sepenuh) gunung.”</i></b><br>
						<br>(HR. Al-Bukhari II/511 no.1344, dan Muslim II/702 no.1014)
					</p>
				</div>
			</div>
			<div class="col-md-2 col-sm-6 highlight">
				<img src="assets/images/hbjindan.jpg" width="140px" height="170px" class="img-circle" alt="User Image">
			</div>
		</div> <!-- /row  -->
	
	</div>
</div>
<div class="container text-justify">
	<div class="container">
				
		<div class="row">
			<div class="col-md-2 col-sm-6 highlight">
				<img src="assets/images/info.png" class="img-circle" alt="User Image">
			</div>
			<div class="col-md-10 col-sm-12 highlight">
				<div class="h-body">
					<p><center><img src="assets/images/login.png" height="80px" class="img-circle" alt="User Image"></center>
						Untuk jamaah/donatur yang ingin melakukan donasi, harap mendaftarkan atau registrasi akun terlebih dahulu untuk dapat login ke sistem informasi keuangan ini.
						Keamanan data dan informasi jamaah/donatur Insya Allah akan terjaga dengan baik.
					</p>
				</div>
			</div>
		</div> <!-- /row  -->
	
	</div>
</div>

<?php 
	}
?>