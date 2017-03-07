<?php
	$id = $_GET['id'];
?>
<header id="head" class="secondary"></header>

<div class="container">

	<div class="row">
		<article class="col-xs-12 maincontent">
			<ol class="breadcrumb">
				<?php if($_SESSION['email']){?>
				<li><a href="?module=homeuser">Home</a></li>
				<?php } else {?>
				<li><a href="?module=home">Home</a></li>
				<?php } ?>
				<li class="active">List Data</li>
			</ol>
		
			<header class="page-header">
				<h3 class="page-title"><b>List Data</b></h3>
			</header>
			
			<div class="row">
				<div class="col-md-12 col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
						<?php if($_GET['module'] == "list"){?>
                            <ul class="nav nav-tabs ">
                                <li class="active"><a href="#jamaah" data-toggle="tab"><i class="fa fa-folder-open"></i> Jamaah/Donatur</a></li>
                                <li class=""><a href="#penerima" data-toggle="tab"><i class="fa fa-users"></i> Penerima Santunan</a></li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane fade active in" id="jamaah">
                                    <table data-toggle="table" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
										<thead>
											<tr>
												<th>NO.</th>
												<th>DATA JAMAAH/DONATUR MASJID</th>
												<th>ACTION</th>
											</tr>
										</thead>
											<?php 
												$no = 0;
												$select = mysql_query("select * from tbjamaah");
												while($data = mysql_fetch_array($select)){
												$no++
											?>
											<tr>
												<td><font size="2"><?php echo $no; ?></font></td>
												<td><font size="2"><?php 
													  echo "Nama : ".$data['nm_jamaah'];
													  echo "<br>";
													  echo "Telepon : ".$data['no_telp'];
													  echo "<br>";
													  echo "Email : ".$data['email'];
													  echo "<br>";
													  echo "Alamat : ".$data['alamat']; ?></font>
												</td>
												<td>
													<center><font size="2"><a href="?module=detail_d&id=<?php echo $data['id_jamaah'] ?>">Detail</a></font></center>
												</td>
											</tr>
											<?php } ?>
									</table>
                                </div>
                                <div class="tab-pane fade" id="penerima">
                                    <table data-toggle="table" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
										<thead>
											<tr>
												<th>NO.</th>
												<th>DATA PENERIMA SANTUNAN MASJID</th>
												<th>ACTION</th>
											</tr>
										</thead>
											<?php 
												$no = 0;
												$select = mysql_query("select * from tbpenerima");
												while($data = mysql_fetch_array($select)){
												$no++
											?>
											<tr>
												<td><font size="2"><?php echo $no; ?></font></td>
												<td><font size="2"><?php 
													  echo "Nama : ".$data['nama_penerima'];
													  echo "<br>";
													  echo "Tempat, Tanggal Lahir : ".$data['tmp_lahir'].", ".date('d F Y', strtotime($data['tgl_lahir']));
													  echo "<br>";
													  echo "Jenis Kelamin : ".$data['jns_kel'];
													  echo "<br>";
													  echo "Jenis Penerima : ".$data['jns_penerima'];
													  echo "<br>";
													  echo "Telepon : ".$data['no_telp'];
													  echo "<br>";
													  echo "Alamat : ".ucwords($data['alamat']); ?></font>
												</td>
												<td>
													<center><font size="2"><a href="?module=detail_p&id=<?php echo $data['id_penerima'] ?>">Detail</a></font></center>
												</td>
											</tr>
											<?php } ?>
									</table>
                                </div>
                            </div>
						<?php }
						
						if($_GET['module'] == "detail_d"){?>
							<div class="controls">
							</div>
							<?php if($id != ""){
									$baca = mysql_query("select * from tbjamaah where id_jamaah = '$id'");
									$get = mysql_fetch_array($baca);
								}
							?>
							<div class="controls">
								<div class="row">
									<div class="col-md-2">
										<p>Nama</p>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<input type="text" class="form-control input-sm" value="<?php echo $get['nm_jamaah']; ?>" disabled/>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-2">
										<p>No. Telepon</p>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<input type="text" class="form-control input-sm" value="<?php echo $get['no_telp']; ?>" disabled/>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-2">
										<p>Email</p>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<input type="text" class="form-control input-sm" value="<?php echo $get['email']; ?>" disabled/>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-2">
										<p>Alamat</p>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<textarea class="form-control input-sm" style="resize:none;" disabled/><?php echo $get['alamat']; ?></textarea>
										</div>
									</div>
								</div>
							</div><br />
							<div class="modal-footer">
								<a href="?module=list" class="btn btn-danger pull-left">Kembali</a>
							</div>
						<?php }
						if($_GET['module'] == "detail_p"){
						?>
							<div class="controls">
							</div>
							<?php if($id != ""){
									$baca = mysql_query("select * from tbpenerima where id_penerima = '$id'");
									$get = mysql_fetch_array($baca);
								}
							?>
							<div class="controls">
								<div class="row">
									<div class="col-md-2">
										<p>Nama</p>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<input type="text" class="form-control input-sm" value="<?php echo $get['nama_penerima']; ?>" disabled/>
										</div>
									</div>
									<div class="col-md-1"></div>
									<div class="col-md-2">
										<p>Jenis Kelamin</p>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<input type="text" class="form-control input-sm" value="<?php echo $get['jns_kel']; ?>" disabled/>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-2">
										<p>No. Telepon</p>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<input type="text" class="form-control input-sm" value="<?php echo $get['no_telp']; ?>" disabled/>
										</div>
									</div>
									<div class="col-md-1"></div>
									<div class="col-md-2">
										<p>Jenis Penerima</p>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<input type="text" class="form-control input-sm" value="<?php echo $get['jns_penerima']; ?>" disabled/>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-2">
										<p>Tempat, Tanggal Lahir</p>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<input type="text" class="form-control input-sm" value="<?php echo $get['tmp_lahir'].", ".date('d F Y', strtotime($get['tgl_lahir'])); ?>" disabled/>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-2">
										<p>Alamat</p>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<textarea class="form-control input-sm" style="resize:none;" disabled/><?php echo $get['alamat']; ?></textarea>
										</div>
									</div>
								</div>
							</div><br />
							<div class="modal-footer">
								<a href="?module=list" class="btn btn-danger pull-right">Kembali</a>
							</div>
						<?php } ?>
                        </div> 
                    </div>
                </div>
			</div>	
		</article>
	</div>
</div>