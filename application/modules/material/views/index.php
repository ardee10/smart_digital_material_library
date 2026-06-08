<!-- Start Top Navigation -->
<div class="row">
	<?php if ($this->session->flashdata('message')): ?>
		<div class="flash-data" data-flashdata='<?= is_string($this->session->flashdata('message')) ? $this->session->flashdata('message') : json_encode($this->session->flashdata('message')) ?>'></div>
	<?php endif; ?>
</div>


<style>
	.modal-body {
		overflow-y: auto;
		max-height: 85vh;
	}

	.visitor-wrapper {
		min-height: 85vh;
		display: flex;
		align-items: center;
		justify-content: center;
		padding: 30px;
	}

	.visitor-card {
		background: #fff;
		padding: 60px 40px;
		border-radius: 25px;
		box-shadow: 0 10px 40px rgba(0, 0, 0, .08);
		max-width: 500px;
		width: 100%;
	}

	.camera-icon {
		width: 75px;
		height: 75px;
		margin: auto;
		border-radius: 50%;
		background: #19875415;
		display: flex;
		align-items: center;
		justify-content: center;
	}

	.camera-icon i {
		font-size: 60px;
		color: #198754;
	}

	@media(max-width:768px) {
		.visitor-card {
			padding: 40px 25px;
		}

		.camera-icon {
			width: 90px;
			height: 90px;
		}

		.camera-icon i {
			font-size: 45px;
		}
	}

	/* --------------------------------------------------------------------------
   SCANNER CONTAINER
-------------------------------------------------------------------------- */

	#reader {
		width: 100%;
		max-width: 420px;
		height: 520px;

		margin: auto;

		background: #000;

		border-radius: 25px;

		overflow: hidden;

		position: relative;

		box-shadow: 0 10px 30px rgba(0, 0, 0, .15);
	}

	/* --------------------------------------------------------------------------
   CAMERA VIDEO
-------------------------------------------------------------------------- */

	#reader video {

		width: 100% !important;
		height: 100% !important;

		object-fit: cover !important;

		border-radius: 25px;
	}

	/* --------------------------------------------------------------------------
   MOBILE
-------------------------------------------------------------------------- */

	@media(max-width:768px) {

		#reader {

			max-width: 100%;
			height: 70vh;

			border-radius: 20px;
		}

		#reader video {

			border-radius: 20px;
		}
	}

	.modal-content {
		border-radius: 0;
		height: 100vh;
	}

	.scanner-overlay {
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		display: flex;
		align-items: center;
		justify-content: center;

		pointer-events: none;
	}

	.scanner-frame {

		width: 220px;
		height: 220px;

		border: 4px solid #fff;

		border-radius: 20px;

		box-shadow:
			0 0 0 9999px rgba(0, 0, 0, .45);
	}

	.glb-viewer-wrapper {
		width: 100%;
		height: 320px;
		overflow: hidden;
		border-radius: 20px;
		background: #f8f9fa;
		position: relative;
	}

	.glb-viewer-wrapper model-viewer {
		width: 100%;
		height: 100%;
		--poster-color: transparent;
	}

	@media(max-width:768px) {

		.glb-viewer-wrapper {
			height: 250px;
		}

	}

	@keyframes pulse {

		0% {
			transform: scale(1);
		}

		50% {
			transform: scale(1.03);
		}

		100% {
			transform: scale(1);
		}
	}

	.main-image-wrapper {
		width: 100%;
		height: 420px;
		background: #f8f9fa;
		border: 1px solid #eee;
		display: flex;
		align-items: center;
		justify-content: center;
		position: relative;
	}

	.main-preview-image {
		max-width: 100%;
		max-height: 100%;
		object-fit: contain;
		display: block;
	}

	.preview-download-btn {
		position: absolute;
		bottom: 15px;
		right: 15px;
		border-radius: 50%;
		width: 45px;
		height: 45px;
		display: flex;
		align-items: center;
		justify-content: center;
		z-index: 10;
	}

	.thumb-preview {
		width: 80px;
		height: 80px;
		object-fit: cover;
		border-radius: 12px;
		border: 1px solid #ddd;
		transition: .2s;
	}

	.thumb-preview:hover {
		transform: scale(1.05);
	}


	/* =========================================================
MODAL VIEW MATERIAL
========================================================= */

	#modalMaterialDetail.modal-content {
		border-radius: 16px;
		overflow: hidden;
		border: none;
	}

	/* HEADER */
	#modalMaterialDetail.modal-header {
		padding: 18px 24px;
		background: #111827;
		border-bottom: 1px solid #1f2937;
	}

	#modalMaterialDetail.modal-title {
		font-size: 20px;
		font-weight: 600;
		letter-spacing: .3px;
	}

	/* BODY */
	#modalMaterialDetail.modal-body {
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
</style>

