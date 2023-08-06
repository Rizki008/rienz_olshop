<!doctype html>
<html class="no-js" lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title><?= $title ?></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- favicon
		============================================ -->
	<link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>backend/img/favicon.ico">
	<!-- Google Fonts
		============================================ -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
	<!-- Bootstrap CSS
		============================================ -->
	<link rel="stylesheet" href="<?= base_url() ?>backend/css/bootstrap.min.css">
	<!-- Bootstrap CSS
		============================================ -->
	<link rel="stylesheet" href="<?= base_url() ?>backend/css/font-awesome.min.css">
	<!-- owl.carousel CSS
		============================================ -->
	<link rel="stylesheet" href="<?= base_url() ?>backend/css/owl.carousel.css">
	<link rel="stylesheet" href="<?= base_url() ?>backend/css/owl.theme.css">
	<link rel="stylesheet" href="<?= base_url() ?>backend/css/owl.transitions.css">
	<!-- animate CSS
		============================================ -->
	<link rel="stylesheet" href="<?= base_url() ?>backend/css/animate.css">
	<!-- normalize CSS
		============================================ -->
	<link rel="stylesheet" href="<?= base_url() ?>backend/css/normalize.css">
	<!-- main CSS
		============================================ -->
	<link rel="stylesheet" href="<?= base_url() ?>backend/css/main.css">
	<!-- morrisjs CSS
		============================================ -->
	<link rel="stylesheet" href="<?= base_url() ?>backend/css/morrisjs/morris.css">
	<!-- mCustomScrollbar CSS
		============================================ -->
	<link rel="stylesheet" href="<?= base_url() ?>backend/css/scrollbar/jquery.mCustomScrollbar.min.css">
	<!-- metisMenu CSS
		============================================ -->
	<link rel="stylesheet" href="<?= base_url() ?>backend/css/metisMenu/metisMenu.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>backend/css/metisMenu/metisMenu-vertical.css">
	<!-- calendar CSS
		============================================ -->
	<link rel="stylesheet" href="<?= base_url() ?>backend/css/calendar/fullcalendar.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>backend/css/calendar/fullcalendar.print.min.css">
	<!-- forms CSS
		============================================ -->
	<link rel="stylesheet" href="<?= base_url() ?>backend/css/form/all-type-forms.css">
	<!-- style CSS
		============================================ -->
	<link rel="stylesheet" href="<?= base_url() ?>backend/style.css">
	<!-- responsive CSS
		============================================ -->
	<link rel="stylesheet" href="<?= base_url() ?>backend/css/responsive.css">
	<!-- modernizr JS
		============================================ -->
	<script src="<?= base_url() ?>backend/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
	<!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

	<div class="color-line"></div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="back-link back-backend">
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
			<div class="col-md-4 col-md-4 col-sm-4 col-xs-12">
				<div class="text-center m-b-md custom-login">
					<h3>PLEASE LOGIN TO TOKO THRIFT</h3>
					<p><?= $title ?></p>
				</div>
				<div class="hpanel">
					<div class="panel-body">
						<?php


						echo validation_errors('<div class="alert alert-warning alert-success-style3 alert-st-bg2">
            <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
            <span class="icon-sc-cl" aria-hidden="true">&times;</span>
            </button>
            <i class="fa fa-exclamation-triangle adminpro-warning-danger admin-check-pro admin-check-pro-clr2" aria-hidden="true"></i>
            <p><strong>Warning!</strong> Coba Lagi!!!</p>', '</div>');

						if ($this->session->flashdata('error')) {
							echo '<div class="alert alert-danger alert-mg-b alert-success-style4 alert-st-bg3">
              <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
  <span class="icon-sc-cl" aria-hidden="true">&times;</span>
</button>
              <i class="fa fa-times adminpro-danger-error admin-check-pro admin-check-pro-clr3" aria-hidden="true"></i>
              <p><strong>Danger!</strong> Gagal.</p>';
							echo $this->session->flashdata('error');
							echo '</div>';
						}

						if ($this->session->flashdata('pesan')) {
							echo '<div class="alert alert-success alert-success-style1 alert-st-bg">
              <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
  <span class="icon-sc-cl" aria-hidden="true">&times;</span>
</button>
              <i class="fa fa-check adminpro-checked-pro admin-check-pro admin-check-pro-clr" aria-hidden="true"></i>
              <p><strong>Success!</strong>successful</p>';
							echo $this->session->flashdata('pesan');
							echo '</div>';
						}

						?>
						<form action="<?= base_url('auth/user_login') ?>" method="POST" id="loginForm">
							<div class="form-group">
								<label class="control-label" for="username">Username</label>
								<input type="text" placeholder="Input Username" name="username" title="Please enter you username" required="" value="" name="username" id="username" class="form-control">
								<span class="help-block small"></span>
							</div>
							<div class="form-group">
								<label class="control-label" for="password">Password</label>
								<input type="password" name="password" title="Please enter your password" placeholder="Input Password" required="" value="" name="password" id="password" class="form-control">
								<span class="help-block small"></span>
							</div>
							<button class="btn btn-success btn-block loginbtn">Login</button>
						</form>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
		</div>
	</div>

	<!-- jquery
		============================================ -->
	<script src="<?= base_url() ?>backend/js/vendor/jquery-1.11.3.min.js"></script>
	<!-- bootstrap JS
		============================================ -->
	<script src="<?= base_url() ?>backend/js/bootstrap.min.js"></script>
	<!-- wow JS
		============================================ -->
	<script src="<?= base_url() ?>backend/js/wow.min.js"></script>
	<!-- price-slider JS
		============================================ -->
	<script src="<?= base_url() ?>backend/js/jquery-price-slider.js"></script>
	<!-- meanmenu JS
		============================================ -->
	<script src="<?= base_url() ?>backend/js/jquery.meanmenu.js"></script>
	<!-- owl.carousel JS
		============================================ -->
	<script src="<?= base_url() ?>backend/js/owl.carousel.min.js"></script>
	<!-- sticky JS
		============================================ -->
	<script src="<?= base_url() ?>backend/js/jquery.sticky.js"></script>
	<!-- scrollUp JS
		============================================ -->
	<script src="<?= base_url() ?>backend/js/jquery.scrollUp.min.js"></script>
	<!-- mCustomScrollbar JS
		============================================ -->
	<script src="<?= base_url() ?>backend/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="<?= base_url() ?>backend/js/scrollbar/mCustomScrollbar-active.js"></script>
	<!-- metisMenu JS
		============================================ -->
	<script src="<?= base_url() ?>backend/js/metisMenu/metisMenu.min.js"></script>
	<script src="<?= base_url() ?>backend/js/metisMenu/metisMenu-active.js"></script>
	<!-- tab JS
		============================================ -->
	<script src="<?= base_url() ?>backend/js/tab.js"></script>
	<!-- icheck JS
		============================================ -->
	<script src="<?= base_url() ?>backend/js/icheck/icheck.min.js"></script>
	<script src="<?= base_url() ?>backend/js/icheck/icheck-active.js"></script>
	<!-- plugins JS
		============================================ -->
	<script src="<?= base_url() ?>backend/js/plugins.js"></script>
	<!-- main JS
		============================================ -->
	<script src="<?= base_url() ?>backend/js/main.js"></script>
</body>

</html>