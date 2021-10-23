				<div class="container-fluid">
					<div class="container w-75 text-dark mt-5">
						<form action="<?= base_url('Admin/insertProvinsi') ?>" method="POST">
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label for="nama">Nama Provinsi</label>
									</div>
									<div class="col-md-8">
										<input type="text" class="form-control" id="nama" name="nama" placeholder="nama" required="">
									</div>
								</div>
							</div>
							<div class="row d-flex justify-content-center">
								<div class="col-md-4">
									<button type="submit" class="btn btn-warning w-75">Add</button>
								</div>
							</div>
						</form>
					</div>
				</div>
				</div>

				<!-- End of Main Content -->
				<!-- Footer -->
				<footer class="footer bg-white">
					<div class="container">
						<div class="copyright text-center">
							<span>Copyright © Your Website 2020</span>
						</div>
					</div>
				</footer>
				<!-- End of Footer -->

				</div>
				<!-- End of Content Wrapper -->

				</div>
				<!-- End of Page Wrapper -->

				<!-- Bootstrap core JavaScript-->
				<script src="<?= base_url('assets/sb-admin') ?>vendor/jquery/jquery.min.js"></script>
				<script src="<?= base_url('assets/sb-admin') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

				<!-- Core plugin JavaScript-->
				<script src="<?= base_url('assets/sb-admin') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

				<!-- Custom scripts for all pages-->
				<script src="<?= base_url('assets/sb-admin') ?>js/sb-admin-2.min.js"></script>

				</body>

				</html>
