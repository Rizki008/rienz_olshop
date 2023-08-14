<div class="footer-copyright-area">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<div class="footer-copy-right">
					<p>Copyright © 2022 <a href="#">Toko Pasla Second Store</a> All rights reserved.</p>
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


<!-- level member -->
<?php
foreach ($grafik_member as $key => $value) {
	if ($value->level_member == '3') {
		$member = 'Silver';
	} else if ($value->level_member == '2') {
		$member = 'Gold';
	} else if ($value->level_member == '1') {
		$member = 'Platinum';
	}
	$level_member[] = $member;
	$qty_member[] = $value->qty;
}
?>

<script>
	var ctx = document.getElementById('member');
	var member = new Chart(ctx, {
		type: 'pie',
		data: {
			labels: <?= json_encode($level_member) ?>,
			datasets: [{
				label: 'Grafik Analisis Member',
				data: <?= json_encode($qty_member) ?>,
				backgroundColor: [
					'rgba(212,175,55, 0.80)',
					'rgba(192,192,192, 0.80)',
					'rgba(229, 228, 226, 0.80)',
				],
				borderColor: [
					'rgba(212,175,55, 1)',
					'rgba(192,192,192, 1)',
					'rgba(229, 228, 226, 1)',
				],
				fill: false,
				borderWidth: 1
			}]
		},
		// options: {
		// 	scales: {
		// 		yAxes: [{
		// 			ticks: {
		// 				beginAtZero: true
		// 			}
		// 		}]
		// 	}
		// }
	});
</script>


<!-- PRODUK TERLARIS -->
<script type="text/javascript">
	Highcharts.chart('container', {
		chart: {
			type: 'area'
		},
		title: {
			text: 'Analisis Penjualan Produk Terlaris Pertanggal, Bulan, Tahun'
		},
		subtitle: {
			text: 'Toko Thrift'
		},
		xAxis: {

			categories: [
				<?php
				$tanggal_bulan = $this->m_transaksi->bulan();
				foreach ($tanggal_bulan as $benar) {
					echo "'" . $benar['tgl_order'] . "',";
				}
				?>
			]
		},
		yAxis: {
			title: {
				text: 'Jumlah Terjual'
			}
		},
		plotOptions: {
			line: {
				dataLabels: {
					enabled: true
				},
				enableMouseTracking: false
			}
		},
		series: [
			<?php
			$produk = $this->m_transaksi->produk();
			foreach ($produk as $prod) { ?> {
					name: '<?php echo $prod['nama_produk'] ?>',

					data: [
						<?php
						$tanggal_bulan = $this->m_transaksi->bulan();
						foreach ($tanggal_bulan as $kedua) {
							$total_prpduk = $this->db->query("SELECT SUM(qty) as total FROM `rinci_transaksi` LEFT JOIN transaksi ON transaksi.no_order=rinci_transaksi.no_order LEFT JOIN produk ON produk.id_produk=rinci_transaksi.id_produk WHERE nama_produk='" . $prod['nama_produk'] . "' AND tgl_order='" . $kedua['tgl_order'] . "'");
							foreach ($total_prpduk->result_array() as $total) {
								if (empty($total['total'])) {
									echo "0,";
								} else {
									echo $total['total'] . ",";
								}
							}
						}
						?>
					]
				},
			<?php } ?>
		]
	});
</script>

