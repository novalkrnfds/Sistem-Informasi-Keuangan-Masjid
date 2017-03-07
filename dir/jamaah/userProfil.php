<?php
	$pengguna = $_SESSION['email'];
	
	$id = $_GET['id'];
	
	$select = mysql_query("select * from tbjamaah where email='$pengguna'");
	$data = mysql_fetch_array($select);
	
	$idjamaah = $data['id_jamaah'];
	$nm = $data['nm_jamaah'];
	$telp = $data['no_telp'];
	$email = $data['email'];
	
	if(isset($_POST['simpan'])){
		$nama = $_POST['firstname']." ".$_POST['lastname'];
		$insert = mysql_query("update tbjamaah set nm_jamaah = '$nama', no_telp = '$_POST[phone]', email = '$_POST[_email]', alamat = '$_POST[alamat]'
							   where id_jamaah = '$id'");
		if($insert){
			?><script language="javascript">document.location.href="?module=user&success=0";</script><?php
		} else {
			?><script language="javascript">document.location.href="?module=userprofiledit&id=<?php echo$idjamaah;?>&error=1";</script><?php
		}
	} else {
		unset($_POST['simpan']);
	}
?>

<?php
	if(isset($_SESSION['email'])){
?>

<header id="head" class="secondary"></header>

<!-- container -->
<div class="container">
	<?php
	if($_GET['module'] == "user"){?>
	<ol class="breadcrumb">
		<li><a href="?module=homeuser">Home</a></li>
		<li class="active">User Profil</li>
	</ol>
	<?php } else {?>
	<ol class="breadcrumb">
		<li><a href="?module=homeuser">Home</a></li>
		<li><a href="?module=user">User Profil</a></li>
		<li class="active">Edit User Profil</li>
	</ol> <?php } ?>

	<div class="row">
		
		<!-- Article main content -->
		<article class="col-xs-12 maincontent">
			<header class="page-header">
				<h1 class="page-title">User Profil</h1>
			</header>
			
			<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="box box-body">
							<div class="h-caption"><h3 class="thin text-center"><i class="fa fa-user"></i> Detail Data Jamaah</h3></div>
							<?php
				if($_GET['error']=='1'){
			?>
					<div class="alert alert-danger alert-dismissible fade in">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<i class="icon fa fa-ban"></i><strong> Data gagal disimpan!</strong>
					</div>
			<?php
				}
				if($_GET['success']=='0'){
			?>
					<div class="alert alert-success alert-dismissible fade in">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<i class="icon fa fa-check"></i><strong> Data Berhasil diubah!</strong>
					</div>
			<?php
				}
			?>
							<hr>
						<?php 
							if($_GET['module'] == "user"){?>
								<div class="row">
									<div class="col-md-3">
										<label>ID Jamaah <span class="text-danger"></span></label>
									</div>
									<div class="col-md-6">
										<label> : &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $idjamaah; ?><span class="text-danger"></span></label>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3">
										<label>Nama Jamaah <span class="text-danger"></span></label>
									</div>
									<div class="col-md-6">
										<label> : &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $nm; ?><span class="text-danger"></span></label>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3">
										<label>No. Telepon <span class="text-danger"></span></label>
									</div>
									<div class="col-md-6">
										<label> : &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $telp; ?><span class="text-danger"></span></label>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3">
										<label>Email <span class="text-danger"></span></label>
									</div>
									<div class="col-md-6">
										<label> : &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $email; ?><span class="text-danger"></span></label>
									</div>
								</div>

								<hr>

								<div class="row">
									<div class="col-lg-8">
										
									</div>
									<div class="col-lg-4 text-right">
										<a href="?module=userprofiledit&id=<?php echo $idjamaah;?>" class="btn btn-action"><i class="fa fa-gears"></i>&nbsp;&nbsp;&nbsp;&nbsp;Edit</a>
									</div>
								</div>
						<?php
							}
							if($_GET['module'] == "userprofiledit"){
								if($id != ""){
									$baca = mysql_query("select * from tbjamaah where id_jamaah='$id'");
									$r = mysql_fetch_array($baca);
									
									$jamaahId = $r['id_jamaah'];
									
									$jamaahNama = $r['nm_jamaah'];
									$parts = explode(' ', $jamaahNama);
									$firstname = array_shift($parts);
									$lastname = implode(' ',$parts);
									
									$jamaahAlamat = $r['alamat'];
									$jamaahTelp = $r['no_telp'];
									$jamaahEmail = $r['email'];
									$jamaahPassword = base64_decode($r['password']);
								
								}?>
								<form action="?module=userprofiledit&id=<?php echo $jamaahId;?>" method="POST" enctype="multipart/form-data">
									<div class="top-margin">
										<label>ID Jamaah</label>
										<input type="text" name="jamaahId" value="<?php echo $jamaahId;?>" class="form-control" disabled/>
									</div>
									<div class="top-margin">
										<label>First Name</label>
										<input type="text" name="firstname" value="<?php echo $firstname;?>" class="form-control"required/>
									</div>
									<div class="top-margin">
										<label>Last Name</label>
										<input type="text" name="lastname" value="<?php echo $lastname;?>" class="form-control" required/>
									</div>
									
									<div class="top-margin">
										<label>Phone Number</label>
										<input type="text" name="phone" class="form-control" value="<?php echo $jamaahTelp;?>" required/>
									</div>
									
									<div class="top-margin">
										<label>Email Address <span class="text-danger">*</span></label>
										<input type="text" name="_email" class="form-control" value="<?php echo $jamaahEmail;?>" required/>
									</div>

									</div>
									
									<div class="top-margin">
										<label>Address</label>
										<textarea name="alamat" style="resize:none;" class="form-control" required/><?php echo $jamaahAlamat;?></textarea>
									</div>

									<hr>

									<div class="row">
										<div class="col-lg-8">                        
										</div>
										<div class="col-lg-4 text-right">
											<button class="btn btn-action" name="simpan" id="regis" type="submit" >Simpan</button>
										</div>
									</div>
								</form>
							<?php } ?>
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