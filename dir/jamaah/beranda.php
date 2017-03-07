<?php
	if(isset($_SESSION['email'])){
?>

<header id="head" class="secondary"></header>

<!-- container -->
<div class="container">

	<div class="row">
		<article class="col-xs-12 maincontent">
		
			<header class="page-header">
				<h3 class="page-title"><b>Selamat datang,</b> <?php echo ucwords($_SESSION['email']); ?> :)</h3> 	
			</header>
			
			<div class="row">
				<div class="col-md-12 ">
					<div class="panel panel-default">
						<div class="panel-body">
						<p align="center"><img src="assets/images/sik.png"></p>
							<p align="justify"><br/>
							Proses yang cepat dan efisien untuk melakukan donasi, amal, bayar zakat, dan lain-lain di Masjid Jami' Al-Mukhlisin
							adalah salah satu keinginan para jamaah Masjid Jami' Al-Mukhlisin. 
							Untuk itu kami mencoba sertai dalam sistem informasi keuangan ini untuk melakukan amal, donasi, bayar zakat, dan lain-lain yang membantu pihak petugas
							masjid untuk mempercepat proses pengolahan data keuangan hingga tercetaknya laporan keuangan.
							<br />
							<br />
							Untuk jamaah apabila ingin amal, donasi, bayar zakat, dan lain-lain silahkan lakukan donasi di menu Donasi, pengecekan dan pencetakan riwayat silahkan
							pilih menu Riwayat Donasi.</p>
							<br />
							<br />
							<br>
						</div>
					</div>

				</div>
			</div>
			
		
		</article>
		<!-- /Article -->

	</div>
</div>	<!-- /container -->

<?php 
	} else {
		session_destroy();
		header('Location:home.php?module=signin&status=404');
	}
?>