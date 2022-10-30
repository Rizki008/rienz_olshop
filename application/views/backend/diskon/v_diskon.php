<div class="product-status mg-b-30">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="product-status-wrap">
					<h4>Products List</h4>
					<a href="<?= base_url('master_produk/createDiskon') ?>" title="Creat" class="btn btn-primary mb-3"><i class="fa fa-plus-circle" aria-hidden="true"></i>Create Diskon</a>
					<div class="add-product">
					</div>
					<table>
						<tr>
							<th>Nama Produk</th>
							<th>Nama Diskon</th>
							<th>Besar Diskon</th>
							<th>Tanggal Selesai</th>
							<th>Level Member</th>
							<th>Setting</th>
						</tr>
						<?php foreach ($diskon as $key => $value) { ?>
							<tr>
								<td><?= $value->nama_produk ?></td>
								<td><?= $value->nama_diskon ?></td>
								<td>
									<button class="pd-setting">Rp. <?= number_format($value->diskon, 0) ?> %</button>
								</td>
								<td><?= $value->tgl_selesai ?></td>
								<td><?= $value->member ?></td>
								<td>
									<!-- <a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#WarningModalalert">Warning</a> -->
									<a href="<?= base_url('master_produk/update/' . $value->id_diskon) ?>" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
									<a href="<?= base_url('master_produk/delete/' . $value->id_diskon) ?>" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
								</td>
							</tr>
						<?php }
						?>
					</table>
					<div class="custom-pagination">
						<ul class="pagination">
							<li class="page-item"><a class="page-link" href="#">Previous</a></li>
							<li class="page-item"><a class="page-link" href="#">1</a></li>
							<li class="page-item"><a class="page-link" href="#">2</a></li>
							<li class="page-item"><a class="page-link" href="#">3</a></li>
							<li class="page-item"><a class="page-link" href="#">Next</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>