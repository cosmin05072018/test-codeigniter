<div class="container mt-5">
	<div class="row mb-4">
		<!-- Heading on the left -->
		<div class="col d-flex align-items-center">
			<h2 class="mb-0">Products List</h2>
		</div>

		<!-- Button on the right -->
		<div class="col text-end">
			<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
				Add Product
			</button>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="exampleModalLabel">Add Product</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="closeModalButton"></button>
				</div>
				<div class="modal-body">
					<!-- Display session flash messages for success or error -->
					<?php if ($this->session->flashdata('success')): ?>
						<div class="alert alert-success">
							<?= $this->session->flashdata('success'); ?>
						</div>
					<?php endif; ?>

					<?php if ($this->session->flashdata('error')): ?>
						<div class="alert alert-danger">
							<?= $this->session->flashdata('error'); ?>
						</div>
					<?php endif; ?>

					<!-- Display validation errors -->
					<?= validation_errors('<div class="alert alert-danger">', '</div>'); ?>

					<!-- Product Add Form -->
					<form method="post" action="<?= base_url('index.php/dashboard-add-product'); ?>">
						<div class="mb-3">
							<label for="name" class="form-label">Name</label>
							<input type="text" class="form-control" id="name" name="name" value="<?= set_value('name'); ?>">
						</div>

						<div class="mb-3">
							<label for="description" class="form-label">Description</label>
							<input type="text" class="form-control" id="description" name="description" value="<?= set_value('description'); ?>">
						</div>

						<div class="mb-3">
							<label for="price" class="form-label">Price</label>
							<input type="number" class="form-control" id="price" name="price" value="<?= set_value('price'); ?>">
						</div>

						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


<?php if ($this->session->flashdata('success')): ?>
	<div class="toast-container position-fixed bottom-0 end-0 p-3">
		<div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
			<div class="toast-header">
				<strong class="me-auto">Notification</strong>
				<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
			</div>
			<div class="toast-body">
				You set permision with succes!
			</div>
		</div>
	</div>
<?php endif; ?>

<?php if ($this->session->flashdata('remove')): ?>
	<div class="toast-container position-fixed bottom-0 end-0 p-3">
		<div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
			<div class="toast-header">
				<strong class="me-auto">Notification</strong>
				<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
			</div>
			<div class="toast-body">
				You remove all permisions with succes!
			</div>
		</div>
	</div>
<?php endif; ?>

<script>
	<?php if (validation_errors() || $this->session->flashdata('error')): ?>
		var modal = new bootstrap.Modal(document.getElementById('exampleModal'), {
			keyboard: false
		});
		modal.show();

		document.getElementById('closeModalButton').setAttribute('data-bs-dismiss', '');
	<?php endif; ?>
	document.addEventListener('DOMContentLoaded', function() {
		var toastElList = document.querySelectorAll('.toast');
		toastElList.forEach(function(toastEl) {
			new bootstrap.Toast(toastEl).show();
		});
	});
</script>
