<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb__links">
					<a href="./index.html"><i class="fa fa-home"></i> Beranda</a>
					<span>Keranjang Belanja</span>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Breadcrumb End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h6 class="coupon__link"><span class="icon_tag_alt"></span> <a href="#">Kritik Dan Saran</a></h6>
			</div>
		</div>
		<?php $no = 1;
		foreach ($pesanan_detail as $key => $value) { ?>
			<!-- <form action="#" class="checkout__form"> -->
			<div class="row">
				<div class="col-lg-6">
					<div class="checkout__order">
						<h5>Orderan Anda</h5>

						<div class="checkout__order__product">
							<ul>
								<li>
									<span class="top__text">Produk</span>
									<span class="top__text__right">Total</span>
								</li>
								<li><?= $no++ ?>. <?= $value->nama_produk ?> <span>Rp. <?= number_format($value->harga, 0) ?></span></li>
							</ul>
						</div>
						<div class="checkout__order__total">
							<ul>
								<li>Subtotal <span>Rp. <?= number_format($value->grand_total, 0) ?></span></li>
								<li>Total <span>Rp. <?= number_format($value->grand_total, 0) ?></span></li>
							</ul>
						</div>
						<div class="col-lg-12 col-md-12">
							<div class="contact__content">
								<div class="contact__form">
									<h5>Kritik Saran</h5>
									<form action="<?= base_url('pesanan_saya/insert_riview') ?>" method="POST">
										<textarea name="isi" id="isi" placeholder="Message"></textarea>
										<input name="id_produk" class="form-control" cols="30" rows="10" placeholder="isi Produk" value="<?= $value->id_produk ?>" required hidden></input>
										<button type="submit" class="site-btn">Kritik Saran</button>
									</form>
								</div>
							</div>
						</div>
						<!-- <button type="submit" class="site-btn">Place oder</button> -->
					</div>
				</div>
			</div>
			<!-- </form> -->
		<?php } ?>
	</div>
</section>
<!-- Checkout Section End -->


<!-- Breadcrumb End -->