<?php 
	error_reporting(0);
	session_start();	
	
	include "config/koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">
	
	<title>SIK - Masjid Jami' Al-Mukhlisin</title>

	<link rel="shortcut icon" href="assets/images/icon.png">
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	
	<link href="adminpage/bootstrap/css/bootstrap-table.css" rel="stylesheet">
	<!-- DataTables -->
	<link rel="stylesheet" href="adminpage/plugins/datatables/dataTables.bootstrap.css">
	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- Date Picker -->
	<link rel="stylesheet" href="adminpage/plugins/datepicker/datepicker3.css">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="adminpage/plugins/daterangepicker/daterangepicker.css">
	

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body class="home" onload="myFunction()">
	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse navbar-fixed-top headroom" >
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<?php
					if(isset($_SESSION['email'])){ ?>
						<a class="navbar-brand" href="?module=homeuser"><font color="#ff4500">SIK Masjid</font> <font color="#d3d3d3">Al-Mukhlisin</font></a> <?php
					} else { ?>
						<a class="navbar-brand" href="?module=home"><font color="#ff4500">SIK Masjid</font> <font color="#d3d3d3">Al-Mukhlisin</font></a> <?php
					} ?>
			</div>
			
			<?php include "dir/menu-bar.php" ?>
			
			<!--/.nav-collapse -->
		</div>
	</div> 
	<!-- /.navbar -->

	<!-- Header -->
	<div id="loader"></div>
		<?php include "content.php" ?>
		<!-- /Highlights -->
	
		<!-- Social links. @TODO: replace by link/instructions in template -->
		<section id="social">
			<div class="container">
				<div class="wrapper clearfix">
					<!-- AddThis Button BEGIN -->
					<div class="addthis_toolbox addthis_default_style">
					<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
					<a class="addthis_button_tweet"></a>
					<a class="addthis_button_linkedin_counter"></a>
					<a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
					</div>
					<!-- AddThis Button END -->
				</div>
			</div>
		</section>
		<!-- /social links -->


		<footer id="footer" class="top-space">

			<div class="footer1">
				<div class="container">
					<div class="row">
						
						<div class="col-md-3 widget">
							<h3 class="widget-title">Contact</h3>
							<div class="widget-body">
								<p>+62896 3557 3958<br>
									<a href="mailto:#">novalkrnfds@gmail.com</a><br>
									<br>
									Pondok Aren, Tangerang Selatan, Banten 15223
									<?php
										if(isset($_SESSION['email'])){
											
										} else {
											?><br><br><p><a href="adminpage" target="_BLANK">Login Admin Klik Disini</a></p><?php
										} ?>
								</p>	
							</div>
						</div>

						<div class="col-md-3 widget">
							<h3 class="widget-title">Follow me</h3>
							<div class="widget-body">
								<p class="follow-me-icons">
									<a href="http://twitter.com/novalkrnfds" target="_BLANK"><i class="fa fa-twitter fa-2"></i></a>
									<a href="http://instagram.com/novalkrnfds" target="_BLANK"><i class="fa fa-instagram fa-2"></i></a>
									<a href="http://facebook.com/nouval.firdaus" target="_BLANK"><i class="fa fa-facebook fa-2"></i></a>
								</p>	
							</div>
						</div>

						<div class="col-md-6 widget">
							<h3 class="widget-title">SIK MASJID AL-MUKHLISIN</h3>
							<div class="widget-body">
								<p align="justify">Sistem Informasi Keuangan Masjid Jami' Al-Mukhlisin menyajikan informasi data normatif masjid seperti laporan keuangan berupa pemasukan dan pengeluaran, informasi donatur, dhuafa, dll. Sistem Informasi ini diharapkan berguna bagi para jamaah Masjid Jami' Al-Mukhlisin.</p>
								<p align="justify">Sistem Informasi ini dibuat sebagai tugas dari Tugas Akhir. Tidak lupa pula untuk teman-teman REMBES ELITE TEAM saya ucapkan banyak terima kasih yang turut membantu dalam proses pengerjaan project Tugas Akhir ini.</p>
							</div>
						</div>

					</div> <!-- /row of widgets -->
				</div>
			</div>

			<div class="footer2">
				<div class="container">
					<div class="row">
						<div class="pull-right hidden-xs">
							<b>Made with <i class="fa fa-heart"></i> By :</b> <a href="http://facebook.com/nouval.firdaus" target="_BLANK"><strong>Nouval Kurnia Firdaus</strong></a>
						</div>

						<div class="col-md-6 widget">
							<div class="widget-body">
								<p class="text-left">
									<strong>Copyright &copy; <script>document.write(new Date().getFullYear())</script> <a href="">REMBES ELITE TEAM</a></strong> 
								</p>
							</div>
						</div>

					</div> <!-- /row of widgets -->
				</div>
			</div>

		</footer>	
		




	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/headroom.min.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/template.js"></script>
	<script language="javascript" type="text/javascript" src="assets/js/elsyifa.js"></script>
	<script language="javascript" type="text/javascript" src="assets/js/main.js"></script>
	<!-- page script -->
	<script src="adminpage/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="adminpage/plugins/datatables/dataTables.bootstrap.min.js"></script>
	<script src="adminpage/bootstrap/js/bootstrap-table.js"></script>
	<!-- Google Maps -->
	<script src="https://maps.googleapis.com/maps/api/js?key=&amp;sensor=false&amp;extension=.js"></script> 
	<script src="assets/js/google-map.js"></script>
	<!-- daterangepicker -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
	<script src="adminpage/plugins/daterangepicker/daterangepicker.js"></script>
	<!-- datepicker -->
	<script src="adminpage/plugins/datepicker/bootstrap-datepicker.js"></script>
	
	<script>
		$(function () {
			$("#example1").DataTable();
			$('#example2').DataTable({
			  "paging": true,
			  "lengthChange": false,
			  "searching": false,
			  "ordering": true,
			  "info": true,
			  "autoWidth": false
			});
		});

		function showPage() {
		  document.getElementById("loader").style.display = "none";
		  document.getElementById("myDiv").style.display = "block";
		}
		
		$(document).ready(function () {
			$("#dateFilter").datepicker({ 
				format: "dd MM yyyy",
					autoclose:true
			}).datepicker("setDate", "0");
		});
		
		$(document).ready(function () {
			$("#dateFilter2").datepicker({ 
				format: "dd MM yyyy",
					autoclose:true
			}).datepicker("setDate", "0");
		});
	
	</script>
</body>
</html>