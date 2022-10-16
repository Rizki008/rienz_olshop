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
<?php
foreach ($grafik_pelanggan as $key => $value) {
	$nama_pelanggan[] = $value->nama_pelanggan;
	$qty[] = $value->qty;
}
?>

<!-- <canvas id="myChart" height="100"></canvas> -->
<script>
	var ctx = document.getElementById('myChartsa');
	var myChartsa = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: <?= json_encode($nama_pelanggan) ?>,
			datasets: [{
				label: 'Grafik Analisis Pelanggan',
				data: <?= json_encode($qty) ?>,
				backgroundColor: [
					'rgba(255, 99, 132, 0.80)',
					'rgba(54, 162, 235, 0.80)',
					'rgba(255, 206, 86, 0.80)',
					'rgba(75, 192, 192, 0.80)',
					'rgba(153, 102, 255, 0.80)',
					'rgba(255, 159, 64, 0.80)',
					'rgba(201, 76, 76, 0.3)',
					'rgba(201, 77, 77, 1)',
					'rgba(0, 140, 162, 1)',
					'rgba(158, 109, 8, 1)',
					'rgba(201, 76, 76, 0.8)',
					'rgba(0, 129, 212, 1)',
					'rgba(201, 77, 201, 1)',
					'rgba(255, 207, 207, 1)',
					'rgba(201, 77, 77, 1)',
					'rgba(128, 98, 98, 1)',
					'rgba(0, 0, 0, 1)',
					'rgba(128, 128, 128, 1)',
					'rgba(255, 99, 132, 0.80)',
					'rgba(54, 162, 235, 0.80)',
					'rgba(255, 206, 86, 0.80)',
					'rgba(75, 192, 192, 0.80)',
					'rgba(153, 102, 255, 0.80)',
					'rgba(255, 159, 64, 0.80)',
					'rgba(201, 76, 76, 0.3)',
					'rgba(201, 77, 77, 1)',
					'rgba(0, 140, 162, 1)',
					'rgba(158, 109, 8, 1)',
					'rgba(201, 76, 76, 0.8)',
					'rgba(0, 129, 212, 1)',
					'rgba(201, 77, 201, 1)',
					'rgba(255, 207, 207, 1)',
					'rgba(201, 77, 77, 1)',
					'rgba(128, 98, 98, 1)',
					'rgba(0, 0, 0, 1)',
					'rgba(128, 128, 128, 1)'
				],
				borderColor: [
					'rgba(255, 99, 132, 1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 159, 64, 1)',
					'rgba(201, 76, 76, 0.3)',
					'rgba(201, 77, 77, 1)',
					'rgba(0, 140, 162, 1)',
					'rgba(158, 109, 8, 1)',
					'rgba(201, 76, 76, 0.8)',
					'rgba(0, 129, 212, 1)',
					'rgba(201, 77, 201, 1)',
					'rgba(255, 207, 207, 1)',
					'rgba(201, 77, 77, 1)',
					'rgba(128, 98, 98, 1)',
					'rgba(0, 0, 0, 1)',
					'rgba(128, 128, 128, 1)',
					'rgba(255, 99, 132, 1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 159, 64, 1)',
					'rgba(201, 76, 76, 0.3)',
					'rgba(201, 77, 77, 1)',
					'rgba(0, 140, 162, 1)',
					'rgba(158, 109, 8, 1)',
					'rgba(201, 76, 76, 0.8)',
					'rgba(0, 129, 212, 1)',
					'rgba(201, 77, 201, 1)',
					'rgba(255, 207, 207, 1)',
					'rgba(201, 77, 77, 1)',
					'rgba(128, 98, 98, 1)',
					'rgba(0, 0, 0, 1)',
					'rgba(128, 128, 128, 1)'
				],
				fill: false,
				borderWidth: 1
			}]
		},
		options: {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true
					}
				}]
			}
		}
	});
</script>

