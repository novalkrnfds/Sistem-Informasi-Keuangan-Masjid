<?php
	$id = $_GET['id'];

	$admin = $_SESSION['username'];
	$query = mysql_query("select nama from tbadmin where username='$admin'");
	$r = mysql_fetch_array($query);
	$nama = ucwords($r['nama']);
	
	if(isset($_POST['simpan'])){
		$nama_admin = $_POST['nama'];
		$sql = mysql_query("SELECT id_admin from tbadmin where nama = '$nama_admin'");
		$r = mysql_fetch_array($sql);
		$idadmin = $r['id_admin'];
		
		$nma = $_POST['nm_jamaah'];
		if($nma == ""){
			$error =  "Nama Jamaah Belum Diisi";
		}
		
		$getdata = mysql_query("select id_jamaah from tbjamaah where nm_jamaah = '$nma'");
		$d = mysql_fetch_array($getdata);
		$idjamaah = $d['id_jamaah'];
		
		if ($_FILES['foto']['type']=="image/jpeg" || $_FILES['foto']['type']=="" || $_FILES['foto']['type']=="image/png" || $_FILES['foto']['type']=="image/gif" && $_FILES['foto']['size'] <=2000000 && $_FILES['foto']['error'] == 0){
			$foto=$_FILES['foto']['tmp_name'];
			$nama_foto=$_FILES['foto']['name'];
			$dir="upload/";
			$upload=$dir.$nama_foto;
			$move = move_uploaded_file($_FILES['foto']['tmp_name'],$upload);
		} else{
			echo "<script>alert('File tidak sesuai dengan ketentuan. Ulangi !');
			window.location='?page=pembayaran'</script>";
		}
		
		if($_POST['metode_pembayaran'] != "TUNAI"){
			$bukti = $_FILES['foto']['name'];
		} else {
			$bukti = "TUNAI";
		}
		
		$query = mysql_query("insert into tbpembayaran values ('','$idadmin','$_POST[no_nota]','$_POST[keterangan]','DITERIMA','$bukti',now())");
		$getID = mysql_insert_id();
		$insert = mysql_query("insert into tbdetail_pembayaran values ('','$getID','$_POST[jenis_amal]','$_POST[metode_pembayaran]','$_POST[bank_tujuan]','$_POST[no_rek]','$_POST[jml]')");
		$masuk = mysql_query("insert into tbdetail_jamaah values ('','$idjamaah','$getID','$_POST[jns_jamaah]')");
				
		if($query && $insert && $masuk){
			?><script language="javascript">document.location.href="?page=pembayaran&status=0";</script><?php
		} else {
			?><script language="javascript">document.location.href="?page=pembayaran&status=1";</script><?php
		}
	} else{
		unset($_POST['simpan']);
	}
?>

<section class="content-header">
	<h1 class="box-title pull-left"><b>PEMBAYARAN JAMAAH</b><small>MASJID</small></h1><br><br>
	<?php
		if($_GET['status']=='1'){?>
			<div class="alert alert-dismissible alert-danger fade in">
				<button type="button" class="close" data-dismiss="alert"><i class="fa fa-remove"></i></button>
				<span class="fa fa-remove"></span>&nbsp;&nbsp;&nbsp;<strong>Data</strong></a> gagal disimpan.
			</div>
	<?php } 
		if($_GET['status']=='0'){?>
			<div class="alert alert-dismissible alert-success fade in">
				<button type="button" class="close" data-dismiss="alert"><i class="fa fa-remove"></i></button>
				<span class="fa fa-check"></span>&nbsp;&nbsp;&nbsp;<strong>Data</strong></a> berhasil disimpan.
			</div>
	<?php } ?>
</section>

