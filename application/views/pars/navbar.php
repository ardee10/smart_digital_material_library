<?php
$active = $active ?? '';

?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom border-dark">
	<!--begin::Container-->
	<div class=" container-fluid">
		<!-- Logo -->
		<a href="<?= base_url('dashboard'); ?>" class="navbar-brand d-flex align-items-center me-3">
			<img src="<?= base_url('assets'); ?>/images/5.jpeg" alt="Logo" class="img-fluid border-3 opacity-100 shadow" style="max-width: 220px; height: auto; border: 2px solid white;">
		</a>

		<!-- Toggle Button untuk Mobile -->
		<button class="navbar-toggler border-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<!-- Menu Items -->
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav">
				<?php if ($users->level == 'administrator') : ?>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<i class="bi bi-journals text-white"></i> Material Library
						</a>
						<ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown1">
							<li><a href="<?= base_url('materialsassets'); ?>" class="dropdown-item <?= ($active == 'assets') ? 'active' : ''; ?>"><i class="bi bi-folder2 text-white"></i> Material Assets</a></li>
							<li>
								<hr class="dropdown-divider">
							</li>
							<li><a href="<?= base_url('modelassets'); ?>" class="dropdown-item <?= ($active == 'modelassets') ? 'active' : ''; ?>"><i class="bi bi-box-fill text-white"></i></i> Model Assets</a></li>
							<li>
								<hr class="dropdown-divider">
							</li>
							<li><a href="<?= base_url('card'); ?>" class="dropdown-item <?= ($active == 'material_card') ? 'active' : ''; ?>"><i class="bi bi-card-heading text-white"></i></i> Card</a></li>
							<li>
						</ul>
					</li>

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<i class="bi bi-database text-white"></i> Master Data
						</a>
						<ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown2">
							<li><a href="<?= base_url('supplier'); ?>" class="dropdown-item <?= ($active == 'supplier') ? 'active' : ''; ?>"> <i class="bi bi-truck text-white"></i> Supplier</a></li>
							<li>
								<hr class="dropdown-divider">
							</li>
							<li><a href="<?= base_url('location'); ?>" class="dropdown-item <?= ($active == 'location') ? 'active' : ''; ?>"> <i class="bi bi-geo-alt text-white"></i> Location</a></li>
							<li>
								<hr class="dropdown-divider">
							</li>
							<li><a href="<?= base_url('modelnumber'); ?>"
									class="dropdown-item <?= ($active == 'modelNumber') ? 'active' : ''; ?>">
									<i class="bi bi-file-earmark-binary-fill text-white"></i>
									Model Number
								</a>
							</li>
							<hr class="dropdown-divider">
							<li><a href="<?= base_url('classfication'); ?>"
									class="dropdown-item <?= ($active == 'classfication') ? 'active' : ''; ?>">
									<i class="bi bi-distribute-horizontal text-white"></i>
									Classification
								</a>
							</li>
						</ul>
					</li>

				<?php endif; ?>

				<?php if ($users->level == 'users') : ?>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<i class="bi bi-journals text-white"></i> Material Library
						</a>
						<ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown1">
							<li><a href="<?= base_url('materialsassets'); ?>" class="dropdown-item <?= ($active == 'assets') ? 'active' : ''; ?>"><i class="bi bi-folder2 text-white"></i> Material Assets</a></li>
							<li>
								<hr class="dropdown-divider">
							</li>
							<li><a href="<?= base_url('modelassets'); ?>" class="dropdown-item <?= ($active == 'modelassets') ? 'active' : ''; ?>"><i class="bi bi-box-fill text-white"></i></i> Model Assets</a></li>
							<li>
								<hr class="dropdown-divider">
							</li>
							<li><a href="<?= base_url('card'); ?>" class="dropdown-item <?= ($active == 'material_card') ? 'active' : ''; ?>"><i class="bi bi-card-heading text-white"></i></i> Card</a></li>
							<li>
						</ul>
					</li>


				<?php endif; ?>


			</ul>
		</div>
		<ul class="navbar-nav ms-auto">
			<li class="nav-item dropdown user-menu">
				<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
					<img
						src="<?= base_url('assets/themes/dist') ?>/assets/img/avatar5.png"
						class="user-image rounded-circle shadow"
						alt="User Image" />
					<span class="d-none d-md-inline text-white"><?= $this->session->userdata('nama_lengkap'); ?></span>
				</a>
				<ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
					<!--begin::User Image-->
					<!-- <li class="user-header text-bg-primary">
						<img
							src="<?= base_url('assets/themes/dist') ?>/assets/img/avatar5.png"
							class="rounded-circle shadow"
							alt="User Image" />
						<p> <?= $this->session->userdata('nama_lengkap'); ?></p>
					</li> -->
					<!--end::User Image-->
					<li class="user-footer">

						<a href="<?php echo base_url('Auth/logout'); ?>" class="btn btn-outline-danger float-end">Sign out</a>
					</li>
					<!--end::Menu Footer-->
				</ul>
			</li>
			<!--end::User Menu Dropdown-->
		</ul>
		<!--end::End Navbar Links-->
	</div>
	<!--end::Container-->
</nav>
