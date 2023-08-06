<!DOCTYPE html>
<html lang="zxx">

<head>
	<meta charset="UTF-8">
	<meta name="description" content="Ashion Template">
	<meta name="keywords" content="Ashion, unica, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?= $title ?></title>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

	<!-- Css Styles -->
	<link rel="stylesheet" href="<?= base_url() ?>frontend/css/bootstrap.min.css" type="text/css">
	<link rel="stylesheet" href="<?= base_url() ?>frontend/css/font-awesome.min.css" type="text/css">
	<link rel="stylesheet" href="<?= base_url() ?>frontend/css/elegant-icons.css" type="text/css">
	<link rel="stylesheet" href="<?= base_url() ?>frontend/css/jquery-ui.min.css" type="text/css">
	<link rel="stylesheet" href="<?= base_url() ?>frontend/css/magnific-popup.css" type="text/css">
	<link rel="stylesheet" href="<?= base_url() ?>frontend/css/owl.carousel.min.css" type="text/css">
	<link rel="stylesheet" href="<?= base_url() ?>frontend/css/slicknav.min.css" type="text/css">
	<link rel="stylesheet" href="<?= base_url() ?>frontend/css/style.css" type="text/css">
</head>

<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Offcanvas Menu Begin -->
	<div class="offcanvas-menu-overlay"></div>
	<div class="offcanvas-menu-wrapper">
		<div class="offcanvas__close">+</div>
		<ul class="offcanvas__widget">
			<li><span class="icon_search search-switch"></span></li>
			<li><a href="#"><span class="icon_heart_alt"></span>
					<div class="tip">2</div>
				</a></li>
			<li><a href="#"><span class="icon_bag_alt"></span>
					<div class="tip">2</div>
				</a></li>
		</ul>
		<div class="offcanvas__logo">
			<a href="<?= base_url() ?>"><img src="img/ngewe.png" alt=""></a>
		</div>
		<div id="mobile-menu-wrap"></div>
		<div class="offcanvas__auth">
			<a href="#">Login</a>
			<a href="#">Register</a>
		</div>
	</div>
	<!-- Offcanvas Menu End -->

	<!-- Header Section Begin -->
	<header class="header">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-3 col-lg-2">
					<div class="header__logo">
						<a href="<?= base_url() ?>"><img src="<?= base_url() ?>frontend/img/ngewe.png" alt=""></a>
					</div>
				</div>
				<div class="col-xl-6 col-lg-7">
					<nav class="header__menu">
						<?php $kategori = $this->m_home->kategori_produk(); ?>
						<ul>
							<li class="active"><a href="<?= base_url() ?>">Home</a></li>
							<?php foreach ($kategori as $key => $value) { ?>
								<li><a href="<?= base_url('home/kategori/' . $value->id_kategori) ?>"><?= $value->nama_kategori ?></a></li>
							<?php } ?>
						</ul>
					</nav>
				</div>
				<div class="col-lg-3">
					<div class="header__right">
						<div class="header__right__auth">
							<?php if ($this->session->userdata('email') == "") { ?>
								<a href="<?= base_url('pelanggan/login') ?>">Login</a>
								<a href="<?= base_url('pelanggan/register') ?>">Register</a>
							<?php } else { ?>
								<a href="#"><?= $this->session->userdata('nama_pelanggan'); ?></a>
								<a href="<?= base_url('pelanggan/logout') ?>">Logout</a>
							<?php } ?>
						</div>
						<?php $keranjang = $this->cart->contents();
						$jml_item = 0;
						foreach ($keranjang as $key => $value) {
							$jml_item = $jml_item + $value['qty'];
						} ?>
						<ul class="header__right__widget">

							<li>
								<a href="<?= base_url('belanja') ?>"><span class="icon_bag_alt"></span>
									<div class="tip"><?= $jml_item ?></div>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="canvas__open">
				<i class="fa fa-bars"></i>
			</div>
		</div>
	</header>
	<!-- Header Section End -->

	<!-- Breadcrumb Begin -->
	<div class="breadcrumb-option">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="breadcrumb__links">
						<a href="<?= base_url() ?>"><i class="fa fa-home"></i> Home</a>
						<span>Shopping cart</span>
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
					<h6 class="coupon__link"><span class="icon_tag_alt"></span> </h6>
				</div>
			</div>
			<?php
			echo validation_errors(
				' <div class="alert alert-danger alert-dismissible" role="alert">',
				'</div>'
			);
			if (isset($error_upload)) {
				echo ' <div class="alert alert-danger alert-dismissible" role="alert">
				' . $error_upload . '
			</div>';
			}
			$no_order = date('Ymd') . strtoupper(random_string('alnum', 8)); ?>
			<form action="<?= base_url('belanja/cekout') ?>" method="POST" class="checkout__form">
				<div class="row">
					<div class="col-lg-8">
						<h5>Billing detail</h5>
						<div class="row">
							<div class="col-lg-12 col-md-6 col-sm-6">
								<div class="checkout__form__input">
									<p>First Name <span>*</span></p>
									<input type="text" name="id_pelanggan" name="id_pelanggan" value="<?= $this->session->userdata('nama_pelanggan'); ?>">
								</div>
							</div>
							<!-- <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Alamat Lengkap<span>*</span></p>
                                    <input type="text" name="alamat" value="<?= $this->session->userdata('alamat'); ?>">
                                </div>
                            </div> -->
							<div class="col-lg-12">
								<div class="checkout__form__input">
									<p>Address <span>*</span></p>
									<input type="text" name="alamat" placeholder="" value="<?= $this->session->userdata('alamat'); ?>">
								</div>
								<div class="checkout__form__input">
									<p>Pengambilan Ditempat <span>*</span></p>
									<select name="ditempat" id="column_select" class="form-control">
										<option value="">---Pengambilan Produk Ditempat---</option>
										<option value="ditempat">Ditempat</option>
									</select>
								</div><br>
								<div class="checkout__form__input">
									<p>Province <span>*</span></p>
									<select name="provinsi" id="layout_select" class="form-control"></select>
								</div>
								<div class="checkout__form__input">
									<p>City <span>*</span></p>
									<select name="kota" class="form-control"></select>
								</div>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-6">
								<div class="checkout__form__input">
									<p>Postcode/Zip <span>*</span></p>
									<input type="text" name="kode_pos" value="<?= $this->session->userdata('kode_pos'); ?>">
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6">
								<div class="checkout__form__input">
									<p>Phone <span>*</span></p>
									<input type="number" name="no_tlpn" value="<?= $this->session->userdata('no_tlpn'); ?>">
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6">
								<div class="checkout__form__input">
									<p>Expedisi <span>*</span></p>
									<select name="expedisi" class="form-control"></select>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6">
								<div class="checkout__form__input">
									<p>Paket <span>*</span></p>
									<select name="paket" class="form-control"></select>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="checkout__order">
							<h5>Your order</h5>
							<div class="checkout__order__product">
								<ul>
									<li>
										<span class="top__text">Product</span>
										<span class="top__text__right">Total</span>
									</li>
									<?php $i = 1; ?>
									<?php $total_berat = 0;
									$total = 0;
									foreach ($this->cart->contents() as $items) {
										// $produk = $this->m_home->detail_produk($items['id']);
										$berat = $items['qty'] * $items['netto'];
										$total_berat = $total_berat + $berat ?>
										<li><?php echo $items['name'] ?> <span>Rp. <?= number_format($items['subtotal'], 0); ?></span></li>
										<?php $i++; ?>
									<?php } ?>
								</ul>
							</div>
							<div class="checkout__order__total">
								<ul>
									<li>Subtotal <span>Rp. <?php echo number_format($this->cart->total(), 0) ?></span></li>
									<li>Berat <span><?= $total_berat ?> Gr</span></li>
									<li>Ongkir <span id="ongkir"></span></li>
									<li>Total <span id="total_bayar"></span></li>
								</ul>
							</div>
							<input name="no_order" value="<?= $no_order ?>" hidden>
							<input name="estimasi" hidden>
							<input name="ongkir" hidden>
							<input name="berat" value="<?= $total_berat ?>" hidden>
							<input name="grand_total" value="<?= $this->cart->total() ?>" hidden>
							<input name="total_bayar" hidden>
							<?php
							$i = 1;
							foreach ($this->cart->contents() as $items) {
								echo form_hidden('qty' . $i++, $items['qty']);
							}
							?>
							<button type="submit" class="site-btn">Place oder</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</section>
	<!-- Checkout Section End -->
	<!-- Instagram Begin -->
	<div class="instagram">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-2 col-md-4 col-sm-4 p-0">
					<div class="instagram__item set-bg" data-setbg="<?= base_url() ?>frontend/img/instagram/insta-1.jpg">
						<div class="instagram__text">
							<i class="fa fa-instagram"></i>
							<a href="#">@ ashion_shop</a>
						</div>
					</div>
				</div>
				<div class="col-lg-2 col-md-4 col-sm-4 p-0">
					<div class="instagram__item set-bg" data-setbg="<?= base_url() ?>frontend/img/instagram/insta-2.jpg">
						<div class="instagram__text">
							<i class="fa fa-instagram"></i>
							<a href="#">@ ashion_shop</a>
						</div>
					</div>
				</div>
				<div class="col-lg-2 col-md-4 col-sm-4 p-0">
					<div class="instagram__item set-bg" data-setbg="<?= base_url() ?>frontend/img/instagram/insta-3.jpg">
						<div class="instagram__text">
							<i class="fa fa-instagram"></i>
							<a href="#">@ ashion_shop</a>
						</div>
					</div>
				</div>
				<div class="col-lg-2 col-md-4 col-sm-4 p-0">
					<div class="instagram__item set-bg" data-setbg="<?= base_url() ?>frontend/img/instagram/insta-4.jpg">
						<div class="instagram__text">
							<i class="fa fa-instagram"></i>
							<a href="#">@ ashion_shop</a>
						</div>
					</div>
				</div>
				<div class="col-lg-2 col-md-4 col-sm-4 p-0">
					<div class="instagram__item set-bg" data-setbg="<?= base_url() ?>frontend/img/instagram/insta-5.jpg">
						<div class="instagram__text">
							<i class="fa fa-instagram"></i>
							<a href="#">@ ashion_shop</a>
						</div>
					</div>
				</div>
				<div class="col-lg-2 col-md-4 col-sm-4 p-0">
					<div class="instagram__item set-bg" data-setbg="<?= base_url() ?>frontend/img/instagram/insta-6.jpg">
						<div class="instagram__text">
							<i class="fa fa-instagram"></i>
							<a href="#">@ ashion_shop</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Instagram End -->
	<!-- Footer Section Begin -->
	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-6 col-sm-7">
					<div class="footer__about">
						<div class="footer__logo">
							<a href="<?= base_url() ?>"><img src="<?= base_url() ?>frontend/img/ngewe.png" alt=""></a>
						</div>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
							cilisis.</p>
						<!-- <div class="footer__payment">
                            <a href="#"><img src="<?= base_url() ?>frontend/img/payment/payment-1.png" alt=""></a>
                            <a href="#"><img src="<?= base_url() ?>frontend/img/payment/payment-2.png" alt=""></a>
                            <a href="#"><img src="<?= base_url() ?>frontend/img/payment/payment-3.png" alt=""></a>
                            <a href="#"><img src="<?= base_url() ?>frontend/img/payment/payment-4.png" alt=""></a>
                            <a href="#"><img src="<?= base_url() ?>frontend/img/payment/payment-5.png" alt=""></a>
                        </div> -->
					</div>
				</div>
				<div class="col-lg-2 col-md-3 col-sm-5">
					<div class="footer__widget">
						<h6>Quick links</h6>
						<ul>
							<li><a href="#">About</a></li>
							<li><a href="#">Blogs</a></li>
							<li><a href="#">Contact</a></li>
							<li><a href="#">FAQ</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-3 col-sm-4">
					<div class="footer__widget">
						<h6>Account</h6>
						<ul>
							<li><a href="#">My Account</a></li>
							<li><a href="#">Orders Tracking</a></li>
							<li><a href="#">Checkout</a></li>
							<li><a href="#">Wishlist</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-4 col-md-8 col-sm-8">
					<div class="footer__newslatter">
						<h6>NEWSLETTER</h6>
						<form action="#">
							<input type="text" placeholder="Email">
							<button type="submit" class="site-btn">Subscribe</button>
						</form>
						<!-- <div class="footer__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div> -->
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					<div class="footer__copyright__text">
						<p>Copyright &copy; <script>
								document.write(new Date().getFullYear());
							</script> All rights reserved <i class="fa fa-heart" aria-hidden="true"></i> by <a href="<?= base_url() ?>" target="_blank">Toko Thrift</a></p>
					</div>
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				</div>
			</div>
		</div>
	</footer>
	<!-- Footer Section End -->

	<!-- Search Begin -->
	<div class="search-model">
		<div class="h-100 d-flex align-items-center justify-content-center">
			<div class="search-close-switch">+</div>
			<form class="search-model-form">
				<input type="text" id="search-input" placeholder="Search here.....">
			</form>
		</div>
	</div>
	<!-- Search End -->

	<!-- Js Plugins -->
	<script src="<?= base_url() ?>frontend/js/jquery-3.3.1.min.js"></script>
	<script src="<?= base_url() ?>frontend/js/bootstrap.min.js"></script>
	<script src="<?= base_url() ?>frontend/js/jquery.magnific-popup.min.js"></script>
	<script src="<?= base_url() ?>frontend/js/jquery-ui.min.js"></script>
	<script src="<?= base_url() ?>frontend/js/mixitup.min.js"></script>
	<script src="<?= base_url() ?>frontend/js/jquery.countdown.min.js"></script>
	<script src="<?= base_url() ?>frontend/js/jquery.slicknav.js"></script>
	<script src="<?= base_url() ?>frontend/js/owl.carousel.min.js"></script>
	<script src="<?= base_url() ?>frontend/js/jquery.nicescroll.min.js"></script>
	<script src="<?= base_url() ?>frontend/js/main.js"></script>

	<script>
		$(document).ready(function() {
			$.ajax({
				type: "POST",
				url: "<?= base_url('lokasi/provinsi') ?>",
				success: function(hasil_provinsi) {
					// console.log(hasil_provinsi);
					$("select[name=provinsi]").html(hasil_provinsi);
				}
			});
			$("select[name=provinsi]").on("change", function() {
				var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");

				$.ajax({
					type: "POST",
					url: "<?= base_url('lokasi/kota') ?>",
					data: 'id_provinsi=' + id_provinsi_terpilih,
					success: function(hasil_kota) {
						// console.log(hasil_kota);
						$("select[name=kota]").html(hasil_kota);
					}
				});
			});

			$("select[name=kota]").on("change", function() {
				$.ajax({
					type: "POST",
					url: "<?= base_url('lokasi/expedisi') ?>",
					success: function(hasil_expedisi) {
						$("select[name=expedisi]").html(hasil_expedisi);
					}
				});
			});

			$("select[name=expedisi]").on("change", function() {
				var expedisi_terpilih = $("select[name = expedisi]").val()
				var id_kota_tujuan_terpilih = $("option:selected", "select[name = kota]").attr('id_kota');
				var tot_berat = <?= $total_berat ?>;

				$.ajax({
					type: "POST",
					url: "<?= base_url('lokasi/paket') ?>",
					data: 'expedisi=' + expedisi_terpilih + '&id_kota=' + id_kota_tujuan_terpilih + '&berat=' + tot_berat,
					success: function(hasil_paket) {
						console.log(hasil_paket);
						$("select[name=paket]").html(hasil_paket);
					}
				});
			});

			$("select[name=paket]").on("change", function() {
				var dataongkir = $("option:selected", this).attr('ongkir');
				var reverse = dataongkir.toString().split('').reverse().join(''),
					ribuan_ongkir = reverse.match(/\d{1,3}/g);
				ribuan_ongkir = ribuan_ongkir.join(',').split('').reverse().join('');
				$("#ongkir").html("Rp. " + ribuan_ongkir);

				var data_total_bayar = parseInt(dataongkir) + parseInt(<?= $this->cart->total() ?>);
				var reverse2 = data_total_bayar.toString().split('').reverse().join(''),
					ribuan_bayar = reverse2.match(/\d{1,3}/g);
				ribuan_bayar = ribuan_bayar.join(',').split('').reverse().join('');
				$("#total_bayar").html("Rp. " + ribuan_bayar);

				var estimasi = $("option:selected", this).attr('estimasi');
				$("input[name=estimasi]").val(estimasi);
				$("input[name=ongkir]").val(dataongkir);
				$("input[name=total_bayar]").val(data_total_bayar);
			});
		});
	</script>
	<script>
		// $(document).ready(function() {
		//     $("#layout_select").children('option:gt(0)').hide();
		//     $("#column_select").change(function() {
		//         $("#layout_select").children('option').hide();
		//         $("#layout_select").children("option[value^=" + $(this).val() + "]").show()
		//     })
		// })

		$(document).ready(function() {
			$("#column_select").change(function() {

				$("#layout_select")
					.find("option")
					.show()
					.not("option[value*='" + this.value + "']").hide();
				$("#layout_select").val(
					$("#layout_select").find("option:visible:first").val());

			}).change();
		});
	</script>
</body>

</html>