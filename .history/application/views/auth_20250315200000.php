<div class="d-flex align-items-center justify-content-center min-vh-100">
	<div class="container">
		<div class="row justify-content-center">
			<?php if ($this->session->userdata('is_logged_in')): ?>
				<div class="alert alert-success">
					<p>You are already logged in. <a href="<?php echo base_url('index.php/dashboard'); ?>">Go to Dashboard</a></p>
				</div>
			<?php endif; ?>

			<div class="col-md-5 mb-4">
				<form
					class="bg-light bg-opacity-75 border border-secondary border-opacity-50 rounded-3 shadow-sm p-4"
					action="<?= base_url('index.php/create_account') ?>"
					method="POST">
					<h2 class="mb-3">Register</h2>
					<?php if ($this->session->flashdata('successRegister')): ?>
						<div class="alert alert-success"> <?= $this->session->flashdata('successRegister') ?> </div>
					<?php endif; ?>

					<?php if ($this->session->flashdata('errorRegister')): ?>
						<div class="alert alert-danger"> <?= $this->session->flashdata('errorRegister') ?> </div>
					<?php endif; ?>

					<div class="mb-3">
						<label for="registerUsername" class="form-label">Username</label>
						<input type="text" class="form-control" id="registerUsername" name="username">
					</div>
					<div class="mb-3">
						<label for="registerPassword" class="form-label">Password</label>
						<input type="password" class="form-control" id="registerPassword" name="password">
					</div>
					<button type="submit" class="btn btn-success w-100">Register</button>
				</form>
			</div>

			<div class="col-md-5">
				<form
					class="bg-light bg-opacity-75 border border-secondary border-opacity-50 rounded-3 shadow-sm p-4"
					action="<?= base_url('index.php/login') ?>"
					method="POST">
					<h2 class="mb-3">Login</h2>
					<?php if ($this->session->flashdata('errorLogin')): ?>
						<div class="alert alert-danger">
							<?= $this->session->flashdata('errorLogin'); ?>
						</div>
					<?php endif; ?>
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
