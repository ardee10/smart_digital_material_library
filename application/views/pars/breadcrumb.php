<?php
$title = $title ?? 'Title';
?>
<div class="container-fluid">
	<!--begin::Row-->
	<div class="row">
		<div class="col-sm-12">
			<h1 class="display-6 fw-bold mb-0 text-center text-uppercase">
				<?= $title; ?>
			</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<ol class="breadcrumb float-sm-end">
				<?php if (!empty($breadcrumb)) : ?>
					<?php foreach ($breadcrumb as $key => $value) : ?>

						<?php if ($key == count($breadcrumb) - 1) : ?>
							<!-- ACTIVE (terakhir) -->
							<li class="breadcrumb-item active" aria-current="page">
								<?= $value; ?>
							</li>
						<?php else : ?>
							<!-- LINK -->
							<li class="breadcrumb-item">
								<a href="<?= base_url(strtolower(str_replace(' ', '', $value))); ?>">
									<?= $value; ?>
								</a>
							</li>
						<?php endif; ?>
					<?php endforeach; ?>
				<?php endif; ?>
			</ol>
		</div>
	</div>
	<!--end::Row-->
</div>
