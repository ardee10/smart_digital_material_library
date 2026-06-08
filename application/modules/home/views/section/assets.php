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
$assets = $assets ?? [];

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
				data-bs-target="#modalAddMatAsset">
				<i class="bi bi-plus"></i>
				Add Material Assest
			</button>
		</div>

		<div class="table-responsive">
			<!-- <table class="table table-hover w-100 mt-3 table-striped table-bordered" style="width:100%" id="tblMatAssets"> -->
			<table class="table custom-table align-middle" style="width:100%" id="tblMatAssets">
				<thead class="bg-dark text-white">
					<tr>
						<th>No</th>
						<th>Material Code</th>
						<th>Qr Code</th>
						<th>Blender 3D Material</th>
						<th>U3M File</th>
						<th>GLB File</th>
						<th>Images</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>

				</tbody>
			</table>
		</div>
	</div>


	<!-- Modal Add Material Assets -->
	<div class="modal fade"
		id="modalAddMatAsset"
		tabindex="-1"
		aria-labelledby="modalAddMatAssetsLabel"
		aria-hidden="true">

		<div class="modal-dialog modal-xl modal-dialog-scrollable">
			<div class="modal-content">

				<div class="modal-header bg-dark text-white">
					<h5 class="modal-title" id="modalAddMatAssetsLabel">
						<i class="bi bi-box-seam"></i>
						Add Material Assets
					</h5>

					<button type="button"
						class="btn-close btn-close-white"
						data-bs-dismiss="modal"
						aria-label="Close"></button>
				</div>

				<form id="formAddMatAssets" enctype="multipart/form-data">

					<div class="modal-body">

						<div class="row">

							<!-- LEFT -->
							<div class="col-md-6">

								<!-- MATERIAL -->
								<div class="mb-3">
									<label class="form-label">
										<strong>Material *</strong>
									</label>

									<select name="material_id"
										id="material_id"
										class="form-select"
										required>
									</select>
								</div>

								<!-- QR CODE -->


								<div class="mb-3">

									<label class="form-label fw-bold">
										QR Code
									</label>

									<div class="d-flex gap-2 mb-3">

										<button type="button"
											class="btn btn-dark"
											id="btnGenerateQR">

											<i class="bi bi-qr-code"></i>
											Generate QR

										</button>

										<input type="hidden"
											name="qr_code_image"
											id="qr_code_image">

									</div>

									<!-- QR PREVIEW -->
									<div id="qrPreview"
										class="border rounded p-3 text-center bg-light">

										<div class="text-muted small">
											QR Preview
										</div>

									</div>

								</div>



								<!-- BLENDER MATERIAL -->
								<div class="mb-3">
									<label class="form-label">
										<strong>Blender 3D Material (.blend)</strong>
									</label>

									<input type="file"
										name="blender_material"
										class="form-control"
										accept=".blend">
								</div>

								<!-- U3M -->
								<div class="mb-3">
									<label class="form-label">
										<strong>U3M File</strong>
									</label>

									<input type="file"
										name="u3m_file"
										class="form-control"
										accept=".u3m">
								</div>

								<!-- GLB -->
								<div class="mb-3">
									<label class="form-label">
										<strong>GLB File</strong>
									</label>

									<input type="file"
										name="glb_file"
										class="form-control"
										accept=".glb">
								</div>

							</div>

							<!-- RIGHT -->
							<div class="col-md-6">

								<label class="form-label mb-3">
									<strong>Material Images (Max 4)</strong>
								</label>

								<div class="mb-3">
									<input type="file"
										name="material_images[]"
										class="form-control"
										accept=".jpg,.jpeg,.png"
										multiple>
								</div>

								<div class="alert alert-info">
									<ul class="mb-0">
										<li>Allowed Image : JPG, JPEG, PNG</li>
										<li>Maximum upload : 4 Images</li>
										<li>Supported 3D : BLEND & GLB</li>
										<li>Supported U3M : .u3m</li>
									</ul>
								</div>

							</div>

						</div>

					</div>

					<div class="modal-footer">

						<button type="button"
							class="btn btn-secondary"
							data-bs-dismiss="modal">
							Close
						</button>

						<button type="button"
							class="btn btn-primary"
							id="btnSaveAssets">
							Save Assets
						</button>

					</div>

				</form>

			</div>
		</div>
	</div>


	<!-- =========================================================
	MODAL MATERIAL IMAGES GALLERY
	========================================================= -->

	<div class="modal fade"
		id="modalImagesDetail"
		tabindex="-1"
		aria-hidden="true">

		<div class="modal-dialog modal-xl modal-dialog-scrollable">

			<div class="modal-content border-0 shadow-lg">

				<!-- HEADER -->
				<div class="modal-header bg-dark text-white">

					<div>

						<h5 class="modal-title fw-bold mb-1">
							<i class="bi bi-images"></i>
							Material Gallery
						</h5>

						<small class="text-light opacity-75">
							Manage Material Images
						</small>

					</div>

					<button type="button"
						class="btn-close btn-close-white"
						data-bs-dismiss="modal">
					</button>

				</div>

				<!-- BODY -->
				<div class="modal-body bg-light">

					<div id="imagesDetailContent">

						<div class="text-center py-5">

							<div class="spinner-border text-primary"></div>

							<p class="mt-3 text-muted">
								Loading gallery...
							</p>

						</div>

					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- LIGHTBOX -->

	<div class="modal fade"
		id="modalZoomImage"
		tabindex="-1">

		<div class="modal-dialog modal-dialog-centered modal-xl">

			<div class="modal-content bg-dark border-0">

				<div class="modal-header border-0">

					<button type="button"
						class="btn-close btn-close-white ms-auto"
						data-bs-dismiss="modal">
					</button>

				</div>

				<div class="modal-body text-center">

					<img src=""
						id="zoomImagePreview"
						class="img-fluid rounded shadow">

				</div>

			</div>

		</div>

	</div>

