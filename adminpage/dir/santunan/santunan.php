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
		$id_penerima = $_POST['id_penerima'];
		$jml = $_POST['jml'];
		$ket = $_POST['keterangan'];
		
		if($id==""){
			$query = mysql_query("insert into tbsantunan values('','$id_penerima','$idadmin','$jml','$ket',now())");
		} else{
			$query = mysql_query("update tbsantunan set id_admin='$idadmin', id_penerima='$id_penerima', jumlah='$jml', keterangan='$ket' where id_santunan='$id'"); 
		}
		
		if($query){
			?><script language="javascript">document.location.href="?page=santunan&status=0";</script><?php
		} else {
			?><script language="javascript">document.location.href="?page=santunan&status=1";</script><?php
		}
	} else{
		unset($_POST['save']);
	}
?>

<section class="content-header">
	<h1 class="box-title pull-left"><b>DATA SANTUNAN</b><small>MASJID</small></h1><br><br>
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
							$kueri = mysql_query("select tbsantunan.id_santunan as id_san, tbsantunan.jumlah as jumlah,tbsantunan.keterangan as keterangan, tbsantunan.id_penerima as id_penerima,
												tbpenerima.jns_penerima as jns from tbpenerima,tbsantunan where tbsantunan.id_santunan = '$id' and tbsantunan.id_penerima=tbpenerima.id_penerima");
							$data = mysql_fetch_array($kueri);
							
							$idpenerima = $data['id_penerima'];
							$jmla = $data['jumlah'];
							$keter = $data['keterangan'];
							$jns = $data['jns'];
							$link = $data['id_san'];

						}
					?>
					<form action="?page=santunan&id=<?php echo $link ?>" enctype="multipart/form-data" method="POST">
						<div class="controls">
						</div>
						<div class="controls">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="id_keuangan">Nama Penerima</label>
										<select class="form-control" name="id_penerima" id="id" onchange="changeValue(this.value)" required/>
											<option value=''>------ PILIH ------</option>
											<?php
												$queri = mysql_query("SELECT id_penerima,nama_penerima,jns_penerima from tbpenerima");
												$jsArray = "var jnsPenerima = new Array();\n";
												while($r = mysql_fetch_array($queri)){
											?>
											<option value="<?php echo $r['id_penerima'];?>"<?php if($r['id_penerima'] == $idpenerima){ echo"selected";}?>><?php echo $r['nama_penerima']; ?></option>
											<?php $jsArray .= "jnsPenerima['" . $r['id_penerima'] . "'] = {jns:'" . addslashes($r['jns_penerima']) ."'};\n";											
											} ?>
										</select>
									</div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<label>Jenis Penerima</label>
										<input type="text" id="jp" class="form-control" value="<?php echo $jns ?>" placeholder="Jenis Penerima" readonly disabled/>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Jumlah</label>
										<input type="text" name="jml" value="<?php echo $jmla ?>" class="form-control"placeholder="Jumlah" required/>
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
								<div class="col-md-12">
									<div class="form-group">
										<label for="form_ktp">Keterangan</label>
										<textarea class="form-control" style="resize:none;" placeholder="Keterangan" name="keterangan" required/><?php echo $keter ?></textarea>
									</div>
								</div>
							</div>
						</div>
						
						
						<div class="modal-footer">
							<a href="?page=santunan" class="btn btn-default pull-left">Reset</a>
							<button type="submit" class="btn btn-success" name="simpan" >Simpan</button>
						</div><hr>
					</form>
				</div>
				<div class="box-body">
					<table data-toggle="table" id="table-style" data-row-style="rowStyle" data-show-refresh="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="amal">
						<thead>
							<tr>
								<th width="">No</th>
								<th width="">Nama Penerima</th>
								<th width="">Jenis Santunan</th>
								<th width="">Jumlah Santunan</th>
								<th width="">Tanggal Santunan</th>
								<th width="">Action</th>
							</tr>
						</thead>
						
						<?php
							$no = 0;
							$data=mysql_query("SELECT tbsantunan.id_santunan as id, tbpenerima.nama_penerima as nama, tbsantunan.keterangan as ket, tbsantunan.jumlah as jml, tbsantunan.tgl_input as tgl FROM tbsantunan,tbpenerima where tbsantunan.id_penerima=tbpenerima.id_penerima");
							while($r=mysql_fetch_array($data)){
							$no++;
						?>
							<tr>
								<td><?php echo $no; ?></td>
								<td><?php echo $r['nama']; ?></td>
								<td><?php echo $r['ket']; ?></td>
								<td><?php echo "Rp. ".number_format($r['jml'], 0, ',', '.'); ?></td>
								<td><?php echo date('d F Y', strtotime($r['tgl'])); ?></td>
								<td align="center">
									<center><a href="?page=santunan&id=<?php echo $r['id'] ?>" class='btn btn-primary btn-xs'>&nbsp;<span class="fa fa-wrench"></span>&nbsp;&nbsp;&nbsp;Edit&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></center>
									<?php } ?>
								</td>
							</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>