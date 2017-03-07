<?php session_start();

if(isset($_SESSION['username'])){

	//koneksi terpusat
	include "config/koneksi.php";
	
	$username = $_SESSION['username'];
	$queri = mysql_query("select nama from tbadmin where username = '$username'")or die(mysql_error());
	$r = mysql_fetch_array($queri);
	$nama_admin = ucwords($r['nama']);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $nama_admin; ?> - SIK Masjid Jami' Al-Mukhlisin</title>
	<link rel="shortcut icon" href="../assets/images/icon.png">
	
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.6 -->
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
	<link href="bootstrap/css/bootstrap-table.css" rel="stylesheet">
	<!-- Theme style -->
	<link rel="stylesheet" href="dist/css/AdminLTE.min.css">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
	<!-- iCheck for checkboxes and radio inputs -->
	<link rel="stylesheet" href="plugins/iCheck/all.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="plugins/select2/select2.min.css">
	<!-- Morris chart -->
	<link rel="stylesheet" href="plugins/morris/morris.css">
	<!-- jvectormap -->
	<link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
	<!-- Date Picker -->
	<link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
	<!-- bootstrap wysihtml5 - text editor -->
	<link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<!-- ADD THE CLASS layout-boxed TO GET A BOXED LAYOUT -->
<body class="hold-transition skin-blue layout-boxed sidebar-mini">
<!--body class="hold-transition skin-blue sidebar-mini"-->
<div class="wrapper">

	<header class="main-header">
		
		<!-- Logo -->
		<a href="?page=home" class="logo">
		  <!-- mini logo for sidebar mini 50x50 pixels -->
		  <span class="logo-mini"><b>SIK</b></span>
		  <!-- logo for regular state and mobile devices -->
		  <span class="logo-lg"><b>SIK</b> Masjid</span>
		</a>
		
		<!-- Header Navbar: style can be found in header.less -->
		<nav class="navbar navbar-static-top">
		
			<!-- Sidebar toggle button-->
			<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
				<span class="sr-only">Toggle navigation</span>
			</a>

			<div class="navbar-custom-menu">
				<ul class="nav navbar-nav">
					
					<!-- Notifications: style can be found in dropdown.less -->
					<li class="dropdown notifications-menu">
						<ul class="dropdown-menu">
							<li>
								<!-- inner menu: contains the actual data -->
								<ul class="menu">
									<!-- content disini -->
								</ul>
							</li>
						</ul>
					</li>
			  
					<!-- User Account: style can be found in dropdown.less -->
					<li class="dropdown user user-menu">
						<a href="#" class="dropdown-toggle">
							<img src="dist/img/avatar04.png" class="user-image" alt="User Image">
							<span class="hidden-xs"><?php echo $nama_admin ?></span>
						</a>
					</li>
			  
					<!-- Control Sidebar Toggle Button -->
					<li>
						<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
					</li>
				</ul>
			</div>
		</nav>
	</header>
  
	<!-- Left side column. contains the logo and sidebar -->
	
	<aside class="main-sidebar">
		<!-- sidebar: style can be found in sidebar.less -->
		<section class="sidebar">
			<?php include "dir/menubar.php" ?>
		<!-- /.sidebar -->
		</section>
	</aside>

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<?php include "content.php" ?>
    <!-- /.content -->
	</div>
	
	<!-- /.content-wrapper -->
	<footer class="main-footer">
		<div class="pull-right hidden-xs">
			<b>Made with <i class="fa fa-heart"></i> By :</b> <a href="http://facebook.com/nouval.firdaus" target="_BLANK"><strong>Nouval Kurnia Firdaus</strong></a>
		</div>
		<strong>Copyright &copy; <script>document.write(new Date().getFullYear())</script> <a href="">REMBES ELITE TEAM</a></strong>
	</footer>

	<!-- Control Sidebar -->
	<aside class="control-sidebar control-sidebar-dark">
		<!-- Create the tabs -->
		<ul class="nav nav-tabs nav-justified control-sidebar-tabs">
			<li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
		</ul>
		
		<!-- Tab panes -->
		<div class="tab-content">
			<!-- Home tab content -->
			<div class="tab-pane" id="control-sidebar-home-tab">
				<h3 class="control-sidebar-heading">Account Option</h3>
					<ul class="control-sidebar-menu">
						<li>
							<a href="logout.php" id="logout" onclick="return confirm('Apakah anda yakin untuk keluar?')">
								<i class="menu-icon fa fa-sign-out bg-blue"></i>
								<div class="menu-info">
									<h3 class="control-sidebar-subheading">Logout</h3>
									<p>Logout your account here</p>
								</div>
							</a>
						</li>
					</ul>
			</div>
		</div>
		<!-- /.tab-pane -->
		<!-- Stats tab content -->
		
	</aside>
	<div class="control-sidebar-bg"></div>
</div>

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="plugins/iCheck/icheck.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--script src="dist/js/pages/dashboard.js"></script -->
<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script src="bootstrap/js/bootstrap-table.js"></script>
<!-- Select2 -->
<script src="plugins/select2/select2.full.min.js"></script>
<script>
  $(function () {
	$(".select2").select2();
	
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
	
	$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
	
	$("[data-mask]").inputmask();
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });
  });
