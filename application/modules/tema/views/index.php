<!doctype html>
<html lang="en">
<!--begin::Head-->

<!-- Start Header  -->

<?php $this->load->view('pars/header'); ?>

<!-- End Header -->

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
	<!--begin::App Wrapper-->
	<div class="app-wrapper">
		<!--begin::Header-->

		<!--end::Header-->
		<main class="app-main">
			<?php $this->load->view('pars/navbar'); ?>
			<!--begin::App Content Header-->
			<div class="app-content-header">
				<!--begin::Container-->
				<?php $this->load->view('pars/breadcrumb'); ?>
				<!--end::Container-->
			</div>
			<div class="app-content">
				<!--begin::Container-->
				<?php $this->load->view('pars/main') ?>
				<!--end::Container-->
			</div>
			<!--end::App Content-->
		</main>
		<!--end::App Main-->
		<!--begin::Footer-->
		<?php $this->load->view('pars/footer'); ?>
		<!--end::Footer-->
	</div>

	<?php $this->load->view('pars/script'); ?>
</body>
<!--end::Body-->

</html>
