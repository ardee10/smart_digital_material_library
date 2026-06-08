<style>
	/* =========================================================================
| PAGE STYLE
========================================================================= */

	.material-page {

		background: #f7f8fa;
		padding: 20px;

	}

	.page-title {

		font-size: 32px;
		font-weight: 700;
		letter-spacing: .5px;
		color: #111;

	}

	/* =========================================================================
| FILTER WRAPPER
========================================================================= */

	.filter-wrapper {

		background: #fff;
		padding: 20px;
		border: 1px solid #e5e7eb;
		margin-bottom: 20px;

	}

	.filter-header {

		display: flex;
		align-items: center;
		justify-content: space-between;
		margin-bottom: 20px;

	}

	.filter-title {

		font-size: 14px;
		font-weight: 700;
		text-transform: uppercase;
		letter-spacing: .5px;
		color: #111827;

	}

	.filter-toggle {

		font-size: 13px;

	}

	.filter-label {

		font-size: 11px;
		font-weight: 700;
		text-transform: uppercase;
		letter-spacing: .5px;
		color: #6b7280;
		margin-bottom: 6px;

	}

	.filter-wrapper .form-select,
	.filter-wrapper .form-control {

		height: 40px;
		border-radius: 0 !important;
		border: 1px solid #d1d5db;
		font-size: 13px;
		box-shadow: none !important;

	}

	.filter-wrapper .form-select:focus,
	.filter-wrapper .form-control:focus {

		border-color: #111;

	}

	/* =========================================================================
| TOOLBAR
========================================================================= */

	.material-toolbar {

		display: flex;
		align-items: center;
		justify-content: space-between;
		margin-bottom: 15px;
		flex-wrap: wrap;
		gap: 10px;

	}

	/* =========================================================================
| TABLE
========================================================================= */

	.table-wrapper {

		background: #fff;
		padding: 15px;
		border: 1px solid #e5e7eb;
		overflow-x: auto;

	}

	.custom-table {

		width: 100% !important;
		margin-bottom: 0 !important;
		font-size: 13px;
		border-collapse: collapse !important;

	}

	.custom-table thead th {

		background: #f3f4f6 !important;
		color: #6b7280 !important;
		font-size: 11px;
		font-weight: 700;
		text-transform: uppercase;
		letter-spacing: .5px;
		padding: 14px 12px;
		border-bottom: 1px solid #dcdfe3 !important;
		white-space: nowrap;
		vertical-align: middle;

	}

	.custom-table tbody td {

		padding: 14px 12px;
		border-bottom: 1px solid #f1f1f1 !important;
		vertical-align: middle;

	}

	.custom-table tbody tr:hover {

		background: #fafafa;

	}

	/* =========================================================================
| MATERIAL INFO
========================================================================= */

	.material-title {

		font-size: 13px;
		font-weight: 700;
		color: #111827;
		margin-bottom: 2px;

	}

	.material-subtitle {

		font-size: 11px;
		color: #6b7280;

	}

	/* =========================================================================
| IMAGE
========================================================================= */

	.img-material {

		width: 65px;
		height: 65px;
		object-fit: cover;
		border: 1px solid #e5e7eb;
		background: #fff;

	}

	/* =========================================================================
| BADGE
========================================================================= */

	.badge-lifecycle {

		font-size: 11px;
		font-weight: 600;
		padding: 5px 10px;
		border-radius: 0 !important;

	}

	/* =========================================================================
| ACTION BUTTON
========================================================================= */

	.btn-action {

		width: 32px;
		height: 32px;
		padding: 0;
		display: inline-flex;
		align-items: center;
		justify-content: center;
		border-radius: 0 !important;

	}

	/* =========================================================================
| DATATABLE
========================================================================= */

	.dataTables_wrapper .dataTables_filter input {

		height: 38px;
		border-radius: 0 !important;
		border: 1px solid #d1d5db !important;
		padding: 6px 12px !important;
		box-shadow: none !important;

	}

	.dataTables_wrapper .dataTables_length select {

		border-radius: 0 !important;
		border: 1px solid #d1d5db !important;

	}

	.dataTables_paginate .paginate_button {

		border-radius: 0 !important;
		margin: 0 2px;

	}

	.dataTables_paginate .paginate_button.current {

		background: #111 !important;
		color: #fff !important;
		border: 1px solid #111 !important;

	}

	/* =========================================================================
| SELECT2
========================================================================= */

	.select2-container--bootstrap-5 .select2-selection {

		min-height: 40px !important;
		border-radius: 0 !important;
		border: 1px solid #d1d5db !important;
		padding-top: 4px;

	}

	.select2-dropdown {

		border-radius: 0 !important;
		z-index: 9999 !important;

	}

	/* =========================================================================
| MOBILE
========================================================================= */

	@media(max-width:768px) {

		.page-title {

			font-size: 24px;

		}

		.filter-wrapper {

			padding: 15px;

		}

		.table-wrapper {

			padding: 10px;

		}

		.filter-header {

			flex-direction: column;
			align-items: flex-start;
			gap: 10px;
		}
	}

	.select2-container {
		width: 100% !important;
	}

	.select2-dropdown {
		z-index: 999999 !important;
	}

	.modal {
		z-index: 1055;
	}

	.modal-backdrop {
		z-index: 1050;
	}

	/* SELECT2 IN MODAL */
	#modalAddMaterial .select2-container--bootstrap-5 .select2-selection {

		height: 38px;
		border-radius: 0;
		border: 1px solid #ced4da;

	}

	#modalAddMaterial .select2-container--bootstrap-5 .select2-selection--multiple {

		min-height: 38px;
		height: auto;

	}

	#modalAddMaterial .select2-dropdown {

		border-radius: 0 !important;

	}

	/* =========================================================
| FORM CONTROL
========================================================= */

	.form-control,
	.form-select {

		border-radius: 0 !important;
		min-height: 42px;
		border: 1px solid #dcdfe4;
		font-size: 13px;
		box-shadow: none !important;

	}

	.form-control:focus,
	.form-select:focus {

		border-color: #111 !important;
		box-shadow: none !important;

	}

	/* =========================================================
| SELECT2
========================================================= */

	.select2-container--bootstrap-5 .select2-selection {

		border-radius: 0 !important;
		min-height: 42px !important;
		border: 1px solid #dcdfe4 !important;
		font-size: 13px;
		box-shadow: none !important;

	}

	.select2-container--bootstrap-5.select2-container--focus .select2-selection {

		border-color: #111 !important;
		box-shadow: none !important;

	}

	/* MULTIPLE SELECT2 */

	.select2-container--bootstrap-5 .select2-selection--multiple {

		border-radius: 0 !important;
		min-height: 42px !important;
		padding-top: 3px !important;

	}

	/* DROPDOWN */

	.select2-dropdown {

		border-radius: 0 !important;
		border: 1px solid #dcdfe4 !important;

	}

	/* SELECT2 TAG */

	.select2-container--bootstrap-5 .select2-selection__choice {

		border-radius: 0 !important;
		font-size: 12px;

	}

	/* INPUT GROUP */

	.input-group .form-control,
	.input-group .form-select {

		border-radius: 0 !important;

	}

	/* MODAL */

	.modal-content {

		border-radius: 0 !important;

	}

	/* BUTTON */

	.btn {

		border-radius: 0 !important;

	}

	/* =========================================================
| FILE INPUT FULL WIDTH FIX
========================================================= */

	input[type="file"].form-control {
		padding: 0;
		height: auto;
		overflow: hidden;
	}

	/* tombol choose file */

	input[type="file"].form-control::file-selector-button {

		height: 100%;

		padding: 10px 15px;

		margin-right: 15px;

		border: none;

		border-right: 1px solid #ced4da;

		background: #f8f9fa;

		color: #212529;

		cursor: pointer;

	}

	/* hover */

	input[type="file"].form-control::file-selector-button:hover {

		background: #e9ecef;

	}
