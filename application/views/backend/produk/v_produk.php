<div class="product-status mg-b-30">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="product-status-wrap">
					<h4>Products List</h4>
					<div class="add-product">
						<a href="<?= base_url('master_produk/add_produk') ?>">Add Product</a>
					</div>
					<table>
						<tr>
							<th>Image</th>
							<th>Nama Produk</th>
							<th>Merek Produk</th>
							<th>Nama Kategori</th>
							<th>Berat Produk</th>
							<th>Deskripsi</th>
							<th>Setting</th>
						</tr>
						<?php foreach ($produk as $key => $value) { ?>
							<tr>
								<td><img src="<?= base_url('assets/produk/' . $value->images) ?>" alt="" /></td>
								<td><?= $value->nama_produk ?></td>
								<td><?= $value->merek ?></td>
								<td><?= $value->nama_kategori ?></td>
								<td><?= $value->berat ?> Gr</td>
								<td><?= $value->deskripsi ?></td>
								<td>
									<a href="<?= base_url('master_produk/size_produk/' . $value->id_produk) ?>" data-toggle="tooltip" title="Size" class="pd-setting-ed"><i class="fa fa-pencil" aria-hidden="true"></i></a>
									<a href="<?= base_url('master_produk/edit_produk/' . $value->id_produk) ?>" data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
									<a href="<?= base_url('master_produk/delete_produk/' . $value->id_produk) ?>" data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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