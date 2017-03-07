<?php 
	$pengguna=($_SESSION['email']);
	$aktif = $_GET['module'];
?>

<?php
	if(isset($_SESSION['email'])){ ?>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav pull-right">
				<li class="<?php if($aktif == "homeuser"){ echo"active"; }?>"><a href="?module=homeuser">Home</a></li>
				
				<li class="dropdown <?php if(($aktif == "lap_kas") || ($aktif == "lap_donasi") || ($aktif == "lap_santunan")){ echo "active";}?>">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Laporan <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li class="<?php if($aktif == "lap_kas"){ echo "active"; }?>"><a href="?module=lap_kas">Laporan KAS</a></li>
						<li class="<?php if($aktif == "lap_donasi"){ echo "active"; }?>"><a href="?module=lap_donasi">Laporan Donasi</a></li>
						<li class="<?php if($aktif == "lap_santunan"){ echo "active"; }?>"><a href="?module=lap_santunan">Laporan Santunan</a></li>
					</ul>
				</li>
				
				<li class="<?php if(($aktif == "list") || ($aktif == "detail_d") || ($aktif == "detail_p")){ echo "active"; }?>"><a href="?module=list">List Data</a></li>
				
				<li class="<?php if($aktif == "donasi"){ echo "active"; }?>"><a href="?module=donasi">Donasi</a></li>
				
				<li class="dropdown <?php if(($aktif == "zakatmall") || ($aktif == "zakatuang") || ($aktif == "zakatdagangan") || ($aktif == "zakattanian") || ($aktif == "zakathewan") || ($aktif == "zakathartatemuan")){ echo "active";}?>">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Kalkulator Zakat <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li class="<?php if($aktif == "zakatmall"){ echo "active"; }?>"><a href="?module=zakatmall">Zakat Emas & Perak</a></li>
						<li class="<?php if($aktif == "zakatuang"){ echo "active"; }?>"><a href="?module=zakatuang">Zakat Uang</a></li>
						<li class="<?php if($aktif == "zakatdagangan"){ echo "active"; }?>"><a href="?module=zakatdagangan">Zakat Perdagangan</a></li>
						<li class="<?php if($aktif == "zakattanian"){ echo "active"; }?>"><a href="?module=zakattanian">Zakat Pertanian</a></li>
						<li class="<?php if($aktif == "zakathewan"){ echo "active"; }?>"><a href="?module=zakathewan">Zakat Hewan Ternak</a></li>
						<li class="<?php if($aktif == "zakathartatemuan"){ echo "active"; }?>"><a href="?module=zakathartatemuan">Zakat Harta Temuan</a></li>
					</ul>
				</li>
				
				<li class="dropdown <?php if(($aktif == "user") || ($aktif == "changepass") || ($aktif == "riwayatdonasi") || ($aktif == "detail_donasi") || ($aktif == "userprofiledit")){ echo "active"; }?>">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo"<i class='fa fa-smile-o'></i> Hi, ".$pengguna; ?><b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li class="<?php if(($aktif == "user") || ($aktif == "userprofiledit")){ echo "active"; }?>"><a href="?module=user">User Profil</a></li>
						<li class="<?php if(($aktif == "riwayatdonasi") || ($aktif == "detail_donasi")){ echo "active"; }?>"><a href="?module=riwayatdonasi">Riwayat Donasi</a></li>
						<li><a href="dir/logout.php" id="logout" onclick="return confirm('Apakah anda yakin untuk keluar?')">Sign out</a></li>
					</ul>
				</li>
			</ul>
		</div>
		<?php
	} else { ?>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav pull-right">
				<li class="<?php if($aktif == "home"){ echo"active"; }?>"><a href="?module=home">Home</a></li>
								
				<li class="dropdown <?php if(($aktif == "lap_kas") || ($aktif == "lap_donasi") || ($aktif == "lap_santunan")){ echo "active";}?>">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Laporan <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li class="<?php if($aktif == "lap_kas"){ echo "active"; }?>"><a href="?module=lap_kas">Laporan KAS</a></li>
						<li class="<?php if($aktif == "lap_donasi"){ echo "active"; }?>"><a href="?module=lap_donasi">Laporan Donasi</a></li>
						<li class="<?php if($aktif == "lap_santunan"){ echo "active"; }?>"><a href="?module=lap_santunan">Laporan Santunan</a></li>
					</ul>
				</li>
				
				<li class="<?php if(($aktif == "list") || ($aktif == "detail_d") || ($aktif == "detail_p")){ echo "active"; }?>"><a href="?module=list">List Data</a></li>
				
				<li class="dropdown <?php if(($aktif == "zakatmall") || ($aktif == "zakatuang") || ($aktif == "zakatdagangan") || ($aktif == "zakattanian") || ($aktif == "zakathewan") || ($aktif == "zakathartatemuan")){ echo "active";}?>">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Kalkulator Zakat <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li class="<?php if($aktif == "zakatmall"){ echo "active"; }?>"><a href="?module=zakatmall">Zakat Emas & Perak</a></li>
						<li class="<?php if($aktif == "zakatuang"){ echo "active"; }?>"><a href="?module=zakatuang">Zakat Uang</a></li>
						<li class="<?php if($aktif == "zakatdagangan"){ echo "active"; }?>"><a href="?module=zakatdagangan">Zakat Perdagangan</a></li>
						<li class="<?php if($aktif == "zakattanian"){ echo "active"; }?>"><a href="?module=zakattanian">Zakat Pertanian</a></li>
						<li class="<?php if($aktif == "zakathewan"){ echo "active"; }?>"><a href="?module=zakathewan">Zakat Hewan Ternak</a></li>
						<li class="<?php if($aktif == "zakathartatemuan"){ echo "active"; }?>"><a href="?module=zakathartatemuan">Zakat Harta Temuan</a></li>
					</ul>
				</li>
				
				<li class="<?php if(($aktif == "signin") || ($aktif == "signup")){ echo "active"; }?>"><a class="btn" href="?module=signin">SIGN IN / SIGN UP</a></li>
			</ul>
		</div><?php
	}

?>