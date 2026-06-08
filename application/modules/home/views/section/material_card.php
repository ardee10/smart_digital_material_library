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

	/* =========================================================
CARD SIZE
6.5cm x 3.5cm
========================================================= */

	.material-print-card {

		width: 6.5cm;
		height: 9cm;

		background: #fff;

		border-radius: 12px;

		overflow: hidden;

		box-shadow: 0 2px 10px rgba(0, 0, 0, .12);

		border: 1px solid #dcdcdc;

		display: flex;

		flex-direction: column;

		page-break-inside: avoid;

	}

	/* =========================================================
IMAGE
========================================================= */

	.material-card-image {

		height: 4.2cm;

		background: #f5f5f5;

		display: flex;

		align-items: center;

		justify-content: center;

		overflow: hidden;

	}

	.material-card-image img {

		width: 100%;
		height: 100%;
		object-fit: cover;

	}

	/* =========================================================
BODY
========================================================= */

	.material-card-body {

		flex: 1;

		padding: 10px;

		display: flex;

		justify-content: space-between;

		gap: 10px;

		font-size: 10px;

	}

	/* =========================================================
LEFT
========================================================= */

	.material-left {

		flex: 1;

	}

	.card-library-code {

		display: inline-block;

		background: #0d6efd;

		color: #fff;

		padding: 3px 8px;

		font-size: 9px;

		font-weight: 600;

		margin-bottom: 8px;

	}

	.card-field {

		margin-bottom: 5px;

		line-height: 1.3;

		word-break: break-word;

	}

	.card-field span {

		font-weight: 700;

		display: block;

		color: #666;

		font-size: 9px;

	}

	/* =========================================================
RIGHT
========================================================= */

	.material-right {

		width: 100px;

		text-align: center;

	}

	.scan-text {

		font-size: 9px;

		font-weight: 700;

		margin-bottom: 5px;

	}

	/* =========================================================
FOOTER
========================================================= */

	.material-card-footer {

		background: #0d6efd;

		color: #fff;

		text-align: center;

		font-size: 10px;

		font-weight: 700;

		padding: 6px;

		letter-spacing: .5px;

	}

	/* =========================================================
PRINT
========================================================= */

	@media print {

		body * {

			visibility: hidden;

		}

		#materialCardPreview,
		#materialCardPreview * {

			visibility: visible;

		}

		#materialCardPreview {

			position: absolute;
			left: 0;
			top: 0;

			display: flex;
			flex-wrap: wrap;
			gap: 10px;

			padding: 10px;

		}

		.modal-header {

			display: none !important;

		}

	}

	.material-card-footer {

		height: 32px;

		background: #0b5fa8;

		color: #fff;

		display: flex;

		align-items: center;

		justify-content: space-between;

		padding: 0 10px;

		font-size: 10px;

		font-weight: 600;

		letter-spacing: .5px;

	}

	.footer-left {

		display: flex;

		align-items: center;

		gap: 5px;

		text-transform: uppercase;

	}

	.footer-right {

		display: flex;

		align-items: center;

		gap: 6px;

		font-size: 12px;

		font-weight: 700;

		letter-spacing: 2px;

	}

	.footer-logo {

		height: 16px;

		width: auto;

		object-fit: contain;

		filter: brightness(0) invert(1);

	}

	@media print {

		* {
			-webkit-print-color-adjust: exact !important;
			print-color-adjust: exact !important;
		}

	}
</style>

<!-- Start Top Navigation -->
<div class="row">
	<?php if ($this->session->flashdata('message')): ?>
		<div class="flash-data" data-flashdata='<?= is_string($this->session->flashdata('message')) ? $this->session->flashdata('message') : json_encode($this->session->flashdata('message')) ?>'></div>
	<?php endif; ?>
</div>


<div class="container-fluid">

	<!-- ========================================================= -->
	<!-- ACTION -->
	<!-- ========================================================= -->

	<div class="d-flex justify-content-between align-items-center mb-3">

		<h5 class="mb-0 fw-bold">
			Material Card Generator
		</h5>

		<div class="d-flex justify-content-end mb-3 gap-2">

			<button class="btn btn-outline-secondary btn-sm"
				id="checkAllCard">

				Check All

			</button>

			<button class="btn btn-outline-danger btn-sm"
				id="uncheckAllCard">

				Uncheck All

			</button>

			<button class="btn btn-dark btn-sm"
				id="btnGenerateCard">

				<i class="bi bi-printer"></i>
				Generate Card

			</button>

		</div>

	</div>

	<!-- ========================================================= -->
	<!-- TABLE -->
	<!-- ========================================================= -->

	<div class="row">

		<div class="table-responsive">

			<div class="table-wrapper">

				<table id="cardmaterials"
					class="table custom-table align-middle">

					<thead>

						<tr>

							<th width="5%">
								Check
							</th>

							<th width="8%">
								Image
							</th>

							<th>
								MLM ID
							</th>

							<th>
								Material Name
							</th>

							<th>
								Material Type
							</th>

							<th>
								Supplier
							</th>

							<th width="8%">
								QR Code
							</th>

						</tr>

					</thead>

				</table>

			</div>

		</div>

	</div>

