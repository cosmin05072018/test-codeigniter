<nav class="navbar navbar-expand-lg">
	<div class="container">
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse d-lg-flex justify-content-between align-items-center" id="navbarSupportedContent">
			<ul class="navbar-nav mb-2 mb-lg-0 d-flex justify-content-center mx-auto">
				<li class="nav-item mx-2">
					<a class="nav-link text-white <?= ($this->uri->segment(1) == 'dashboard') ? 'active' : '' ?>" aria-current="page" href="<?= base_url('dashboard') ?>">Home</a>
				</li>
				<li class="nav-item mx-2">
					<a class="nav-link text-white" aria-current="page" href="">Users</a>
				</li>
				<li class="nav-item mx-2">
					<a class="nav-link text-white" aria-current="page" href="">Manage Products</a>
				</li>
			</ul>
			<ul class="navbar-nav mb-2 mb-lg-0 d-flex align-items-center gap-4">
				<li class="nav-item text-white">
					<p class="mb-0">Hello, <?php echo $this->session->userdata('username'); ?></p>
				</li>
				<li class="nav-item mx-2">
					<a class="nav-link btn btn-danger text-white" href="<?= base_url('index.php/logout') ?>">Logout</a>
				</li>
			</ul>
		</div>
	</div>
</nav>
