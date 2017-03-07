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
				<li class="active">Laporan KAS</li>
			</ol>
		
			<header class="page-header">
				<h3 class="page-title"><b>Laporan KAS Masjid</b></h3>
			</header>
			
			<div class="row">
				<div class="col-md-12 col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
							<ul class="nav nav-tabs ">
                                <li class="active"><a href="#pemasukkan" data-toggle="tab"><i class="fa fa-folder-open"></i> PEMASUKKAN</a></li>
                                <li class=""><a href="#pengeluaran" data-toggle="tab"><i class="fa fa-users"></i> PENGELUARAN</a></li>
                            </ul>
							<div class="tab-content">
                                <div class="tab-pane fade active in" id="pemasukkan"><br>
									<?php include("dir/laporan/includePemasukkan.php");?>
								</div>
                                <div class="tab-pane fade" id="pengeluaran"><br>
									<?php include("dir/laporan/includePengeluaran.php");?>
								</div>
							</div>
							<div class="col-md-12">
								<div class="controls">
									<div class="row">
										<div class="row">
											<div class="col-md-3">
												<div class="form-group">
													<label><font size="2">SALDO PEMASUKKAN : </label><br>
													<?php
														$getData1 = mysql_query("select sum(saldo) as total from tbkeuangan");
														$data1 = mysql_fetch_array($getData1);?>
													<i><b><label style="text-decoration:underline;"><?php echo "Rp. ".number_format($data1['total'],0,',','.').",-";?></label></i></b>
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label><font size="2">SALDO PENGELUARAN : </label><br>
													<?php
														$getData2 = mysql_query("select sum(jumlah) as jumlah from tbpengeluaran");
														$data2 = mysql_fetch_array($getData2);?>
													<i><b><label style="text-decoration:underline;"><?php echo "Rp. ".number_format($data2['jumlah'],0,',','.').",-";?></label></i></b>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-3">
												<div class="form-group"><br>
													<?php
														$total = ($data1['total'] - $data2['jumlah']);
														if($total < 0){
															$total = "0";
														}
													?>
													<label><font size="2">SALDO AKHIR : </label><br>
													<i><b><label style="text-decoration:underline;"><?php echo "Rp. ".number_format($total,0,',','.').",-";?></label></i></b>
												</div>
											</div>
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