</div>
</div>


<script>
	$(document).ready(function() {

		/*
		|--------------------------------------------------------------------------
		| SELECT2 MATERIAL
		|--------------------------------------------------------------------------
		*/

		$('#material_id').select2({
			theme: 'bootstrap-5',
			dropdownParent: $('#modalAddMatAsset'),
			placeholder: 'Search Material',
			allowClear: true,
			width: '100%',

			ajax: {
				url: base + 'Home/getMaterials',
				type: 'POST',
				dataType: 'json',
				delay: 250,

				data: function(params) {

					return {
						search: params.term
					};
				},

				processResults: function(data) {

					return {
						results: data
					};
				},

				cache: true
			}
		});

		/*
		|--------------------------------------------------------------------------
		| SAVE ASSETS
		|--------------------------------------------------------------------------
		*/

		$('#btnSaveAssets').on('click', function() {

			let form = $('#formAddMatAssets')[0];
			let formData = new FormData(form);

			$.ajax({
				url: base + 'Home/saveMaterialAssets',
				type: 'POST',
				data: formData,
				processData: false,
				contentType: false,
				dataType: 'json',

				beforeSend: function() {

					$('#btnSaveAssets')
						.prop('disabled', true)
						.html(`
						<span class="spinner-border spinner-border-sm"></span>
						Saving...
					`);
				},

				success: function(res) {

					if (res.status == 'success') {

						Swal.fire({
							icon: 'success',
							title: 'Success',
							text: res.message
						});

						// RESET
						$('#formAddMatAssets')[0].reset();

						// RESET SELECT2
						$('#material_id').val(null).trigger('change');

						// CLOSE MODAL
						$('#modalAddMatAsset').modal('hide');

						resetMaterialAssetsForm();

						// RELOAD TABLE
						$('#tblMatAssets').DataTable().ajax.reload();

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
				},

				complete: function() {

					$('#btnSaveAssets')
						.prop('disabled', false)
						.html('Save Assets');
				}
			});
		});

		$('#btnGenerateQR').on('click', function() {


			let material_id = $('#material_id').val();
			let material_text = $('#material_id option:selected').text();
			if (!material_id) {

				Swal.fire({
					icon: 'warning',
					title: 'Warning',
					text: 'Please select material first'
				});

				return;
			}
			/*
			|--------------------------------------------------------------------------
			| GET MATERIAL CODE
			|--------------------------------------------------------------------------
			*/
			let material_code = material_text.split(' - ')[0];
			/*
			|--------------------------------------------------------------------------
			| GENERATE QR
			|--------------------------------------------------------------------------
			*/

			$.ajax({

				url: base + 'Home/generateQRCode',

				type: 'POST',

				data: {
					material_code: material_code
				},

				dataType: 'json',

				success: function(res) {

					/*
					|--------------------------------------------------------------------------
					| WARNING
					|--------------------------------------------------------------------------
					*/

					console.log(res);

					if (res.status == 'warning') {

						Swal.fire({

							icon: 'warning',

							title: 'QR Already Exists',

							text: res.message

						});

						$('#qrPreview').html(`
							<img src="${res.url}?t=${new Date().getTime()}"
								class="img-fluid rounded shadow-sm"
								width="180">
						`);

						$('#qr_code_image')
							.val(res.file_name);

						return;
					}

					/*
					|--------------------------------------------------------------------------
					| SUCCESS
					|--------------------------------------------------------------------------
					*/

					if (res.status == 'success') {

						Swal.fire({

							icon: 'success',

							title: 'Success',

							text: res.message

						});

						$('#qrPreview').html(`
				<img src="${res.url}"
					class="img-fluid"
					width="180">
			`);

						$('#qr_code_image')
							.val(res.file_name);
					}

					/*
					|--------------------------------------------------------------------------
					| ERROR
					|--------------------------------------------------------------------------
					*/

					if (res.status == 'error') {

						Swal.fire({

							icon: 'error',

							title: 'Error',

							text: res.message

						});
					}
				}
			});

		});

		$('#modalAddMatAsset').on('hidden.bs.modal', function() {

			resetMaterialAssetsForm();

		});
		$('#modalAddMatAsset .btn-secondary').on('click', function() {

			resetMaterialAssetsForm();

		});
	});

	function addAssetsMaterial() {
		resetMaterialAssetsForm();

		$('#modalAddMatAsset').modal('show');
	}

	function showImagesDetail(asset_id) {

		$('#modalImagesDetail').modal('show');

		$('#imagesDetailContent').html(`
		<div class="text-center py-5">

			<div class="spinner-border text-primary"></div>

			<p class="mt-3 text-muted">
				Loading gallery...
			</p>

		</div>
	`);

		$.ajax({

			url: base + 'Home/getMaterialImages',

			type: 'POST',

			data: {
				asset_id: asset_id
			},

			dataType: 'json',

			success: function(res) {

				if (res.status == 'success') {

					let html = `
					<div class="row g-4">
				`;

					$.each(res.data, function(i, item) {

						let imageUrl =
							base +
							'uploads/material_assets/images/' +
							item.file_name;

						html += `

					<div class="col-md-3">

						<div class="card border-0 shadow-sm h-100">

							<!-- IMAGE -->
							<div class="position-relative">

								<img src="${imageUrl}"
									class="card-img-top"
									style="
										height:250px;
										object-fit:cover;
										cursor:pointer;
									"
									onclick="zoomImage('${imageUrl}')">

								<!-- COVER -->
								${item.is_cover == 1 ? `
									<span class="badge bg-success position-absolute top-0 start-0 m-2">
										Cover
									</span>
								` : ''}

							</div>

							<!-- BODY -->
							<div class="card-body">

								<div class="d-grid gap-2">

									<!-- ZOOM -->
									<button type="button"
										class="btn btn-outline-dark btn-sm"
										onclick="zoomImage('${imageUrl}')">

										<i class="bi bi-zoom-in"></i>
										Preview

									</button>

									<!-- SET COVER -->
									<button type="button"
										class="btn btn-outline-success btn-sm"
										onclick="setCoverImage(${item.id}, ${asset_id})">

										<i class="bi bi-star-fill"></i>
										Set Cover

									</button>

									<!-- GENERATE PDF -->
									<button type="button"
										class="btn btn-outline-info btn-sm"
										onclick="generateImagePDF('${imageUrl}', ${item.id})">

										<i class="bi bi-file-earmark-pdf"></i>
										Generate PDF

									</button>

									<!-- DELETE -->
									<button type="button"
										class="btn btn-outline-danger btn-sm"
										onclick="deleteMaterialImage(${item.id}, ${asset_id})">

										<i class="bi bi-trash"></i>
										Delete

									</button>

								</div>

							</div>

						</div>

					</div>
					`;
					});

					html += '</div>';

					$('#imagesDetailContent').html(html);

				} else {

					$('#imagesDetailContent').html(`
					<div class="alert alert-danger">
						${res.message}
					</div>
				`);
				}
			}
		});
	}

	function zoomImage(url) {

		$('#zoomImagePreview').attr('src', url);

		$('#modalZoomImage').modal('show');
	}

	function deleteMaterialImage(id, asset_id) {

		Swal.fire({

			title: 'Delete Image?',

			text: 'Image will be permanently deleted',

			icon: 'warning',

			showCancelButton: true,

			confirmButtonColor: '#d33',

			confirmButtonText: 'Delete'

		}).then((result) => {

			if (result.isConfirmed) {

				$.ajax({

					url: base + 'Home/deleteMaterialImage',

					type: 'POST',

					data: {
						id: id
					},

					dataType: 'json',

					success: function(res) {

						if (res.status == 'success') {

							Swal.fire({
								icon: 'success',
								title: 'Deleted',
								text: res.message
							});

							showImagesDetail(asset_id);

						} else {

							Swal.fire({
								icon: 'error',
								title: 'Error',
								text: res.message
							});
						}
					}
				});
			}
		});
	}

	function setCoverImage(id, asset_id) {

		$.ajax({

			url: base + 'Home/setCoverImage',

			type: 'POST',

			data: {
				id: id,
				asset_id: asset_id
			},

			dataType: 'json',

			success: function(res) {

				if (res.status == 'success') {

					Swal.fire({
						icon: 'success',
						title: 'Success',
						text: res.message
					});

					showImagesDetail(asset_id);

				} else {

					Swal.fire({
						icon: 'error',
						title: 'Error',
						text: res.message
					});
				}
			}
		});
	}

	/* =========================================================
| RESET FORM MATERIAL ASSETS
========================================================= */
	function resetMaterialAssetsForm() {
		/* FORM */
		$('#formAddMatAssets')[0].reset();

		/* ID EDIT */
		$('#edit_id').remove();
		$('#asset_id').val('');

		/* MATERIAL SELECT2 */
		$('#material_id')
			.val(null)
			.trigger('change');

		/* QR CODE */
		$('#qr_code_image').val('');

		$('#qrPreview').html(`
        <div class="text-muted small">
            QR Preview
        </div>
    `);

		/* FILE INPUT */
		$('input[name="blender_material"]').val('');
		$('input[name="u3m_file"]').val('');
		$('input[name="glb_file"]').val('');
		$('input[name="material_images[]"]').val('');

		/* TITLE */
		$('#modalAddMatAssetsLabel').html(`
        <i class="bi bi-box-seam"></i>
        Add Material Assets
    `);

		/* BUTTON */
		$('#btnSaveAssets')
			.prop('disabled', false)
			.html('Save Assets');

		/* ACTION MODE */
		$('#formAddMatAssets')
			.removeAttr('data-mode');

		$('#formAddMatAssets')
			.removeAttr('data-id');
	}

	function generateImagePDF(imageUrl, imageId) {

		// Create a simple HTML structure for PDF
		let element = document.createElement('div');
		element.innerHTML = `
			<div style="text-align: center; padding: 20px; font-family: Arial, sans-serif;">
				<h2 style="margin-bottom: 20px; color: #111;">Material Image</h2>
				<img src="${imageUrl}" style="max-width: 100%; max-height: 600px; border: 1px solid #ddd; padding: 10px;">
				<p style="margin-top: 20px; color: #666; font-size: 12px;">
					Generated on: ${new Date().toLocaleString()}
				</p>
			</div>
		`;

		// HTML to PDF options
		const opt = {
			margin: 10,
			filename: `material-image-${imageId}.pdf`,
			image: {
				type: 'jpeg',
				quality: 0.98
			},
			html2canvas: {
				scale: 2
			},
			jsPDF: {
				orientation: 'portrait',
				unit: 'mm',
				format: 'a4'
			}
		};

		// Check if html2pdf library is loaded, if not use fetch to load it
		if (typeof html2pdf !== 'undefined') {
			html2pdf().set(opt).from(element).save();
		} else {
			// Load html2pdf from CDN
			let script = document.createElement('script');
			script.src = 'https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js';
			script.onload = function() {
				html2pdf().set(opt).from(element).save();
			};
			document.head.appendChild(script);
		}
	}
</script>