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

<header id="head" class="secondary"></header>

<!-- container -->
<div class="container">

	<div class="row">
		<article class="col-xs-12 maincontent">
			<ol class="breadcrumb">
				<li><a href="?module=homeuser">Home</a></li>
				<li><a href="?module=riwayatdonasi">Riwayat Donasi</a></li>
				<li class="active">Detail Riwayat Donasi</li>
			</ol>
		
			<header class="page-header">
				<h3 class="page-title"><b>Detail Riwayat Donasi</b></h3>
			</header>
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-body">	
							<div class="box-body">	
							<div class="messages"></div>
							<?php
								if($id!=""){
									$select = mysql_query("select tbpembayaran.no_nota as nota, tbjamaah.nm_jamaah as nm, tbdetail_pembayaran.jml_donasi as jml, tbjns_amal.jenis_amal as jnsamal,
												tbdetail_pembayaran.bank_asal as bankAsal, tbdetail_pembayaran.bank_tujuan as bankTujuan, tbdetail_pembayaran.no_rek as rek, tbadmin.nama as namaAdm,
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
									$namaAdm = $data['namaAdm'];
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
											<label><font color="white"> : &nbsp;&nbsp;&nbsp;&nbsp;</font></label><img class="img-responsive" alt="Foto Upload" src="adminpage/upload/<?php echo $bukti; ?>" width=220 height=240>
										</div>
									</div>
									<?php } ?>
								</div><br />
								<div class="modal-footer">
									<a href="?module=riwayatdonasi" class="btn btn-danger pull-left"><i class="fa fa-caret-left"></i>&nbsp;&nbsp;&nbsp;Kembali</a>
									<?php 
									if($status != "BELUM DITERIMA"){?>
									<a href="?module=riwayatdonasi" class="btn btn-primary"><i class="fa fa-print"></i>&nbsp;&nbsp;&nbsp;Cetak</a>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</article>
	</div>
</div>