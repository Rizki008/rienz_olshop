<div class="product-cart-area mg-b-30">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="product-cart-inner">
					<div id="example-basic">
						<h3>Shopping Cart</h3>
						<section>
							<h3 class="product-cart-dn">Shopping</h3>
							<div class="product-list-cart">
								<div class="product-status-wrap border-pdt-ct">
									<table>
										<tr>
											<th>Nama Pelanggan</th>
											<th>No Order</th>
											<th>Tanggal Order</th>
											<th>Expedisi</th>
											<th>Ongkir</th>
											<th>Total Pembayaran</th>
											<th>Status Pembayaran</th>
											<th>Action</th>
										</tr>
										<?php foreach ($pesanan as $key => $value) { ?>
											<tr>
												<td>
													<h3><?= $value->nama_pelanggan ?></h3>
												</td>
												<td>
													<h3><?= $value->no_order ?></h3>
												</td>
												<td>
													<p><?= $value->tgl_order ?></p>
												</td>
												<td><?= $value->expedisi ?></td>
												<td>Rp. <?= number_format($value->ongkir, 0) ?></td>
												<td>
													<?php if ($value->ditempat == 'ditempat') { ?>
														Rp. <?= number_format($value->grand_total, 0) ?>
													<?php } else { ?>
														Rp. <?= number_format($value->total_bayar, 0) ?>
													<?php } ?>
												</td>
												<td><?php if ($value->status_bayar == 0) { ?>
														<button class="ds-setting">Belum Bayar</button>
													<?php } elseif ($value->status_bayar == 1) { ?>
														<button class="pd-setting">Sudah Bayar</button>
													<?php } ?>
												</td>
												<td>
													<?php if ($value->status_bayar == 1) { ?>
														<a href="#" data-toggle="modal" data-target="#WarningModalalert<?= $value->no_order ?>" title="Edit" class="pd-setting-ed"><i class="fa fa-money" aria-hidden="true"></i></a>
														<a href="<?= base_url('transaksi/proses/' . $value->id_transaksi) ?>" data-toggle="tooltip" title="Verifikasi" class="pd-setting-ed"><i class="fa fa-check" aria-hidden="true"></i></a>
													<?php } ?>
												</td>
											</tr>
										<?php } ?>
									</table>
								</div>
							</div>
						</section>
						<h3>Delivery Details</h3>
						<section>
							<h3 class="product-cart-dn">Shopping</h3>
							<div class="product-list-cart">
								<div class="product-status-wrap border-pdt-ct">
									<table>
										<tr>
											<th>Nama Pelanggan</th>
											<th>No Order</th>
											<th>Tanggal Order</th>
											<th>Expedisi</th>
											<th>Ongkir</th>
											<th>Total Pembayaran</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
										<?php foreach ($pesanan_diproses as $key => $value) { ?>
											<tr>
												<td>
													<h3><?= $value->nama_pelanggan ?></h3>
												</td>
												<td>
													<h3><?= $value->no_order ?></h3>
												</td>
												<td>
													<p><?= $value->tgl_order ?></p>
												</td>
												<td><?= $value->expedisi ?></td>
												<td>Rp. <?= number_format($value->ongkir, 0) ?></td>
												<td><?php if ($value->ditempat == 'ditempat') { ?>
														Rp. <?= number_format($value->grand_total, 0) ?>
													<?php } else { ?>
														Rp. <?= number_format($value->total_bayar, 0) ?>
													<?php } ?></td>
												<td>
													<?php if ($value->expedisi == 'ditempat') { ?>
														<?php if ($value->status_order == 1) { ?>
															<button class="pd-setting">Proses Pengambilan</button>
														<?php } ?>
													<?php } else { ?>
														<?php if ($value->status_order == 1) { ?>
															<button class="pd-setting">Proses Pengiriman</button>
														<?php } ?>
													<?php } ?>
												</td>
												<td>
													<?php if ($value->expedisi == 'ditempat') { ?>
														<a href="<?= base_url('transaksi/proses_ambil/' . $value->id_transaksi) ?>" data-toggle="tooltip" title="Proses Pengambilan" class="pd-setting-ed"><i class="fa fa-check" aria-hidden="true"></i></a>
													<?php } else { ?>
														<a href="<?= base_url('transaksi/detail/' . $value->no_order) ?>" data-toggle="tooltip" title="Kirim" class="pd-setting-ed"><i class="fa fa-send" aria-hidden="true"></i></a>
													<?php } ?>
												</td>
											</tr>
										<?php } ?>
									</table>
								</div>
							</div>
						</section>
						<h3>Payment Details</h3>
						<section>
							<div class="product-list-cart">
								<div class="product-status-wrap border-pdt-ct">
									<table>
										<tr>
											<th>Nama Pelanggan</th>
											<th>No Order</th>
											<th>Tanggal Order</th>
											<th>Expedisi</th>
											<th>Ongkir</th>
											<th>Total Pembayaran</th>
											<th>No Resi</th>
											<th>Status</th>
										</tr>
										<?php foreach ($pesanan_dikirim as $key => $value) { ?>
											<tr>
												<td>
													<h3><?= $value->nama_pelanggan ?></h3>
												</td>
												<td>
													<h3><?= $value->no_order ?></h3>
												</td>
												<td>
													<p><?= $value->tgl_order ?></p>
												</td>
												<td><?= $value->expedisi ?></td>
												<td>Rp. <?= number_format($value->ongkir, 0) ?></td>
												<td><?php if ($value->ditempat == 'ditempat') { ?>
														Rp. <?= number_format($value->grand_total, 0) ?>
													<?php } else { ?>
														Rp. <?= number_format($value->total_bayar, 0) ?>
													<?php } ?></td>
												<td> <?php if ($value->expedisi == 'ditempat') { ?>
														-
													<?php } else { ?>
														<?= $value->no_resi ?>
													<?php } ?></td>
												<td>
													<?php if ($value->expedisi == 'ditempat') { ?>
														<?php if ($value->status_order == 2) { ?>
															<button class="pd-setting">Pengambilan</button>
														<?php } ?>
													<?php  } else { ?>
														<?php if ($value->status_order == 2) { ?>
															<button class="pd-setting">Di Kirim</button>
														<?php } ?>
													<?php } ?>
												</td>
											</tr>
										<?php } ?>
									</table>
								</div>
							</div>
						</section>
						<h3>Selesai</h3>
						<section>
							<div class="product-list-cart">
								<div class="product-status-wrap border-pdt-ct">
									<table>
										<tr>
											<th>Nama Pelanggan</th>
											<th>No Order</th>
											<th>Tanggal Order</th>
											<th>Expedisi</th>
											<th>Ongkir</th>
											<th>Total Pembayaran</th>
											<th>No resi</th>
											<th>Status</th>
											<!-- <th>Action</th> -->
										</tr>
										<?php foreach ($pesanan_selesai as $key => $value) { ?>
											<tr>
												<td>
													<h3><?= $value->nama_pelanggan ?></h3>
												</td>
												<td>
													<h3><?= $value->no_order ?></h3>
												</td>
												<td>
													<p><?= $value->tgl_order ?></p>
												</td>
												<td><?= $value->expedisi ?></td>
												<td>Rp. <?= number_format($value->ongkir, 0) ?></td>
												<td><?php if ($value->ditempat == 'ditempat') { ?>
														Rp. <?= number_format($value->grand_total, 0) ?>
													<?php } else { ?>
														Rp. <?= number_format($value->total_bayar, 0) ?>
													<?php } ?></td>
												<td> <?php if ($value->expedisi == 'ditempat') { ?>
														-
													<?php } else { ?>
														<?= $value->no_resi ?>
													<?php } ?>
												</td>
												<td><?php if ($value->status_order == 3) { ?>
														<button class="pd-setting">Di Terima</button>
													<?php } ?>
												</td>
												<!-- <td>
                                                <a href="<?= base_url('transaksi/detail/' . $value->no_order) ?>" data-toggle="tooltip" title="Kirim" class="pd-setting-ed"><i class="fa fa-send" aria-hidden="true"></i></a>
                                            </td> -->
											</tr>
										<?php } ?>
									</table>
								</div>
							</div>
						</section>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
