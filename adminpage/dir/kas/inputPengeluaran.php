<?php
	$id = $_GET['id'];
	
	$admin = $_SESSION['username'];
	$query = mysql_query("select id_admin from tbadmin where username='$admin'");
	$r = mysql_fetch_array($query);
	$idadmin = ucwords($r['id_admin']);
	
	if(isset($_POST['save'])){
		$id_admin = $_POST['idadmin'];
		$jns_peng = ucwords($_POST['jns_peng']);
		$jml = $_POST['jml'];
		
		if($id==""){
			$query = mysql_query("insert into tbpengeluaran values('','$id_admin','$jns_peng','$jml',now())");
		} else{
			$query = mysql_query("update tbpengeluaran set id_admin='$id_admin', jenis_pengeluaran='$jns_peng', jumlah='$jml' where id_pengeluaran='$id'"); 
		}
		
		if($query){
			?><script language="javascript">document.location.href="?page=setup_pengeluaran&status=0";</script><?php
		} else {
			?><script language="javascript">document.location.href="?page=setup_pengeluaran&status=1";</script><?php
		}
	} else{
		unset($_POST['save']);
	}
?>

<section class="content-header">
	<h1 class="box-title pull-left"><b>DATA KAS PENGELUARAN </b><small>MASJID</small></h1><br><br>
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
	<?php } 
		if($_GET['status']=='2'){?>
			<div class="alert alert-dismissible alert-success fade in">
				<button type="button" class="close" data-dismiss="alert"><i class="fa fa-remove"></i></button>
				<span class="fa fa-check"></span>&nbsp;&nbsp;&nbsp;<strong>Data</strong></a> berhasil dihapus.
			</div>
	<?php } ?>
</section>

<section class="content-header">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-info">
				<div class="box-body">
					<?php
						if($id!=""){
							$kueri = mysql_query("select * from tbpengeluaran where id_pengeluaran = '$id'");
							$data = mysql_fetch_array($kueri);
							
							$jns_peng = $data['jenis_pengeluaran'];
							$jml = $data['jumlah'];
							$link = $data['id_pengeluaran'];
						}
					?>
				
					<form action="?page=setup_pengeluaran&id=<?php echo $link ?>" enctype="multipart/form-data" method="POST">		
						<div class="messages"></div>
						<div class="controls">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
									<input type="hidden" name="idadmin" value="<?php echo $idadmin ?>">
										<label for="form_ktp">Jenis Pengeluaran</label>
										<input type="text" name="jns_peng" class="form-control" value="<?php echo $jns_peng ?>" placeholder="Jenis Pengeluaran" required="required" data-error="Jenis Pengeluaran Harus Diisi">
										<div class="help-block with-errors"> </div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="form_ktp">Jumlah</label>
										<input type="text" name="jml" class="form-control" value="<?php echo $jml ?>" placeholder="Jumlah" required="required" data-error="Jumlah Harus Diisi">
										<div class="help-block with-errors"> </div>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<a href="?page=setup_pengeluaran" class="btn btn-default pull-left">Reset</a>
							<button type="submit" class="btn btn-primary" name="save" >Confirm</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="box box-info">
				<div class="box-body">
					<table data-toggle="table" id="table-style" data-row-style="rowStyle" data-show-refresh="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="amal">
						<thead>
							<tr>
								<th width="">No</th>
								<th width="">Jenis Pengeluaran</th>
								<th width="">Jumlah</th>
								<th width="">Tanggal</th>
								<th width="">Action</th>
							</tr>
						</thead>
						
						<?php
							$no = 0;
							$data=mysql_query("SELECT * FROM tbpengeluaran");
							while($r=mysql_fetch_array($data)){
							$no++;
						?>
							<tr>
								<td><?php echo $no; ?></td>
								<td><?php echo $r['jenis_pengeluaran']; ?></td>
								<td><?php echo "Rp. ".number_format($r['jumlah'], 0, ',', '.'); ?></td>
								<td><?php echo date('d F Y', strtotime($r['tgl_keluar'])); ?></td>
								<td align="center">
									<a href="?page=setup_pengeluaran&id=<?php echo $r['id_pengeluaran'] ?>" class='btn btn-primary btn-xs'>&nbsp;<span class="fa fa-wrench"></span>&nbsp;&nbsp;&nbsp;Edit&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
									<a href="#" name="deletePeng" class="btn btn-danger btn-xs" onclick="confirm_modalPeng('dir/kas/delete.php?&id_pengeluaran=<?php echo  $r['id_pengeluaran']; ?>');">&nbsp;<span class="fa fa-remove"></span>&nbsp;Delete&nbsp;&nbsp;&nbsp;</a>
									<?php } ?>
								</td>
							</tr>
					</table>
				</div>
			</div>
		</div>
		<!-- Modal Popup untuk delete--> 
		<div class="modal fade" id="deletePeng">
			<div class="modal-dialog">
				<div class="modal-content" style="margin-top:100px;">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" style="text-align:center;">Are you sure to delete this data ?</h4>
					</div>
						
					<div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
						<a href="#" class="btn btn-primary btn-sm" id="delete_peng">Delete</a>
						<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>