</div>

<!-- =========================================================
MODAL PREVIEW CARD
========================================================= -->

<div class="modal fade"
	id="modalMaterialCard"
	tabindex="-1"
	aria-hidden="true">

	<div class="modal-dialog modal-fullscreen modal-dialog-scrollable">

		<div class="modal-content border-0">
			<div class="modal-header bg-dark text-white">
				<h5 class="modal-title">
					<i class="bi bi-card-text"></i>
					Material Card Preview
				</h5>

				<div class="d-flex gap-2">
					<button class="btn btn-light btn-sm"
						onclick="printMaterialCards()">
						<i class="bi bi-printer"></i> Print
					</button>
					<button type="button"
						class="btn-close btn-close-white"
						data-bs-dismiss="modal"></button>
				</div>

			</div>

			<div class="modal-body bg-light">

				<div id="materialCardPreview"
					class="d-flex flex-wrap gap-3 justify-content-start">

				</div>

			</div>

		</div>

	</div>

</div>






<script>
	$(document).ready(function() {
		/* =========================================================
		DATATABLE
		========================================================= */
		let table = $('#cardmaterials').DataTable({

			processing: true,
			serverSide: true,
			order: [],

			ajax: {

				url: base + 'Home/getCardMaterials',
				type: 'POST'

			},

			columnDefs: [{
				targets: [0, 1, 6],
				orderable: false
			}]

		});

		/* =========================================================
		CHECK ALL
		========================================================= */

		$('#checkAllCard').click(function() {

			$('.checkMaterial').prop('checked', true);

		});

		/* =========================================================
		UNCHECK ALL
		========================================================= */

		$('#uncheckAllCard').click(function() {

			$('.checkMaterial').prop('checked', false);

		});

		/* =========================================================
		GENERATE CARD
		========================================================= */

		$('#btnGenerateCard').click(function() {

			let selected = [];

			$('.checkMaterial:checked').each(function() {

				selected.push($(this).val());

			});

			if (selected.length == 0) {

				alert('Please select material');

				return;

			}

			$.ajax({

				url: base + 'Home/getMaterialCardData',
				type: 'POST',
				data: {
					ids: selected
				},
				dataType: 'json',

				success: function(res) {

					console.log(res);

					let html = '';

					$.each(res.data, function(i, m) {

						/* =========================================================
						IMAGE
						========================================================= */

						let image = base + 'assets/images/No_Image_Available.jpg';

						if (m.image_file) {

							image = base +
								'uploads/material_assets/images/' +
								m.image_file;

						}

						/* =========================================================
						QR
						========================================================= */

						let qr = '';

						if (m.qr_code_file) {

							qr = `
							<img src="${base}uploads/qrcode/${m.qr_code_file}"
								style="width:90px;height:90px;object-fit:contain;">
						`;

						}

						/* =========================================================
						CARD HTML
						========================================================= */

						html += `

					<div class="material-print-card">

						<!-- IMAGE -->

						<div class="material-card-image">

							<img src="${image}">

						</div>

						<!-- BODY -->

						<div class="material-card-body">

							<div class="material-left">

								<div class="card-library-code">

									${m.library_code ?? '-'}

								</div>

								<div class="card-field">

									<span>#MLM :</span>

									${m.material_code ?? '-'}

								</div>

								<div class="card-field">

									<span>Material :</span>

									${m.material_name ?? '-'}

								</div>

								<div class="card-field">

									<span>Supplier :</span>

									${m.supplier_name ?? '-'}

								</div>

							</div>

							<div class="material-right">

								<div class="scan-text">

									SCAN HERE

								</div>

								${qr}

							</div>

						</div>

						<!-- FOOTER -->

						<div class="material-card-footer">

						<div class="footer-left">

							<i class="bi bi-box-seam"></i>
							MATERIAL LIBRARY

						</div>

						<div class="footer-right">

							<img src="${base}assets/images/PWJ.PNG"
								class="footer-logo">

							<span>PARKLAND</span>

						</div>

					</div>
					</div>

					`;

					});

					$('#materialCardPreview').html(html);

					$('#modalMaterialCard').modal('show');

				},

				error: function(xhr) {

					console.log(xhr.responseText);

					alert('Error generate card');

				}

			});

		});

	});

	/* =========================================================
	PRINT FUNCTION
	========================================================= */

	function printMaterialCards() {

		window.print();

	}
</script>