<!-- level member -->
<?php
foreach ($grafik_member as $key => $value) {
	if($value->level_member == '3'){
		$member = 'Silver';
	}else if($value->level_member == '2'){
		$member = 'Gold';
	}else if($value->level_member == '1'){
		$member = 'Platinum';
	}
	$level_member[] = $member;
	$qty_member[] = $value->qty;
}
?>

<script>
	var ctx = document.getElementById('member');
	var member = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: <?= json_encode($level_member) ?>,
			datasets: [{
				label: 'Grafik Analisis Member',
				data: <?= json_encode($qty_member) ?>,
				backgroundColor: [
					'rgba(255, 99, 132, 0.80)',
					'rgba(54, 162, 235, 0.80)',
					'rgba(255, 206, 86, 0.80)',
					'rgba(75, 192, 192, 0.80)',
					'rgba(153, 102, 255, 0.80)',
					'rgba(255, 159, 64, 0.80)',
					'rgba(201, 76, 76, 0.3)',
					'rgba(201, 77, 77, 1)',
					'rgba(0, 140, 162, 1)',
					'rgba(158, 109, 8, 1)',
					'rgba(201, 76, 76, 0.8)',
					'rgba(0, 129, 212, 1)',
					'rgba(201, 77, 201, 1)',
					'rgba(255, 207, 207, 1)',
					'rgba(201, 77, 77, 1)',
					'rgba(128, 98, 98, 1)',
					'rgba(0, 0, 0, 1)',
					'rgba(128, 128, 128, 1)',
					'rgba(255, 99, 132, 0.80)',
					'rgba(54, 162, 235, 0.80)',
					'rgba(255, 206, 86, 0.80)',
					'rgba(75, 192, 192, 0.80)',
					'rgba(153, 102, 255, 0.80)',
					'rgba(255, 159, 64, 0.80)',
					'rgba(201, 76, 76, 0.3)',
					'rgba(201, 77, 77, 1)',
					'rgba(0, 140, 162, 1)',
					'rgba(158, 109, 8, 1)',
					'rgba(201, 76, 76, 0.8)',
					'rgba(0, 129, 212, 1)',
					'rgba(201, 77, 201, 1)',
					'rgba(255, 207, 207, 1)',
					'rgba(201, 77, 77, 1)',
					'rgba(128, 98, 98, 1)',
					'rgba(0, 0, 0, 1)',
					'rgba(128, 128, 128, 1)'
				],
				borderColor: [
					'rgba(255, 99, 132, 1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 159, 64, 1)',
					'rgba(201, 76, 76, 0.3)',
					'rgba(201, 77, 77, 1)',
					'rgba(0, 140, 162, 1)',
					'rgba(158, 109, 8, 1)',
					'rgba(201, 76, 76, 0.8)',
					'rgba(0, 129, 212, 1)',
					'rgba(201, 77, 201, 1)',
					'rgba(255, 207, 207, 1)',
					'rgba(201, 77, 77, 1)',
					'rgba(128, 98, 98, 1)',
					'rgba(0, 0, 0, 1)',
					'rgba(128, 128, 128, 1)',
					'rgba(255, 99, 132, 1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 159, 64, 1)',
					'rgba(201, 76, 76, 0.3)',
					'rgba(201, 77, 77, 1)',
					'rgba(0, 140, 162, 1)',
					'rgba(158, 109, 8, 1)',
					'rgba(201, 76, 76, 0.8)',
					'rgba(0, 129, 212, 1)',
					'rgba(201, 77, 201, 1)',
					'rgba(255, 207, 207, 1)',
					'rgba(201, 77, 77, 1)',
					'rgba(128, 98, 98, 1)',
					'rgba(0, 0, 0, 1)',
					'rgba(128, 128, 128, 1)'
				],
				fill: false,
				borderWidth: 1
			}]
		},
		options: {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true
					}
				}]
			}
		}
	});
</script>

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

<script>
	console.log = function() {}
	$("#produk-diskon").on('change', function() {

		$(".harga").html($(this).find(':selected').attr('data-harga'));
		$(".harga").val($(this).find(':selected').attr('data-harga'));
	});
</script>
</body>

</html>