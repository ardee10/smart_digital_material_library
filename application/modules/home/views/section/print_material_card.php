<!DOCTYPE html>
<html>

<head>

	<title>
		Print Material Card
	</title>

	<link href="<?= base_url('assets/css/bootstrap.min.css') ?>"
		rel="stylesheet">

	<style>
		body {

			background: #fff;
			padding: 10px;

		}

		.card-wrapper {

			display: flex;
			flex-wrap: wrap;
			gap: 10px;

		}

		.material-card {

			width: 6.5cm;
			height: 3.5cm;

			border: 1px solid #000;

			padding: 5px;

			font-size: 9px;

			position: relative;

			overflow: hidden;

			page-break-inside: avoid;

		}

		.material-image {

			width: 100%;
			height: 80px;

			object-fit: cover;

			border: 1px solid #ddd;

		}

		.material-title {

			font-size: 10px;
			font-weight: bold;

			line-height: 1.2;

			height: 24px;

			overflow: hidden;

		}

		.qr {

			position: absolute;

			right: 5px;
			bottom: 5px;

			width: 55px;
		}

		@media print {

			body {

				margin: 0;

			}

		}
	</style>

</head>

<body onload="window.print()">

	<div class="card-wrapper">

		<?php foreach ($materials as $m): ?>

			<?php

			$image =
				base_url(
					'assets/images/No_Image_Available.jpg'
				);

			if (!empty($m->image_file)) {

				$image =
					base_url(
						'uploads/material_assets/images/' .
							$m->image_file
					);
			}

			$qr = '';

			if (!empty($m->qr_code_file)) {

				$qr =
					base_url(
						'uploads/qrcode/' .
							$m->qr_code_file
					);
			}

			?>

			<div class="material-card">

				<img src="<?= $image ?>"
					class="material-image">

				<div class="mt-1">

					<div class="material-title">
						<?= $m->material_name ?>
					</div>

					<div>
						<?= $m->material_code ?>
					</div>

					<div>
						<?= $m->supplier_name ?>
					</div>

					<div>
						<?= $m->material_type_name ?>
					</div>

				</div>

				<?php if ($qr): ?>

					<img src="<?= $qr ?>"
						class="qr">

				<?php endif; ?>

			</div>

		<?php endforeach; ?>

	</div>

</body>

</html>
