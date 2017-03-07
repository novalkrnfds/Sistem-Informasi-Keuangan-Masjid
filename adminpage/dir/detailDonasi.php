<?php
	$id = $_GET['id'];
	
	$admin = $_SESSION['username'];
	$getIdAdmin = mysql_query("select id_admin from tbadmin where username='$admin'");
	$data = mysql_fetch_array($getIdAdmin);
	$idAdmin = $data['id_admin'];
	
	if(isset($_POST['terima'])){
		if($id != ""){
			$insert = mysql_query("update tbpembayaran set id_admin='$idAdmin', status = 'DITERIMA' where id_pembayaran='$id'");
		}
		
		if($insert){
			?><script language="javascript">document.location.href="?page=home&status=0";</script><?php
		} else {
			?><script language="javascript">document.location.href="?page=home&status=1";</script><?php
		}
	
	} else {
		unset($_POST['terima']);
	}
?>

<section class="content-header">
	<h1 class="box-title pull-left"><b>DETAIL DONASI</b><small>MASJID</small></h1><br><br>
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
					<div class="box-body">	
					<div class="messages"></div>
					<?php
						if($id!=""){
							$select = mysql_query("select tbpembayaran.no_nota as nota, tbjamaah.nm_jamaah as nm, tbdetail_pembayaran.jml_donasi as jml, tbjns_amal.jenis_amal as jnsamal,
										tbdetail_pembayaran.bank_asal as bankAsal, tbdetail_pembayaran.bank_tujuan as bankTujuan, tbdetail_pembayaran.no_rek as rek, 
										tbpembayaran.tgl_bayar as tglBayar, tbpembayaran.bukti_tf as bukti, tbpembayaran.keterangan as ket, tbpembayaran.status as status, tbpembayaran.id_pembayaran as id
										from tbadmin,tbjamaah,tbpembayaran,tbdetail_pembayaran,tbdetail_jamaah,tbjns_amal where tbjamaah.id_jamaah=tbdetail_jamaah.id_jamaah and 
										tbdetail_jamaah.id_pembayaran=tbpembayaran.id_pembayaran and tbdetail_pembayaran.id_pembayaran=tbpembayaran.id_pembayaran and 
										tbadmin.id_admin=tbpembayaran.id_admin and tbjns_amal.id_amal=tbdetail_pembayaran.id_amal and tbpembayaran.id_pembayaran='$id'");
							$data = mysql_fetch_array($select);
							
							$nota = $data['nota'];
							$nm = $data['nm'];
							$jml = $data['jml'];
							$jnsamal = $data['jnsamal'];
							$bankAsal = $data['bankAsal'];
							$bankTujuan = $data['bankTujuan'];
							$rek = $data['rek'];
							$tgl = $data['tglBayar'];
							$bukti = $data['bukti'];
							$ket = $data['ket'];
							$status = $data['status'];
							$link = $data['id'];
						}
					?>
						<div class="controls">
						</div>
						<div class="controls">
							<div class="row">
								<div class="col-md-2">
									<label>No. Nota</label>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<input type="text" class="form-control input-sm" value="<?php echo $nota;?>" disabled/>
									</div>
								</div>
								<div class="col-md-1"></div>
								<div class="col-md-2">
									<label>Keterangan</label>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<input type="text" class="form-control input-sm" value="<?php echo $ket; ?>" disabled/>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-2">
									<label>Nama Jamaah</label>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<input type="text" class="form-control input-sm" value="<?php echo $nm; ?>" disabled/>
									</div>
								</div>
								<div class="col-md-1"></div>
								<div class="col-md-2">
									<label>Tanggal Donasi</label>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<input type="text" class="form-control input-sm" value="<?php echo date('d F Y', strtotime($tgl)); ?>" disabled/>
									</div>
								</div>	
							</div>
							<div class="row">
								<div class="col-md-2">
									<label>Jumlah Donasi</label>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<input type="text" class="form-control input-sm" value="<?php echo "Rp. ".number_format($jml, 0, ',', '.'); ?>" disabled/>
									</div>
								</div>
								<div class="col-md-1"></div>
								<div class="col-md-2">
									<label>Status</label>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<input type="text" class="form-control input-sm" value="<?php echo $status; ?>" disabled/>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-2">
									<label>Jenis Amal</label>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<input type="text" class="form-control input-sm" value="<?php echo $jnsamal; ?>" disabled/>
									</div>
								</div>
							</div>
							<?php
								if($bankTujuan == "PEMBAYARAN CASH"){?>
							<div class="row">
								<div class="col-md-2">
									<label>Jenis Pembayaran</label>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<input type="text" class="form-control input-sm" value="<?php echo $bankTujuan; ?>" disabled/>
									</div>
								</div>
							</div><?php
							} else { ?>
							<div class="row">
								<div class="col-md-2">
									<label>Jenis Pembayaran</label>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<input type="text" class="form-control input-sm" value="BANK TRANSFER" disabled/>
									</div>
								</div>
							</div><?php
							}
								if($bankTujuan != "PEMBAYARAN CASH"){?>
							<div class="row">
								<div class="col-md-2">
									<label>Bank Tujuan</label>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<input type="text" class="form-control input-sm" value="<?php echo $bankTujuan; ?>" disabled/>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-2">
									<label>Bank Asal</label>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<input type="text" class="form-control input-sm" value="<?php echo $bankAsal; ?>" disabled/>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-2">
									<label>No. Rekening</label>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<input type="text" class="form-control input-sm" value="<?php echo $rek; ?>" disabled/>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-2">
									<label>Bukti Transfer</label>
								</div>
								<div class="col-md-3">
									<input type="text" class="form-control input-sm" value="<?php echo $bukti; ?>" disabled/>
								</div>
							</div>
							<div class="row">
								<div class="col-md-2">
								</div>
								<div class="col-md-4">
									<label><font color="white"> : &nbsp;&nbsp;&nbsp;&nbsp;</font></label><img class="img-responsive" alt="Foto Upload" src="upload/<?php echo $bukti; ?>" width=220 height=240>
								</div>
							</div>
							<?php } ?>
						</div><br />
						<div class="modal-footer">
							<a href="?page=home" class="btn btn-default pull-left">Tutup</a>
							<button type="submit" class="btn btn-success" data-target="#ModalAdd" data-toggle="modal" >Terima</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">

					<form action="?page=detail&id=<?php echo $link ?>" name="modal_popup" enctype="multipart/form-data" method="POST">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title" style="text-align:center;">Konfirmasi anda akan menerima donasi?</h4>
							</div>
			
							<div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
								<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
								<button type="submit" class="btn btn-primary" name="terima" >Terima</button>
							</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>