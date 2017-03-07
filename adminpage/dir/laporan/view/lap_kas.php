<section class="content-header">
	<h1 class="box-title pull-left"><b>LAPORAN KAS</b><small>MASJID</small></h1><br><br>
</section>

<section class="content-header">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header"><h3 class="box-title">Cetak Semua</h3></div>
				<div class="box-body">
					<!-- Date -->
					<div class="controls">
						<div class="row">
							<div class="col-md-5"></div>
							<div class="col-md-4"><br><br>
								<div class="form-group">
									<form class="form-horizontal row-fluid" action="report.php?page=report_kas_all" method="POST" target="blank">
										<div class="control-group">
											<div class="controls">
												<input type="submit" name="cetaksemua" class="btn btn-success" value="Cetak Laporan"><br><br><br><br>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header"><h3 class="box-title">Cetak Berdasarkan Periode</h3></div>
				<div class="box-body">
					<!-- Date -->
					<form class="form-horizontal row-fluid" action="report.php?page=report_per_kas" method="POST" target="blank">
						<label for="inputEmail3" class="col-sm-4 control-label">Dari Tanggal</label>
						<div class="col-md-5">
							<div class="form-group">
								<div class="input-group" style="padding-bottom: 10px;">
									<input type="text" id="dateRep" name="tgl_awal" class="form-control input-sm">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
								</div>
							</div>
						</div>
						<label for="inputPassword3" class="col-sm-4 control-label">Sampai Tanggal</label>
						<div class="col-md-5">
							<div class="form-group">
								<div class="input-group" style="padding-bottom: 10px;">
									<input type="text" id="dateRep2" name="tgl_akhir" class="form-control input-sm">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4"></div>
						<div class="col-md-5">
							<div class="form-group">
							<input type="submit" name="cetaksemua" class="btn btn-success" value="Cetak Laporan">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>