<!-- MEREK PRODUK TERLARIS -->
<script type="text/javascript">
	Highcharts.chart('larissa', {
		chart: {
			type: 'line'
		},
		title: {
			text: 'Analisis Merek Terlaris Pertanggal, Bulan, Tahun'
		},
		subtitle: {
			text: 'Toko Thrift'
		},
		xAxis: {

			categories: [
				<?php
				$tanggal_tahun = $this->m_transaksi->bulan();
				foreach ($tanggal_tahun as $betul) {
					echo "'" . $betul['tgl_order'] . "',";
				}
				?>
			]
		},
		yAxis: {
			title: {
				text: 'Jumlah Terjual'
			}
		},
		plotOptions: {
			line: {
				dataLabels: {
					enabled: true
				},
				enableMouseTracking: false
			}
		},
		series: [
			<?php
			$merek = $this->m_transaksi->merek();
			foreach ($merek as $mereka) { ?> {
					name: '<?php echo $mereka['merek'] ?>',

					data: [
						<?php
						$tanggal_tahun = $this->m_transaksi->bulan();
						foreach ($tanggal_tahun as $ketiga) {
							$total_prpduk = $this->db->query("SELECT SUM(qty) as laris FROM `rinci_transaksi` LEFT JOIN transaksi ON transaksi.no_order=rinci_transaksi.no_order LEFT JOIN produk ON produk.id_produk=rinci_transaksi.id_produk WHERE merek='" . $mereka['merek'] . "' AND tgl_order='" . $ketiga['tgl_order'] . "' GROUP BY produk.merek ORDER BY qty");
							foreach ($total_prpduk->result_array() as $tota) {
								if (empty($tota['laris'])) {
									echo "0,";
								} else {
									echo $tota['laris'] . ",";
								}
							}
						}
						?>
					]
				},
			<?php } ?>
		]
	});
</script>

<!-- KATEGORI LARIS -->
<script type="text/javascript">
	Highcharts.chart('kategoris', {
		chart: {
			type: 'column'
		},
		title: {
			text: 'Analisis Kategori Terlaris Pertanggal, Bulan, Tahun'
		},
		subtitle: {
			text: 'Toko Thrift'
		},
		xAxis: {

			categories: [
				<?php
				$tanggal_kategori = $this->m_transaksi->bulan();
				foreach ($tanggal_kategori as $salah) {
					echo "'" . $salah['tgl_order'] . "',";
				}
				?>
			]
		},
		yAxis: {
			title: {
				text: 'Jumlah Terjual'
			}
		},
		plotOptions: {
			line: {
				dataLabels: {
					enabled: true
				},
				enableMouseTracking: false
			}
		},
		series: [
			<?php
			$kategori = $this->m_transaksi->kategori();
			foreach ($kategori as $kategor) { ?> {
					name: '<?php echo $kategor['nama_kategori'] ?>',

					data: [
						<?php
						$tanggal_kategori = $this->m_transaksi->bulan();
						foreach ($tanggal_kategori as $kate) {
							$total_kategori = $this->db->query("SELECT SUM(qty) as kategori_laris FROM `rinci_transaksi` LEFT JOIN transaksi ON transaksi.no_order=rinci_transaksi.no_order LEFT JOIN produk ON produk.id_produk=rinci_transaksi.id_produk LEFT JOIN kategori ON kategori.id_kategori=produk.id_kategori WHERE nama_kategori='" . $kategor['nama_kategori'] . "' AND tgl_order='" . $kate['tgl_order'] . "' GROUP BY kategori.nama_kategori ORDER BY qty");
							foreach ($total_kategori->result_array() as $kat) {
								if (empty($kat['kategori_laris'])) {
									echo "0,";
								} else {
									echo $kat['kategori_laris'] . ",";
								}
							}
						}
						?>
					]
				},
			<?php } ?>
		]
	});
</script>

<!-- PELANGGAN LOYAL -->
<script type="text/javascript">
	Highcharts.chart('pelanggan', {
		chart: {
			type: 'spline'
		},
		title: {
			text: 'Analisis Pelanggan Loyal Pertanggal, Bulan, Tahun'
		},
		subtitle: {
			text: 'Toko Thrift'
		},
		xAxis: {

			categories: [
				<?php
				$tanggal_belanja = $this->m_transaksi->bulan();
				foreach ($tanggal_belanja as $belanja) {
					echo "'" . $belanja['tgl_order'] . "',";
				}
				?>
			]
		},
		yAxis: {
			title: {
				text: 'Loyalitas'
			}
		},
		plotOptions: {
			line: {
				dataLabels: {
					enabled: true
				},
				enableMouseTracking: false
			}
		},
		series: [
			<?php
			$pelanggan = $this->m_transaksi->pelanggan();
			foreach ($pelanggan as $pelang) { ?> {
					name: '<?php echo $pelang['nama_pelanggan'] ?>',

					data: [
						<?php
						$tanggal_belanja = $this->m_transaksi->bulan();
						foreach ($tanggal_belanja as $beli) {
							$total_kategori = $this->db->query("SELECT COUNT(transaksi.id_pelanggan) as pelanggan FROM `transaksi` LEFT JOIN pelanggan ON pelanggan.id_pelanggan=transaksi.id_pelanggan WHERE nama_pelanggan='" . $pelang['nama_pelanggan'] . "' AND tgl_order='" . $beli['tgl_order'] . "' GROUP BY pelanggan.id_pelanggan ORDER BY pelanggan");
							foreach ($total_kategori->result_array() as $pel) {
								if (empty($pel['pelanggan'])) {
									echo "0,";
								} else {
									echo $pel['pelanggan'] . ",";
								}
							}
						}
						?>
					]
				},
			<?php } ?>
		]
	});
