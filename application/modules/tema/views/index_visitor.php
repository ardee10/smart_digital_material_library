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

		<!-- Navbar does not use -->
		<?php $this->load->view('pars/navbar_visitor'); ?>
		<!--begin::Sidebar-->
		<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
			<!--begin::Sidebar Brand-->
			<?php $this->load->view('pars/brand'); ?>
			<!--end::Sidebar Brand-->
			<!--begin::Sidebar Wrapper-->
			<!--begin::Sidebar Menu-->
			<?php $this->load->view('pars/sidebar'); ?>

			<!--end::Sidebar Menu-->

			<!--end::Sidebar Wrapper-->
		</aside>
		<!--end::Sidebar-->
		<!--begin::App Main-->
		<main class="app-main">
			<!--begin::App Content Header-->
			<div class="app-content-header">
				<!--begin::Container-->
				<?php $this->load->view('pars/breadcrumb'); ?>
				<!--end::Container-->
			</div>
			<div class="app-content">
				<!--begin::Container-->
				<?php $this->load->view('pars/main'); ?>
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
