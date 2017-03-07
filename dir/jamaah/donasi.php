<?php
	$id = $_GET['id'];
	
	if(isset($_POST['simpan'])){
		
		$getdata = mysql_query("select id_jamaah from tbjamaah where email = '$_SESSION[email]'");
		$d = mysql_fetch_array($getdata);
		$idjamaah = $d['id_jamaah'];
		
		if ($_FILES['foto']['type']=="image/jpeg" || $_FILES['foto']['type']=="" || $_FILES['foto']['type']=="image/png" || $_FILES['foto']['type']=="image/gif" && $_FILES['foto']['size'] <=2000000 && $_FILES['foto']['error'] == 0){
			$foto=$_FILES['foto']['tmp_name'];
			$nama_foto=$_FILES['foto']['name'];
			$dir="adminpage/upload/";
			$upload=$dir.$nama_foto;
			move_uploaded_file($_FILES['foto']['tmp_name'],$upload);
		} else{
			echo "<script>alert('File tidak sesuai dengan ketentuan. Ulangi !');
			window.location='?module=donasi'</script>";
		}
		
		if($_POST['metode_pembayaran'] != "TUNAI"){
			$bukti = $_FILES['foto']['name'];
		} else {
			$bukti = "TUNAI";
		}
		
		$query = mysql_query("insert into tbpembayaran values ('','1','$_POST[no_nota]','$_POST[keterangan]','BELUM DITERIMA','$bukti',now())");
		$getID = mysql_insert_id();
		$insert = mysql_query("insert into tbdetail_pembayaran values ('','$getID','$_POST[jenis_amal]','$_POST[metode_pembayaran]','$_POST[bank_tujuan]','$_POST[no_rek]','$_POST[jml]')");
		$masuk = mysql_query("insert into tbdetail_jamaah values ('','$idjamaah','$getID','$_POST[jns_jamaah]')");
		
		if($query && $insert && $masuk){
			?><script language="javascript">document.location.href="?module=donasi&status=0";</script><?php
		} else {
			?><script language="javascript">document.location.href="?module=donasi&status=1";</script><?php
		}
	} else{
		unset($_POST['simpan']);
	}
?>