</script>

<!-- JENIS KELAMIN -->
<script type="text/javascript">
	Highcharts.chart('jenis_kelamin', {
		chart: {
			type: 'spline'
		},
		title: {
			text: 'Analisis Jenis Kelamin Pertanggal, Bulan, Tahun'
		},
		subtitle: {
			text: 'Toko Thrift'
		},
		xAxis: {

			categories: [
				<?php
				$tanggal_jenis = $this->m_transaksi->bulan();
				foreach ($tanggal_jenis as $jenis) {
					echo "'" . $jenis['tgl_order'] . "',";
				}
				?>
			]
		},
		yAxis: {
			title: {
				text: 'Jumlah'
			}
		},
		plotOptions: {
			line: {
				dataLabels: {
					enabled: true
				},
				enableMouseTracking: false
			}
		},
		series: [
			<?php
			$jeniskela = $this->m_transaksi->jeniskelamin();
			foreach ($jeniskela as $jk) { ?> {
					name: '<?php echo $jk['jenis_kel'] ?>',

					data: [
						<?php
						$tanggal_jenis = $this->m_transaksi->bulan();
						foreach ($tanggal_jenis as $kelamin) {
							$total_jenis_kelamin = $this->db->query("SELECT SUM(qty) as kelam FROM `rinci_transaksi` LEFT JOIN transaksi ON transaksi.no_order=rinci_transaksi.no_order LEFT JOIN pelanggan ON pelanggan.id_pelanggan=transaksi.id_pelanggan WHERE jenis_kel='" . $jk['jenis_kel'] . "' AND tgl_order='" . $kelamin['tgl_order'] . "' GROUP BY pelanggan.jenis_kel");
							foreach ($total_jenis_kelamin->result_array() as $lamin) {
								if (empty($lamin['kelam'])) {
									echo "0,";
								} else {
									echo $lamin['kelam'] . ",";
								}
							}
						}
						?>
					]
				},
			<?php } ?>
		]
	});
</script>



<?php foreach ($grafik_kelamin as $key => $value) {
	$jk[] = $value->jk;
	$jumlah[] = $value->jumlah;
} ?>
<!-- <script>
	var ctx = document.getElementById('kelamin');
	var kelamin = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: <?= json_encode($jk) ?>,
			datasets: [{
				label: 'Grafik Analisis Jenis Kelamin',
				data: <?= json_encode($jumlah) ?>,
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
</script> -->

<?php foreach ($grafik_produk_laris as $key => $value) {
	$nama_produk[] = $value->nama_produk;
	$jlaris[] = $value->jlaris;
} ?>
<!-- <script>
	var ctx = document.getElementById('laris');
	var laris = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: <?= json_encode($nama_produk) ?>,
			datasets: [{
				label: 'Grafik Analisis Produk Laris',
				data: <?= json_encode($jlaris) ?>,
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
</script> -->
<?php foreach ($grafik_produk_merek as $key => $value) {
	$merek[] = $value->merek;
	$laris[] = $value->laris;
} ?>
<!-- <script>
	var ctx = document.getElementById('larissa');
	var laris = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: <?= json_encode($merek) ?>,
			datasets: [{
				label: 'Grafik Analisis Merek Produk Laris',
				data: <?= json_encode($laris) ?>,
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
</script> -->
<?php
foreach ($grafik_pelanggan as $key => $value) {
	$nama_pelanggan[] = $value->nama_pelanggan;
	$qty[] = $value->qty;
}
?>

<!-- <script>
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
</script> -->

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