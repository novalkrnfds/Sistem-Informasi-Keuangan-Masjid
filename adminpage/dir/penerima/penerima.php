<section class="content-header">
	<h1 class="box-title"><b>DATA PENERIMA SANTUNAN</b><small>TABLE</small></h1><br>
</section>

<section class="content-header">
	<div class="row">
		
		<div class="col-md-2">
			<div class="box box-solid">
				<a href="?page=setup_penerima" class="btn btn-block btn-primary"><i class="fa fa-plus"></i>&nbsp;&nbsp;&nbsp;&nbsp;Tambah Data&nbsp;&nbsp;</a>
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
				<div class="box-header"></div>
				<!-- /.box-header -->
				<div class="box-body">
					<table data-toggle="table" id="table-style" data-row-style="rowStyle" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						<thead>
							<tr>
								<th width="10px">No</th>
								<th width="15%">Nama</th>
								<th width="">Jns Penerima</th>
								<th width="">Telepon</th>
								<th width="20%">Alamat</th>
								<th width="">Action</th>
							</tr>
						</thead>
					
							<?php
								$no = 0;
								$data=mysql_query("SELECT * FROM tbpenerima");
								while($r=mysql_fetch_array($data)){
								$no++;
							?>
						<tr>
							<td align="center"><?php echo $no; ?></td>
							<td><?php echo  ucwords($r['nama_penerima']); ?></td>
							<td><?php echo  $r['jns_penerima']; ?></td>	
							<td><?php echo  $r['no_telp']; ?></td>	
							<td><?php echo  $r['alamat']; ?></td>
							<td align="center">
								<a href="?page=setup_penerima&id=<?php echo $r['id_penerima'] ?>" title="Edit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
								<a href="#" name="deletePenerima" class="btn btn-danger btn-sm" onclick="confirm_modal('dir/penerima/delete_penerima.php?&id_penerima=<?php echo  $r['id_penerima']; ?>');" title="Delete" ><span class="glyphicon glyphicon-trash"></span></a>
								<?php } ?>
							</td>
						</tr>
					</table>
				</div>
            <!-- /.box-body -->
			</div>
		</div>
		
		<!-- Modal Popup untuk delete--> 
		<div class="modal fade" id="deletePenerima">
			<div class="modal-dialog">
				<div class="modal-content" style="margin-top:100px;">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" style="text-align:center;">Are you sure to delete this data ?</h4>
					</div>
						
					<div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
						<a href="#" class="btn btn-primary btn-sm" id="delete_link">Delete</a>
						<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>