<!-- VISITOR DASHBOARD -->
<div class="visitor-wrapper">
	<div class="visitor-card text-center">
		<!-- ICON -->
		<div class="camera-icon mb-4">
			<i class="bi bi-qr-code-scan"></i>
		</div>

		<p class="text-muted mb-4">
			Scan QR Code Material to View Detail Information
		</p>

		<!-- BUTTON -->
		<button type="button"
			class="btn btn-success btn-lg px-5 py-3 shadow"
			data-bs-toggle="modal"
			data-bs-target="#modalOpenMaterial">
			<i class="bi bi-camera me-2"></i>
			Open Camera
		</button>
	</div>

</div>


<div class="modal fade"
	id="modalOpenMaterial"
	tabindex="-1"
	aria-hidden="true">

	<!-- <div class="modal-dialog modal-fullscreen-sm-down modal-lg modal-dialog-centered"> -->
	<!-- <div class="modal-dialog modal-fullscreen modal-dialog-centered m-0"> -->
	<div class="modal-dialog modal-dialog-centered">

		<div class="modal-content border-0 shadow">
			<div class="modal-header bg-success text-white">
				<h5 class="modal-title">

					<i class="bi bi-qr-code-scan"></i>

					QR Material Scanner

				</h5>

				<button type="button"
					class="btn-close btn-close-white"
					data-bs-dismiss="modal"></button>

			</div>

			<div class="modal-body">
				<div id="reader"></div>
				<div class="text-center mt-3">
					<small class="text-muted">
						Place QR Code inside the camera frame
					</small>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- MODAL DETAIL MATERIAL -->
<div class="modal fade"
	id="modalMaterialDetail"
	tabindex="-1"
	aria-hidden="true">

	<div class="modal-dialog modal-xl modal-dialog-centered">

		<div class="modal-content border-0 shadow">

			<div class="modal-header bg-dark text-white">

				<h5 class="modal-title">

					<i class="bi bi-box-seam"></i>

					Material Information

				</h5>

				<button type="button"
					class="btn-close btn-close-white"
					data-bs-dismiss="modal"></button>

			</div>

			<div class="modal-body">

				<div id="materialDetailContent">

					<div class="text-center py-5">

						<div class="spinner-border text-success"></div>

					</div>

				</div>

			</div>

		</div>

	</div>
</div>




