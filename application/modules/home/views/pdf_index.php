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


	/* =========================================================
| MATERIAL CARD
========================================================= */

	.material-card {

		border: 1px solid #e9ecef;

		border-radius: 12px;

		overflow: hidden;

		transition: all .2s ease;

		background: #fff;

	}

	.material-card:hover {

		transform: translateY(-3px);

		box-shadow: 0 4px 20px rgba(0, 0, 0, .08);

	}

	/* IMAGE */

	.material-image-wrapper {

		position: relative;

		height: 220px;

		overflow: hidden;

		background: #f8f9fa;

	}

	.material-image {

		width: 100%;

		height: 100%;

		object-fit: cover;

	}

	/* BADGE */

	.material-type-badge {

		position: absolute;

		top: 10px;

		right: 10px;

		font-size: 11px;

		padding: 6px 10px;

		border-radius: 20px;

	}

	/* TITLE */

	.material-title {

		font-weight: 600;

		font-size: 15px;

		margin-bottom: 12px;

		color: #212529;

		min-height: 40px;

	}

	/* INFO */

	.material-info {

		font-size: 13px;

		color: #6c757d;

		display: flex;

		flex-direction: column;

		gap: 6px;

	}

	/* =========================================================
MODAL VIEW MATERIAL
========================================================= */

	#modalViewMaterial .modal-content {
		border-radius: 16px;
		overflow: hidden;
		border: none;
	}

	/* HEADER */
	#modalViewMaterial .modal-header {
		padding: 18px 24px;
		background: #111827;
		border-bottom: 1px solid #1f2937;
	}

	#modalViewMaterial .modal-title {
		font-size: 20px;
		font-weight: 600;
		letter-spacing: .3px;
	}

	/* BODY */
	#modalViewMaterial .modal-body {
		background: #f5f7fb;
		padding: 24px;
	}

	/* CARD BOX */
	.material-view-box {
		background: #ffffff;
		border: 1px solid #e5e7eb;
		border-radius: 14px;
		padding: 20px;
		margin-bottom: 20px;
		box-shadow: 0 2px 10px rgba(0, 0, 0, .04);
	}

	/* SECTION TITLE */
	.material-view-title {
		font-size: 14px;
		font-weight: 700;
		color: #6b7280;
		text-transform: uppercase;
		margin-bottom: 15px;
		letter-spacing: .5px;
	}

	/* LABEL */
	.material-view-label {
		font-size: 12px;
		font-weight: 600;
		color: #9ca3af;
		margin-bottom: 4px;
		display: block;
		text-transform: uppercase;
	}

	/* VALUE */
	.material-view-value {
		font-size: 15px;
		color: #111827;
		font-weight: 500;
		word-break: break-word;
	}

	/* IMAGE */
	.material-view-image {
		width: 100%;
		height: 220px;
		object-fit: cover;
		border-radius: 12px;
		border: 1px solid #e5e7eb;
	}

	/* BADGE */
	.material-badge {
		display: inline-block;
		padding: 6px 12px;
		border-radius: 8px;
		background: #eef2ff;
		color: #4338ca;
		font-size: 12px;
		font-weight: 600;
		margin: 3px;
	}

	/* TABLE STYLE */
	.material-info-table {
		width: 100%;
	}

	.material-info-table tr td {
		padding: 10px 0;
		vertical-align: top;
		border-bottom: 1px dashed #e5e7eb;
	}

	.material-info-table tr:last-child td {
		border-bottom: none;
	}

	.material-info-table td:first-child {
		width: 180px;
		color: #6b7280;
		font-weight: 600;
	}

	/* SCROLL */
	#modalViewMaterial .modal-body::-webkit-scrollbar {
		width: 8px;
	}

	#modalViewMaterial .modal-body::-webkit-scrollbar-thumb {
		background: #cbd5e1;
		border-radius: 10px;
	}

	/* RESPONSIVE */
	@media(max-width:768px) {

		#modalViewMaterial .modal-body {
			padding: 14px;
		}

		.material-view-box {
			padding: 15px;
		}

		.material-info-table td:first-child {
			width: 120px;
		}

	}

	/* =========================================================
BADGE STYLE
========================================================= */

	.badge.bg-primary,
	.badge.bg-success,
	.badge.bg-danger,
	.badge.bg-warning,
	.badge.bg-info,
	.badge.bg-dark,
	.bg-light,
	.badge.bg-secondary {

		border-radius: 0 !important;
		padding: 4px 8px;
		font-size: 10px;
		font-weight: 500;
		letter-spacing: .2px;
		box-shadow: none;
		text-transform: uppercase;
		line-height: 1.2;
	}

	/* OPTIONAL HOVER */
	.badge:hover {
		transform: none;
		transition: none;

	}

	.pdf-mode .btn,
	.pdf-mode .dropdown,
	.pdf-mode .modal-footer,
	.pdf-mode .btn-close {
		display: none !important;
	}
</style>

