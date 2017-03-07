<?php
	
	$id = $_GET['id'];
	
	if(isset($_POST['save'])){
	
		$nama_penerima = ucwords(htmlentities($_POST['nama_penerima']));
		$tmp_lahir = htmlentities($_POST['tmp_lahir']);
		$tgl_lahir = htmlentities($_POST['tgl_lahir']);
		$jns_kelamin = htmlentities($_POST['jns_kelamin']);
		$jns_penerima = htmlentities($_POST['jns_penerima']);
		$no_telp = htmlentities($_POST['no_telp']);
		$alamat = ucwords(htmlentities($_POST['alamat']));
	
	if($id==""){
		$tgl = date('Y-m-d', strtotime($_POST['tgl_lahir']));
		$query = mysql_query("insert into tbpenerima values ('','$_POST[nama_penerima]','$_POST[tmp_lahir]','$tgl','$_POST[jns_kelamin]','$_POST[jns_penerima]','$_POST[no_telp]','$_POST[alamat]',now())");
		
	} else {
		$tgl = date('Y-m-d', strtotime($_POST['tgl_lahir']));
		$query = mysql_query("update tbpenerima set nama_penerima = '$nama_penerima', tmp_lahir = '$tmp_lahir', tgl_lahir = '$tgl', jns_kel = '$jns_kelamin',
			jns_penerima = '$jns_penerima', no_telp = '$no_telp', alamat = '$alamat' where id_penerima = '$id'");
	}
		if($query){
			?><script language="javascript">document.location.href="?page=penerima&status=0";</script><?php
		} else {
			?><script language="javascript">document.location.href="?page=penerima&status=1";</script><?php
		}
	} else{
		unset($_POST['save']);
	}
?>

<section class="content-header">
	<h1 class="box-title pull-left"><b>DATA PENERIMA SANTUNAN</b><small>Add/Edit</small></h1><br><br>
</section>

<section class="content-header">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-info">
				<div class="box-body">
				
				<?php
					if($id!=""){
						$kueri = mysql_query("select * from tbpenerima where id_penerima='$id'");
						$r = mysql_fetch_array($kueri);
						
						$nama = $r['nama_penerima'];
						$tmplahir = $r['tmp_lahir'];
						$tanggal = $r['tgl_lahir'];
						$tgllahir = date('d F Y', strtotime($tanggal));
						$jns_penerima = $r['jns_penerima'];
						$tlp = $r['no_telp'];
						$jkel = $r['jns_kelamin'];
						$almt = $r['alamat'];
						$link = $r['id_penerima'];
					}
				?>
				
					<form action="?page=setup_penerima&id=<?php echo $link ?>" enctype="multipart/form-data" method="POST">		
						<div class="messages"></div>
						<div class="controls">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="form_ktp">Nama Penerima</label>
										<input type="text" name="nama_penerima" class="form-control" value="<?php echo $nama ?>" placeholder="Nama Penerima" required="required" data-error="Nama Penerima Harus Diisi">
										<div class="help-block with-errors"> </div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="form_ktp">Jenis Penerima</label>
										<select class="form-control" name="jns_penerima" placeholder="Jenis Penerima" required/>
											<option value="FAKIR MISKIN" <?php if($jns_penerima == 'FAKIR MISKIN'){ echo "selected"; } ?>>FAKIR MISKIN</option>
											<option value="DHUAFA" <?php if($jns_penerima == 'DHUAFA'){ echo "selected"; } ?>>DHUAFA</option>
											<option value="DUDA/JANDA" <?php if($jns_penerima == 'DUDA/JANDA'){ echo "selected"; } ?>>JANDA/DUDA</option>
											<option value="YATIM/PIATU" <?php if($jns_penerima == 'YATIM/PIATU'){ echo "selected"; } ?>>YATIM/PIATU</option>
											<option value="MUSTAHIQ" <?php if($jns_penerima == 'MUSTAHIQ'){ echo "selected"; } ?>>MUSTAHIQ</option>
										</select>
										<div class="help-block with-errors"></div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="form_ktp">Tempat Lahir</label>
										<input type="text" name="tmp_lahir" class="form-control" placeholder="Tempat Lahir" value="<?php echo $tmplahir ?>" required="required" data-error="No. KTP Harus Diisi">
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="form_ktp">Tanggal Lahir</label>
										<div class="input-group" style="padding-bottom: 10px;">
											<input type="text" id="datetimepicker" value="<?php echo $tgllahir ?>" name="tgl_lahir" class="form-control" placeholder="Tanggal Lahir" required/>
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="form_ktp">Jenis Kelamin</label>
										<select class="form-control" name="jns_kelamin"placeholder="Jenis Kelamin" required/>
											<option value="laki-laki" <?php if($jkel == 'Laki-laki'){ echo "selected"; } ?>>Laki-laki</option>
											<option value="perempuan" <?php if($jkel == 'Perempuan'){ echo "selected"; } ?>>Perempuan</option>
										</select>
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
								<div class="col-md-12">
									<div class="form-group">
										<label for="form_ktp">Alamat</label>
										<textarea class="form-control" style="resize:none;" placeholder="Alamat" name="alamat" required/><?php echo $almt ?></textarea>
									</div>
								</div>
							</div>
						</div><br><br>
						<div class="modal-footer">
							<a href="?page=penerima" class="btn btn-default pull-left">Cancel</a>
							<button type="submit" class="btn btn-primary" name="save" >Confirm</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>