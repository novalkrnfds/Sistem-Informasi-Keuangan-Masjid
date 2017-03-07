<?php
	
	$id = $_GET['id'];
	
	if(isset($_POST['save'])){
	
		$nama_jamaah = ucwords(htmlentities($_POST['nama_jamaah']));
		$email = htmlentities($_POST['email']);
		$password = base64_encode($_POST['password']);
		$no_telp = htmlentities($_POST['no_telp']);
		$alamat = ucwords(htmlentities($_POST['alamat']));
	
	if($id==""){
		$query = mysql_query("insert into tbjamaah values ('','$_POST[nama_jamaah]','$_POST[alamat]','$_POST[no_telp]','$_POST[email]','$password')");
		
	} else {
		$query = mysql_query("update tbjamaah set nm_jamaah = '$nama_jamaah', alamat = '$alamat', no_telp = '$no_telp', email = '$email',
			password = '$password' where id_jamaah = '$id'");
	}
		if($query){
			?><script language="javascript">document.location.href="?page=jamaah&status=0";</script><?php
		} else {
			?><script language="javascript">document.location.href="?page=jamaah&status=1";</script><?php
		}
	} else{
		unset($_POST['save']);
	}
?>


<section class="content-header">
	<h1 class="box-title pull-left"><b>DATA JAMAAH</b><small>Add/Edit</small></h1><br><br>
</section>

<section class="content-header">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-info">
				<div class="box-body">
				
				<?php
					if($id!=""){
						$kueri = mysql_query("select * from tbjamaah where id_jamaah='$id'");
						$r = mysql_fetch_array($kueri);
						
						$nama = $r['nm_jamaah'];
						$mail = $r['email'];
						$pw = base64_decode($r['password']);
						$tlp = $r['no_telp'];
						$almt = $r['alamat'];
						$link = $r['id_jamaah'];
					}
				?>
				
					<form action="?page=setup_jamaah&id=<?php echo $link ?>" enctype="multipart/form-data" method="POST">
						<div class="controls">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="form_ktp">Nama Jamaah</label>
										<input type="text" name="nama_jamaah" class="form-control" value="<?php echo $nama ?>" placeholder="Nama Jamaah" required="required" data-error="Nama Penerima Harus Diisi">
										<div class="help-block with-errors"> </div>
									</div>
								</div>
								<div class="col-md-6">
									<label for="form_ktp">No. Telepon</label>
									<div class="input-group" style="padding-bottom:10px">
										<input type="text" class="form-control" name="no_telp" value="<?php echo $tlp ?>" placeholder="No. Telepon" data-inputmask="'mask': ['9999 9999 9999', '+9999 9999 9999']" data-mask required/>
										<div class="input-group-addon">
											<i class="fa fa-phone"></i>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="form_ktp">Email</label>
										<div class="input-group" style="padding-bottom:10px">
											<input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $mail ?>" required="required" data-error="No. KTP Harus Diisi">
											<div class="input-group-addon">
												<i class="fa fa-envelope-o"></i>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="form_ktp">Password</label>
										<div class="input-group" style="padding-bottom:10px">
											<input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo $pw ?>" required="required" data-error="No. KTP Harus Diisi">
											<div class="help-block with-errors"></div>
											<div class="input-group-addon">
												<i class="fa fa-key"></i>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="form_ktp">Alamat</label>
										<textarea class="form-control" style="resize:none;" placeholder="Alamat" name="alamat" required/><?php echo $almt ?></textarea>
									</div>
								</div>
							</div>
						</div><br><br>
						<div class="modal-footer">
							<a href="?page=jamaah" class="btn btn-default pull-left">Cancel</a>
							<button type="submit" class="btn btn-primary" name="save" >Confirm</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>