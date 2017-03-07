<section class="content-header">
	<h1 class="box-title"><b>Backup and Restore</b><small>DATABASE</small></h1><br>
</section>
<section class="content-header">
	<div class="row">
		<div class="col-md-6">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Backup</a></li>
              <li><a href="#tab_2" data-toggle="tab">Restore</a></li>
              <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <b>Backup Database</b><br><br><br>

                <a href="?p=bnr&mod=backup" class="btn btn-flat- btn-primary">Klik Disini</a> untuk mulai backup Database<br><br><br><br>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
				<b>Restore Database</b><br><br><br>
				<form class="form-horizontal" enctype="multipart/form-data" method="post">
					<fieldset>
						<!-- Name input-->
						<div class="form-group">
							<div class="col-md-4">
								<input type="file" name="restore">
								<p><font color="red">*.sql</p>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-4">
								<input type="submit" class="btn btn-flat- btn-primary" name="restore" value="Proses" id="tombol" 
								onclick="return konfirmasi('Restore Data. Data Lama akan TERHAPUS dan tidak BISA KEMBALI. Lakukan BACKUP dulu...!!!')">
							</div>
						</div>
					</fieldset>
				</form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
	</div>
</section>