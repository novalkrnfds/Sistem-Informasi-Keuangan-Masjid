<?php
	include "config/koneksi.php";
	
	if(isset($_SESSION['email']))
	{
		header("location:home.php?module=homeuser");
	}else if(isset($_POST['signin'])){		
		
		$email=$_POST['email'];
		$pass = md5($_POST['password']);
		$query=mysql_query("select * from tbjamaah where email='$email' and password='$pass'");
		$cek=mysql_num_rows($query);
		
		if($cek){
			$_SESSION['email']=$email;
			//pergi ke halaman
			header('location:home.php?module=homeuser'); 
		} else{
		
			header('Location:home.php?module=signin&status=1');
			echo mysql_error();
		}
	} else{
		unset($_POST['signin']);
	}
?>

<header id="head" class="secondary"></header>

<!-- container -->
<div class="container">

	<ol class="breadcrumb">
		<li><a href="?module=home">Home</a></li>
		<li class="active">User access</li>
	</ol>

	<div class="row">
		
		<!-- Article main content -->
		<article class="col-xs-12 maincontent">
			<header class="page-header">
				<h1 class="page-title">Sign in</h1>
			</header>
			
			<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
				<div class="panel panel-default">
					<div class="panel-body">
						<h3 class="thin text-center">Sign in to your account</h3>
						<br>
						<?php if($_GET['status']=='1'){ ?>
						<div class="alert alert-danger alert-dismissible fade in">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<i class="icon fa fa-ban"></i><strong> Login gagal!</strong> mohon periksa kembali
						</div>
						<?php }
						if($_GET['status']=='0'){ ?>
						<div class="alert alert-danger alert-dismissible fade in">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<i class="icon fa fa-ban"></i><strong> Session habis!</strong> mohon login kembali.
						</div>
						<?php } if($_GET['status']=='404'){ ?>
						<div class="alert alert-warning alert-dismissible fade in">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<i class="icon fa fa-warning"></i><strong> Anda harus sign in</strong> terlebih dahulu.
						</div> 
						<?php } if($_GET['status']=='2'){?>
						<div class="alert alert-warning alert-dismissible fade in">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<i class="icon fa fa-warning"></i><strong> Email</strong> tidak terdaftar.
						</div>
						<?php } ?>
						<hr>
						
						<form action="?module=signin" enctype="multipart/form-data" method="POST">
							<div class="top-margin">
								<label>Email <span class="text-danger">*</span></label>
								<input type="email" name="email" class="form-control" required/>
							</div>
							<div class="top-margin">
								<label>Password <span class="text-danger">*</span></label>
								<input type="password" name="password" class="form-control" required/>
							</div>

							<hr>

							<div class="row">
								<div class="col-lg-8">
									<b>Belum Punya Akun? <a href="?module=signup">Daftar Disini</a></b>
								</div>
								<div class="col-lg-4 text-right">
									<button class="btn btn-action" name="signin" type="submit">Masuk</button>
								</div>
							</div>
						</form>
					</div>
				</div>

			</div>
			
		</article>
		<!-- /Article -->

	</div>
</div>	<!-- /container -->