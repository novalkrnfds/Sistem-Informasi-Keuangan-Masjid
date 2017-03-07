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
				<li class="active">Laporan Donasi</li>
			</ol>
		
			<header class="page-header">
				<h3 class="page-title"><b>Laporan Penerimaan Donasi</b></h3>
			</header>
			
			<div class="row">
				<div class="col-md-12 col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
							<div class="box-body">
								<table data-toggle="table" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
									<thead>
										<tr>
											<th>No.</th>
											<th>Tanggal</th>
											<th>Nama</th>
											<th>Jenis</th>
											<th>Jumlah</th>
										</tr>
									</thead>
										<?php 
											$no = 0;
											$select = mysql_query("select distinct tbpembayaran.tgl_bayar as tgl, group_concat(tbjamaah.nm_jamaah separator '<br><p align=left>') as nm, 
																   group_concat(replace(format(tbdetail_pembayaran.jml_donasi, 0), ',','.') separator '<br><p align=right>') as jml, 
																   group_concat(tbjns_amal.jenis_amal separator '<br><p align=left>') as jnsAmal
																   from tbpembayaran,tbdetail_pembayaran,tbdetail_jamaah,tbjns_amal,tbjamaah where tbpembayaran.id_pembayaran=tbdetail_pembayaran.id_pembayaran and
																   tbpembayaran.id_pembayaran=tbdetail_jamaah.id_pembayaran and tbjamaah.id_jamaah=tbdetail_jamaah.id_jamaah
																   and tbdetail_pembayaran.id_amal=tbjns_amal.id_amal and tbpembayaran.status='DITERIMA' group by tbpembayaran.tgl_bayar");
											while($data = mysql_fetch_array($select)){
											$no++
										?>
										<tr>
											<td><font size="2"><?php echo $no; ?></td>
											<td><font size="2"><?php echo date('d F Y', strtotime($data['tgl'])); ?></td>
											<td><font size="2"><?php echo "<p align=left>".ucwords($data['nm']); ?></td>
											<td><font size="2"><?php echo "<p align=left>".ucwords($data['jnsAmal']); ?></td>
											<td><font size="2"><b><?php echo "<p align=right>".$data['jml']; ?></b></p></td>
										</tr>
										<?php } ?>
								</table>
								<?php
									$getData = mysql_query("select sum(tbdetail_pembayaran.jml_donasi) as donasi from tbpembayaran,tbdetail_pembayaran where tbdetail_pembayaran.id_pembayaran=tbpembayaran.id_pembayaran
															and tbpembayaran.status='DITERIMA'");
									$data = mysql_fetch_array($getData);
								?>
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label><font size="2">TOTAL SALDO DONASI : </label><br>
											<i><b><label style="text-decoration:underline;"><?php echo "Rp. ".number_format($data['donasi'],0,',','.').",-"?></label></i></b>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</article>		
	</div>
</div>
	