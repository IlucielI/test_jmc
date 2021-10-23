				<div class="container-fluid">
					<!-- Content Row -->
					<div class="row">
						<!-- Employee Card Example -->
						<div class="col">
							<div class="card border-left-success shadow h-100 py-2">
								<div class="card-body">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Provinsi</div>
											<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_provinsi; ?></div>
										</div>
										<div class="col-auto">
											<i class="fas fa-user-friends fa-2x text-gray-300"></i>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row mt-3">

						<!-- Earnings (Monthly) Card Example -->
						<div class="col">
							<div class="card border-left-primary shadow h-100 py-2">
								<div class="card-body">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Kabupaten</div>
											<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah_kabupaten; ?></div>
										</div>
										<div class="col-auto">
											<i class="fas fa-user-clock fa-2x text-gray-300"></i>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-xl-4 col-lg-5">
							<div class="card shadow mb-4">
								<!-- Card Header - Dropdown -->
								<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
									<h6>Jumlah Penduduk Berdasarkan Provinsi</h6>
								</div>
								<!-- Card Body -->
								<div class="card-body">
									<div class="chart-pie pt-4 pb-2">
										<canvas id="myPieChart"></canvas>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				</div>

				<!-- End of Main Content -->
				<!-- Footer -->
				<footer class="footer bg-white">
					<div class="container">
						<div class="copyright text-center">
							<span>© 2021 All Rights Reserved</span>
						</div>
					</div>
				</footer>
				<!-- End of Footer -->

				</div>
				<!-- End of Content Wrapper -->

				</div>
				<!-- End of Page Wrapper -->

				<!-- Scroll to Top Button-->
				<a class="scroll-to-top rounded" href="#page-top">
					<i class="fas fa-angle-up"></i>
				</a>

				<!-- Bootstrap core JavaScript-->
				<script src="<?= base_url('assets/sb-admin/') ?>vendor/jquery/jquery.min.js"></script>
				<script src="<?= base_url('assets/sb-admin/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

				<!-- Core plugin JavaScript-->
				<script src="<?= base_url('assets/sb-admin/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

				<!-- Custom scripts for all pages-->
				<script src="<?= base_url('assets/sb-admin/') ?>js/sb-admin-2.min.js"></script>
				<!-- Page level plugins -->
				<script src="<?= base_url('assets/sb-admin/') ?>vendor/chart.js/Chart.min.js"></script>

				<script>
					// Set new default font family and font color to mimic Bootstrap's default styling
					Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
					Chart.defaults.global.defaultFontColor = '#858796';

					// Pie Chart Example
					var ctx = document.getElementById("myPieChart");
					var myPieChart = new Chart(ctx, {
						type: 'doughnut',
						data: {
							labels: [<?php foreach ($jumlah_penduduk_alls as $jumlah_penduduk_all)
													echo ("'" . $jumlah_penduduk_all['nama'] . "',")
												?>],
							datasets: [{
								data: [<?php foreach ($jumlah_penduduk_alls as $jumlah_penduduk_all)
													echo ("'" . $jumlah_penduduk_all['jumlah_penduduk'] . "',")
												?>],
								backgroundColor: ['#4e73df', '#1cc88a', "navy", "red", "orange", "blue"],
								hoverBackgroundColor: ['#2e59d9', '#17a673', "navy", "red", "orange", "blue"],
								hoverBorderColor: "rgba(234, 236, 244, 1)",
							}],
						},
						options: {
							maintainAspectRatio: false,
							tooltips: {
								backgroundColor: "rgb(255,255,255)",
								bodyFontColor: "#858796",
								borderColor: '#dddfeb',
								borderWidth: 1,
								xPadding: 15,
								yPadding: 15,
								displayColors: false,
								caretPadding: 10,
							},
							legend: {
								display: true
							},
							cutoutPercentage: 80,
						},
					});
				</script>

				</body>

				</html>
