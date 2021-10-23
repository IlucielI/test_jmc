				<div class="container-fluid">
					<div class="container w-75 text-dark mt-5">
						<form action="<?= base_url('Admin/updateKabupaten') ?>" method="POST">
							<input type="hidden" name="id" value="<?= $kabupaten['id']; ?>">
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label for="id_provinsi">Provinsi</label>
									</div>
									<div class="col-md-8">
										<select class="form-control" name="id_provinsi" id="id_provinsi">
											<?php foreach ($provinsis as $provinsi) : ?>
												<option value="<?= $provinsi['id'] ?>" <?php if ($kabupaten['id_provinsi'] == $provinsi['id']) echo ('selected') ?>><?= $provinsi['nama']; ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label for="nama">Nama Kabupaten</label>
									</div>
									<div class="col-md-8">
										<input type="text" class="form-control" id="nama" name="nama" placeholder="nama" required="" value="<?= $kabupaten['nama'] ?>">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label for="jumlah_penduduk">Jumlah Penduduk</label>
									</div>
									<div class="col-md-8">
										<input type="number" class="form-control" id="jumlah_penduduk" name="jumlah_penduduk" placeholder="jumlah penduduk" required="" value="<?= $kabupaten['jumlah_penduduk'] ?>">
									</div>
								</div>
							</div>
							<div class="row d-flex justify-content-center">
								<div class="col-md-4">
									<button type="submit" class="btn btn-warning w-75">Edit</button>
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
