<?php
	$admin = $_SESSION['username'];
	$query = mysql_query("select nama from tbadmin where username='$admin'");
	$r = mysql_fetch_array($query);
	$nama = ucwords($r['nama']);
	
	if(isset($_POST['tambah'])){
		$id_keuangan = $_POST['id_kas'];
		$id_amal = $_POST['id_amal']; 
		$sub = $_POST['sub_saldo'];
		$ket = $_POST['keterangan'];
		
		$query = mysql_query("insert into tbdetail_keuangan values('','$id_keuangan','$id_amal','$sub','$ket')");
		if($query){
			?><script language="javascript">document.location.href="?page=setup_pemasukan&status=0";</script><?php
		} else {
			?><script language="javascript">document.location.href="?page=setup_pemasukan&status=1";</script><?php
		}
	} else {
		unset($_POST['tambah']);
	}
	
	
	if(isset($_POST['save'])){
		$saldo = $_POST['saldo'];
		$id_keuangan = $_POST['id_keuangan'];
		$nama_admin = $_POST['nama'];
		
		if($_POST['saldo'] != ""){
			$sql = mysql_query("SELECT id_admin from tbadmin where nama = '$nama_admin'");
			$r = mysql_fetch_array($sql);
			$idadmin = $r['id_admin'];
			$query = mysql_query("insert into tbkeuangan values('$id_keuangan','$idadmin','$saldo',now())");
				
			if($query){
				?><script language="javascript">document.location.href="?page=setup_pemasukan&status=2";</script><?php
			} else {
				?><script language="javascript">document.location.href="?page=setup_pemasukan&status=3";</script><?php
			}
		} else {
			?><script language="javascript">document.location.href="?page=setup_pemasukan&status=4";</script><?php
		}
	} else {
		unset($_POST['save']);
	}
	
?>

<section class="content-header">
	<h1 class="box-title pull-left"><b>REKAP KAS KEUANGAN</b><small>MASJID</small></h1><br><br>
	<?php
		if($_GET['status']=='1'){?>
			<div class="alert alert-dismissible alert-danger fade in">
				<button type="button" class="close" data-dismiss="alert"><i class="fa fa-remove"></i></button>
				<span class="fa fa-remove"></span>&nbsp;&nbsp;&nbsp;<strong>Data</strong></a> gagal ditambah.
			</div>
	<?php } 
		if($_GET['status']=='0'){?>
			<div class="alert alert-dismissible alert-success fade in">
				<button type="button" class="close" data-dismiss="alert"><i class="fa fa-remove"></i></button>
				<span class="fa fa-check"></span>&nbsp;&nbsp;&nbsp;<strong>Data</strong></a> berhasil ditambah.
			</div>
	<?php } 
		if($_GET['status']=='2'){?>
			<div class="alert alert-dismissible alert-success fade in">
				<button type="button" class="close" data-dismiss="alert"><i class="fa fa-remove"></i></button>
				<span class="fa fa-check"></span>&nbsp;&nbsp;&nbsp;<strong>Data</strong></a> berhasil disimpan.
			</div>
	<?php } 
		if($_GET['status']=='3'){?>
			<div class="alert alert-dismissible alert-danger fade in">
				<button type="button" class="close" data-dismiss="alert"><i class="fa fa-remove"></i></button>
				<span class="fa fa-remove"></span>&nbsp;&nbsp;&nbsp;<strong>Data</strong></a> gagal disimpan.
			</div>
	<?php } 
		if($_GET['status']=='4'){?>
			<div class="alert alert-dismissible alert-danger fade in">
				<button type="button" class="close" data-dismiss="alert"><i class="fa fa-remove"></i></button>
				<span class="fa fa-remove"></span>&nbsp;&nbsp;&nbsp;<strong>Data</strong></a> gagal disimpan, silakan lengkapi inputan terlebih dahulu.
			</div>
	<?php } ?>
</section>

