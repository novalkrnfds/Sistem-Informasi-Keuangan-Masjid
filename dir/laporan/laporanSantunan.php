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
				<li class="active">Laporan Santunan</li>
			</ol>
		
			<header class="page-header">
				<h3 class="page-title"><b>Laporan Pemberian Santunan</b></h3>
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
											<th>Nama</th>
											<th>Tanggal</th>
											<th>Keterangan</th>
											<th>Jumlah</th>
										</tr>
									</thead>
										<?php 
											$no = 0;
											$select = mysql_query("select distinct tbsantunan.tgl_input as tgl, group_concat(tbpenerima.nama_penerima separator '<br><p align=left>') as nm,
																   group_concat(replace(format(tbsantunan.jumlah, 0), ',','.') separator '<br><p align=right>') as jumlah, 
																   group_concat(tbsantunan.keterangan separator '<br><p align=left>') as ket from
																   tbpenerima,tbsantunan where tbsantunan.id_penerima=tbpenerima.id_penerima group by tbsantunan.tgl_input");
											while($data = mysql_fetch_array($select)){
											$no++
										?>
										<tr>
											<td><font size="2"><?php echo $no; ?></td>
											<td><font size="2"><?php echo date('d F Y', strtotime($data['tgl'])); ?></td>
											<td><font size="2"><?php echo "<p align='left'>".ucwords($data['nm']); ?></td>
											<td><font size="2"><?php echo "<p align='left'>".ucwords($data['ket']); ?></td>
											<td><font size="2"><b><?php echo "<p align='right'>".$data['jumlah']; ?></b></p></td>
										</tr>
										<?php } ?>
								</table>
								<?php
									$getData = mysql_query("select sum(tbsantunan.jumlah) as santunan from tbsantunan");
									$data = mysql_fetch_array($getData);
								?>
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label><font size="2">TOTAL SALDO SANTUNAN : </label><br>
											<i><b><label style="text-decoration:underline;"><?php echo "Rp. ".number_format($data['santunan'],0,',','.').",-"?></label></i></b>
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
	