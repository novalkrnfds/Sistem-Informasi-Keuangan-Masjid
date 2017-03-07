<section class="content-header">
	<h1 class="box-title"><b>DATA JENIS AMAL</b><small>TABLE</small></h1><br>
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
		
		<div class="col-md-2">
			<div class="box box-solid">
				<a href="#" class="btn btn-block btn-primary" data-target="#ModalAdd" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp;&nbsp;&nbsp;&nbsp;Tambah Data&nbsp;&nbsp;</a>
			</div>
		</div>
		
		<div class="col-md-12">
			<div class="box box-info">
				<div class="box-header"></div>
				<!-- /.box-header -->
				<div class="box-body">
					<table data-toggle="table" id="table-style" data-row-style="rowStyle" data-show-refresh="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="amal">
						<thead>
							<tr>
								<th width="">No</th>
								<th width="">Jenis Amal</th>
								<th width="">Action</th>
							</tr>
						</thead>
			
								<?php
									$no = 0;
									$data=mysql_query("SELECT * FROM tbjns_amal");
									while($r=mysql_fetch_array($data)){
									$no++;
								?>
							<tr>
								<td align="center"><?php echo $no; ?></td>
								<td><?php echo  ucwords($r['jenis_amal']); ?></td>
								<td align="center">
									<a href="#" class='open_modal btn btn-primary btn-sm' title="Edit" id='<?php echo  $r['id_amal']; ?>' class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
									<a href="#" name="deleteAmal" class="btn btn-danger btn-sm" title="Delete" onclick="confirm_modalAmal('dir/amal/delete_amal.php?&id_amal=<?php echo  $r['id_amal']; ?>');"><span class="glyphicon glyphicon-trash"></span></a>
									<?php } ?>
								</td>
							</tr>
					</table>
				</div>
            <!-- /.box-body -->
			</div>
		</div>
		
		<!-- Modal Popup untuk Add--> 
		<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h4 class="modal-title" id="myModalLabel">INPUT DATA JENIS AMAL</h4>
				</div>

				<div class="modal-body">
					<form action="dir/amal/jns_amal.php" name="modal_popup" enctype="multipart/form-data" method="POST">
						<div class="form-group"><div class="form-group" style="padding-bottom: 10px;">
						<label>Jenis Amal</label>
							<input type="text" name="jenis_amal"  class="form-control" placeholder="Jenis Amal" required/></div>
						</div>
						
						<div class="modal-footer">
							<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
							<button type="submit" class="btn btn-primary" name="save" >Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		</div>
		
		<!-- Modal Popup untuk Edit--> 
		<div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			
		</div>
		
		<!-- Modal Popup untuk delete--> 
		<div class="modal fade" id="deleteAmal">
			<div class="modal-dialog">
				<div class="modal-content" style="margin-top:100px;">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" style="text-align:center;">Are you sure to delete this data ?</h4>
					</div>
						
					<div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
						<a href="#" class="btn btn-primary btn-sm" id="delete_amal">Delete</a>
						<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
	include "../../config/koneksi.php";
	
	if(isset($_POST['save'])){
		$jnsamal = $_POST['jenis_amal'];
		$query = mysql_query("INSERT INTO tbjns_amal VALUES ('','$jnsamal')");
		if($query){
			header('location:../../home.php?page=jnsamal&status=0');
		} else {
			header('location:../../home.php?page=jnsamal&status=1');
		}
	}
	?>