<div class="container-fluid material-page">

	<!-- FLASH -->
	<div class="row">
		<?php if ($this->session->flashdata('message')): ?>
			<div class="flash-data"
				data-flashdata='<?= is_string($this->session->flashdata('message')) ? $this->session->flashdata('message') : json_encode($this->session->flashdata('message')) ?>'>
			</div>
		<?php endif; ?>
	</div>

	<!-- ========================================================= -->
	<!-- HEADER -->
	<!-- ========================================================= -->

	<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
		<div>
			<button type="button"
				class="btn btn-outline-success mr-3 btn-sm"
				data-bs-toggle="modal"
				data-bs-target="#modalAddMaterial">
				<i class="bi bi-plus"></i>
				Add Material
			</button>

			<button type="button"
				class="btn btn-outline-info btn-sm"
				data-bs-toggle="modal"
				data-bs-target="#modalImportMaterial">
				<i class="bi bi-upload"></i>
				Import
			</button>
		</div>

	</div>

	<!-- ========================================================= -->
	<!-- FILTER -->
	<!-- ========================================================= -->

	<div class="filter-wrapper">

		<!-- HEADER -->
		<div class="filter-header">

			<div class="filter-title">
				Filters
			</div>

			<button class="btn btn-sm btn-outline-dark filter-toggle"
				type="button"
				id="toggleFilter">

				<i class="bi bi-funnel"></i>
				Hide Filter

			</button>

		</div>

		<!-- BODY -->
		<div id="filterBody">

			<div class="row g-3">

				<!-- ===================================================== -->
				<!-- MLM ID -->
				<!-- ===================================================== -->

				<div class="col-md-2">

					<label class="filter-label">
						MLM ID
					</label>

					<select class="form-select filterSelect"
						id="filtermlm">

						<option value="">
							All MLM ID
						</option>

					</select>

				</div>

				<!-- ===================================================== -->
				<!-- SUPPLIER NAME -->
				<!-- ===================================================== -->

				<div class="col-md-2">

					<label class="filter-label">
						Supplier Name
					</label>

					<select class="form-select filterSelect"
						id="filterSupplier">

						<option value="">
							All Suppliers
						</option>

					</select>

				</div>

				<!-- ===================================================== -->
				<!-- MATERIAL NAME -->
				<!-- ===================================================== -->

				<div class="col-md-2">

					<label class="filter-label">
						Material Name
					</label>

					<select class="form-select filterSelect"
						id="filterMaterialName">

						<option value="">
							All Material
						</option>

					</select>

				</div>

				<!-- ===================================================== -->
				<!-- CLASSIFICATION -->
				<!-- ===================================================== -->

				<div class="col-md-2">

					<label class="filter-label">
						Classification
					</label>

					<select class="form-select filterSelect"
						id="filterClassification">

						<option value="">
							All Classification
						</option>

					</select>

				</div>

				<!-- ===================================================== -->
				<!-- COMPOSITION -->
				<!-- ===================================================== -->

				<div class="col-md-2">

					<label class="filter-label">
						Composition
					</label>

					<select class="form-select filterSelect"
						id="filterComposition">

						<option value="">
							All Composition
						</option>

					</select>

				</div>

				<!-- ===================================================== -->
				<!-- CONSTRUCTION -->
				<!-- ===================================================== -->

				<div class="col-md-2">

					<label class="filter-label">
						Construction
					</label>

					<select class="form-select filterSelect"
						id="filterConstruction">

						<option value="">
							All Construction
						</option>

					</select>

				</div>

				<!-- ===================================================== -->
				<!-- TECHNOLOGY -->
				<!-- ===================================================== -->

				<div class="col-md-2">

					<label class="filter-label">
						Technology
					</label>

					<select class="form-select filterSelect"
						id="filterTechnology">

						<option value="">
							All Technology
						</option>

					</select>

				</div>

				<!-- ===================================================== -->
				<!-- PRODUCTION LOCATION -->
				<!-- ===================================================== -->

				<div class="col-md-2">

					<label class="filter-label">
						Production Location
					</label>

					<select class="form-select filterSelect"
						id="filterLocation">

						<option value="">
							All Location
						</option>

					</select>

				</div>

				<!-- ===================================================== -->
				<!-- SAMPLE LEADTIME -->
				<!-- ===================================================== -->

				<div class="col-md-2">

					<label class="filter-label">
						Sample Leadtime
					</label>

					<select class="form-select filterSelect"
						id="filterSampleLeadtime">

						<option value="">
							All Sample Leadtime
						</option>

					</select>

				</div>

				<!-- ===================================================== -->
				<!-- PRODUCTION LEADTIME -->
				<!-- ===================================================== -->

				<div class="col-md-2">

					<label class="filter-label">
						Production Leadtime
					</label>

					<select class="form-select filterSelect"
						id="filterProductionLeadtime">

						<option value="">
							All Production Leadtime
						</option>

					</select>

				</div>

				<!-- ===================================================== -->
				<!-- PRICE -->
				<!-- ===================================================== -->

				<div class="col-md-2">

					<label class="filter-label">
						Price
					</label>

					<select class="form-select filterSelect"
						id="filterPrice">

						<option value="">
							All Price
						</option>

					</select>

				</div>

				<!-- ===================================================== -->
				<!-- LIFECYCLE -->
				<!-- ===================================================== -->

				<div class="col-md-2">

					<label class="filter-label">
						Lifecycle State
					</label>

					<select class="form-select filterSelect"
						id="filterLifecycle">

						<option value="">
							All Lifecycle
						</option>

					</select>

				</div>

			</div>

			<!-- ========================================================= -->
			<!-- ACTION -->
			<!-- ========================================================= -->

			<div class="d-flex justify-content-end mt-4 gap-2">

				<button class="btn btn-outline-secondary btn-sm"
					id="btnResetFilter">
					<i class="bi bi-arrow-clockwise"></i>
					Reset
				</button>

				<button class="btn btn-dark btn-sm"
					id="btnApplyFilter">

					<i class="bi bi-funnel"></i>
					Apply Filter

				</button>

			</div>

		</div>

	</div>

	<!-- ========================================================= -->
	<!-- TOOLBAR -->
	<!-- ========================================================= -->

	<div class="material-toolbar">

		<div class="text-muted small">
			Showing material database
		</div>

		<div class="view-switch">
			<button class="btn btn-outline-dark btn-sm" id="btnListView"> <!-- Mengacu ke view list -->
				<i class="bi bi-list-ul"></i>
				List
			</button>

			<button class="btn btn-outline-dark btn-sm" id="btnGridView"> <!-- Mengacu ke view grid -->
				<i class="bi bi-grid"></i>
				Grid
			</button>
		</div>

	</div>

	<!-- ========================================================= -->
	<!-- TABLE -->
	<!-- MENAMPILKAN LIST VIEW DENGAN STRUKTUR TABLE -->
	<!-- ========================================================= -->

	<!--  Default view adalah list view, sehingga tabel ditampilkan secara default -->
	<div class="table-wrapper">

		<table id="materials" class="table custom-table align-middle">

			<thead>
				<tr>

					<th width="5%">
						#
					</th>

					<th width="8%">
						Image
					</th>

					<th>
						MLM ID
					</th>

					<th>
						Material
					</th>

					<th>
						Material Type
					</th>

					<th>
						Supplier
					</th>

					<th>
						Location
					</th>

					<th>
						Composition
					</th>

					<th>
						Production LT
					</th>

					<th>
						Sample LT
					</th>

					<th>
						Model Number
					</th>

					<th>
						Lifecycle
					</th>

					<th width="8%">
						Action
					</th>

				</tr>

			</thead>

		</table>

	</div>

	<!-- View Grid pada saat button icon grid diklik tampilkan dibawah ini -->

	<!-- Grid wrapper (hidden by default) -->
	<div id="gridWrapper" class="row g-4 mt-3" style="display:none;">
		<!-- konten grid akan dimuat via AJAX dari Home/materialsGrid -->
	</div>

</div>

<!-- =========================================================
MODAL VIEW MATERIAL
========================================================= -->
<div class="modal fade"
	id="modalViewMaterial"
	tabindex="-1"
	aria-hidden="true">

	<div class="modal-dialog modal-fullscreen-xl-down modal-xl modal-dialog-scrollable">
		<div class="modal-content border-0 shadow-lg">

			<!-- HEADER -->
			<div class="modal-header bg-dark text-white border-0">
				<h5 class="modal-title fw-bold">
					<i class="bi bi-box-seam me-2"></i>
					Material Information
				</h5>

				<button type="button"
					class="btn-close btn-close-white"
					data-bs-dismiss="modal"></button>
			</div>

			<!-- BODY -->
			<div class="modal-body bg-light">

				<div id="viewMaterialContent">

					<div class="text-center py-5">
						<div class="spinner-border text-primary"></div>
						<p class="mt-3">Loading material...</p>
					</div>

				</div>

			</div>

		</div>
	</div>

</div>

<!-- ========================================================= -->
<!-- MODAL ADD & EDIT MATERIAL -->
<!-- ========================================================= -->

