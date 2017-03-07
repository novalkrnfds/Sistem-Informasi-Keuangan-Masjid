
<form action="?module=lap_kas" class="form-horizontal" method="POST">
	<div class="col-md-1">
		<p class="control-label">Pilih Tgl</p>
	</div>
	<div class="col-md-2">
		<div class="form-group">
			<div class="input-group" style="padding-bottom: 10px;">
				<input type="text" id="dateFilter" name="tgl_awal" class="form-control input-sm">
				<div class="input-group-addon">
					<i class="fa fa-calendar"></i>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-1">
		<p class="control-label">sampai : </p>
	</div>
	<div class="col-md-2">
		<div class="form-group">
			<div class="input-group" style="padding-bottom: 10px;">
				<input type="text" id="dateFilter2" name="tgl_akhir" class="form-control input-sm">
				<div class="input-group-addon">
					<i class="fa fa-calendar"></i>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-2">
		<div class="form-group">
			
			<div class="input-group" style="padding-bottom: 20px;">
				<button type="submit" name="filter" class="btn btn-primary btn-sm">Filter</button>
			</div>
		</div>
	</div>
</form>
<table data-toggle="table" data-select-item-name="toolbar1" data-pagination="true" class="datatable-1 table table-bordered table-striped display" width="100%">
	<thead>
		<tr>
			<th>NO.</th>
			<th>TANGGAL MASUK</th>
			<th>URAIAN</th>
			<th>JUMLAH</th>
			<th>SALDO</th>
		</tr>
	</thead>
		<?php 
			$no = 0;
			$select = mysql_query("select distinct tbkeuangan.tgl_masuk as tglm, group_concat(tbdetail_keuangan.keterangan SEPARATOR '<br><p align=left>') as ketr,
								   group_concat(replace(format(tbdetail_keuangan.sub_saldo, 0), ',','.') separator '<br><p align=right>') as subs, sum(sub_saldo) as sumSub 
								   from tbdetail_keuangan,tbkeuangan
								   where tbkeuangan.id_keuangan=tbdetail_keuangan.id_keuangan group by tbkeuangan.tgl_masuk");
								   
			while($data = mysql_fetch_array($select)){
			$no++
		?>
		<tr>
			<td><font size="2"><?php echo $no; ?></font></td>
			<td><font size="2"><?php echo date('d F Y', strtotime($data['tglm'])); ?></font></td>
			<td><font size="2"><b><i><?php echo "<p align=left>".$data['ketr'];?></font></i></b></td>
			<td><font size="2"><?php echo "<p align=right>".$data['subs'];?></font></td>
			<td><p align="right"><b><font size="2"><?php echo "Rp. ".number_format($data['sumSub'], 0, ',', '.');?></font></td>
		</tr>
		<?php } ?>
</table>