</script>

<script type="text/javascript">
    function confirm_modal(delete_url)
    {
      $('#deletePenerima').modal('show', {backdrop: 'static'});
      document.getElementById('delete_link').setAttribute('href' , delete_url);
    }
	
	function confirm_modalAmal(delete_url)
    {
      $('#deleteAmal').modal('show', {backdrop: 'static'});
      document.getElementById('delete_amal').setAttribute('href' , delete_url);
    }
	
	function confirm_modalAdmin(delete_url)
    {
      $('#deleteAdmin').modal('show', {backdrop: 'static'});
      document.getElementById('delete_admin').setAttribute('href' , delete_url);
    }
	
	function confirm_modalJamaah(delete_url)
    {
      $('#deleteJamaah').modal('show', {backdrop: 'static'});
      document.getElementById('delete_jamaah').setAttribute('href' , delete_url);
    }
	
	function confirm_modalPeng(delete_url)
    {
      $('#deletePeng').modal('show', {backdrop: 'static'});
      document.getElementById('delete_peng').setAttribute('href' , delete_url);
    }
</script>

<script type="text/javascript">
	$(function () {
	    $('#hover, #striped, #condensed').click(function () {
		    var classes = 'table';
		
			if ($('#hover').prop('checked')) {
				classes += ' table-hover';
			}
			if ($('#condensed').prop('checked')) {
				classes += ' table-condensed';
			}
			$('#table-style').bootstrapTable('destroy').bootstrapTable({
				classes: classes,
				striped: $('#striped').prop('checked')
			});
		});
	});
						
	function rowStyle(row, index) {
		var classes = ['active', 'success', 'info', 'warning', 'danger'];

		if (index % 2 === 0 && index / 2 < classes.length) {
			return {
				classes: classes[index / 2]
			};
		}
		return {};
	}

    $(document).ready(function () {
	$('#datetimepicker').datepicker({
        format: "dd MM yyyy",
			autoclose:true
        });
    });
	
	$(document).ready(function () {
		$("#dateRep").datepicker({ 
			format: "dd MM yyyy",
				autoclose:true
		}).datepicker("setDate", "0");
	});
	
	$(document).ready(function () {
		$("#dateRep2").datepicker({ 
			format: "dd MM yyyy",
				autoclose:true
		}).datepicker("setDate", "0");
	});
	
	$(document).ready(function () {
		$(".open_modal").click(function(e) {
		var m = $(this).attr("id");
			$.ajax({
				url: "dir/amal/edit_amal.php",
					type: "GET",
					data : {id_amal: m,},
					success: function (ajaxData){
					$("#ModalEdit").html(ajaxData);
					$("#ModalEdit").modal('show',{backdrop: 'true'});
				}
			});
		});
    });
	
	$(document).ready(function () {
		$(".open_admin").click(function(e) {
		var m = $(this).attr("id");
			$.ajax({
				url: "dir/admin/edit_admin.php",
					type: "GET",
					data : {id_admin: m,},
					success: function (ajaxData){
					$("#ModalEditAdmin").html(ajaxData);
					$("#ModalEditAdmin").modal('show',{backdrop: 'true'});
				}
			});
		});
    });
</script>

<script type="text/javascript">   
    <?php echo $jsArray; ?> 
    function changeValue(id){ 
		document.getElementById('jp').value = jnsPenerima[id].jns;
    }; 
</script> 
</body>
</html>

<?php
}else{
	session_destroy();
	header('Location:index.php?status=0');
}
?>	