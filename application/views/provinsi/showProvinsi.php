				<div class="container-fluid">
					<div class="row">
						<div class="col">
							<a href="<?= base_url('Admin/addProvinsi') ?>">
								<button type="button" class="btn btn-primary my-3">Add Provinsi</button>
							</a>
						</div>
					</div>
					<div class="row mb-3">
						<div class="col">
							<button type="button" class="btn btn-success" data-toggle="modal" data-target="#eksporModal">Export</button>
						</div>
					</div>
					<table class="table table-hover table-dark text-center w-100" id="table_id">
						<thead>
							<tr>
								<th scope="col">No</th>
								<th scope="col">Nama Provinsi</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1;
							foreach ($provinsis as $provinsi) : ?>
								<tr>
									<td scope="row"><?= $i++ ?></td>
									<td><?= $provinsi["nama"]; ?></td>
									<td>
										<form action="<?= base_url('Admin/editProvinsi') ?>" method="POST" style="display: inline;">
											<input type="hidden" name="id" value="<?= $provinsi['id']; ?>">
											<button type="submit" class="btn btn-warning d-inline">Edit</button>
										</form>
										<button type="button" class="btn btn-danger btn-delete d-inline" data-toggle="modal" data-target="#deleteBackdrop" data-id="<?= $provinsi['id']; ?>" data-username="<?= $provinsi["nama"]; ?>">Delete</button>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
					<!-- Button trigger modal -->

					<!-- Modal -->
					<div class="modal fade" id="deleteBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="deleteBackdropLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title text-danger" id="deleteBackdropLabel">Delete Provinsi</h5>
								</div>
								<div class="modal-body text-center">
									<h4 class="text-warning">Are You Sure ?</h4>
									<h6 class="text-warning">Delete Provinsi</h6>
									<h2 class="text-primary" id="usernameDelete"></h2>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
									<form action="<?= base_url('Admin/deleteProvinsi') ?>" method="POST">
										<input type="hidden" name="id" id="id">
										<button type="submit" class="btn btn-danger">Delete</button>
									</form>
								</div>
							</div>
						</div>
					</div>

					<!-- Modal Eksport -->
					<div class="modal fade" id="eksporModal" tabindex="-1" role="dialog" aria-labelledby="eksporModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="eksporModalLabel"><b>Export Data Provinsi</b></h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form method="POST" action="<?= base_url('Admin/exportProvinsi') ?>" target="_blank">
										<div class="form-group">
											<label for="exampleInputEmail1">Pilih Provinsi</label>
											<select class="form-control" name="id">
												<option value="0">-- ALL --</option>
												<?php foreach ($provinsis as $provinsi) : ?>
													<option value="<?= $provinsi['id'] ?>"><?= $provinsi['nama']; ?></option>
												<?php endforeach; ?>
											</select>
										</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-success" name="print">Eksport Data</button>
								</div>
								</form>
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
							<span>Copyright © Your Website 2020</span>
						</div>
					</div>
				</footer>
				<!-- End of Footer -->

				</div>
				<!-- End of Content Wrapper -->

				</div>
				<!-- End of Page Wrapper -->

				<div class="mt-2 mr-3 d-none alert alert-dismissible fade show position-absolute" role="alert" style="background-color:#00adef;top:0; right:0;height:fit-content;max-width:50vh; min-width:40vh">
					<h5 class="text-light"></h5>
					<button type="button" class="close ml-2" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<!-- Bootstrap core JavaScript-->
				<script src="<?= base_url('assets/sb-admin/') ?>vendor/jquery/jquery.min.js"></script>
				<script src="<?= base_url('assets/sb-admin/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

				<!-- Core plugin JavaScript-->
				<script src="<?= base_url('assets/sb-admin/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

				<!-- Custom scripts for all pages-->
				<script src="<?= base_url('assets/sb-admin/') ?>js/sb-admin-2.min.js"></script>

				<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
				<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
				<script>
					$(document).ready(function() {
						$('#table_id').DataTable({
							scrollX: true,
							scrollCollapse: true,
							autoWidth: true,
							paging: true,
						});
						$(".btn-delete").click(function() {
							$("#deleteBackdrop #id").attr('value', $(this).data('id'));
							$("#usernameDelete").html($(this).data('username'))
						});
					});
				</script>
				<?php if ($this->session->flashdata('flash')) : ?>
					<script>
						$('.alert h5').text('<?= $this->session->flashdata('flash') ?>');
						$('.alert').removeClass('d-none');
						setTimeout(function() {
							$('.alert').addClass('d-none');
						}, 4500);
					</script>
				<?php endif; ?>

				</body>

				</html>
