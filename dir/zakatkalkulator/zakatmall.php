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
				<li class="active">Zakat Emas & Perak</li>
			</ol>
		
			<header class="page-header">
				<h3 class="page-title"><b>Zakat Emas & Perak</b></h3>
			</header>
			
			<div class="row">
				<div class="col-md-12 col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
							<div class="box-body">
								<p align="justify">Untuk menghitung zakat emas dan perak yang telah tersimpan selama <strong>1 tahun hijriyah</strong>. Zakat yang dikeluarkan adalah sebesar <strong>2,5%</strong>.<br /><p>
								- Nishab emas adalah <strong>85 gram</strong>.<br />
								- Nishab perak adalah <strong>595 gram</strong>.<br /><br />
								<div class="panel panel-default">
									<div class="panel-heading"><b>Yang dimiliki</b></div>
								</div>
								<form class="form-horizontal">
									<div class="box-body">
										<div class="form-group">
											<div class="col-sm-1"></div>
											<label for="inputEmail3" class="col-sm-2 control-label">Emas</label>

											<div class="col-sm-3">
												<input type="text" id="emas" class="form-control input_angka" onkeyup="validasiAngka(this); zc_emas_perak();" onblur="validasi_numstring(this);">
											</div>
											<div class="col-sm-3">
												<label class="control-label">gram</label>
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-1"></div>
											<label for="inputPassword3" class="col-sm-2 control-label">Perak</label>

											<div class="col-sm-3">
												<input type="text" id="perak" class="form-control input_angka" onkeyup="validasiAngka(this); zc_emas_perak();" onblur="validasi_numstring(this);">
											</div>
											<div class="col-sm-3">
												<label class="control-label">gram</label>
											</div>
										</div>
									</div>
								</form>
								<div class="panel panel-default">
									<div class="panel-heading"><b>Zakat</b></div>
								</div>
								<form class="form-horizontal">
									<div class="box-body">
										<div class="form-group">
											<div class="col-sm-1"></div>
											<label for="inputEmail3" class="col-sm-2 control-label">.:. Zakat Emas</label>

											<div class="col-sm-3">
												<input type="text" id="zakat_emas" class="form-control input_angka" disabled="disabled" />
											</div>
											<div class="col-sm-3">
												<label class="control-label">gram</label>
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-1"></div>
											<label for="inputPassword3" class="col-sm-2 control-label">.:. Zakat Perak</label>

											<div class="col-sm-3">
												<input type="text" id="zakat_perak" class="form-control input_angka" disabled="disabled" />
											</div>
											<div class="col-sm-3">
												<label class="control-label">gram</label>
											</div>
										</div>
									</div>
								</form>
								<div class="panel panel-default">
									<div class="panel-heading"><b>Zakat (jika dibayarkan dengan uang)</b></div>
								</div>
								<form class="form-horizontal">
									<div class="box-body">
										<div class="form-group">
											<div class="col-sm-1"></div>
											<label for="inputEmail3" class="col-sm-2 control-label">Hrg 1 gram Emas Rp.</label>

											<div class="col-sm-3">
												<input type="text" id="harga_emas" class="form-control input_angka" onkeyup="validasiAngka(this); zc_emas_perak();" onblur="validasi_numstring(this);" value="511.000,00" />
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-1"></div>
											<label for="inputPassword3" class="col-sm-2 control-label">Hrg 1 gram Perak Rp.</label>

											<div class="col-sm-3">
												<input type="text" id="harga_perak" class="form-control input_angka" onkeyup="validasiAngka(this); zc_emas_perak();" onblur="validasi_numstring(this);" value="11.000,00" />
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-1"></div>
											<label for="inputEmail3" class="col-sm-2 control-label">Zakat Emas Rp.</label>

											<div class="col-sm-3">
												<input type="text" id="zakat_emas_uang" class="form-control input_angka" disabled="disabled" />
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-1"></div>
											<label for="inputEmail3" class="col-sm-2 control-label">Zakat Perak Rp.</label>

											<div class="col-sm-3">
												<input type="text" id="zakat_perak_uang" class="form-control input_angka" disabled="disabled" />
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-1"></div>
											<label for="inputEmail3" class="col-sm-2 control-label">.:. Total Rp.</label>

											<div class="col-sm-3">
												<input type="text" id="zakat_total_uang" class="form-control input_angka" disabled="disabled" />
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</article>
	</div>
</div>