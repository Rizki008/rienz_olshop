<div class="mailbox-view-area mg-tb-15">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 col-md-12 col-sm-12 col-xs-12">
				<div class="hpanel email-compose mailbox-view mg-b-15">
					<div class="panel-heading hbuilt">

						<div class="p-xs h4">
							<!-- <small class="pull-right">
								08:26 PM (16 hours ago)
							</small> Chatting view -->

						</div>
					</div>
					<?php
					foreach ($pesan as $key => $value) {
						$id_pelanggan = $value->id_pelanggan;
						if ($value->pelanggan_send != '0') {
					?>
							<div class="panel-body panel-csm">
								<div>
									<h4><?= $value->nama_pelanggan ?></h4>

									<p><?= $value->pelanggan_send ?></p>

									<p><?= $value->time ?>
									</p>
								</div>
							</div>
						<?php
						} else if ($value->admin_send != '0') {
						?>
							<div class="panel-body panel-csm">
								<div>
									<h4>Admin </h4>

									<p><?= $value->admin_send ?></p>

									<p><?= $value->time ?>
									</p>
								</div>
							</div>
					<?php
						}
					}
					?>
					<div class="panel-footer text-right">
						<form action="<?= base_url('chatting_admin/send') ?>" method="post">
							<textarea type="text" name="pesan" placeholder="Type Message ..." class="form-control"></textarea>
							<input type="hidden" name="id_pelanggan" value="<?= $id_pelanggan ?>">
							<div class="btn-group">
								<button class="btn btn-default"><i class="fa fa-arrow-right"></i> Send</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>