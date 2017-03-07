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
				<li class="active">Zakat Uang</li>
			</ol>
		
			<header class="page-header">
				<h3 class="page-title"><b>Zakat Emas & Perak</b></h3>
			</header>
			
			<div class="row">
				<div class="col-md-12 col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
							<div class="box-body">
								<p align="justify">Untuk menghitung zakat harta yang telah tersimpan selama <strong>1 tahun hijriyah</strong>. 
								Metode perhitungannya sama dengan zakat emas atau perak. Yaitu, dengan nisab senilai <strong>85 gram emas atau 595 gram perak</strong>. 
								Sedangkan zakatnya adalah sebesar <strong>2,5%</strong>.</p><br /><br />
								<div class="panel panel-default">
									<div class="panel-heading"><b>Nishab</b></div>
								</div>
								<form class="form-horizontal">
									<div class="box-body">
										<div class="form-group">
											<div class="col-sm-1"></div>
											<label for="inputEmail3" class="col-sm-3 control-label">Nishab Yang Digunakan</label>

											<div class="col-sm-3">
												<select name="opsi_nisab" class="form-control" id="opsi_nisab" onchange="zc_mal_nisab(); zc_mal_hitung();">
													<option value="emas" selected="selected">Emas</option>
													<option value="perak">Perak</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-1"></div>
											<label for="inputEmail3" class="col-sm-3 control-label">Harga 1 gram emas</label>

											<div class="col-sm-3">
												<input type="text" id="harga_emas" class="form-control input_angka" onkeyup="validasiAngka(this); zc_mal_nisab(); zc_mal_hitung();" onblur="validasi_numstring(this);" value="511.000,00" />
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-1"></div>
											<label for="inputEmail3" class="col-sm-3 control-label">Harga 1 gram perak</label>

											<div class="col-sm-3">
												<input type="text" id="harga_perak" class="form-control input_angka" onkeyup="validasiAngka(this); zc_mal_nisab(); zc_mal_hitung();" onblur="validasi_numstring(this);" value="11.000,00" disabled="disabled" />
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-1"></div>
											<label for="inputEmail3" class="col-sm-3 control-label"><b>.:. Nishab</b></label>

											<div class="col-sm-3">
												<input type="text" id="nisab" class="form-control input_angka" disabled="disabled" value="43.435.000,00" /> <input type="hidden" id="nisab_float" value="43435000.00" />
											</div>
										</div>
									</div>
								</form>
								<div class="panel panel-default">
									<div class="panel-heading"><b>Harta</b></div>
								</div>
								<form class="form-horizontal">
									<div class="box-body">
										<div class="form-group">
											<div class="col-sm-1"></div>
											<label for="inputEmail3" class="col-sm-3 control-label">Uang tunai dan tabungan</label>

											<div class="col-sm-3">
												<input type="text" id="uang_tabungan" class="form-control input_angka" onkeyup="validasiAngka(this); zc_mal_total_harta();" onblur="validasi_numstring(this);" />
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-1"></div>
											<label for="inputEmail3" class="col-sm-3 control-label">Saham & surat berharga lainnya <sup><font color="red">[1]</font></sup></label>

											<div class="col-sm-3">
												<input type="text" id="saham" class="form-control input_angka" onkeyup="validasiAngka(this); zc_mal_total_harta();" onblur="validasi_numstring(this);" />
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-1"></div>
											<label for="inputEmail3" class="col-sm-3 control-label">Piutang <sup><font color="red">[2]</font></sup></label>

											<div class="col-sm-3">
												<input type="text" id="piutang" class="form-control input_angka" onkeyup="validasiAngka(this); zc_mal_total_harta();" onblur="validasi_numstring(this);" />
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-1"></div>
											<label for="inputEmail3" class="col-sm-3 control-label"><b>.:. Total Harta</b></label>

											<div class="col-sm-3">
												<input type="text" id="total_harta" class="form-control input_angka" disabled="disabled" /> <input type="hidden" id="total_harta_float" />
											</div>
										</div>
									</div>
								</form>
								<div class="panel panel-default">
									<div class="panel-heading"><b>Kewajiban</b></div>
								</div>
								<form class="form-horizontal">
									<div class="box-body">
										<div class="form-group">
											<div class="col-sm-1"></div>
											<label for="inputEmail3" class="col-sm-3 control-label">Hutang <sup><font color="red">[3]</font></sup></label>

											<div class="col-sm-3">
												<input type="text" id="hutang" class="form-control input_angka" onkeyup="validasiAngka(this); zc_mal_total_kewajiban();" onblur="validasi_numstring(this);" />
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-1"></div>
											<label for="inputEmail3" class="col-sm-3 control-label"><strong>.:. Total Kewajiban</strong></label>

											<div class="col-sm-3">
												<input type="text" id="total_kewajiban" class="form-control input_angka" disabled="disabled" /> <input type="hidden" id="total_kewajiban_float" />
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
											<label for="inputEmail3" class="col-sm-3 control-label">Selisih harta & kewajiban</label>

											<div class="col-sm-3">
												<input type="text" id="selisih_harta" class="form-control input_angka" disabled="disabled" />
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-1"></div>
											<label for="inputEmail3" class="col-sm-3 control-label"><strong>.:. Zakat</strong></label>

											<div class="col-sm-3">
												<input type="text" id="zakat_harta" class="form-control input_angka" disabled="disabled" />
											</div>
										</div>
									</div>
								</form><br><br>
								<div id="footnote">
									Keterangan :
									<ol>
										<li><p align="justify">Termasuk di dalamnya adalah investasi seperti reksadana dkk. Khusus untuk saham, kami sarankan untuk membaca tulisan di <a href="http://konsultasisyariah.com/zakat-saham" target="_blank">KonsultasiSyariah.com</a>.</p></li>
										<li><p align="justify">Piutang yang diharapkan dapat kembali / ditagih.</p></li>
										<li><p align="justify">Cicilan hutang yang harus dibayar (jatuh tempo) dalam waktu dekat.</p></li>
									</ol>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</article>
	</div>
</div>