<div class="modal fade"
	id="modalAddMaterial"
	tabindex="-1"
	aria-labelledby="modalAddMaterialLabel"
	aria-hidden="true">

	<div class="modal-dialog modal-xl modal-dialog-scrollable">

		<div class="modal-content border-0">

			<!-- HEADER -->
			<div class="modal-header bg-dark text-white">

				<h5 class="modal-title fw-bold"
					id="modalAddMaterialLabel">
					<i class="bi bi-box-seam"></i> Add New Material
				</h5>

				<button type="button"
					class="btn-close"
					data-bs-dismiss="modal"
					onclick="resetFormMaterial()"></button>

			</div>

			<!-- BODY -->
			<div class="modal-body">
				<form id="formMaterial">
					<ul class="nav nav-tabs mb-3" role="tablist">
						<li class="nav-item" role="presentation">
							<button class="nav-link active" id="tabMaterialInfo" data-bs-toggle="tab"
								data-bs-target="#panelMaterialInfo" type="button" role="tab">
								Material Info
							</button>
						</li>
						<li class="nav-item" role="presentation">
							<button class="nav-link" id="tabSpecifications" data-bs-toggle="tab"
								data-bs-target="#panelSpecifications" type="button" role="tab">
								Specifications
							</button>
						</li>
						<li class="nav-item" role="presentation">
							<button class="nav-link" id="tabModelsLocations" data-bs-toggle="tab"
								data-bs-target="#panelModelsLocations" type="button" role="tab">
								Models & Locations
							</button>
						</li>
						<li class="nav-item" role="presentation">
							<button class="nav-link" id="tabAssets" data-bs-toggle="tab"
								data-bs-target="#panelAssets" type="button" role="tab">
								Other Information
							</button>
						</li>
					</ul>

					<div class="tab-content">
						<!-- TAB 1: MATERIAL INFO -->
						<div class="tab-pane fade show active" id="panelMaterialInfo" role="tabpanel">
							<div class="row">
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label"><strong>Material Code *</strong></label>
										<input type="text"
											name="material_code"
											id="material_code"
											class="form-control"
											placeholder="ex : 40033636Z47001"
											required>
									</div>

									<div class="mb-3">
										<label class="form-label"><strong>Material Name *</strong></label>
										<input type="text"
											name="material_name"
											id="material_name"
											class="form-control"
											required>
									</div>

									<div class="mb-3">
										<label class="form-label">MLM Ref No</label>
										<input type="text"
											name="mlm_ref_no"
											id="mlm_ref_no"
											class="form-control">
									</div>
									<div class="mb-3">
										<label class="form-label">Library Code</label>
										<input type="text"
											name="library_code"
											id="library_code"
											class="form-control">
									</div>

									<div class="mb-3">
										<label class="form-label"><strong>Supplier *</strong></label>
										<select name="supplier_id"
											id="addSupplier"
											class="form-select"
											required>
											<option value="">Select Supplier</option>
										</select>
									</div>
									<!-- MATERIAL TYPE -->
									<div class="mb-3">

										<label class="form-label">
											<strong>Material Type *</strong>
										</label>

										<select name="material_type_id"
											id="materialType"
											class="form-select select2"
											required>

											<option value="">
												Select Material Type
											</option>

										</select>

									</div>

								</div>

								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label"><strong>Classifications *</strong></label>
										<select name="classification_ids[]"
											id="addClassification"
											class="form-select"
											multiple
											required>
											<option value="">Select Classifications</option>
										</select>
									</div>
									<div class="mb-3">
										<label class="form-label">
											<strong>Season *</strong>
										</label>

										<select name="season_id"
											id="season_id"
											class="form-select"
											required>
										</select>
									</div>

									<div class="mb-3">
										<label class="form-label"><strong>Lifecycle *</strong></label>
										<select
											name="lifecycle_id"
											id="lifecycle_id"
											class="form-select"
											required>
											<option value="">Select Lifecycle</option>
										</select>
									</div>

									<div class="mb-3">
										<label class="form-label">Standard Price</label>
										<input type="number"
											step="0.01"
											name="standard_price"
											id="standard_price"
											class="form-control">
									</div>

									<div class="mb-3">
										<label class="form-label">Sample Leadtime (days)</label>
										<input type="number"
											name="sample_leadtime"
											id="sample_leadtime"
											class="form-control">
									</div>

									<div class="mb-3">
										<label class="form-label">Production Leadtime (days)</label>
										<input type="number"
											name="production_leadtime"
											id="production_leadtime"
											class="form-control">
									</div>
								</div>
							</div>
						</div>

						<!-- TAB 2: SPECIFICATIONS -->
						<div class="tab-pane fade" id="panelSpecifications" role="tabpanel">
							<div class="row">
								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Composition</label>
										<textarea
											name="composition"
											id="composition"
											class="form-control"
											rows="3"></textarea>
									</div>

									<div class="mb-3">
										<label class="form-label">Construction</label>
										<input type="text"
											name="construction"
											id="construction"
											class="form-control">
									</div>

									<div class="mb-3">
										<label class="form-label">Technology</label>
										<input type="text"
											name="technology"
											id="technology"
											class="form-control">
									</div>
								</div>

								<div class="col-md-6">
									<div class="mb-3">
										<label class="form-label">Weight</label>
										<div class="input-group">
											<input type="number"
												step="0.0001"
												name="weight"
												id="weight"
												class="form-control">
											<select name="weight_uom_id"
												id="weight_uom_id"
												class="form-select">
											</select>
										</div>
									</div>

									<div class="mb-3">
										<label class="form-label">Thickness</label>
										<input type="number"
											step="0.01"
											name="thickness"
											id="thickness"
											class="form-control">
									</div>

									<div class="mb-3">
										<label class="form-label">Width</label>
										<div class="input-group">
											<input type="number"
												step="0.01"
												name="width"
												id="width"
												class="form-control">
											<select name="width_uom_id"
												id="width_uom_id"
												class="form-select">
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- TAB 3: MODELS & LOCATIONS -->
						<div class="tab-pane fade" id="panelModelsLocations" role="tabpanel">
							<div class="mb-3">
								<label class="form-label"><strong>Model Numbers *</strong></label>
								<select name="model_numbers[]"
									id="modelNumbers"
									class="form-select"
									multiple>
								</select>
								<small class="text-muted d-block mt-2">
									Type or paste model numbers, separated by commas.
								</small>
							</div>

							<div class="mb-3">
								<label class="form-label"><strong>Production Locations *</strong></label>
								<select name="location_id[]"
									id="addLocations"
									class="form-select"
									multiple>
								</select>
								<small class="text-muted d-block mt-2">
									Can select multiple production locations
								</small>
							</div>
						</div>

						<!-- TAB 4: ASSETS -->
						<div class="tab-pane fade" id="panelAssets" role="tabpanel">
							<!-- <div class="alert alert-info">
								Assets should be managed separately later.
							</div> -->
							<div class="mb-3">
								<label class="form-label">General Model Number</label>
								<input type="text"
									name="pwi_inline_model"
									id="pwi_inline_model"
									class="form-control"
									placeholder="General Model Number">
							</div>
						</div>
				</form>
			</div>


			<!-- FOOTER -->
			<div class="modal-footer border-top">

				<button type="button"
					class="btn btn-light border"
					data-bs-dismiss="modal"
					onclick="resetFormMaterial()">
					Close
				</button>

				<button type="submit"
					form="formMaterial"
					class="btn btn-dark"
					id="btnSaveMaterial">
					<i class="bi bi-check-lg"></i>
					Save Material

				</button>


			</div>

		</div>

	</div>
</div>