</style>
<?php
$model = $model ?? [];

?>

<!-- Start Top Navigation -->
<div class="row">
	<?php if ($this->session->flashdata('message')): ?>
		<div class="flash-data" data-flashdata='<?= is_string($this->session->flashdata('message')) ? $this->session->flashdata('message') : json_encode($this->session->flashdata('message')) ?>'></div>
	<?php endif; ?>
</div>


<div class="container-fluid">
	<div class="row mb-3">
		<div class="col-md-4 mb-3">
			<button type="button"
				class="btn btn-outline-success mr-3 btn-sm"
				data-bs-toggle="modal"
				data-bs-target="#modalAddModelNumber">
				<i class="bi bi-plus"></i>
				Add Model Number
			</button>
			<button type="button"
				class="btn btn-outline-info btn-sm"
				data-bs-toggle="modal"
				data-bs-target="#modalImportodelNumber">
				<i class="bi bi-upload"></i>
				Import Model Number
			</button>
		</div>

		<div class="table-responsive">
			<table class="table custom-table align-middle" style="width:100%" id="tblModelNumber">
				<thead class="bg-dark text-white">
					<tr>
						<th class="text-muted">No</th>
						<th class="text-muted">Model Number</th>
						<th class="text-muted">Model Name</th>
						<th class="text-muted">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1; ?>
					<?php foreach ($model as $data): ?>

						<tr>
							<td><?= $no++; ?></td>
							<td><?= $data->model_number; ?></td>
							<td><?= $data->model_name; ?></td>
							<td>

								<!-- options -->
								<div class="d-flex gap-2 justify-content-center">
									<button class="btn btn-sm btn-warning"
										onclick="editModelNumber(this)"
										data-id="<?= $data->id ?>"
										data-bs-toggle="modal"
										data-bs-target="#modalAddModelNumber">
										<i class="bi bi-pencil"></i>
									</button>

									<a href="<?php echo base_url('admin/deleteModelNumber/' . $data->id); ?>"
										class="btn btn-sm btn-danger tombol-hapus">
										<i class="bi bi-trash"></i>
									</a>
							</td>
						</tr>

					<?php endforeach; ?>
				</tbody>
			</table>
		</div>

	</div>

	<!-- Modal Add/Edit Model Number -->
	<div class="modal fade" id="modalAddModelNumber" tabindex="-1" role="dialog" aria-labelledby="modalAddModelNumberLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalAddModelNumberLabel">Add Model Number</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form id="formAddModelNumber">
					<div class="modal-body">
						<input type="hidden" id="modelNumberId" name="id" value="">
						<div class="mb-3">
							<label class="form-label">Model Number *</label>
							<input type="text"
								class="form-control"
								id="model_number"
								name="model_number"
								placeholder="Enter model number"
								required>
						</div>
						<div class="mb-3">
							<label class="form-label">Model Name</label>
							<input type="text"
								class="form-control"
								id="model_name"
								name="model_name"
								placeholder="Enter model name (optional)">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-primary" id="btnSaveModelNumber">Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- Modal Import Model Number -->
	<div class="modal fade" id="modalImportodelNumber" tabindex="-1" role="dialog" aria-labelledby="modalImportModelNumberLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalImportModelNumberLabel">Import Model Number</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form id="formImportModelNumber">
					<div class="modal-body">
						<div class="mb-3">
							<label class="form-label">Select Excel File *</label>
							<input type="file"
								class="form-control"
								name="file"
								accept=".xlsx,.xls,.csv"
								required>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-primary">Import</button>
					</div>

				</form>

				<div class="modal-body justify-content-center">
					<a href="<?= base_url('assets/template_import/import_model_number.xlsx') ?>" class="btn btn-outline-success btn-sm" download>
						<i class="bi bi-download"></i>
						Download
					</a>
					<p class="text-muted mt-2">Download format excel for import Model Number</p>
				</div>
			</div>
		</div>
	</div>

	<script>
		//Add Model Number
		function addModelNumber() {
			resetFormData();
			$('#modalAddModelNumber').modal('show');
		}

		function editModelNumber(el) {
			let id = $(el).data('id');
			// Fetch model number data by ID and populate the form

			$('#modalAddModelNumberLabel').text('Edit Model Number');
			$('#btnSaveModelNumber').text('Update');

			// Call ajax to get data by ID
			$.ajax({
				url: base + 'Admin/getById/' + id,
				type: 'GET',
				dataType: 'json',
				success: function(res) {
					let data = res.data;
					$('#modelNumberId').val(data.id);
					$('#model_number').val(data.model_number); //if update make it readonly
					$('#model_number').prop('readonly', true);
					$('#model_name').val(data.model_name);
					$('#modalAddModelNumber').modal('show');
				}
			});
		}

		$('#btnSaveModelNumber').on('click', function() {

			let id = $('#modelNumberId').val();
			let url = id ?
				base + 'Admin/updateModelNumber/' + id :
				base + 'Admin/saveModelNumber';

			$.ajax({
				url: url,
				type: 'POST',
				data: $('#formAddModelNumber').serialize(),
				dataType: 'json',

				success: function(res) {

					if (res.status == 'success') {

						$('#modalAddModelNumber').modal('hide');

						Swal.fire({
							icon: 'success',
							title: 'Success',
							text: res.message
						});

						setTimeout(() => {
							location.reload();
						}, 1000);

					} else {

						Swal.fire({
							icon: 'warning',
							title: 'Warning',
							text: res.message
						});
					}
				},
				error: function(xhr) {

					console.log(xhr.responseText);

					Swal.fire({
						icon: 'error',
						title: 'Server Error',
						text: 'Something went wrong'
					});
				}
			});

		});

		function resetFormData() {
			$('#formAddModelNumber')[0].reset();
			$('#modelNumberId').val('');
			$('#model_number').prop('readonly', false);
			$('#modalAddModelNumberLabel').text('Add Model Number');
			$('#btnSaveModelNumber').text('Save');
		}
		// Reset form when modal is hidden
		$('#modalAddModelNumber').on('hidden.bs.modal', function() {
			resetFormData();
		});

		//Import Model Number
		$('#formImportModelNumber').on('submit', function(e) {
			e.preventDefault();
			let formData = new FormData(this);
			$.ajax({
				url: base + 'Admin/importModelNumber',
				type: 'POST',
				data: formData,
				contentType: false,
				processData: false,
				dataType: 'json',
				success: function(res) {
					if (res.status == 'success') {
						// CLOSE MODAL
						$('#modalImportodelNumber').modal('hide');
						// RESET FORM
						$('#formImportModelNumber')[0].reset();
						// Load Model Number
						Swal.fire({
							icon: 'success',
							title: 'Success',
							text: res.message
						});

						setTimeout(() => {
							location.reload();
						}, 1000);

					} else {

						Swal.fire({
							icon: 'warning',
							title: 'Warning',
							text: res.message
						});
					}
				},
				error: function(xhr) {
					console.log(xhr.responseText);
					Swal.fire({
						icon: 'error',
						title: 'Server Error',
						text: 'Something went wrong'
					});
				}
			});
		});
	</script>