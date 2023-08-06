<div class="product-status mg-b-30">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<div class="product-status-wrap">
					<h4>Products List</h4>
					<div class="add-product">
					</div>
					<table>
						<tr>
							<th>Image</th>
							<th>Size</th>
							<th>Warna</th>
							<th>Harga</th>
							<th>Stock</th>
							<th>Setting</th>
						</tr>
						<?php foreach ($size['size'] as $key => $value) { ?>
							<tr>
								<td><img src="<?= base_url('assets/produk/' . $value->images) ?>" alt="" /></td>
								<td><?= $value->size ?></td>
								<td><?= $value->warna ?></td>
								<td>Rp. <?= number_format($value->harga, 0) ?></td>
								<td><?= $value->stock ?></td>
								<td>
									<a href="<?= base_url('master_produk/edit_size/' . $value->id_size . '/' . $value->id_produk) ?>" data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
									<a href="<?= base_url('master_produk/delete_size/' . $value->id_size . '/' . $value->id_produk) ?>" data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
								</td>
							</tr>
						<?php }
						?>
					</table>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<div class="review-tab-pro-inner">
					<ul id="myTab3" class="tab-review-design">
						<li class="active"><a href="#description"><i class="icon nalika-edit" aria-hidden="true"></i> <?= $title ?></a></li>
					</ul>
					<div id="myTabContent" class="tab-content custom-product-edit">
						<div class="product-tab-list tab-pane fade active in" id="description">
							<?php
							//notifikasi form kosong
							echo validation_errors('<div class="alert alert-warning alert-st-three alert-st-bg2 alert-st-bg13" role="alert">
                                <i class="fa fa-exclamation-triangle adminpro-warning-danger admin-check-pro admin-check-pro-clr2 admin-check-pro-clr13" aria-hidden="true"></i>
                                <p class="message-mg-rt"><strong>Warning!</strong>', '</p></div>');

							//notifikasi gagal upload gambar
							if (isset($error_upload)) {
								echo '<div class="alert alert-warning alert-success-style3 alert-st-bg2">
                                    <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
                                            <span class="icon-sc-cl" aria-hidden="true">&times;</span>
                                        </button>
                                    <i class="fa fa-exclamation-triangle adminpro-warning-danger admin-check-pro admin-check-pro-clr2" aria-hidden="true"></i>
                                    <p><strong>Warning!</strong>' . $error_upload . '</p></div>';
							}
							echo form_open_multipart('master_produk/size_produk/' . $size['produk']->id_produk) ?>
							<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<div class="review-content-section">
										<div class="input-group mg-b-pro-edt">
											<span class="input-group-addon"><i class="icon nalika-edit" aria-hidden="true"></i></span>
											<input type="text" class="form-control" name="size" value="<?= set_value('size') ?>" placeholder="Size Product">
										</div>
										<div class="input-group mg-b-pro-edt">
											<span class="input-group-addon"><i class="icon nalika-edit" aria-hidden="true"></i></span>
											<input type="text" class="form-control" name="warna" value="<?= set_value('warna') ?>" placeholder="Color Product">
										</div>
										<div class="input-group mg-b-pro-edt">
											<span class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i></span>
											<input type="number" name="harga" value="<?= set_value('harga') ?>" class="form-control" placeholder="Regular Price">
										</div>
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<div class="review-content-section">
										<div class="input-group mg-b-pro-edt">
											<span class="input-group-addon"><i class="icon nalika-new-file" aria-hidden="true"></i></span>
											<input type="number" class="form-control" name="stock" value="<?= set_value('stock') ?>" placeholder="Product Stock">
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
									<div class="text-center custom-pro-edt-ds">
										<button type="submit" class="btn btn-ctl-bt waves-effect waves-light m-r-10">Save
										</button>
										<a href="<?= base_url('master_produk/produk') ?>" class="btn btn-ctl-bt waves-effect waves-light">Kembali
										</a>
									</div>
								</div>
							</div>
							<?php echo form_close() ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>