<section class="content-header">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-info">
				<div class="box-body">	
					<div class="messages"></div>
					<form action="?page=setup_pemasukan" enctype="multipart/form-data" method="POST">
						<div class="controls">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<?php
											$queri = mysql_query("SELECT max(id_keuangan) as maxid from tbkeuangan");
											$r = mysql_fetch_array($queri);
											
											$lastID = $r['maxid'];
											$lastNoUrut = substr($lastID, 3, 9);
											$nextNoUrut = $lastNoUrut + 1;
											$nextID = "KAS".sprintf("%03s",$nextNoUrut);
										?>
										<label  for="basicinput" class="control-label">ID. Kas</label>
										<input type="text" name="id_kas" value="<?php echo $nextID; ?>" class="form-control" placeholder="ID. Kas" readonly>
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
						</div>
						<div class="controls">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="id_keuangan">Jenis Amal</label>
										<select class="form-control" name="id_amal" placeholder="Jenis Amal" required/>
											<option value=''>------ PILIH ------</option>
											<?php
												$queri = mysql_query("SELECT id_amal,jenis_amal from tbjns_amal");
												while($r = mysql_fetch_array($queri)){
											?>
											<option value="<?php echo $r['id_amal'];?>"><?php echo $r['jenis_amal']; ?></option>													
											<?php } ?>
										</select>
									</div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<label>Sub Saldo</label>
										<input type="text" name="sub_saldo" class="form-control" placeholder="Sub Saldo" required/>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Keterangan</label>
										<textarea name="keterangan" class="form-control" placeholder="Keterangan" required/></textarea>
									</div>
								</div>
							</div>
						</div>
						
						<div class="modal-footer">
							<button type="submit" class="btn btn-success" name="tambah" >Tambah</button>
						</div><hr>
					</form>
					<form action="?page=setup_pemasukan" enctype="multipart/form-data" method="POST">	
						<div class="controls">
							<div class="row">
								<div class="col-md-12">
								<input type="hidden" name="id_keuangan" value="<?php echo $nextID; ?>" class="form-control" placeholder="ID. Kas" readonly>
								<input type="hidden" name="nama" class="form-control" value="<?php echo $nama ?>" placeholder="Nama Admin" readonly>
									<div class="box">
										<!-- /.box-header -->
										<div class="box-body no-padding">
											<table class="table table-striped table-bordered">
												<tr>
													<th style="width: 50px">No</th>
													<th>Id Kas</th>
													<th>Jenis Amal</th>
													<th>Sub Saldo</th>
												</tr>
													<?php
														$no = 0;
														$data = mysql_query("SELECT tbdetail_keuangan.id_keuangan as keuangan, tbjns_amal.jenis_amal as amal, 
																			tbdetail_keuangan.sub_saldo as sub FROM 
																			tbjns_amal,tbdetail_keuangan where tbdetail_keuangan.id_keuangan = '$nextID' 
																			and tbjns_amal.id_amal=tbdetail_keuangan.id_amal");
														while($r=mysql_fetch_array($data)){
														$no++;
													?>
												<tr>
													<td><?php echo $no; ?></td>
													<td><?php echo ucwords($r['keuangan']);?></td>
													<td><?php echo ucwords($r['amal']);?></td>
													<td align="right"><?php echo number_format($r['sub'], 0, ',', '.');?></td>
												</tr>
												<?php } ?>
												<tr>
													<td colspan="2"></td>
													<td><b>TOTAL SALDO</b></td>
													<td  align="right"><b><?php
															$kueri = mysql_query("select sum(sub_saldo) as total_sub from tbdetail_keuangan where id_keuangan = '$nextID'");
															$row = mysql_fetch_array($kueri);
															$total = $row['total_sub'];
															echo "Rp. ".number_format($total, 0, ',', '.');?>
													</b></td>
												</tr>
											</table>
											<input type="hidden" name="saldo" value="<?php echo $total;?>" readonly>
										</div>
									<!-- /.box-body -->
									</div>
								</div>
							</div>
						</div><br><br>
						<div class="modal-footer">
							<button type="submit" class="btn btn-primary" name="save" >Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>