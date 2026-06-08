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
$classifications = $classifications ?? [];
?>

<div class="container-fluid">
	<div class="row mb-3">
		<div class="col-md-4 mb-3">
			<button type="button"
				class="btn btn-outline-success mr-3 btn-sm"
				data-bs-toggle="modal"
				data-bs-target="#modalAddClassification">
				<i class="bi bi-plus"></i>
				Add Classification
			</button>
			<!-- <button type="button"
				class="btn btn-outline-info btn-sm"
				data-bs-toggle="modal"
				data-bs-target="#modalImportClassification">
				<i class="bi bi-upload"></i>
				Import
			</button> -->
		</div>

		<div class="table-responsive">
			<table class="table custom-table align-middle"
				id="tblClassification">
				<thead class="bg-dark text-white">
					<tr>
						<th>No</th>
						<th>Classification</th>
						<th>Parent</th>
						<th width="120">Action</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>

	<!-- Modal nanti disini -->

	<!-- Modal Add/Edit Classification -->
	<div class="modal fade"
		id="modalAddClassification"
		tabindex="-1"
		aria-labelledby="modalAddClassificationLabel"
		aria-hidden="true">

		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">
					<h5 class="modal-title"
						id="modalAddClassificationLabel">
						Add Classification
					</h5>

					<button type="button"
						class="btn-close"
						data-bs-dismiss="modal"
						aria-label="Close"></button>
				</div>

				<form id="formAddClassification">

					<div class="modal-body">

						<input type="hidden"
							name="id"
							id="classificationId">

						<!-- Classification Name -->
						<div class="mb-3">
							<label class="form-label">
								<strong>Classification Name *</strong>
							</label>

							<input type="text"
								name="classification_name"
								id="classification_name"
								class="form-control"
								placeholder="Example : KNIT UPPERS"
								required>
						</div>

						<!-- Parent -->
						<div class="mb-3">
							<label class="form-label">
								<strong>Parent Classification</strong>
							</label>

							<select name="parent_id"
								id="parent_id"
								class="form-select">
								<option value="">-- Root Classification --</option>

								<?php foreach ($classifications as $row): ?>
									<option value="<?= $row->id ?>">
										<?= $row->classification_name ?>
									</option>
								<?php endforeach; ?>
							</select>

							<small class="text-muted">
								Leave empty if this is main/root classification
							</small>
						</div>

					</div>

					<div class="modal-footer">

						<button type="button"
							class="btn btn-secondary"
							data-bs-dismiss="modal">
							Cancel
						</button>

						<button type="button"
							class="btn btn-primary"
							id="btnSaveClassification">
							Save
						</button>

					</div>

				</form>

			</div>
		</div>
	</div>
</div>

<script>
	// Add Classification
	function addClassification() {

		resetClassificationForm();

		$('#modalAddClassification').modal('show');
	}

	// Edit Classification
	function editClassification(el) {

		let id = $(el).data('id');

		$('#modalAddClassificationLabel').text('Edit Classification');
		$('#btnSaveClassification').text('Update');

		$.ajax({
			url: base + 'Admin/getClassificationById/' + id,
			type: 'GET',
			dataType: 'json',

			success: function(res) {

				let data = res.data;

				$('#classificationId').val(data.id);
				$('#classification_name').val(data.classification_name);
				$('#parent_id').val(data.parent_id);

				$('#modalAddClassification').modal('show');
			}
		});
	}

	// Save
	$('#btnSaveClassification').on('click', function() {

		let id = $('#classificationId').val();

		let url = id ?
			base + 'Admin/updateClassification/' + id :
			base + 'Admin/saveClassification';

		$.ajax({
			url: url,
			type: 'POST',
			data: $('#formAddClassification').serialize(),
			dataType: 'json',

			success: function(res) {
				if (res.status == 'success') {
					$('#modalAddClassification').modal('hide');
					$('#tblClassification').DataTable().ajax.reload();

					Swal.fire({
						icon: 'success',
						title: 'Success',
						text: res.message
					});

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
					title: 'Error',
					text: 'Server error'
				});
			}
		});
	});

	// Reset
	function resetClassificationForm() {
		$('#formAddClassification')[0].reset();
		$('#classificationId').val('');
		$('#modalAddClassificationLabel').text('Add Classification');
		$('#btnSaveClassification').text('Save');
	}

	// Reset when modal close
	$('#modalAddClassification').on('hidden.bs.modal', function() {

		resetClassificationForm();
	});
</script>