<div class="container mt-5">
	<div class="row mb-4">
		<!-- Heading on the left -->
		<div class="col d-flex align-items-center">
			<h2 class="mb-0">Products List</h2>
		</div>
	</div>
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

		<button type="submit" class="btn btn-primary">Add Product</button>
	</form>
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
	document.addEventListener('DOMContentLoaded', function() {
		var toastElList = document.querySelectorAll('.toast');
		toastElList.forEach(function(toastEl) {
			new bootstrap.Toast(toastEl).show();
		});
	});
</script>
