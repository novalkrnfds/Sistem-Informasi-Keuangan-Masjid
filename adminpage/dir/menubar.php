<?php
	$aktif = $_GET['page'];
?>
<section class="sidebar">
	<!-- Sidebar user panel -->
	
	<!-- search form -->
	<form action="#" method="get" class="sidebar-form">
		<div class="input-group">
			<input type="text" name="q" class="form-control" placeholder="Search...">
			<span class="input-group-btn">
				<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
			</span>
		</div>
	</form>
	<!-- /.search form -->
	
	<!-- sidebar menu: : style can be found in sidebar.less -->
	<ul class="sidebar-menu">
		<li class="header">MAIN NAVIGATION</li>
		<li class="<?php if(($aktif == "home") || ($aktif == "detail")){ echo"active"; } ?>"><a href="?page=home"><i class="fa fa-home"></i><span>Beranda</span></a></li>
		
		<li class="<?php if(($aktif == "jamaah") || ($aktif == "setup_jamaah") || ($aktif == "penerima") || ($aktif == "setup_penerima") || ($aktif == "muzaki") || ($aktif == "jnsamal") || ($aktif == "admin")){ echo"active"; } ?> treeview">
			<a href="#">
				<i class="fa fa-files-o"></i>
				<span>Master Data</span>
				<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
			</a>
			<ul class="treeview-menu">
				<li class="<?php if(($aktif == "jamaah") || ($aktif == "setup_jamaah")){ echo"active"; } ?>"><a href="?page=jamaah"><i class="fa fa-angle-double-right "></i> Jamaah</a></li>
				<li class="<?php if(($aktif == "penerima") || ($aktif == "setup_penerima")){ echo"active"; } ?>"><a href="?page=penerima"><i class="fa fa-angle-double-right "></i> Penerima Santunan</a></li>
				<li class="<?php if($aktif == "jnsamal"){ echo"active"; } ?>"><a href="?page=jnsamal"><i class="fa fa-angle-double-right "></i> Jenis Amal</a></li>
				<li class="<?php if($aktif == "admin"){ echo"active"; } ?>"><a href="?page=admin"><i class="fa fa-angle-double-right "></i> Admin</a></li>
			</ul>
		</li>
	
		<li class="<?php if(($aktif == "setup_pemasukan" ) || ($aktif == "setup_pengeluaran")){ echo"active"; } ?>">
			<a href="#">
				<i class="fa fa-th"></i> 
				<span>Kas Masjid</span>
				<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
			</a>
			<ul class="treeview-menu">
				<li class="<?php if($aktif == "setup_pemasukan"){ echo"active"; } ?>"><a href="?page=setup_pemasukan"><i class="fa fa-angle-double-right "></i> Pemasukan</a></li>
				<li class="<?php if($aktif == "setup_pengeluaran"){ echo"active"; } ?>"><a href="?page=setup_pengeluaran"><i class="fa fa-angle-double-right "></i> Pengeluaran</a></li>
			</ul>
		</li>
	
		<li class="<?php if(($aktif == "pembayaran" ) || ($aktif == "santunan")){ echo"active"; } ?>">
			<a href="#">
				<i class="fa fa-credit-card"></i>
				<span>Transaksi</span>
				<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
			</a>
		
			<ul class="treeview-menu">
				<li class="<?php if($aktif == "pembayaran"){ echo"active"; } ?>"><a href="?page=pembayaran"><i class="fa fa-angle-double-right"></i> Pembayaran Jamaah</a></li>
				<li class="<?php if($aktif == "santunan"){ echo"active"; } ?>"><a href="?page=santunan"><i class="fa fa-angle-double-right"></i> Santunan</a></li>
			</ul>
		</li>
		
		<li class="<?php if(($aktif == "data_pembayaran" ) || ($aktif == "data_santunan")){ echo"active"; } ?>">
			<a href="#">
				<i class="fa  fa-file-text"></i>
				<span>Data Transaksi</span>
				<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
			</a>
		
			<ul class="treeview-menu">
				<li class="<?php if($aktif == "data_pembayaran"){ echo"active"; } ?>"><a href="?page=data_pembayaran"><i class="fa fa-angle-double-right"></i> Data Pembayaran</a></li>
				<li class="<?php if($aktif == "data_santunan"){ echo"active"; } ?>"><a href="?page=data_santunan"><i class="fa fa-angle-double-right"></i> Data Santunan</a></li>
			</ul>
		</li>
		
		<li class="header">Laporan</li>
			<li class="<?php if($aktif == "lap_kas"){ echo"active"; } ?>"><a href="?page=lap_kas"><i class="fa fa-book "></i> <span>Kas Masjid</span></a></li>
			<li class="<?php if($aktif == "lap_donasi"){ echo"active"; } ?>"><a href="?page=lap_donasi"><i class="fa fa-sticky-note "></i> <span>Donasi</span></a></li>
			<li class="<?php if($aktif == "lap_santunan"){ echo"active"; } ?>"><a href="?page=lap_santunan"><i class="fa fa-tasks "></i> <span>Santunan</span></a></li>
				
		<li class="header">Tools</li>
		<li class="<?php if($aktif == "bckres"){ echo"active"; } ?>"><a href="?page=bckres"><i class="fa fa-upload"></i> <span>Backup and Restore Data</span></a></li>
	</ul>
</section>