<script>
	$(document).ready(function() {
		initSelect2();
		loadLifecycleOptions();
		loadWeightUOM();
		loadWidthUOM();



		// loadGridMaterials();

		/* Filter */

		loadFilterMLM();
		loadFilterSupplier();
		loadFilterMaterialName();
		loadFilterClassification();
		loadFilterLocation();
		loadFilterLifecycle();
		loadFilterComposition();
		loadFilterConstruction();
		loadFilterTechnology();
		loadFilterSampleLeadtime();
		loadFilterProductionLeadtime();
		loadFilterPrice();



		$('.filterSelect').select2({
			theme: 'bootstrap-5',
			width: '100%'
		});

		$('.filterSelect').on('change', function() {
			if ($('#gridWrapper').is(':visible')) {
				if (typeof window.loadGridMaterials === 'function') {
					window.loadGridMaterials();
				}
			}
		});

		window.materialsTable = $('#materials').DataTable({
			processing: true,
			serverSide: true,
			responsive: true,
			autoWidth: false,
			pageLength: 10,
			ajax: {
				url: base + 'Home/materialServerside',
				type: 'POST',

				data: function(d) {

					d.filtermlm = $('#filtermlm').val();
					d.filterSupplier = $('#filterSupplier').val();
					d.filterMaterialName = $('#filterMaterialName').val();
					d.filterClassification = $('#filterClassification').val();
					d.filterLocation = $('#filterLocation').val();
					d.filterLifecycle = $('#filterLifecycle').val();
					d.filterComposition = $('#filterComposition').val();
					d.filterConstruction = $('#filterConstruction').val();
					d.filterTechnology = $('#filterTechnology').val();
					d.filterSampleLeadtime = $('#filterSampleLeadtime').val();
					d.filterProductionLeadtime = $('#filterProductionLeadtime').val();
					d.filterPrice = $('#filterPrice').val();

				}
			},

			columnDefs: [{
				targets: [0, 1, 6, 7, 10],
				className: 'text-center'
			}],

			order: [
				[0, 'desc']
			]

		});
		$('#btnApplyFilter').on('click', function() {
			$('#materials').DataTable().ajax.reload();

			if (window.materialsTable && window.materialsTable.ajax) {
				window.materialsTable.ajax.reload();
			}

			if ($('#gridWrapper').is(':visible')) {
				loadGridMaterials();
			}
		});
		/* =========================================================
		| RESET FILTER
		========================================================= */

		$('#btnResetFilter').on('click', function() {

			$('.filterSelect').val('');

			$('#materials').DataTable().ajax.reload();

			if ($('#gridWrapper').is(':visible')) {
				loadGridMaterials();
			}

		});
		// Initialize Classification Select2 (Searchable hierarchy)
		$('#addClassification').select2({
			theme: 'bootstrap-5',
			dropdownParent: $('#modalAddMaterial'),
			placeholder: 'Search & Select Classification',
			allowClear: true,
			ajax: {
				url: base + 'Home/getClassifications',
				type: 'POST',
				dataType: 'json',
				delay: 250,
				data: function(params) {
					return {
						supplier_id: $('#addSupplier').val(),
						search: params.term
					};
				},
				processResults: function(data) {
					return {
						results: data
					};
				},
				cache: false
			}
		});
		// Initialize Supplier Select2
		$('#addSupplier').select2({
			theme: 'bootstrap-5',
			dropdownParent: $('#modalAddMaterial'),
			placeholder: 'Search & Select Supplier',
			allowClear: true,
			ajax: {
				url: base + 'Home/getSuppliers',
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
		//getModelNumber
		$('#modelNumbers').select2({
			theme: 'bootstrap-5',
			dropdownParent: $('#modalAddMaterial'),
			width: '100%',
			tags: true,
			multiple: true,
			tokenSeparators: [','],
			placeholder: 'Type model number...',
			allowClear: true,
			ajax: {
				url: base + 'Home/getModelNumber',
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
						results: data.results
					};
				}
			}
		});
		//Get Locations
		$('#addLocations').select2({
			theme: 'bootstrap-5',
			dropdownParent: $('#modalAddMaterial'),
			placeholder: 'Select Locations',
			width: '100%',
			ajax: {
				url: base + 'Home/getLocations',
				type: 'POST',
				dataType: 'json',
				delay: 250,

				data: function(params) {
					return {
						search: params.term || ''
					};
				},

				processResults: function(data) {
					return {
						results: data.results
					};
				},

				cache: true
			}
		});
		// Get Seasons
		$('#season_id').select2({
			theme: 'bootstrap-5',
			dropdownParent: $('#modalAddMaterial'),
			placeholder: 'Select Season',
			width: '100%',
			allowClear: true,

			ajax: {
				url: base + 'Home/getSeasons',
				type: 'POST',
				dataType: 'json',
				delay: 250,

				data: function(params) {

					return {
						search: params.term || ''
					};
				},

				processResults: function(data) {

					return {
						results: data.results
					};
				},

				cache: true
			}
		});
		/* =========================================================================
		| MATERIAL TYPE SELECT2
		========================================================================= */
		$('#materialType').select2({

			theme: 'bootstrap-5',
			width: '100%',
			dropdownParent: $('#modalAddMaterial'),
			placeholder: 'Select Material Type',
			ajax: {

				url: base + 'Home/getMaterialTypes',
				type: 'POST',
				dataType: 'json',
				delay: 250,
				processResults: function(data) {

					return {
						results: data
					};

				}

			}

		});
		/* =========================================================
		| RESET WHEN MODAL CLOSED
		========================================================= */
		$('#modalAddMaterial').on(
			'hidden.bs.modal',
			function() {

				resetFormMaterial();
			}
		);
		// ADD MATERIAL
		$('#formMaterial').attr(
			'action',
			base + 'Home/saveMaterial'
		);
		//EDIT / UPDATE MATERIAL
		// $('#formMaterial').attr(
		// 	'action',
		// 	base + 'Home/updateMaterial/' + res.id
		// );

	});

	function initSelect2() {
		$('.filterSelect').select2({
			theme: 'bootstrap-5',
			width: '100%',
			placeholder: 'Select option',
			allowClear: true
		});

	}
	$('#toggleFilter').on('click', function() {
		$('#filterBody').slideToggle(200);
		let isVisible = $('#filterBody').is(':visible');
		$(this).html(
			isVisible ?
			'<i class="bi bi-funnel"></i> Hide Filter' :
			'<i class="bi bi-funnel-fill"></i> Show Filter'
		);
	});

	function addMaterial() {

		// $('#formAddMaterial')[0].reset();
		$('#formMaterial')[0].reset();

		$('#material_id').val('');
		$('#material_code').prop('readonly', false).val('');

		$('.select2').val(null).trigger('change');

		$('#modalAddMaterialLabel').html(`
        <i class="bi bi-box-seam me-2"></i>
        Add New Material
    `);

		$('#btnSaveMaterial').html(`
        <i class="bi bi-check-lg"></i>
        Save Material
    `);

		$('#modalAddMaterial').modal('show');
	}
	/* =========================================================
	| EDIT MATERIAL
	========================================================= */
	function editMaterial(el) {

		let id = $(el).data('id');

		$.ajax({

			url: base + 'Home/getDetailMaterial/' + id,
			type: 'GET',
			dataType: 'JSON',

			success: function(res) {

				/* RESET FORM */
				resetFormMaterial();

				/* =====================================================
				| MODE EDIT
				===================================================== */

				$('#modalAddMaterialLabel').html(`
				<i class="bi bi-pencil-square"></i>
				Edit Material
			`);

				$('#btnSaveMaterial').html(`
				<i class="bi bi-check-lg"></i>
				Update Material
			`);

				/* =====================================================
				| FORM ACTION
				===================================================== */

				$('#formMaterial').attr(
					'action',
					base + 'Home/updateMaterial/' + res.id
				);

				/* =====================================================
				| ID
				===================================================== */

				$('#material_id').val(res.id);

				/* =====================================================
				| MATERIAL CODE READONLY
				===================================================== */

				$('#material_code')
					.val(res.material_code)
					.prop('readonly', true);

				/* lanjut field lainnya */

				$('#material_name').val(res.material_name);
				$('#mlm_ref_no').val(res.mlm_ref_no);
				$('#material_name').val(res.material_name);
				$('#mlm_ref_no').val(res.mlm_ref_no);
				$('#library_code').val(res.library_code);

				$('#standard_price').val(res.standard_price);

				$('#sample_leadtime').val(res.sample_leadtime);
				$('#production_leadtime').val(res.production_leadtime);

				$('#weight').val(res.weight);
				$('#thickness').val(res.thickness);
				$('#width').val(res.width);

				$('#composition').val(res.composition);
				$('#construction').val(res.construction);
				$('#technology').val(res.technology);

				$('#pwi_inline_model').val(res.pwi_inline_model);

				/* =====================================================
				| SUPPLIER SELECT2
				===================================================== */
				if (res.supplier_id) {

					$('#addSupplier').empty();

					let supplierOption = new Option(
						res.supplier_name,
						res.supplier_id,
						true,
						true
					);

					$('#addSupplier')
						.append(supplierOption)
						.trigger('change');
				}

				/* =====================================================
				| MATERIAL TYPE
				===================================================== */

				if (res.material_type_id) {
					$('#materialType').empty();

					let materialTypeOption = new Option(
						res.material_type_name,
						res.material_type_id,
						true,
						true
					);

					$('#materialType')
						.append(materialTypeOption)
						.trigger('change');
				}

				/* =====================================================
				| SEASON
				===================================================== */

				if (res.season_id) {
					$('#season_id').empty();
					let seasonOption = new Option(
						res.season_name,
						res.season_id,
						true,
						true
					);

					$('#season_id')
						.append(seasonOption)
						.trigger('change');
				}

				/* =====================================================
				| LIFECYCLE
				===================================================== */

				if (res.lifecycle_id) {

					let lifecycleOption = new Option(
						res.lifecycle_name,
						res.lifecycle_id,
						true,
						true
					);

					$('#lifecycle_id')
						.append(lifecycleOption)
						.trigger('change');
				}

				/* =====================================================
				| WEIGHT UOM
				===================================================== */

				if (res.weight_uom_id) {

					let option = new Option(
						res.weight_uom_name,
						res.weight_uom_id,
						true,
						true
					);

					$('#weight_uom_id')
						.append(option)
						.trigger('change');
				}

				/* =====================================================
				| WIDTH UOM
				===================================================== */

				if (res.width_uom_id) {

					let option = new Option(
						res.width_uom_name,
						res.width_uom_id,
						true,
						true
					);

					$('#width_uom_id')
						.append(option)
						.trigger('change');
				}

				/* =====================================================
				| CLASSIFICATION SELECT2
				===================================================== */
				$('#addClassification')
					.empty()
					.trigger('change');

				if (res.classification_names) {

					res.classification_names.forEach(function(item) {

						let option = new Option(
							item.classification_name,
							item.id,
							true,
							true
						);

						$('#addClassification').append(option);
					});

					$('#addClassification').trigger('change');
				}

				/* =====================================================
				| LOCATION SELECT2
				===================================================== */

				$('#addLocations')
					.empty()
					.trigger('change');

				if (
					res.location_names &&
					res.location_names.length > 0
				) {

					res.location_names.forEach(function(item) {

						let option = new Option(
							item.location_name,
							item.id,
							true,
							true
						);

						$('#addLocations').append(option);
					});

					$('#addLocations').trigger('change');
				}

				/* =====================================================
			| MODEL NUMBER SELECT2
			===================================================== */

				$('#model_numbers')
					.empty()
					.trigger('change');

				if (
					res.model_number_names &&
					res.model_number_names.length > 0
				) {

					res.model_number_names.forEach(function(item) {

						let option = new Option(
							item.model_number,
							item.id,
							true,
							true
						);

						$('#modelNumbers').append(option);
					});

					$('#modelNumbers').trigger('change');
				}



				/* SHOW MODAL */
				$('#modalAddMaterial').modal('show');
			}
		});
	}
	$('#btnSaveMaterial').on('click', function(e) {

		e.preventDefault();

		let form = $('#formMaterial')[0];
		let formData = new FormData(form);

		let materialCode = $('input[name="material_code"]').val();

		/*
		|--------------------------------------------------------------------------
		| VALIDATION
		|--------------------------------------------------------------------------
		*/

		if (materialCode == '') {

			Swal.fire({
				icon: 'warning',
				title: 'Warning',
				text: 'Material Code is required'
			});

			return;
		}

		/*
		|--------------------------------------------------------------------------
		| BUTTON LOADING
		|--------------------------------------------------------------------------
		*/

		$('#btnSaveMaterial')
			.prop('disabled', true)
			.html(`
            <span class="spinner-border spinner-border-sm me-1"></span>
            Saving...
        `);

		/*
		|--------------------------------------------------------------------------
		| AJAX SAVE / UPDATE
		|--------------------------------------------------------------------------
		*/

		$.ajax({

			/* DINAMIS */
			url: $('#formMaterial').attr('action'),

			type: 'POST',

			data: formData,

			processData: false,

			contentType: false,

			dataType: 'json',

			success: function(response) {

				if (response.success == false) {

					Swal.fire({

						icon: 'error',

						title: 'Failed',

						text: response.message

					});

					return;
				}

				Swal.fire({

					icon: 'success',

					title: 'Success',

					text: response.message,

					timer: 1500,

					showConfirmButton: false

				});

				$('#modalAddMaterial').modal('hide');

				$('#formMaterial')[0].reset();

				$('.select2').val(null).trigger('change');

				$('#materials').DataTable().ajax.reload(null, false);

			},

			error: function(xhr) {

				Swal.fire({

					icon: 'error',

					title: 'Server Error',

					text: 'Failed to process material'

				});

			},

			complete: function() {

				$('#btnSaveMaterial')
					.prop('disabled', false)
					.html(`
                    <i class="bi bi-check-lg"></i>
                    Save Material
                `);

			}

		});

	});

	function loadLifecycleOptions() {
		$.ajax({
			url: base + 'Home/getLifecycles',
			type: 'GET',
			dataType: 'json',
			success: function(data) {
				var lifecycleSelect = $('select[name="lifecycle_id"]');
				lifecycleSelect.find('option:not(:first)').remove();
				$.each(data, function(i, item) {
					lifecycleSelect.append('<option value="' + item.id + '">' + item.text + '</option>');
				});
			}
		});
	}

	function loadWeightUOM() {

		$.ajax({
			url: base + 'Home/getWeightUOM',
			type: 'GET',
			dataType: 'json',

			success: function(res) {

				let option = '<option value="">Select Weight UOM</option>';

				$.each(res, function(i, item) {

					option += `
					<option value="${item.id}">
						${item.uom_name}
					</option>
				`;
				});

				$('#weight_uom_id').html(option);
			}
		});
	}

	function loadWidthUOM() {

		$.ajax({
			url: base + 'Home/getWidthUOM',
			type: 'GET',
			dataType: 'json',

			success: function(res) {

				let option = '<option value="">Select Width UOM</option>';

				$.each(res, function(i, item) {

					option += `
					<option value="${item.id}">
						${item.uom_name}
					</option>
				`;
				});

				$('#width_uom_id').html(option);
			}
		});
	}

	/* =========================================================
	| RESET FORM MATERIAL
	========================================================= */

	function resetFormMaterial() {

		$('#formMaterial')[0].reset();

		$('#material_id').val('');

		/* =====================================================
		| RESET SELECT2
		===================================================== */

		$('#supplier_id').val(null).trigger('change');
		$('#material_type_id').val(null).trigger('change');
		$('#season_id').val(null).trigger('change');
		$('#lifecycle_id').val(null).trigger('change');

		$('#weight_uom_id').val(null).trigger('change');
		$('#width_uom_id').val(null).trigger('change');
		$('#weight').val(null).trigger('change');
		$('#width').val(null).trigger('change');

		$('#materialType').val(null).trigger('change');
		$('#addSupplier').val(null).trigger('change');

		$('#addClassification')
			.empty()
			.trigger('change');

		$('#addLocations')
			.empty()
			.trigger('change');

		$('#modelNumbers')
			.empty()
			.trigger('change');

		/* =====================================================
		| RESET BUTTON & TITLE
		===================================================== */

		$('#modalAddMaterialLabel')
			.html('Add New Material');

		$('#btnSaveMaterial').html(`
			<i class="bi bi-check-lg"></i>
			Save Material
		`);
		$('#formMaterial').attr(
			'action',
			base + 'Home/saveMaterial'
		);
	}
	/* =========================================================
	| LOAD FILTER MLM
	========================================================= */

	function loadFilterMLM() {

		$.ajax({

			url: base + 'Home/getFilterMLM',
			type: 'GET',
			dataType: 'JSON',

			success: function(res) {

				$('#filtermlm').html(`
				<option value="">
					All MLM ID
				</option>
			`);

				$.each(res, function(i, item) {

					$('#filtermlm').append(`
					<option value="${item.mlm_ref_no}">
						${item.mlm_ref_no}
					</option>
				`);

				});

			}

		});

	}
	/* =========================================================
	| LOAD FILTER SUPPLIER
	========================================================= */

	function loadFilterSupplier() {

		$.ajax({

			url: base + 'Home/getFilterSupplier',

			type: 'GET',

			dataType: 'JSON',

			success: function(res) {

				$('#filterSupplier').html(`
				<option value="">
					All Suppliers
				</option>
			`);

				$.each(res, function(i, item) {

					$('#filterSupplier').append(`
					<option value="${item.id}">
						${item.supplier_name}
					</option>
				`);

				});

			}

		});

	}

	/* =========================================================
	| LOAD FILTER MATERIAL NAME
	========================================================= */

	function loadFilterMaterialName() {

		$.ajax({

			url: base + 'Home/getFilterMaterialName',

			type: 'GET',

			dataType: 'JSON',

			success: function(res) {

				$('#filterMaterialName').html(`
				<option value="">
					All Material
				</option>
			`);

				$.each(res, function(i, item) {

					$('#filterMaterialName').append(`
					<option value="${item.material_name}">
						${item.material_name}
					</option>
				`);

				});

			}

		});


	}

	/* =========================================================
	| LOAD FILTER CLASSIFICATION
	========================================================= */

	function loadFilterClassification() {
		$.ajax({
			url: base + 'Home/getFilterClassification',
			type: 'GET',
			dataType: 'JSON',

			success: function(res) {
				// console.log(res);

				$('#filterClassification').html(`
				<option value="">
					All Classification
				</option>
			`);

				$.each(res, function(i, item) {

					$('#filterClassification').append(`
					<option value="${item.id}">
						${item.classification_name}
					</option>
				`);

				});

			}

		});

	}

	/* =========================================================
	| LOAD FILTER LOCATION
	========================================================= */
	function loadFilterLocation() {

		$.ajax({

			url: base + 'Home/getFilterLocation',
			type: 'GET',

			dataType: 'JSON',

			success: function(res) {

				$('#filterLocation').html(`
				<option value="">
					All Location
				</option>
			`);

				$.each(res, function(i, item) {

					$('#filterLocation').append(`
					<option value="${item.id}">
						${item.location_name}
					</option>
				`);

				});

			}

		});

	}

	/* =========================================================
	| LOAD FILTER LIFECYCLE
	========================================================= */

	function loadFilterLifecycle() {

		$.ajax({

			url: base + 'Home/getFilterLifecycle',

			type: 'GET',

			dataType: 'JSON',

			success: function(res) {

				$('#filterLifecycle').html(`
				<option value="">
					All Lifecycle
				</option>
			`);

				$.each(res, function(i, item) {

					$('#filterLifecycle').append(`
					<option value="${item.id}">
						${item.lifecycle_name}
					</option>
				`);

				});

			}

		});

	}
	/* =========================================================
	| LOAD FILTER COMPOSITION
	========================================================= */

	function loadFilterComposition() {

		$.ajax({

			url: base + 'Home/getFilterComposition',

			type: 'GET',

			dataType: 'JSON',

			success: function(res) {

				$('#filterComposition').html(`
				<option value="">
					All Composition
				</option>
			`);

				$.each(res, function(i, item) {

					$('#filterComposition').append(`
					<option value="${item.composition}">
						${item.composition}
					</option>
				`);

				});

			}

		});

	}
	/* =========================================================
	| LOAD FILTER CONSTRUCTION
	========================================================= */

	function loadFilterConstruction() {

		$.ajax({

			url: base + 'Home/getFilterConstruction',

			type: 'GET',

			dataType: 'JSON',

			success: function(res) {

				$('#filterConstruction').html(`
				<option value="">
					All Construction
				</option>
			`);

				$.each(res, function(i, item) {

					$('#filterConstruction').append(`
					<option value="${item.construction}">
						${item.construction}
					</option>
				`);

				});

			}

		});

	}
	/* =========================================================
	| LOAD FILTER TECHNOLOGY
	========================================================= */

	function loadFilterTechnology() {

		$.ajax({

			url: base + 'Home/getFilterTechnology',

			type: 'GET',

			dataType: 'JSON',

			success: function(res) {

				$('#filterTechnology').html(`
				<option value="">
					All Technology
				</option>
			`);

				$.each(res, function(i, item) {

					$('#filterTechnology').append(`
					<option value="${item.technology}">
						${item.technology}
					</option>
				`);

				});

			}

		});

	}
	/* =========================================================
	| LOAD FILTER SAMPLE LEADTIME
	========================================================= */

	function loadFilterSampleLeadtime() {

		$.ajax({

			url: base + 'Home/getFilterSampleLeadtime',

			type: 'GET',

			dataType: 'JSON',

			success: function(res) {

				$('#filterSampleLeadtime').html(`
				<option value="">
					All Sample Leadtime
				</option>
			`);

				$.each(res, function(i, item) {

					$('#filterSampleLeadtime').append(`
					<option value="${item.sample_leadtime}">
						${item.sample_leadtime} Days
					</option>
				`);

				});

			}

		});

	}
	/* =========================================================
	| LOAD FILTER PRODUCTION LEADTIME
	========================================================= */

	function loadFilterProductionLeadtime() {

		$.ajax({

			url: base + 'Home/getFilterProductionLeadtime',

			type: 'GET',

			dataType: 'JSON',

			success: function(res) {

				$('#filterProductionLeadtime').html(`
				<option value="">
					All Production Leadtime
				</option>
			`);

				$.each(res, function(i, item) {

					$('#filterProductionLeadtime').append(`
					<option value="${item.production_leadtime}">
						${item.production_leadtime} Days
					</option>
				`);

				});

			}

		});

	}
	/* =========================================================
	| LOAD FILTER PRICE
	========================================================= */

	function loadFilterPrice() {

		$.ajax({

			url: base + 'Home/getFilterPrice',

			type: 'GET',

			dataType: 'JSON',

			success: function(res) {

				$('#filterPrice').html(`
				<option value="">
					All Price
				</option>
			`);

				$.each(res, function(i, item) {

					$('#filterPrice').append(`
					<option value="${item.standard_price}">
						${item.standard_price}
					</option>
				`);

				});

			}

		});

	}

	function viewMaterial(el) {
		let material_code = $(el).data('id');
		$('#modalViewMaterial').modal('show');
		$('#viewMaterialContent').html(`
		<div class="text-center py-5">
			<div class="spinner-border text-primary"></div>
			<p class="mt-3">Loading material...</p>
		</div>`);
		$.ajax({
			url: base + 'Home/getMaterialDetail',
			type: 'POST',
			data: {
				material_code: material_code
			},
			dataType: 'json',
			success: function(res) {
				if (res.status != 'success') {
					$('#viewMaterialContent').html(`
				<div class="alert alert-danger">
					${res.message}
				</div>
				`);

					return;
				}
				let m = res.data;
				let images = m.images || [];
				/*
				|--------------------------------------------------------------------------
				| BADGE
				|--------------------------------------------------------------------------
				*/
				let badgeClass = 'secondary';
				switch ((m.lifecycle_name || '').toLowerCase()) {

					case 'released':
						badgeClass = 'success';
						break;

					case 'limited release':
						badgeClass = 'warning';
						break;

					case 'inactive':
						badgeClass = 'danger';
						break;

					case 'created':
						badgeClass = 'info';
						break;

					case 'rejected':
						badgeClass = 'dark';
						break;

					default:
						badgeClass = 'secondary';
						break;
				}
				/*
				|--------------------------------------------------------------------------
				| MAIN IMAGE
				|--------------------------------------------------------------------------
				*/
				let mainImage = base + 'assets/images/No_Image_Available.jpg';
				if (images.length > 0) {
					let cover = images.find(x => x.is_cover == 1);

					if (!cover) {
						cover = images[0];
					}
					mainImage =
						base +
						'uploads/material_assets/images/' +
						cover.file_name;
				}
				/*
				|--------------------------------------------------------------------------
				| THUMBNAILS
				|--------------------------------------------------------------------------
				*/
				let thumbs = '';
				$.each(images, function(i, img) {

					let imageUrl =
						base +
						'uploads/material_assets/images/' +
						img.file_name;

					thumbs += `
					<div class="col-3">

						<div class="border rounded overflow-hidden"
							style="cursor:pointer"
							onclick="changeMainImage('${imageUrl}')">
							<img src="${imageUrl}"
								class="img-fluid w-100"
								style="height:90px;object-fit:cover;">
						</div>

							</div>
						`;
				});
				/*
				|--------------------------------------------------------------------------
				| QR CODE
				|--------------------------------------------------------------------------
				*/
				let qrCode = '-';
				if (m.qr_code_file) {
					qrCode = `
					<img src="${base}uploads/qrcode/${m.qr_code_file}"
						class="img-fluid border rounded"
						style="max-width:180px;">
				`;
				}
				/*
				|--------------------------------------------------------------------------
				| FILE BUTTONS
				|--------------------------------------------------------------------------
				*/
				let blenderBtn = '-';
				if (m.blender_material_file) {

					blenderBtn = `
					<a href="${base}uploads/material_assets/blender_material/${m.blender_material_file}"
						target="_blank"
						class="btn btn-dark btn-sm">

						<i class="bi bi-box"></i>
						Download Blend

					</a>
				`;
				}
				let glbBtn = '-';
				if (m.glb_file) {

					glbBtn = `
					<a href="${base}uploads/material_assets/glb/${m.glb_file}"
						target="_blank"
						class="btn btn-primary btn-sm">

						<i class="bi bi-badge-3d"></i>
						Download GLB

					</a>
				`;
				}
				let u3mBtn = '-';
				if (m.u3m_file) {

					u3mBtn = `
					<a href="${base}uploads/material_assets/u3m/${m.u3m_file}"
						target="_blank"
						class="btn btn-success btn-sm">

						<i class="bi bi-download"></i>
						Download U3M

					</a>
				`;
				}
				/*
				|--------------------------------------------------------------------------
				| GLB PREVIEW
				|--------------------------------------------------------------------------
				*/
				let glbPreview = '';
				if (m.glb_file) {
					glbPreview = `
					<div class="card border-0 shadow-sm mt-4">
						<div class="card-header bg-dark text-white">
							<i class="bi bi-badge-3d"></i>
							GLB Preview
						</div>
						<div class="card-body p-0">
							<model-viewer
								src="${base}uploads/material_assets/glb/${m.glb_file}"
								ar
								auto-rotate
								camera-controls
								shadow-intensity="1"
								style="width:100%;height:400px;background:#f8f9fa;">
							</model-viewer>
						</div>
					</div>
				`;
				}
				/*
				|--------------------------------------------------------------------------
				| BLEND PREVIEW
				|--------------------------------------------------------------------------
				*/
				let blendPreview = '';
				if (m.blender_material_file) {
					blendPreview = `
					<div class="card border-0 shadow-sm mt-4">
						<div class="card-header bg-warning text-dark">

							<i class="bi bi-box"></i>
							Blender File
						</div>
						<div class="card-body text-center py-5">
							<i class="bi bi-box display-1 text-warning"></i>

							<h5 class="mt-3">
								.blend File
							</h5>

							<p class="text-muted">
								Preview not supported in browser
							</p>

							<a href="${base}uploads/material_assets/blender_material/${m.blender_material_file}"
								target="_blank"
								class="btn btn-warning">

								<i class="bi bi-download"></i>
								Download Blender File
							</a>
						</div>

					</div>

				`;
				}
				/*
	|--------------------------------------------------------------------------
	| LOCATIONS
	|--------------------------------------------------------------------------
	*/

				let locationNames = '-';

				if (m.locations && m.locations.length > 0) {

					locationNames = m.locations
						.map(x => x.location_name)
						.join(', ');
				}

				/*
				|--------------------------------------------------------------------------
				| CLASSIFICATIONS
				|--------------------------------------------------------------------------
				*/

				let classificationNames = '-';

				if (m.classifications && m.classifications.length > 0) {

					classificationNames = m.classifications
						.map(x => x.classification_name)
						.join(', ');
				}

				/*
				|--------------------------------------------------------------------------
				| MODEL NUMBERS
				|--------------------------------------------------------------------------
				*/

				let modelNumbers = '-';
				if (m.models && m.models.length > 0) {

					modelNumbers = m.models
						.map(x => x.model_number)
						.join(', ');
				}
				/*
				|--------------------------------------------------------------------------
				| HTML
				|--------------------------------------------------------------------------
				*/
				let html = `
				<div class="container-fluid">
					<div class="row g-4">
						<!-- LEFT -->
						<div class="col-lg-5">
							<div class="card border-0 shadow-sm">
								<div class="card-body">
									<!-- MAIN IMAGE -->
									<div class="border rounded overflow-hidden mb-3 bg-white position-relative">
										<img id="mainPreviewImage"
											src="${mainImage}"
											class="img-fluid w-100"
											style="height:500px;object-fit:contain;">
										<a href="${mainImage}"
											target="_blank"
											class="btn btn-light shadow position-absolute bottom-0 end-0 m-3">
											<i class="bi bi-download"></i>
										</a>
									</div>

									<!-- THUMBNAILS -->
									<div class="row g-2">
										${thumbs}
									</div>

									 ${glbPreview}
									 ${blendPreview}

								</div>
							</div>
						</div>

						<!-- RIGHT -->
						<div class="col-lg-7">
							<div class="card border-0 shadow-sm h-100">

								<div class="card-body">

									<!-- HEADER -->
									<div class="d-flex justify-content-between align-items-start mb-4">
										<div>
											<h2 class="fw-bold mb-1">
												${m.material_name ?? '-'}
											</h2>

											<div class="text-muted">
												${m.material_code ?? '-'}
											</div>

										</div>
										<div class="text-end">
											${qrCode}
										</div>
									</div>

									<hr>

									<div class="table-responsive">
										<table class="table table-borderless align-middle">
											<tbody>
												<tr>
													<td width="220" class="text-muted fw-semibold">
														Material Name
													</td>
													<td>
														${m.material_name ?? '-'}
													</td>
												</tr>
												<tr>
													<td class="text-muted fw-semibold">
														MLM ID
													</td>
													<td>
														${m.mlm_ref_no ?? '-'}
													</td>
												</tr>
												<tr>
													<td class="text-muted fw-semibold">
														Supplier Name
													</td>
													<td>
														${m.supplier_name ?? '-'}
													</td>
												</tr>
												<tr>
													<td class="text-muted fw-semibold">
														Library Code
													</td>
													<td>
														${m.library_code ?? '-'}
													</td>
												</tr>
												<tr>
													<td class="text-muted fw-semibold">
														Price
													</td>
													<td>
														$ ${m.standard_price ?? '-'}
													</td>
												</tr>
												<tr>
													<td class="text-muted fw-semibold align-top">
														Dimensions
													</td>
													<td>
														<table class="table table-sm table-borderless mb-0">
															<tr>
																<td width="120">Weight</td>
																<td>
																	${m.weight ?? '-'}
																	${m.weight_uom_name ?? ''}
																</td>
															</tr>
															<tr>
																<td>Width</td>
																<td>
																	${m.width ?? '-'}
																	${m.width_uom_name ?? ''}
																</td>
															</tr>
															<tr>
																<td>Thickness</td>
																<td>
																	${m.thickness ?? '-'} mm
																</td>
															</tr>
														</table>
													</td>
												</tr>

												<tr>
													<td class="text-muted fw-semibold">
														First Season
													</td>
													<td>
														${m.season_name ?? '-'} ${m.season_year ?? ''}
													</td>
												</tr>
												<tr>
													<td class="text-muted fw-semibold">
														Sample Leadtime
													</td>
													<td>
														${m.sample_leadtime ?? '-'} 
													</td>
												</tr>
												<tr>
													<td class="text-muted fw-semibold">
														Production Leadtime
													</td>
													<td>
														${m.production_leadtime ?? '-'} 
													</td>
												</tr>
												<tr>
													<td class="text-muted fw-semibold">
														Lifecycle State
													</td>
													<td>
														<span class="badge bg-${badgeClass}">
															${m.lifecycle_name ?? '-'}
														</span>
													</td>
												</tr>

												<tr>
													<td class="text-muted fw-semibold">
														Composition
													</td>
													<td>
														${m.composition ?? '-'}
													</td>
												</tr>

												<tr>
													<td class="text-muted fw-semibold">
														Construction
													</td>
													<td>
														${m.construction ?? '-'}
													</td>
												</tr>
												<tr>
													<td class="text-muted fw-semibold">
														Technology
													</td>
													<td>
														${m.technology ?? '-'}
													</td>
												</tr>
												<tr>
													<td class="text-muted fw-semibold">
														Classification
													</td>

													<td>
														${classificationNames}
													</td>
												</tr>
												<tr>
													<td class="text-muted fw-semibold">
														Model Numbers
													</td>
													<td>
														${modelNumbers}
													</td>
												</tr>
												<tr>
													<td class="text-muted fw-semibold">
														Location Name
													</td>
													<td>
														${locationNames}
													</td>
												</tr>
												<tr>
													<td class="text-muted fw-semibold">
														Supplier Remarks
													</td
													<td>
														${m.supplier_remarks ?? '-'}
													</td>
												</tr>
												<tr>
												<td class="text-muted fw-semibold">
													PWI Inline Model
												</td>
												<td>
													${m.pwi_inline_model ?? '-'}
												</td>
											</tr>
											</tbody>

										</table>

									</div>

									<hr>

									<h5 class="fw-bold mb-3">
										3D Files
									</h5>

									<div class="d-flex flex-wrap gap-2">

										${blenderBtn}

										${glbBtn}

										${u3mBtn}

									</div>

								</div>

							</div>

						</div>

					</div>

				</div>`;
				$('#viewMaterialContent').html(html);
			}
		});
	}
	/*
	|--------------------------------------------------------------------------
	| CHANGE MAIN IMAGE
	|--------------------------------------------------------------------------
	*/
	function changeMainImage(url) {

		$('#mainPreviewImage').attr('src', url);
	}

	function initThreeViewer(glbUrl) {
		/*
		|--------------------------------------------------------------------------
		| CONTAINER
		|--------------------------------------------------------------------------
		*/
		const container = document.getElementById('threeViewer');
		container.innerHTML = '';

		/*
		|--------------------------------------------------------------------------
		| SCENE
		|--------------------------------------------------------------------------
		*/

		const scene = new THREE.Scene();

		scene.background = new THREE.Color(0xf5f5f5);

		/*
		|--------------------------------------------------------------------------
		| CAMERA
		|--------------------------------------------------------------------------
		*/

		const camera = new THREE.PerspectiveCamera(

			45,
			container.clientWidth / container.clientHeight,
			0.1,
			1000

		);

		camera.position.set(0, 1, 4);

		/*
		|--------------------------------------------------------------------------
		| RENDERER
		|--------------------------------------------------------------------------
		*/

		const renderer = new THREE.WebGLRenderer({

			antialias: true

		});

		renderer.setSize(
			container.clientWidth,
			container.clientHeight
		);

		renderer.setPixelRatio(window.devicePixelRatio);

		container.appendChild(renderer.domElement);

		/*
		|--------------------------------------------------------------------------
		| LIGHTING
		|--------------------------------------------------------------------------
		*/

		const hemiLight = new THREE.HemisphereLight(
			0xffffff,
			0x444444,
			2
		);

		scene.add(hemiLight);

		const dirLight = new THREE.DirectionalLight(
			0xffffff,
			2
		);

		dirLight.position.set(5, 10, 7);

		scene.add(dirLight);

		/*
		|--------------------------------------------------------------------------
		| CONTROLS
		|--------------------------------------------------------------------------
		*/

		const controls = new THREE.OrbitControls(
			camera,
			renderer.domElement
		);

		controls.enableDamping = true;

		/*
		|--------------------------------------------------------------------------
		| LOADER
		|--------------------------------------------------------------------------
		*/

		const loader = new THREE.GLTFLoader();

		loader.load(

			glbUrl,

			function(gltf) {

				scene.add(gltf.scene);

			},

			undefined,

			function(error) {

				console.error(error);

			}

		);

		/*
		|--------------------------------------------------------------------------
		| ANIMATE
		|--------------------------------------------------------------------------
		*/

		function animate() {

			requestAnimationFrame(animate);

			controls.update();

			renderer.render(scene, camera);

		}

		animate();

		/*
		|--------------------------------------------------------------------------
		| RESIZE
		|--------------------------------------------------------------------------
		*/

		window.addEventListener('resize', function() {

			camera.aspect =
				container.clientWidth /
				container.clientHeight;

			camera.updateProjectionMatrix();

			renderer.setSize(
				container.clientWidth,
				container.clientHeight
			);

		});
	}

	// Toggle List / Grid view

	$(function() {

		// Default: show list view
		$('#btnListView').removeClass('btn-outline-dark').addClass('btn-dark text-white');

		$('#btnGridView').on('click', function() {

			showGridView();
		});

		$('#btnListView').on('click', function() {
			showListView();
		});

		function showGridView() {
			// switch button styles
			$('.view-switch .btn').removeClass('btn-dark text-white').addClass('btn-outline-dark');
			$('#btnGridView').removeClass('btn-outline-dark').addClass('btn-dark text-white');

			// hide datatable
			$('.table-wrapper').hide();

			// reload grid whenever grid view is shown so filters stay in sync
			loadGridMaterials();
		}

		function showListView() {
			$('.view-switch .btn').removeClass('btn-dark text-white').addClass('btn-outline-dark');
			$('#btnListView').removeClass('btn-outline-dark').addClass('btn-dark text-white');

			$('#gridWrapper').hide();
			$('.table-wrapper').show();
		}

		window.loadGridMaterials = function(page = 1) {
			$('#gridWrapper').html('<div class="text-center py-4"><div class="spinner-border"></div></div>').show();

			$.ajax({
				url: base + 'Home/materialsGrid',
				method: 'POST',
				data: {
					filtermlm: $('#filtermlm').val(),
					filterSupplier: $('#filterSupplier').val(),
					filterMaterialName: $('#filterMaterialName').val(),
					filterClassification: $('#filterClassification').val(),
					filterLocation: $('#filterLocation').val(),
					filterLifecycle: $('#filterLifecycle').val(),
					filterComposition: $('#filterComposition').val(),
					filterConstruction: $('#filterConstruction').val(),
					filterTechnology: $('#filterTechnology').val(),
					filterSampleLeadtime: $('#filterSampleLeadtime').val(),
					filterProductionLeadtime: $('#filterProductionLeadtime').val(),
					filterPrice: $('#filterPrice').val()
				},
				success: function(res) {

					console.log(res);
					let html = '<div class="row g-4">' + res + '</div>';
					$('#gridWrapper').html(html);
				},
				error: function() {
					$('#gridWrapper').html('<div class="alert alert-danger">Failed to load grid view.</div>');
				}
			});
		}

	});

	/* =========================================================
	| GENERATE MATERIAL PDF
	========================================================= */
	function generateMaterialPDF() {

		Swal.fire({
			title: 'Generating PDF...',
			text: 'Please wait',
			allowOutsideClick: false,
			didOpen: () => {
				Swal.showLoading();
			}
		});

		const element = document.querySelector('#viewMaterialContent');

		if (!element) {

			Swal.fire(
				'Error',
				'Material detail not found',
				'error'
			);

			return;
		}

		const opt = {

			margin: 5,

			filename: 'Material_' +
				($('#material_code').text() || 'Detail') +
				'.pdf',

			image: {
				type: 'jpeg',
				quality: 1
			},

			html2canvas: {

				scale: 2,

				useCORS: true,

				scrollY: 0,

				backgroundColor: '#ffffff'
			},

			jsPDF: {

				unit: 'mm',

				format: 'a4',

				orientation: 'portrait'
			}

		};

		html2pdf()
			.set(opt)
			.from(element)
			.save()
			.then(() => {

				Swal.close();

			})
			.catch(() => {

				Swal.fire(
					'Error',
					'Failed generate PDF',
					'error'
				);

			});
	}

	function generateMaterialPDF() {

		let element =
			document.querySelector('#viewMaterialContent');

		element.classList.add('pdf-mode');

		html2pdf()
			.set(opt)
			.from(element)
			.save()
			.then(() => {

				element.classList.remove('pdf-mode');

				Swal.close();
			});
	}


	$(document).on('click', '.btn-pdf', function() {

		let materialCode = $(this).data('material-code');

		generateMaterialPDF(materialCode);

	});
</script>