<?php
	$pengguna=ucwords($_SESSION['username']);
?>		

<section class="content-header">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-solid">
				<div class="box-header with-border">
					<div class="pull-right hidden-xs">
						<?php
							$array_hari = array(1=>"Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");
							$hr = $array_hari[date('N')];
							
							$tgl = date('j');
							
							$array_bulan = array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
							$bln = $array_bulan[date('n')];
							
							$thn = date('Y');
							
							echo "<b>".$hr."</b>, ".$tgl." ".$bln." ".$thn;
							
						?>
					</div>
					<h1 class="box-title"><b>Selamat Datang,</b> <?php echo $pengguna;?> :)</h1>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<?php
			if($_GET['status'] == '0'){?>
			<div class="alert alert-dismissible alert-success fade in">
				<button type="button" class="close" data-dismiss="alert"><i class="fa fa-remove"></i></button>
				<span class="fa fa-check"></span>&nbsp;&nbsp;&nbsp;<strong>Donasi berhasil diterima</strong></a>.
			</div>
			<?php 
			} else {?>
			<div class="alert alert-dismissible alert-success fade in">
				<button type="button" class="close" data-dismiss="alert"><i class="fa fa-remove"></i></button>
				<strong>Selamat Datang</strong> di Website Sistem Informasi Keuangan <b>Masjid Al-Mukhlisin</b></a>.
			</div>
			<?php } ?>
		</div>
	</div>
</section>

<!-- Main content -->
<section class="content">
<!-- Small boxes (Stat box) -->
	<div class="row">
		<div class="col-lg-3 col-xs-6">
		<!-- small box -->
			<div class="small-box bg-aqua">
				<div class="inner">
					<p><strong>Data</strong></p>
					<h3>Jamaah</h3>
				</div>
				
				<div class="icon">
					<i class="ion ion-person-stalker"></i>
				</div>
				<a href="?page=jamaah" class="small-box-footer">Full Detail <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- ./col -->
		
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-green">
				<div class="inner">
					<p><strong>Data</strong></p>
					<h3>Penerima</h3>
				</div>
				
				<div class="icon">
					<i class="ion ion-ios-folder"></i>
				</div>	
				<a href="?page=penerima" class="small-box-footer">Full Detail <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>

		<!-- ./col -->
		<div class="col-lg-3 col-xs-6">
		<!-- small box -->
			<div class="small-box bg-yellow">
				<div class="inner">
					<p><strong>Data</strong></p>
					<h3>Jenis Amal</h3>
				</div>
				
				<div class="icon">
					<i class="ion ion-ios-paper"></i>
				</div>
				
				<a href="?page=jnsamal" class="small-box-footer">Full Detail <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>

		<!-- ./col -->
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-red">
				<div class="inner">
					<p><strong>Data</strong></p>
					<h3>Admin</h3>
				</div>
				
				<div class="icon">
					<i class="ion ion-person-add"></i>
				</div>
				<a href="?page=admin" class="small-box-footer">Full Detail <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- ./col -->
	</div>
	
	<!-- /.row -->
	<!-- Main row -->
	<div class="box">
		<div class="box-header">
            <h3 class="box-title">RECENT DONATIONS</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
			<table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
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
											   tbpembayaran.id_pembayaran=tbdetail_jamaah.id_pembayaran and tbjamaah.id_jamaah=tbdetail_jamaah.id_jamaah and tbpembayaran.status='BELUM DITERIMA'");
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
							<center><a href="?page=detail&id=<?php echo $data['id'] ?>" class='btn btn-primary btn-xs'>&nbsp;<span class="fa fa-arrow-right"></span>&nbsp;&nbsp;&nbsp;Detail&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></center>
						</td>
					</tr>
					<?php } ?>
            </table>
        </div>
    <!-- /.box-body -->
    </div>
<!-- /.row (main row) -->
</section>