<?php foreach ($pesanan as $key => $value) { ?>
	<div id="WarningModalalert<?= $value->no_order ?>" class="modal modal-adminpro-general Customwidth-popup-WarningModal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-close-area modal-close-df">
					<a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
				</div>

				<?php echo form_open('transaksi/detail/' . $value->no_order) ?>
				<div class="modal-body">
					<span class="adminpro-icon adminpro-warning-danger modal-check-pro information-icon-pro"></span>
					<h2><?= $value->no_order ?></h2>
					<div class="input-group mg-b-pro-edt">
						<tr>
							<th>
								Nama Pembayar:
							</th>
							<th><?= $value->nama_pelanggan ?></th>
						</tr>
					</div>
					<div class="input-group mg-b-pro-edt">
						<tr>
							<th>
								Nama Bank:
							</th>
							<th><?= $value->nama_bank ?></th>
						</tr>
					</div>
					<div class="input-group mg-b-pro-edt">
						<tr>
							<th>
								Bukti Bayar :
							</th>
							<img src="<?= base_url('assets/bukti_bayar/' . $value->bukti_bayar) ?>" width="100px" alt="">
						</tr>
					</div>
				</div>
				<div class="modal-footer">
					<a data-dismiss="modal" href="#">Cancel</a>
				</div>
				<?php echo form_close() ?>
			</div>
		</div>
	</div>
<?php } ?>