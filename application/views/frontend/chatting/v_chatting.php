<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb__links">
					<a href="./index.html"><i class="fa fa-home"></i> Home</a>
					<span>Contact</span>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Breadcrumb End -->

<!-- Contact Section Begin -->
<section class="contact spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6">
				<div class="contact__content">
					<div class="contact__form">
						<h5>SEND MESSAGE</h5>
						<form action="<?= base_url('chatting') ?>" method="POST">
							<?php
							$id_pelanggan = $this->session->userdata('id_pelanggan');
							?>
							<input type="hidden" name="id_pelanggan" value="<?= $id_pelanggan ?>">
							<textarea name="message" id="message" placeholder="Message"></textarea>
							<button type="submit" class="site-btn">Send Message</button>
						</form>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-6">
				<div class="contact__map">
					<?php foreach ($chat as $key => $value) {
						if ($value->pelanggan_send != '0') { ?>
							<p>Anda : <br> <?= $value->time ?> <br> <?= $value->pelanggan_send ?></p>
						<?php } elseif ($value->admin_send != '0') { ?>
							<p>Admin : <br> <?= $value->time ?> <br> <?= $value->admin_send ?></p>
						<?php } ?>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Contact Section End -->