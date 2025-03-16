<div class="d-flex align-items-center justify-content-center min-vh-100">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-5 mb-4">
				<form
					class="bg-light bg-opacity-75 border border-secondary border-opacity-50 rounded-3 shadow-sm p-4"
					action="<?= base_url('index.php/create_account') ?>"
					method="POST">
					<h2 class="mb-3">Register</h2>

					<?php if ($this->session->flashdata('success')): ?>
						<div class="alert alert-success"> <?= $this->session->flashdata('success') ?> </div>
					<?php endif; ?>

					<?php if ($this->session->flashdata('error')): ?>
						<div class="alert alert-danger"> <?= $this->session->flashdata('error') ?> </div>
					<?php endif; ?>

					<div class="mb-3">
						<label for="registerUsername" class="form-label">Username</label>
						<input type="text" class="form-control" id="registerUsername" name="username" value="<?= isset($_POST['username']) ? htmlspecialchars($_POST['username'], ENT_QUOTES) : ''; ?>">
					</div>
					<div class="mb-3">
						<label for="registerPassword" class="form-label">Password</label>
						<input type="password" class="form-control" id="registerPassword" name="password">
					</div>
					<button type="submit" class="btn btn-success w-100">Register</button>
				</form>
			</div>

			<div class="col-md-5">
				<form class="bg-light bg-opacity-75 border border-secondary border-opacity-50 rounded-3 shadow-sm p-4">
					<h2 class="mb-3">Login</h2>
					<div class="mb-3">
						<label for="loginUsername" class="form-label">Username</label>
						<input type="text" class="form-control" id="loginUsername" name="username">
					</div>
					<div class="mb-3">
						<label for="loginPassword" class="form-label">Password</label>
						<input type="password" class="form-control" id="loginPassword" name="password">
					</div>
					<button type="submit" class="btn btn-primary w-100">Login</button>
				</form>
			</div>
		</div>
	</div>
</div>