<script>
	let html5QrCode = null;
	/*
	|------------------------------------------------------------------
	| OPEN MODAL
	|------------------------------------------------------------------
	*/
	$('#modalOpenMaterial').on('shown.bs.modal', function() {
		/*
		|------------------------------------------------------------------
		| INIT SCANNER
		|------------------------------------------------------------------
		*/
		html5QrCode = new Html5Qrcode("reader");

		/*
		|------------------------------------------------------------------
		| GET CAMERA
		|------------------------------------------------------------------
		*/
		Html5Qrcode.getCameras()

			.then(devices => {

				if (!devices || devices.length === 0) {

					Swal.fire({

						icon: 'error',
						title: 'Camera Not Found',
						text: 'No camera device detected'

					});

					return;
				}

				/*
				|------------------------------------------------------------------
				| DEFAULT CAMERA
				|------------------------------------------------------------------
				*/
				let cameraId = devices[0].id;

				/*
				|------------------------------------------------------------------
				| AUTO SELECT BACK CAMERA
				|------------------------------------------------------------------
				*/
				devices.forEach(device => {
					let label = device.label.toLowerCase();
					if (
						label.includes('back') ||
						label.includes('rear') ||
						label.includes('environment')
					) {
						cameraId = device.id;
					}
				});

				/*
				|------------------------------------------------------------------
				| START SCANNER
				|------------------------------------------------------------------
				*/
				html5QrCode.start(
						cameraId, {
							fps: 10,

							qrbox: {
								width: 250,
								height: 250
							},
							aspectRatio: 1.7778
						},
						onScanSuccess
					)

					.catch(err => {
						Swal.fire({
							icon: 'error',
							title: 'Camera Error',
							text: err
						});

					});

			})

			.catch(err => {
				Swal.fire({
					icon: 'error',
					title: 'Permission Denied',
					text: err

				});

			});

	});
	/*
	|------------------------------------------------------------------
	| CLOSE MODAL
	|------------------------------------------------------------------
	*/
	$('#modalOpenMaterial').on('hidden.bs.modal', function() {

		if (html5QrCode) {
			html5QrCode.stop()
				.then(() => {
					html5QrCode.clear();
				})
				.catch(err => {

					console.log(err);

				});
		}

	});
	/*
	|------------------------------------------------------------------
	| SUCCESS SCAN
	|------------------------------------------------------------------
	*/
	function onScanSuccess(decodedText) {
		/*
		|--------------------------------------------------------------------------
		| STOP CAMERA
		|--------------------------------------------------------------------------
		*/

		html5QrCode.stop();
		$('#modalOpenMaterial').modal('hide');
		/*
		|--------------------------------------------------------------------------
		| GET DETAIL MATERIAL
		|--------------------------------------------------------------------------
		*/

		$.ajax({

			url: base + 'Material/getMaterialDetail',
			type: 'POST',

			data: {
				material_code: decodedText
			},
			dataType: 'json',

			success: function(res) {

				/*
				|--------------------------------------------------------------------------
				| MATERIAL FOUND
				|--------------------------------------------------------------------------
				*/
				if (res.status == 'success') {

					/*
					|--------------------------------------------------------------------------
					| SWEET ALERT SUCCESS
					|--------------------------------------------------------------------------
					*/

					Swal.fire({

						icon: 'success',

						title: 'QR Detected',

						text: 'Material Found Successfully',

						timer: 1200,

						showConfirmButton: false

					});

					/*
					|--------------------------------------------------------------------------
					| OPEN DETAIL MODAL
					|--------------------------------------------------------------------------
					*/

					setTimeout(() => {

						renderMaterialDetail(res);

						$('#modalMaterialDetail').modal('show');

					}, 1200);

				}

				/*
				|--------------------------------------------------------------------------
				| NOT FOUND
				|--------------------------------------------------------------------------
				*/
				else {

					Swal.fire({
						icon: 'error',
						title: 'QR Not Registered',
						text: res.message

					});
				}
			},

			error: function() {

				Swal.fire({
					icon: 'error',
					title: 'Server Error',
					text: 'Failed connect to server'

				});
			}
		});
	}


	function renderMaterialDetail(res) {

		let m = res.material;
		let images = res.images || [];

		/*
		|--------------------------------------------------------------------------
		| BADGE LIFECYCLE
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

			default:
				badgeClass = 'secondary';
				break;
		}

		/*
		|--------------------------------------------------------------------------
		| MAIN IMAGE
		|--------------------------------------------------------------------------
		*/

		let mainImage = base + 'assets/images/no-image.png';

		if (images.length > 0) {
			mainImage = images[0].url;
		}

		/*
		|--------------------------------------------------------------------------
		| MAIN PREVIEW
		|--------------------------------------------------------------------------
		*/

		let imageMain = `

	<div class="main-image-wrapper position-relative overflow-hidden rounded-4">

		<img
			id="mainPreviewImage"
			src="${mainImage}"
			class="main-preview-image">

		<a href="${mainImage}"
			target="_blank"
			class="btn btn-light shadow-sm preview-download-btn">

			<i class="bi bi-download"></i>

		</a>
	</div>
	`;

		/*
		|--------------------------------------------------------------------------
		| THUMBNAILS
		|--------------------------------------------------------------------------
		*/
		let thumbs = '';
		images.forEach((img, index) => {
			thumbs += `

		<div class="thumb-item ${index == 0 ? 'active-thumb' : ''}">
			<img
				src="${img.url}"
				class="thumb-preview"
				data-image="${img.url}">
		</div>

		`;
		});

		/*
		|--------------------------------------------------------------------------
		| GLB PREVIEW
		|--------------------------------------------------------------------------
		*/

		let glbPreview = '';

		if (m.glb_file) {

			glbPreview = `

	<div class="card border-0 shadow-sm mt-4 rounded-4 overflow-hidden">

		<div class="card-header bg-dark text-white py-3">

			<i class="bi bi-badge-3d"></i>
			3D Preview

		</div>

		<div class="card-body p-2">

			<div class="glb-viewer-wrapper">

				<model-viewer

					src="${base}uploads/material_assets/glb/${m.glb_file}"

					camera-controls
					auto-rotate
					shadow-intensity="1"

					touch-action="pan-y"

					ar>

				</model-viewer>

			</div>

		</div>

	</div>
	`;
		}

		/*
		|--------------------------------------------------------------------------
		| FILE BUTTONS
		|--------------------------------------------------------------------------
		*/

		let glbBtn = '-';

		if (m.glb_file) {

			glbBtn = `
			<a href="${base}uploads/material_assets/glb/${m.glb_file}"
				target="_blank"
				class="btn btn-primary rounded-pill px-4">

				<i class="bi bi-badge-3d"></i>
				GLB File

			</a>
		`;
		}

		let blendBtn = '-';

		if (m.blender_material_file) {

			blendBtn = `
			<a href="${base}uploads/material_assets/blender_material/${m.blender_material_file}"
				target="_blank"
				class="btn btn-dark rounded-pill px-4">

				<i class="bi bi-box"></i>
				Blend File

			</a>
		`;
		}

		let u3mBtn = '-';

		if (m.u3m_file) {

			u3mBtn = `
			<a href="${base}uploads/material_assets/u3m/${m.u3m_file}"
				target="_blank"
				class="btn btn-success rounded-pill px-4">

				<i class="bi bi-download"></i>
				U3M File

			</a>
		`;
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

				<div class="card border-0 shadow-sm rounded-4 h-100">

					<div class="card-body">

						${imageMain}

						<div class="d-flex flex-wrap gap-2 mt-3">

							${thumbs}

						</div>

						${glbPreview}

					</div>

				</div>

			</div>

			<!-- RIGHT -->
			<div class="col-lg-7">

				<div class="card border-0 shadow-sm rounded-4 h-100">

					<div class="card-body">

						<!-- HEADER -->
						<div class="mb-4">

							<h2 class="fw-bold mb-1">

								${m.material_name ?? '-'}

							</h2>

							<div class="text-muted">

								${m.material_code ?? '-'}

							</div>

						</div>

						<!-- TABLE -->
						<div class="table-responsive">

							<table class="table table-borderless align-middle material-detail-table">

								<tbody>

									<tr>
										<th>Material Name</th>
										<td>${m.material_name ?? '-'}</td>
									</tr>

									<tr>
										<th>MLM ID</th>
										<td>${m.mlm_ref_no ?? '-'}</td>
									</tr>

									<tr>
										<th>Supplier Name</th>
										<td>${m.supplier_name ?? '-'}</td>
									</tr>

									<tr>
										<th>Library Code</th>
										<td>${m.library_code ?? '-'}</td>
									</tr>

									<tr>
										<th>Price</th>
										<td>$ ${m.standard_price ?? '-'}</td>
									</tr>

									<tr>
										<th>Weight</th>
										<td>${m.weight ?? '-'} ${m.uom_name ?? ''}</td>
									</tr>

									<tr>
										<th>Width</th>
										<td>${m.width ?? '-'}</td>
									</tr>

									<tr>
										<th>Thickness</th>
										<td>${m.thickness ?? '-'} mm</td>
									</tr>

									<tr>
										<th>First Season</th>
										<td>
											${m.season_name ?? '-'}
											${m.season_year ?? ''}
										</td>
									</tr>

									<tr>
										<th>Sample Leadtime</th>
										<td>${m.sample_leadtime ?? '-'}</td>
									</tr>

									<tr>
										<th>Production Leadtime</th>
										<td>${m.production_leadtime ?? '-'}</td>
									</tr>

									<tr>
										<th>Lifecycle State</th>

										<td>

											<span class="badge bg-${badgeClass} px-3 py-2">

												${m.lifecycle_name ?? '-'}

											</span>

										</td>

									</tr>

									<tr>
										<th>Composition</th>
										<td>${m.composition ?? '-'}</td>
									</tr>

									<tr>
										<th>Construction</th>
										<td>${m.construction ?? '-'}</td>
									</tr>

									<tr>
										<th>Technology</th>
										<td>${m.technology ?? '-'}</td>
									</tr>

									<tr>
										<th>Model Numbers</th>
										<td>${m.model_numbers ?? '-'}</td>
									</tr>

									<tr>
										<th>Supplier Remarks</th>
										<td>${m.supplier_remarks ?? '-'}</td>
									</tr>

								</tbody>

							</table>

						</div>

						<hr>

						<h5 class="fw-bold mb-3">

							3D Files

						</h5>

						<div class="d-flex flex-wrap gap-2">
							${glbBtn}
							${blendBtn}
							${u3mBtn}
						</div>

					</div>

				</div>

			</div>

		</div>

	</div>
	`;
		/*
		|--------------------------------------------------------------------------
		| RENDER
		|--------------------------------------------------------------------------
		*/
		$('#materialDetailContent').html(html);
		/*
		|--------------------------------------------------------------------------
		| THUMBNAIL CLICK
		|--------------------------------------------------------------------------
		*/
		$('.thumb-preview').on('click', function() {
			let image = $(this).data('image');
			$('#mainPreviewImage').attr('src', image);
			$('.thumb-item').removeClass('active-thumb');
			$(this).parent().addClass('active-thumb');
		});
	}
</script>
