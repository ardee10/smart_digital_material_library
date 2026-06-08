<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?= SITENAME; ?></title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
	<meta name="color-scheme" content="light dark" />
	<meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)" />
	<meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />
	<meta name="title" content="AdminLTE | Dashboard v2" />
	<meta name="author" content="ColorlibHQ" />
	<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets') ?>/images/PWJ.PNG">
	<meta
		name="description"
		content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS. Fully accessible with WCAG 2.1 AA compliance." />
	<meta
		name="keywords"
		content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard, accessible admin panel, WCAG compliant" />

	<meta name="supported-color-schemes" content="light dark" />
	<link rel="preload" href="<?php echo base_url('assets/themes/dist') ?>/css/adminlte.css" as="style" />

	<!-- <link
		rel="stylesheet"
		href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
		integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
		crossorigin="anonymous"
		media="print"
		onload="this.media = 'all'" /> -->

	<link
		rel="stylesheet"
		href="<?php echo base_url('assets/') ?>css/overlayscrollbars.min.css"
		crossorigin="anonymous" />

	<link
		rel="stylesheet"
		href="<?php echo base_url('assets/') ?>css/bootstrap-icons.min.css"
		crossorigin="anonymous" />

	<link rel="stylesheet" href="<?php echo base_url('assets/themes/dist') ?>/css/adminlte.css" />

	<link
		rel="stylesheet"
		href="<?php echo base_url('assets/') ?>css/apexcharts.css"
		integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0="
		crossorigin="anonymous" />

	<!-- CustomeCss -->
	<script src="<?= base_url('assets/') ?>js/jquery-4.0.0.js"></script>

	<link rel="stylesheet" href="<?= base_url('assets/'); ?>css/mycss.css" />
	<!-- Sweet Alert -->
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>css/sweetalert2.min.css" />

	<!-- Select2 -->
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>css/select2.min.css" />
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>css/select2-bootstrap-5-theme.min.css" />


	<!-- Site url -->
	<div id="base" data-id="<?= site_url('') ?>"></div>

	<!-- Bootstrap Icon -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

	<!-- DataTables -->
	<link rel="stylesheet" href="<?= base_url('assets/plugin/dataTables/css/dataTables.bootstrap5.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/plugin/dataTables/css/responsive.bootstrap5.min.css') ?>">

	<!-- 3D GLB Preview -->
	<script type="module"
		src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js">
	</script>

	<!-- HTML 5 QR Code -->

	<script src="https://unpkg.com/html5-qrcode"></script>
	<script src="<?= base_url('assets/') ?>js/select2.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
</head>