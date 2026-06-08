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
| FILE INPUT FIX
========================================================= */

	input[type="file"].form-control {

		padding: 0;

		height: 42px;

		line-height: 42px;

		overflow: hidden;

	}

	/* BUTTON CHOOSE FILE */

	input[type="file"].form-control::file-selector-button {

		height: 100%;

		padding: 0 15px;

		margin-right: 15px;

		border: none;

		border-right: 1px solid #ced4da;

		background-color: #f8f9fa;

		color: #212529;

		cursor: pointer;

	}

	/* HOVER */

	input[type="file"].form-control::file-selector-button:hover {

		background-color: #e9ecef;

	}
</style>

<?php
$modelassets = $modelassets ?? [];

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
				data-bs-target="#modalAddmodelAssets">
				<i class="bi bi-plus"></i>
				Add Model Assest
			</button>
		</div>

		<div class="table-responsive">
			<!-- <table class="table table-hover w-100 mt-3 table-striped table-bordered" style="width:100%" id="tblmodelAssets"> -->
			<table class="table custom-table align-middle" style="width:100%" id="tblmodelAssets">
				<thead class="bg-dark text-white">
					<tr>
						<th>No</th>
						<th>Model Number</th>
						<th>Model Name</th>
						<th>Blender 3D Model</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>

				</tbody>
			</table>
		</div>
	</div>


	<!-- ========================================================================= -->
	<!-- MODAL ADD MODEL ASSETS -->
	<!-- ========================================================================= -->

	<div class="modal fade"
		id="modalAddmodelAssets"
		tabindex="-1"
		aria-hidden="true">

		<div class="modal-dialog modal-lg modal-dialog-centered">

			<div class="modal-content border-0 shadow-lg">

				<div class="modal-header bg-dark text-white">

					<h5 class="modal-title" id="modalTitle">
						Add Model Assets
					</h5>

					<button type="button"
						class="btn-close btn-close-white"
						data-bs-dismiss="modal"></button>

				</div>

				<form id="formAddModelAssets"
					method="POST"
					enctype="multipart/form-data">

					<div class="modal-body">
						<input type="hidden" name="id" id="edit_id">

						<!-- MODEL -->
						<div class="mb-3">
							<label class="form-label fw-bold">
								Model Number
							</label>

							<select name="model_id"
								id="model_id"
								class="form-select"
								required>

								<option value="">
									-- Select Model --
								</option>

								<?php
								$models = $this->db
									->order_by('model_number', 'ASC')
									->get('tbl_models')
									->result();
								foreach ($models as $m):
								?>
									<option value="<?= $m->id; ?>">
										<?= $m->model_number; ?>
										-
										<?= $m->model_name; ?>
									</option>
								<?php endforeach; ?>

							</select>
							<small class="text-muted">
								Only models without assets can be uploaded
							</small>

						</div>

						<!-- FILE -->
						<div class="mb-3">

							<label class="form-label fw-bold">

								Blend File

							</label>

							<input type="file"
								name="blender_asset_file"
								class="form-control"
								accept=".blend"
								required>

							<small class="text-muted">

								Allowed file : .blend

							</small>

							<div id="oldBlendFile"></div>

						</div>

						<!-- ALERT -->
						<div id="modelAssetAlert"></div>

					</div>

					<div class="modal-footer">

						<button type="button"
							class="btn btn-secondary"
							data-bs-dismiss="modal">

							Close

						</button>

						<button type="submit"
							class="btn btn-success"
							id="btnSubmitModelAssets">

					</div>

				</form>

			</div>

		</div>

	</div>


</div>
</div>


