<div class="footer-copyright-area">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<div class="footer-copy-right">
					<p>Copyright © 2022 <a href="https://colorlib.com/wp/templates/">Rienz Olshop</a> All rights reserved.</p>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!-- jquery
		============================================ -->
<script src="<?= base_url() ?>backend/js/vendor/jquery-1.12.4.min.js"></script>
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
<!-- sparkline JS
		============================================ -->
<script src="<?= base_url() ?>backend/js/sparkline/jquery.sparkline.min.js"></script>
<script src="<?= base_url() ?>backend/js/sparkline/jquery.charts-sparkline.js"></script>
<!-- calendar JS
		============================================ -->
<script src="<?= base_url() ?>backend/js/calendar/moment.min.js"></script>
<script src="<?= base_url() ?>backend/js/calendar/fullcalendar.min.js"></script>
<script src="<?= base_url() ?>backend/js/calendar/fullcalendar-active.js"></script>
<!-- float JS
		============================================ -->
<script src="<?= base_url() ?>backend/js/flot/jquery.flot.js"></script>
<script src="<?= base_url() ?>backend/js/flot/jquery.flot.resize.js"></script>
<script src="<?= base_url() ?>backend/js/flot/curvedLines.js"></script>
<script src="<?= base_url() ?>backend/js/flot/flot-active.js"></script>
<!-- tab JS
		============================================ -->
<script src="<?= base_url() ?>backend/js/tab.js"></script>
<!-- wizard JS
		============================================ -->
<script src="<?= base_url() ?>backend/js/wizard/jquery.steps.js"></script>
<script src="<?= base_url() ?>backend/js/wizard/steps-active.js"></script>
<!-- plugins JS
		============================================ -->
<script src="<?= base_url() ?>backend/js/plugins.js"></script>
<!-- main JS
		============================================ -->
<script src="<?= base_url() ?>backend/js/main.js"></script>

<script>
	function bacaGambar(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#gambar_load').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
	$("#preview_gambar").change(function() {
		bacaGambar(this);
	});
</script>

<!-- lokasi toko -->
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
					console.log(hasil_kota);
					$("select[name=kota]").html(hasil_kota);
				}
			});
		});
	});
</script>
</body>

</html>