<?php
	if(isset($_SESSION['email'])){
?>

<header id="head" class="secondary"></header>

<!-- container -->
<div class="container">

	<div class="row">
		<article class="col-xs-12 maincontent">
		<?php
		if($_GET['module'] == "donasi"){?>
			<ol class="breadcrumb">
				<li><a href="?module=homeuser"><i class="fa fa-home"></i> Home</a></li>
				<li class="active">Donasi</li>
			</ol><?php
		} else {?>
			<ol class="breadcrumb">
				<li><a href="?module=homeuser">Home</a></li>
				<li class="active">Riwayat Donasi</li>
			</ol><?php
		}?>
		
			<header class="page-header">
				<?php
					if($_GET['module'] == "donasi"){
						?><h3 class="page-title"><b>Donasi</b></h3><?php 
					} else {
						?><h3 class="page-title"><b>Riwayat Donasi</b></h3><?php 
					}
				?>
			</header>
			
			<?php		
				if($_GET['status']=='0'){ ?>
					<div class="alert alert-success alert-dismissible fade in">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<i class="icon fa fa-check"></i><strong> Donasi berhasil disimpan!</strong> Mohon tunggu admin akan mengkonfirmasi donasi anda.
					</div><?php
				}
				if($_GET['status']=='1'){?>
					<div class="alert alert-danger alert-dismissible fade in">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<i class="icon fa fa-ban"></i><strong> Donasi gagal disimpan!</strong> Silahkan ulangi kembali.
					</div>
			<?php } ?>
			
			<?php
				if($_GET['module']  == "donasi"){ ?>
					<div class="row">
						<div class="col-md-12 ">
							<div class="panel panel-default">
								<div class="panel-body">
									<div class="box-body">	
									<div class="messages"></div>
									<?php
											$select = mysql_query("select nm_jamaah from tbjamaah where email = '$_SESSION[email]'");
											$data = mysql_fetch_array($select);
											
											$nm = $data['nm_jamaah'];
									?>
										<form action="?module=donasi" enctype="multipart/form-data" method="POST">
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
															<label for="id_keuangan">Nama Jamaah</label>
															<input type="text" name="nm_jamaah" class="form-control" value="<?php echo ucwords($nm); ?>" placeholder="Nama Jamaah" readonly required/>
															<?php echo $error; ?>
														</div>
													</div>
												</div>
												<div class="row">
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
													<div class="col-md-6">
														<div class="form-group">
															<label for="id_keuangan">Jenis Amal</label>
															<select class="form-control" name="jenis_amal" id="id" onchange="changeValue(this.value)" required/>
																<option value=''>------ PILIH ------</option>
																<?php
																	$queri = mysql_query("SELECT * from tbjns_amal where id_amal != '11' ");
																	while($r = mysql_fetch_array($queri)){
																?>
																<option value="<?php echo $r['id_amal'];?>"><?php echo $r['jenis_amal']; ?></option>									
																<?php } ?>
															</select>
														</div>
													</div>
												</div>
												<div class="row">
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
													
													<div class="col-md-6">
														<div class="form-group">
															<label for="id_keuangan">Bank Tujuan</label>
															<select class="form-control" name="bank_tujuan" id="idbank"  onchange='cekJenis();' required/>
																<option value=''>------ PILIH ------</option>
																<option value="Bank BRI">Bank BRI</option>
																<option value="Bank BNI">Bank BNI</option>
																<option value="MANDIRI">MANDIRI</option>
																<option value="BCA">BCA</option>
																<option value="PEMBAYARAN CASH">PEMBAYARAN CASH</option>
															</select>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label>Jumlah Bayar</label>
															<input type="text" name="jml" class="form-control"placeholder="Jumlah" required/>
														</div>
													</div>
													
													<div class="col-md-6">
														<div class="form-group">
															<label>No. Rekening</label>
															<input type="text" name="no_rek" id="no_rek" onchange='cekJenis();' class="form-control" placeholder="No. Rekening" required/>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label for="form_ktp">Keterangan</label>
															<textarea class="form-control" style="resize:none;" placeholder="Keterangan" name="keterangan" required/></textarea>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label>Bukti Transfer</label>
															<input type="file" name="foto" onchange='cekJenis();' id="bukti" required/>
														</div>
													</div>
												</div>
											</div>
											
											
											<div class="modal-footer">
												<a href="?module=donasi" class="btn btn-danger pull-left">Reset</a>
												<button type="submit" class="btn btn-primary" name="simpan" >Simpan</button>
											</div>
										</form>
									</div>
								
								</div>
							</div>
						</div>
					</div>
				<?php
			} 
			if($_GET['module'] == "riwayatdonasi"){?>
					<div class="row">
						<div class="col-md-12 ">
							<div class="panel panel-default">
								<div class="panel-body">
									<div class="box-body">
										<table data-toggle="table" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
											<thead>
												<tr>
													<th>No.</th>
													<th>Nama</th>
													<th>Tanggal</th>
													<th>Jumlah</th>
													<th>Status</th>
													<th>Action</th>
												</tr>
											</thead>
												<?php 
													$no = 0;
													$select = mysql_query("select tbpembayaran.id_pembayaran as id,tbjamaah.nm_jamaah as nm, tbpembayaran.tgl_bayar as tgl, tbpembayaran.status as status, 
																		   tbdetail_pembayaran.jml_donasi as jml, tbpembayaran.status as status
																		   from tbpembayaran,tbdetail_pembayaran,tbdetail_jamaah,tbjamaah where tbpembayaran.id_pembayaran=tbdetail_pembayaran.id_pembayaran and
																		   tbpembayaran.id_pembayaran=tbdetail_jamaah.id_pembayaran and tbjamaah.id_jamaah=tbdetail_jamaah.id_jamaah and tbjamaah.email='$_SESSION[email]'");
													while($data = mysql_fetch_array($select)){
													$no++
												?>
												<tr>
													<td><?php echo $no; ?></td>
													<td><?php echo ucfirst($data['nm']); ?></td>
													<td><?php echo date('d F Y', strtotime($data['tgl'])); ?></td>
													<td><?php echo "Rp. ".number_format($data['jml'], 0, ',', '.'); ?></td>
													<td><?php echo $data['status']; ?></td>
													<td>
														<center><a href="?module=detail_donasi&id=<?php echo $data['id'] ?>">Detail</a></center>
													</td>
												</tr>
												<?php } ?>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php
			}
				?>
		</article>
	</div>
</div>
<?php 
	} else {
		session_destroy();
		header('Location:home.php?module=signin&status=404');
	}
?>
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