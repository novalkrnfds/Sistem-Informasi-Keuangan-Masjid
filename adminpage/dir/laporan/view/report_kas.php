<html>
<head>
	<style type="text/css" media="print">
		table {border: solid 1px #000; border-collapse: collapse; width: 100%}
		tr { border: solid 1px #000; page-break-inside: avoid;}
		td { padding: 7px 5px; font-size: 10px}
		th {
			font-family: "Times New Roman", Times, serif;
			color: black;
			font-size: 11px;
			background-color: #999;
			padding: 10px 0;
		thead {
			display:table-header-group;
		}
		tbody {
			display:table-row-group;
		}
		h3 { margin-bottom: -17px }
		h2 { margin-bottom: 0px }
	</style>
	<style type="text/css" media="screen">
		table {border: solid 1px #000; border-collapse: collapse; width: 100%}
		tr { border: solid 1px #000}
		th {
			font-family: "Times New Roman", Times, serif;
			color: black;
			font-size: 11px;
			background-color: #999;
			padding: 10px 0;
		}
		td { padding: 7px 5px;font-size: 10px}
		h3 { margin-bottom: -17px }
		h2 { margin-bottom: 0px }
	</style>
	<title>Laporan KAS</title>
</head>

<body onLoad="window.print()">
	<center>
		<div align="center"><b style="font-size: 20px">MASJID JAMI'  AL-MUKHLISIN</b></div>
		<center>
			<p style="font-size: 16px">Sekretariat : Jalan Sukarela No. 3 Paninggilan, Kec. Ciledug<br>Kota Tangerang, Banten 15153</p>
			<hr align="center" size="3" noshade="noshade">
			<div align="left">
				<strong>Laporan KAS</strong>
			</div>
			<br>
		</center>
		<table border="1" cellspacing="0" cellpadding="0">
			<thead>
				<tr>
					<th width="10%">TANGGAL</td>
					<th width="20%">KEGIATAN</th>
					<th width="10%">JUMLAH</th>
					<th width="10%">SALDO</th>
				</tr>
			</thead>
			<tbody>
			<tr><td colspan="3"><strong><i>Pemasukkan Kas</i></strong></td></tr>
			<?php
				while($row = $this->model->fetch($data)){
				?>
					<tr class="odd gradeX">
						<td align="center"><?php echo date('d F Y', strtotime($row['tglMasuk']));?></td>
						<td><?php echo $row['ket'];?></td>
						<td align="right"><?php echo $row['sub'];?></td>
						<td align="center"><b><?php echo number_format($row['saldo'],0,',','.').".00,-";?></td>
					</tr>
				<?php
				} ?>
			<tr><td colspan="3"><strong><i>Pengeluaran Kas</i></strong></td></tr>
			<?php
				while($row = $this->model->fetch($getPengeluaran)){
				?>
					<tr class="odd gradeX">
						<td align="center"><?php echo date('d F Y', strtotime($row['tglKeluar']));?></td>
						<td><?php echo $row['ketPengeluaran'];?></td>
						<td align="right"><?php echo $row['jumlahPengeluaran'];?></td>
						<td align="center"><b><?php echo number_format($row['totalJumlah'],0,",",".").".00,-";?></td>
					</tr>
				<?php
				} ?>
				<tr>
					<th colspan="4"></th>
				</tr>
				<tr>
					<td colspan="3" style="padding:20px;" align="right"><strong>TOTAL SALDO AKHIR</strong></td>
					<td colspan="2" align="center"><strong>Rp. <?php $total = ($hitungPem['totalMasuk'] - $hitungPen['totalKeluar']); echo number_format($total,0,',','.').".00,-";?></strong></td>
				</tr>
			</tbody>
		</table>
		<br><br>
		<div style="width:100%;float:center">
			<div style="width:200px;float:left">
				<div align="center"><br/>
					Ketua DKM Masjid Jami' Al-Mukhlisin
				</div>
				<p align="center">&nbsp;</p>
				<p align="center"><br/>
				(.................................)</p>
			</div>
	
		<div style="width:200px;float:right">
			<div align="left">
				Kota Tangerang, <?php
				date_default_timezone_set('Asia/Jakarta');
				$tanggal= mktime(date("m"),date("d"),date("Y"));
				$tglsekarang = date("d-m-Y", $tanggal);
				echo $tglsekarang;
				?><br/>
				Bendahara,
			</div>
			<p align="left">&nbsp;</p>
			<p align="left"><br/><br/>
			(.................................)</p>
		</div>
</body>
</html>

