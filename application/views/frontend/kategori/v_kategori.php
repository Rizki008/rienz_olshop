<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb__links">
					<a href="<?= base_url() ?>"><i class="fa fa-home"></i> Beranda</a>
					<span><?= $title ?></span>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Breadcrumb End -->

<!-- Shop Section Begin -->
<section class="shop spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3">
				<div class="shop__sidebar">
					<div class="sidebar__categories">
						<div class="section-title">
							<h4>Kategori</h4>
						</div>
						<?php $kategori = $this->m_home->kategori_produk(); ?>
						<div class="categories__accordion">
							<div class="accordion" id="accordionExample">
								<?php foreach ($kategori as $key => $kate) { ?>
									<div class="card">
										<div class="card-heading active">
											<a href="<?= base_url('home/kategori/' . $kate->id_kategori) ?>"><?= $kate->nama_kategori ?></a>
										</div>
										<div id="collapseOne" class="collapse show" data-parent="#accordionExample">
											<!-- <div class="card-body">
												<?php foreach ($produk as $value) : ?>
													<ul>
														<li><a href="#"><?= $value->nama_produk ?></a></li>
													</ul>
												<?php endforeach; ?>
											</div> -->
										</div>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
					<div class="sidebar__sizes">
					</div>
					<div class="sidebar__color">
					</div>
				</div>
			</div>
			<div class="col-lg-9 col-md-9">
				<div class="row">
					<?php if (count($produk) > 0) : ?>
						<?php foreach ($produk as $value) : ?>
							<div class="col-lg-4 col-md-6">
								<?php
								echo form_open('belanja/add');
								echo form_hidden('id', $value->id_size);
								echo form_hidden('id_produk', $value->id_produk);
								echo form_hidden('id_diskon', $value->id_diskon);
								echo form_hidden('qty', 1);
								echo form_hidden('size', $value->size);
								echo form_hidden('stock', $value->stock);
								echo form_hidden('netto', $value->berat);
								echo form_hidden('price', $value->harga);
								echo form_hidden('images', $value->images);
								echo form_hidden('name', $value->nama_produk);
								echo form_hidden('redirect_page', str_replace('index.php/', '', current_url())); ?>
								<div class="product__item">
									<div class="product__item__pic set-bg" data-setbg="<?= base_url('assets/produk/' . $value->images) ?>">
										<div class="label new">New</div>
										<ul class="product__hover">
											<li><a href="<?= base_url('assets/produk/' . $value->images) ?>" class="image-popup"><span class="arrow_expand"></span></a></li>
											<li><a href="<?= base_url('home/detail_produk/' . $value->id_produk) ?>"><span class="icon_heart_alt"></span></a></li>
											<li><button type="submit" data-size="<? $value->size ?>" data-stock="<?= $value->stock ?>" data-netto="<?= $value->berat ?>" data-name="<?= $value->nama_produk ?>" data-price="<?= $value->harga ?>" data-id="<?= $value->id_produk ?>"><span class="icon_bag_alt"></span></button></li>
										</ul>
									</div>
									<div class="product__item__text">
										<h6><a href="#"><?= $value->nama_produk ?></a></h6>
										<!-- <div class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div> -->
										<div class="product__price">Rp. <?= number_format($value->harga, 0) ?></div>
									</div>
								</div>
								<?php echo form_close() ?>
							</div>
						<?php endforeach; ?>
					<?php endif; ?>
					<div class="col-lg-12 text-center">
						<div class="pagination__option">
							<a href="#">1</a>
							<a href="#">2</a>
							<a href="#">3</a>
							<a href="#"><i class="fa fa-angle-right"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Shop Section End -->