<script>
	$(document).ready(function() {
		$('#model_id').select2({
			theme: 'bootstrap-5',
			width: '100%',
			placeholder: '-- Select Model --',
			dropdownParent: $('#modalAddmodelAssets')
		});
		// $('#model_id').on('change', function() {
		// 	let model_id = $(this).val();
		// 	if (model_id == '') return;

		// 	$.ajax({

		// 		url: base + 'Home/checkModelAssets',
		// 		type: 'POST',
		// 		data: {
		// 			model_id: model_id
		// 		},

		// 		dataType: 'json',
		// 		success: function(res) {

		// 			/*
		// 			|--------------------------------------------------------------------------
		// 			| ASSET ALREADY EXISTS
		// 			|--------------------------------------------------------------------------
		// 			*/

		// 			if (res.status == 'exists') {

		// 				Swal.fire({

		// 					icon: 'warning',
		// 					title: 'Assets Already Exists',
		// 					text: 'This model already has uploaded assets'

		// 				});

		// 				$('#formAddModelAssets button[type="submit"]')
		// 					.prop('disabled', true);

		// 			}

		// 			/*
		// 			|--------------------------------------------------------------------------
		// 			| AVAILABLE
		// 			|--------------------------------------------------------------------------
		// 			*/
		// 			else {

		// 				$('#formAddModelAssets button[type="submit"]')
		// 					.prop('disabled', false);

		// 			}
		// 		}
		// 	});
		// });
		// $('#formAddModelAssets').on('submit', function(e) {
		// 	e.preventDefault();
		// 	let formData = new FormData(this);
		// 	$.ajax({

		// 		url: base + 'Home/saveModelAssets',
		// 		type: 'POST',
		// 		data: formData,
		// 		processData: false,
		// 		contentType: false,
		// 		dataType: 'json',

		// 		beforeSend: function() {

		// 			Swal.fire({
		// 				title: 'Uploading...',
		// 				text: 'Please wait',
		// 				allowOutsideClick: false,

		// 				didOpen: () => {
		// 					Swal.showLoading();
		// 				}

		// 			});
		// 		},

		// 		success: function(res) {
		// 			if (res.status == 'success') {
		// 				Swal.fire({
		// 					icon: 'success',
		// 					title: 'Success',
		// 					text: res.message
		// 				});

		// 				$('#modalAddmodelAssets').modal('hide');
		// 				$('#formAddModelAssets')[0].reset();
		// 				$('#tblmodelAssets').DataTable().ajax.reload();

		// 			} else {

		// 				Swal.fire({
		// 					icon: 'error',
		// 					title: 'Failed',
		// 					text: res.message

		// 				});
		// 			}
		// 		}
		// 	});
		// });
		$('#formAddModelAssets').submit(function(e) {

			e.preventDefault();

			let formData = new FormData(this);

			let id = $('#edit_id').val();

			let url = '';

			/*
			|--------------------------------------------------------------------------
			| ADD / EDIT
			|--------------------------------------------------------------------------
			*/

			if (id) {

				url = base + 'Home/updateModelAssets';

			} else {

				url = base + 'Home/saveModelAssets';
			}

			$.ajax({

				url: url,

				type: 'POST',

				data: formData,

				contentType: false,

				processData: false,

				dataType: 'json',

				success: function(res) {

					if (res.status == 'success') {

						$('#modalAddmodelAssets')
							.modal('hide');

						$('#tblmodelAssets')
							.DataTable()
							.ajax.reload();

						Swal.fire({

							icon: 'success',

							title: 'Success',

							text: res.message

						});

					} else {

						Swal.fire({

							icon: 'error',

							title: 'Failed',

							text: res.message

						});
					}
				}
			});
		});
		$('#modalAddmodelAssets').on('hidden.bs.modal', function() {
			resetModelAssetsForm();
		});
		$('[data-bs-target="#modalAddmodelAssets"]').on('click', function() {
			resetModelAssetsForm();

		});
	});

	function editModelAssets(el) {

		let id = $(el).data('id');

		/*
		|--------------------------------------------------------------------------
		| RESET
		|--------------------------------------------------------------------------
		*/

		$('#formAddModelAssets')[0].reset();

		$('#oldBlendFile').html('');

		/*
		|--------------------------------------------------------------------------
		| GET DETAIL
		|--------------------------------------------------------------------------
		*/

		$.ajax({

			url: base + 'Home/getdetailModelAssets/' + id,

			type: 'GET',

			dataType: 'json',

			success: function(res) {
				if (res.status == 'success') {
					let d = res.data;

					/*
					|--------------------------------------------------------------------------
					| SET VALUE
					|--------------------------------------------------------------------------
					*/

					$('#edit_id').val(d.id);

					$('#model_id')
						.val(d.model_id)
						.trigger('change');

					/*
					|--------------------------------------------------------------------------
					| OLD FILE
					|--------------------------------------------------------------------------
					*/

					if (d.blender_asset_file) {

						$('#oldBlendFile').html(`

						<div class="alert alert-light border mt-3">

							<strong>
								Current File:
							</strong>

							<br>

							<a href="${base + d.blender_asset_file}"
							   target="_blank">

								<i class="bi bi-box"></i>

								Download Blend File

							</a>

						</div>

					`);
					}

					/*
					|--------------------------------------------------------------------------
					| TITLE
					|--------------------------------------------------------------------------
					*/

					$('#modalTitle').html(`
					<i class="bi bi-pencil-square"></i>
					Edit Model Assets

				`);

					/*
					|--------------------------------------------------------------------------
					| BUTTON
					|--------------------------------------------------------------------------
					*/

					$('#btnSubmitModelAssets').html(`

					<i class="bi bi-save"></i>
					Update Model Assets

				`);

					/*
					|--------------------------------------------------------------------------
					| SHOW MODAL
					|--------------------------------------------------------------------------
					*/

					$('#modalAddmodelAssets').modal('show');

				} else {

					Swal.fire({

						icon: 'error',

						title: 'Failed',

						text: res.message

					});
				}
			}
		});
	}

	/*
		|--------------------------------------------------------------------------
		| RESET FORM
		|--------------------------------------------------------------------------
		*/

	function resetModelAssetsForm() {

		/*
		|--------------------------------------------------------------------------
		| RESET FORM
		|--------------------------------------------------------------------------
		*/

		$('#formAddModelAssets')[0].reset();

		/*
		|--------------------------------------------------------------------------
		| RESET SELECT2
		|--------------------------------------------------------------------------
		*/

		$('#model_id')
			.val('')
			.trigger('change');

		/*
		|--------------------------------------------------------------------------
		| REMOVE EDIT ID
		|--------------------------------------------------------------------------
		*/

		$('#edit_id').val('');

		/*
		|--------------------------------------------------------------------------
		| REMOVE OLD FILE
		|--------------------------------------------------------------------------
		*/

		$('#oldBlendFile').html('');

		/*
		|--------------------------------------------------------------------------
		| RESET ALERT
		|--------------------------------------------------------------------------
		*/

		$('#modelAssetAlert').html('');

		/*
		|--------------------------------------------------------------------------
		| RESET TITLE
		|--------------------------------------------------------------------------
		*/

		$('#modalTitle').html(`

		<i class="bi bi-box-seam"></i>

		Add Model Assets

	`);

		/*
		|--------------------------------------------------------------------------
		| RESET BUTTON
		|--------------------------------------------------------------------------
		*/

		$('#btnSubmitModelAssets').html(`

		<i class="bi bi-upload"></i>

		Save Model Assets

	`);
	}
</script>