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
			<a href="<?= base_url() ?>"><img src="img/logo2.png" alt=""></a>
		</div>
		<div id="mobile-menu-wrap"></div>
		<div class="offcanvas__auth">
			<a href="#">Masuk</a>
			<a href="#">Buat Akun</a>
		</div>
	</div>
	<!-- Offcanvas Menu End -->

	<!-- Header Section Begin -->
	<header class="header">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-3 col-lg-2">
					<div class="header__logo">
						<a href="<?= base_url() ?>"><img src="<?= base_url() ?>frontend/img/store.png" alt=""></a>
					</div>
				</div>
				<div class="col-xl-6 col-lg-7">
					<nav class="header__menu">
						<?php $kategori = $this->m_home->kategori_produk(); ?>
						<ul>
							<li class="active"><a href="<?= base_url() ?>">Beranda</a></li>
							<?php foreach ($kategori as $key => $value) { ?>
								<li><a href="<?= base_url('home/kategori/' . $value->id_kategori) ?>"><?= $value->nama_kategori ?></a></li>
							<?php } ?>
						</ul>
					</nav>
				</div>
				<div class="col-lg-3">
					<div class="header__right">
						<?php $pelanggan = $this->m_home->pelanggan() ?>
						<div class="header__right__auth">
							<?php if ($this->session->userdata('email') == "") { ?>
								<a href="<?= base_url('pelanggan/login') ?>">Masuk</a>
								<a href="<?= base_url('pelanggan/register') ?>">Buat Akun</a>
							<?php } else { ?>
								<a href="#"><?= $this->session->userdata('nama_pelanggan'); ?></a>
								<a href="<?= base_url('pesanan_saya') ?>">Pesanan</a>
								<?php foreach ($pelanggan as $key => $value) { ?>
									<?php if ($value->level_member == 1) { ?>
										<a href="#">Member Pelatinum Diskon 50%</a>
									<?php } elseif ($value->level_member == 2) { ?>
										<a href="#>">Member Gold Diskon 25%</a>
									<?php } elseif ($value->level_member == 3) { ?>
										<a href="#">Member Silver Diskon 5%</a>
									<?php } ?>
								<?php } ?>
								<a href="<?= base_url('pelanggan/logout') ?>">Keluar</a>
							<?php } ?>
						</div>
						<?php $keranjang = $this->cart->contents();
						$jml_item = 0;
						foreach ($keranjang as $key => $value) {
							$jml_item = $jml_item + $value['qty'];
						} ?>
						<?php $jml_chatting = $this->m_chatting->jml_chatting(); ?>
						<ul class="header__right__widget">
							<li><a href="<?= base_url('chatting') ?>"><i class="fa fa-envelope"></i>
									<div class="tip"><?= $jml_chatting ?></div>
								</a></li>
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