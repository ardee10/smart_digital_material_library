<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="UTF-8">

	<meta name="viewport"
		content="width=device-width, initial-scale=1.0">

	<title><?= SITENAME; ?></title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
	<meta name="color-scheme" content="light dark" />
	<meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)" />
	<meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />
	<meta name="title" content="AdminLTE | Dashboard v2" />
	<meta name="author" content="ColorlibHQ" />
	<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets') ?>/images/PWJ.PNG">

	<!-- CustomeCss -->
	<script src="<?= base_url('assets/') ?>js/jquery-4.0.0.js"></script>

	<!-- BOOTSTRAP -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> -->



	<!-- BOOTSTRAP ICON -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

	<!-- CSS -->
	<link rel="stylesheet" href="<?= base_url('assets/login/css/login.css') ?>">

	<!-- Custom Css -->
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>css/mycss.css" />

</head>

<div>

	<!-- Session Alert -->

	<div class="row">
		<?php if ($this->session->flashdata('message')): ?>
			<div class="flash-data" data-flashdata='<?= is_string($this->session->flashdata('message')) ? $this->session->flashdata('message') : json_encode($this->session->flashdata('message')) ?>'></div>
		<?php endif; ?>
	</div>


	<div class="login-wrapper">

		<!-- OVERLAY -->
		<div class="overlay"></div>

		<!-- CONTENT -->
		<div class="login-content">

			<!-- TITLE -->
			<h1 class="main-title">
				SMART DIGITAL MATERIAL LIBRARY
			</h1>

			<!-- LOGIN CARD -->
			<div class="login-box">

				<h5 class="login-title">
					USER LOGIN
				</h5>

				<form id="formLogin"
					method="POST"
					action="<?= base_url('Auth/loginCheck') ?>">

					<!-- USERNAME -->
					<div class="mb-3">
						<input type="text"
							name="username"
							class="form-control login-input"
							placeholder="Username"
							required>
					</div>
					<!-- PASSWORD -->
					<div class="mb-4 position-relative">
						<input type="password"
							name="password"
							id="password"
							class="form-control login-input"
							placeholder="Password"
							required>

						<button type="button"
							class="toggle-password"
							id="togglePassword">
							<i class="bi bi-eye"></i>
						</button>

					</div>

					<!-- BUTTON -->
					<button type="submit"
						class="btn login-btn w-100">
						LOGIN
					</button>
				</form>

				<!-- VISITOR LINK -->
				<div class="text-center mt-3">
					<a href="<?= base_url('Auth/visitor'); ?>"
						class="visitor-link">

						<i class="bi bi-person"></i>
						Continue as Visitor

					</a>



				</div>

				<!-- LOGO -->
				<div class="footer-logo">
					<img src="<?= base_url('assets/images/5.jpeg') ?>">
				</div>

			</div>

			<!-- FOOTER -->
			<footer class="app-footer text-center text-white py-3">

				<?= FOOTER; ?> |
				<?= DEV; ?> |
				<?= TEMA; ?>

			</footer>


		</div>

	</div>
</div>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

<script src="<?= base_url('assets/login/js/login.js') ?>"></script>

<!-- SweetAlert -->
<script src="<?= base_url('assets/') ?>js/sweetalert2@11.js"></script>

</body>

</html>
