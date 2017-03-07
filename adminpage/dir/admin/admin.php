<section class="content-header">
	<h1 class="box-title"><b>DATA ADMIN</b><small>TABLE</small></h1><br>
</section>

<section class="content-header">
	<div class="row">
		
		<div class="col-md-2">
			<div class="box box-solid">
				<a href="#" class="btn btn-block btn-primary" data-target="#ModalAdd" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp;&nbsp;&nbsp;&nbsp;Tambah Data&nbsp;&nbsp;</a>
			</div>
		</div>
		
		<?php
			if($_GET['status']=='1'){?>
				<div class="col-md-12">
					<div class="alert alert-dismissible alert-danger fade in">
						<button type="button" class="close" data-dismiss="alert"><i class="fa fa-remove"></i></button>
						<span class="fa fa-remove"></span>&nbsp;&nbsp;&nbsp;<strong>Data</strong></a> gagal disimpan.
					</div>
				</div>
		<?php } 
			if($_GET['status']=='0'){?>
				<div class="col-md-12">
					<div class="alert alert-dismissible alert-success fade in">
						<button type="button" class="close" data-dismiss="alert"><i class="fa fa-remove"></i></button>
						<span class="fa fa-check"></span>&nbsp;&nbsp;&nbsp;<strong>Data</strong></a> berhasil disimpan.
					</div>
				</div>
		<?php }
			if($_GET['status']=='2'){?>
				<div class="col-md-12">
					<div class="alert alert-dismissible alert-success fade in">
						<button type="button" class="close" data-dismiss="alert"><i class="fa fa-remove"></i></button>
						<span class="fa fa-check"></span>&nbsp;&nbsp;&nbsp;<strong>Data</strong></a> berhasil dihapus.
					</div>
				</div>
		<?php } ?>
	
		<div class="col-md-12">
			<div class="box box-info">
				<div class="box-header">
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" id="table-style" data-pagination="true" data-row-style="rowStyle" data-sort-name="admin" data-sort-order="asc">
						<thead>
							<tr>
								<th data-sortable="true" data-field="admin" width="40px">No</th>
								<th width="">Nama Admin</th>
								<th width="">Username</th>
								<th width="">Password</th>
								<th width="">Action</th>
							</tr>
						</thead>
			
							<?php
								$no = 0;
								$data = mysql_query("SELECT * FROM tbadmin");
								while($r = mysql_fetch_array($data)){
								$no++;
							?>
							<tr>
								<td align="center"><?php echo $no; ?></td>
								<td><?php echo  ucwords($r['nama']); ?></td>
								<td><?php echo  ucwords($r['username']);?></td>
								<td><?php echo  ucwords($r['password']);?></td>
								<td align="center">
									<a href="#" class='open_admin btn btn-primary btn-xs' id='<?php echo  $r['id_admin']; ?>'>&nbsp;<span class="fa fa-wrench"></span>&nbsp;&nbsp;&nbsp;Edit&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
									<a href="#" name="deleteAdmin" class="btn btn-danger btn-xs" onclick="confirm_modalAdmin('dir/admin/delete_admin.php?&id_admin=<?php echo  $r['id_admin']; ?>');">&nbsp;<span class="fa fa-remove"></span>&nbsp;Delete&nbsp;&nbsp;&nbsp;</a>
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
						<h4 class="modal-title" id="myModalLabel">INPUT DATA ADMIN</h4>
					</div>

					<div class="modal-body">
						<form action="dir/admin/admin.php" name="modal_popup" enctype="multipart/form-data" method="POST">
							<div class="form-group"><div class="form-group" style="padding-bottom: 10px;">
								<label>Nama Admin</label>
								<input type="text" name="nama"  class="form-control" placeholder="Nama Admin" required/></div>
							</div>
							
							<div class="form-group"><div class="form-group" style="padding-bottom: 10px;">
								<label>Username</label>
								<input type="text" name="username"  class="form-control" placeholder="Username" required/></div>
							</div>
							
							<div class="form-group"><div class="form-group" style="padding-bottom: 10px;">
								<label>Password</label>
								<input type="password" name="password"  class="form-control" placeholder="Password" required/></div>
							</div>
							
							<div class="modal-footer">
								<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary" name="save" >Save changes</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Modal Popup untuk Edit--> 
		<div id="ModalEditAdmin" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			
		</div>
		
		<!-- Modal Popup untuk delete--> 
		<div class="modal fade" id="deleteAdmin">
			<div class="modal-dialog">
				<div class="modal-content" style="margin-top:100px;">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" style="text-align:center;">Are you sure to delete this data ?</h4>
					</div>
						
					<div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
						<a href="#" class="btn btn-primary btn-sm" id="delete_admin">Delete</a>
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
		$nama = $_POST['nama'];
		$username = $_POST['username'];
		$password = base64_encode($_POST['password']);
		mysql_query("INSERT INTO tbadmin VALUES ('','$nama','$username','$password')");
		header('location:../../home.php?page=admin&status=0');
	}
	?>