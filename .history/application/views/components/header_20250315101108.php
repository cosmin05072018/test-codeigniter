<nav class="navbar navbar-expand-lg">
	<div class="container-fluid">
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse d-lg-flex justify-content-center align-items-center" id="navbarSupportedContent">
			<ul class="navbar-nav mb-2 mb-lg-0">
				<li class="nav-item">
					<a class="nav-link" aria-current="page" href="">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" aria-current="page" href="">Users</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" aria-current="page" href="">Manage Products</a>
				</li>
				<?php if ($this->session->userdata('logged_in')): ?>
					<li class="nav-item text-white">
						<a class="nav-link btn btn-danger text-white" href="">Logout</a>
					</li>
				<?php endif; ?>
			</ul>
		</div>
	</div>
</nav>
