<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb__links">
					<a href="<?= base_url() ?>"><i class="fa fa-home"></i> Home</a>
					<a href="#">Women’s </a>
					<span>Essential structured blazer</span>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Breadcrumb End -->

<!-- Product Details Section Begin -->
<section class="product-details spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="product__details__pic">
					<div class="product__details__pic__left product__thumb nice-scroll">
						<?php foreach ($gambar as $key => $value) { ?>
							<a class="pt active" href="#product-1">
								<img src="<?= base_url('assets/gambar/' . $value->img) ?>" alt="">
							</a>
						<?php } ?>
					</div>
					<div class="product__details__slider__content">
						<div class="product__details__pic__slider owl-carousel">
							<img data-hash="product-1" class="product__big__img" src="<?= base_url('assets/produk/' . $data['produk']->images) ?>" alt="">
							<?php foreach ($gambar as $key => $value) { ?>
								<img data-hash="product-2" class="product__big__img" src="<?= base_url('assets/gambar/' . $value->img) ?>" alt="">
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<?php
				echo form_open('belanja/add');
				echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
				?>
				<input type="hidden" name="id" value="<?= $data['produk']->id_produk ?>">
				<input type="hidden" name="id_size" value="<?= $data['produk']->id_size ?>">
				<input type="hidden" name="id_diskon" value="<?= $data['produk']->id_diskon ?>">
				<input type="hidden" class="price" name="price" value="<?= $data['produk']->harga - ($data['produk']->diskon / 100 * $data['produk']->harga) ?>">
				<input type="hidden" name="name" value="<?= $data['produk']->nama_produk ?>">
				<input type="hidden" name="qty" value="1">
				<input type="hidden" class="size" name="size" value="<?= $data['produk']->size ?>">
				<input type="hidden" class="warna" name="warna" value="<?= $data['produk']->warna ?>">
				<input type="hidden" class="stock" name="stock" value="<?= $data['produk']->stock ?>">
				<input type="hidden" name="images" value="<?= $data['produk']->images ?>">
				<input type="hidden" name="netto" value="<?= $data['produk']->berat ?>">
				<div class="product__details__text">
					<h3><?= $data['produk']->nama_produk ?> <span>Brand: <?= $data['produk']->nama_kategori ?></span></h3>
					<!-- <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <span>( 138 reviews )</span>
                    </div> -->
					<div class="product__details__price price-view">Rp. <?= number_format($data['produk']->harga - ($data['produk']->diskon / 100 * $data['produk']->harga), 0) ?> <span>Rp. <?= number_format($data['produk']->harga, 0) ?></span></div>
					<?php if ($data['produk']->diskon != 0) { ?>
						<del class="diskon">Rp. <?= number_format($data['produk']->harga, 0) ?></del><span class="disc badge bg-warning">Disc <?= $data['produk']->diskon ?>%</span>
					<?php } ?>
					<p><?= $data['produk']->deskripsi ?></p>
					<div class="product__details__button">
						<div class="quantity">
							<span>Quantity:</span>
							<div class="pro-qty">
								<input type="number" id="quantity" name="qty" value="1">
								<!-- <input type="number" id="quantity" name="qty" class="form-control" value="1" min="1" max="<?= $data['produk']->stock ?>"> -->
							</div>
						</div>
						<button type="submit" data-images="<?= $data['produk']->images ?>" data-size="<?= $data['produk']->size ?>" data-stock="<?= $data['produk']->stock ?>" data-netto="<?= $data['produk']->berat ?>" data-name="<?= $data['produk']->nama_produk ?>" data-price="<?= ($data['produk']->diskon > 0) ? ($data['produk']->harga - $data['produk']->diskon) : $data['produk']->harga ?>" data-id="<?= $data['produk']->id_produk ?>" data-id="<?= $data['produk']->id_size ?>" data-id="<?= $data['produk']->id_diskon ?>" class="cart-btn"><span class="icon_bag_alt"></span> Add to cart</button>
						<ul>
						</ul>
					</div>
					<div class="product__details__widget">
						<ul>
							<li>
								<span>Availability:</span>
								<div class="stock__checkbox">
									In Stock
								</div>
							</li>
							<li>
								<span>Color:</span>
								<div class="stock__checkbox">
									<?= $data['produk']->warna ?>
								</div>
							</li>
							<li></li>
							<br>
							<li>
								<span>Available size:</span>
								<div class="size__btn">
									<select name="id" id="produk">
										<?php foreach ($data['size'] as $key => $value) { ?>
											<option data-stock="<?= $value->stock ?>" data-size="<?= $value->size ?>" data-diskon="Rp. <?= number_format($value->harga, 0) ?>" data-price-view="Rp. <?= number_format($value->harga - ($value->diskon / 100 * $value->harga), 0) ?>" data-price="<?= $value->harga - ($value->diskon / 100 * $value->harga) ?>" value="<?= $value->id_size ?>"><?= $value->size ?></option>
										<?php } ?>
									</select>
								</div>
							</li>
							<li>
							</li>
						</ul>
					</div>
				</div>
				<?php echo form_close() ?>
			</div>
			<div class="col-lg-12">
				<div class="product__details__tab">
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Description</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Reviews ( 2 )</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tabs-1" role="tabpanel">
							<h6>Description</h6>
							<p><?= $data['produk']->deskripsi ?></p>
						</div>
						<div class="tab-pane" id="tabs-3" role="tabpanel">
							<h6>Reviews ( 2 )</h6>
							<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed
								quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt loret.
								Neque porro lorem quisquam est, qui dolorem ipsum quia dolor si. Nemo enim ipsam
								voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed quia ipsu
								consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Nulla
								consequat massa quis enim.</p>
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget
								dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
								nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium
								quis, sem.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 text-center">
				<div class="related__title">
					<h5>RELATED PRODUCTS</h5>
				</div>
			</div>
			<?php if (count($related_produk) > 0) : ?>
				<?php foreach ($related_produk as $product) : ?>
					<div class="col-lg-3 col-md-4 col-sm-6">
						<?php echo form_open('belanja/add');
						echo form_hidden('id', $value->id_size);
						echo form_hidden('qty', 1);
						echo form_hidden('price', $value->harga - ($value->diskon / 100 * $value->harga));
						echo form_hidden('size', $value->size);
						echo form_hidden('stock', $value->stock);
						echo form_hidden('netto', $value->berat);
						echo form_hidden('images', $value->images);
						echo form_hidden('name', $value->nama_produk);
						echo form_hidden('redirect_page', str_replace('index.php/', '', current_url())); ?>
						<div class="product__item">
							<div class="product__item__pic set-bg" data-setbg="<?= base_url('assets/produk/' . $product->images) ?>">
								<div class="label new">New</div>
								<ul class="product__hover">
									<li><a href="<?= base_url('assets/produk/' . $product->images) ?>" class="image-popup"><span class="arrow_expand"></span></a></li>
									<li><a href="<?= base_url('home/detail_produk/' . $product->id_produk) ?>"><span class="icon_heart_alt"></span></a></li>
									<li><button type="submit"><span class="icon_bag_alt"></span></button></li>
								</ul>
							</div>
							<div class="product__item__text">
								<h6><a href="#"><?= $product->nama_produk ?></a></h6>
								<div class="rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
								</div>
								<div class="product__price">Rp. <?= number_format($product->harga) ?></div>
							</div>
						</div>
						<?php echo form_close() ?>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</section>
<!-- Product Details Section End -->