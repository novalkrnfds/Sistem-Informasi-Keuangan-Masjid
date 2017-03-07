<?php
	if(isset($_POST['regis'])){
		$pass = md5($_POST['_pass']);
		$confirm = $_POST['confirm'];
		$name = $_POST['firstname']." ".$_POST['lastname'];
		
		$getEmail = mysql_num_rows(mysql_query("select email from tbjamaah where email = '$_POST[_email]'"));
		if($getEmail > 0){
			?><script language="javascript">document.location.href="?module=signup&error=3";</script><?php
		} elseif($confirm == $pass){
			$insert = mysql_query("insert into tbjamaah values('','$name','$_POST[alamat]','$_POST[phone]','$_POST[_email]','$pass')");
			if($insert){
				?><script language="javascript">document.location.href="?module=signup&success=0";</script><?php
			} else{
				?><script language="javascript">document.location.href="?module=signup&error=1";</script><?php
			}
		
		} else {
			?><script language="javascript">document.location.href="?module=signup&error=2";</script><?php
		}
	} else {
		unset($_POST['regis']);
	}
?>

<header id="head" class="secondary"></header>

<!-- container -->
<div class="container">

	<ol class="breadcrumb">
		<li><a href="?module=home">Home</a></li>
		<li><a href="?module=user">User Profil</a></li>
		<li class="active">Changer Password</li>
	</ol>

	<div class="row">
		
		<!-- Article main content -->
		<article class="col-xs-12 maincontent">
			<header class="page-header">
				<h1 class="page-title">Change Password</h1>
			</header>
			
			<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
				<div class="panel panel-default">
					<div class="panel-body">
						
						<?php if($_GET['error']=='3'){ ?>
						<div class="alert alert-danger alert-dismissible fade in">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<i class="icon fa fa-ban"></i><strong> Maaf!</strong> Email sudah terdaftar.
						</div>
						<?php } ?>
				<?php
					if(($_GET['module'] == "changepass") != ($_GET['success'] == "0")){
				?>
						<form action="?module=signup" method="POST" enctype="multipart/form-data">
							<div class="top-margin">
								<label>Password Lama</label>
								<input type="text" name="firstname" class="form-control"required/>
							</div>
							<div class="top-margin">
								<label>Password Baru</label>
								<input type="text" name="lastname" class="form-control" required/>
							</div>
							
							<div class="top-margin">
								<label>Konfirmasi Password</label>
								<input type="number" name="phone" class="form-control" required/>
							</div>

							<hr>

							<div class="row">
								<div class="col-lg-8">                        
								</div>
								<div class="col-lg-4 text-right">
									<button class="btn btn-action" name="regis" id="regis" type="submit" disabled/>Register</button>
								</div>
							</div>
						</form>
				<?php 
					} 
					if(($_GET['module'] == "signup") && ($_GET['success'] == "0")){ ?>
						<div class="row">
							<div class="col-sm-3"></div>
							<div class="col-sm-6 highlight">
								<div class="h-caption"><h4><i class="fa fa-check-circle"></i><font color="#00a65a">Registration Successfully</font></h4></div>
								<div class="h-body text-center">
									<font color="#00a65a"><a href="?module=user"><p>Klik disini untuk kembali ke profil</p></font>
								</div>
							</div>
						</div>
					</div> <?php
					
					}
				?>
				</div>
			</div>
		</article>
		<!-- /Article -->

	</div>
</div>	<!-- /container -->

	<script>	
    function check_pass(){
	  $("#result").text("");
		if (document.getElementById('_pass').value != document.getElementById('confirm').value){
			if(document.getElementById('confirm').value != ""){
				document.getElementById('regis').disabled = true;
				$("#result").text("* Password does not match");
				$("#result").css("color", "red");
			} else{
				$("#result").text("");
			}
		} else {
			document.getElementById('regis').disabled = false;
		}
    }
    </script>