<section class="content-header">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-info">
				<div class="box-body">	
					<div class="messages"></div>
					<?php
						if($id!=""){
							$select = mysql_query("select nm_jamaah from tbjamaah where id_jamaah = '$id'");
							$data = mysql_fetch_array($select);
							
							$nm = $data['nm_jamaah'];
						}
					?>
					<form action="?page=pembayaran" enctype="multipart/form-data" method="POST">
						<div class="controls">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<?php
											$queri = mysql_query("SELECT max(no_nota) as maxnota from tbpembayaran");
											$r = mysql_fetch_array($queri);
											
											$lastID = $r['maxnota'];
											$lastNoUrut = substr($lastID, 4, 9);
											$nextNoUrut = $lastNoUrut + 1;
											$nextID = "KWT-".sprintf("%03s",$nextNoUrut);
										?>
										<label>No. Nota</label>
										<input type="text" name="no_nota" value="<?php echo $nextID ?>" class="form-control"placeholder="Jumlah" readonly>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="form_ktp">Nama Admin</label>
										<input type="text" name="nama" class="form-control" value="<?php echo $nama ?>" placeholder="Nama Admin" readonly>
										<div class="help-block with-errors"> </div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5">
									<div class="form-group">
										<label for="id_keuangan">Nama Jamaah</label>
										<input type="text" name="nm_jamaah" class="form-control" value="<?php echo $nm; ?>" placeholder="Nama Jamaah" readonly required/>
										<?php echo $error; ?>
									</div>
								</div>
								<div class="col-md-1">
									<div class="form-group">
										<label for="id_keuangan"><font color="white">.</font></label>
										<a href="#" class="btn btn-block btn-primary" data-target="#ModalAdd" data-toggle="modal" name="simpan" >Cari</a>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="form_ktp">Jenis Jamaah</label>
										<select class="form-control" name="jns_jamaah" placeholder="Jenis Penerima" required/>
											<option value=''>------ PILIH ------</option>
											<option value="JAMAAH">JAMAAH MASJID</option>
											<option value="DONATUR BARU">DONATUR BARU</option>
											<option value="DONATUR TETAP">DONATUR TETAP</option>
											<option value="MUZAKI">MUZAKI</option>
										</select>
										<div class="help-block with-errors"></div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="id_keuangan">Jenis Amal</label>
										<select class="form-control" name="jenis_amal" id="id" onchange="changeValue(this.value)" required/>
											<option value=''>------ PILIH ------</option>
											<?php
												$queri = mysql_query("SELECT * from tbjns_amal where id_amal != '11'");
												while($r = mysql_fetch_array($queri)){
											?>
											<option value="<?php echo $r['id_amal'];?>"><?php echo $r['jenis_amal']; ?></option>									
											<?php } ?>
										</select>
									</div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<label for="id_keuangan">Metode Pembayaran</label>
										<select class="form-control" name="metode_pembayaran" id="metode"  onchange='cekJenis();' required/>
											<option value=''>------ PILIH ------</option>
											<option value="TUNAI">TUNAI</option>
											<option value="TRANSFER">TRANSFER</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="id_keuangan">Bank Tujuan</label>
										<select class="form-control" name="bank_tujuan" id="idbank"  onchange='cekJenis();' required/>
											<option value=''>------ PILIH ------</option>
											<option value="Bank BRI">Bank BRI</option>
											<option value="Bank BNI">Bank BNI</option>
											<option value="MANDIRI">MANDIRI</option>
											<option value="BCA">BCA</option>
										</select>
									</div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<label>Jumlah Bayar</label>
										<input type="text" name="jml" class="form-control"placeholder="Jumlah" required/>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>No. Rekening</label>
										<input type="text" name="no_rek" class="form-control" id="no_rek" onchange='cekJenis();' placeholder="No. Rekening" required/>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Bukti Transfer</label>
										<input type="file" name="foto" id="bukti" onchange='cekJenis();' required/>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="form_ktp">Keterangan</label>
										<textarea class="form-control" style="resize:none;" placeholder="Keterangan" name="keterangan" required/></textarea>
									</div>
								</div>
							</div>
						</div>
						
						
						<div class="modal-footer">
							<a href="?page=pembayaran" class="btn btn-default pull-left">Reset</a>
							<button type="submit" class="btn btn-success" name="simpan" >Simpan</button>
						</div><hr>
					</form>
				</div>
			</div>
			<!-- Modal Popup untuk Add--> 
		<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">

					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h4 class="modal-title" id="myModalLabel">LIST DATA JAMAAH</h4>
					</div>

					<div class="modal-body">
						<form action="?page=pembayaran" name="modal_popup" enctype="multipart/form-data" method="POST">
							<div class="form-group">
								<div class="form-group" style="padding-bottom: 10px;">
									<table data-toggle="table" data-show-refresh="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="amal">
										<thead>
											<tr>
												<th width="">Nama Jamaah</th>
											</tr>
										</thead>
					
										<?php
											$no = 0;
											$data=mysql_query("SELECT * FROM tbjamaah");
											while($r=mysql_fetch_array($data)){
											$no++;
										?>
											<tr>
												<td><a href="?page=pembayaran&id=<?php echo $r['id_jamaah'] ?>"> <?php echo  ucwords($r['nm_jamaah']); } ?></a></td>
											</tr>
									</table>
								</div>
							
								<div class="modal-footer">
									<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script>
    function cekJenis(){
		if(document.getElementById('metode').value == "TUNAI"){
			document.getElementById('no_rek').disabled = true;
			document.getElementById('idbank').disabled = true;
			document.getElementById('bukti').disabled = true;
		} else {
			document.getElementById('no_rek').disabled = false;
			document.getElementById('idbank').disabled = false;
			document.getElementById('bukti').disabled = false;
		}
    }
</script>