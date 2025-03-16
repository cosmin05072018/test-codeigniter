<div class="container mt-5">
	<div class="row mb-4">
		<div class="col-12 col-md-8 d-flex flex-column gap-5">
			<h2 class="mb-0">Products List</h2>
			<table class="table">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Name</th>
						<th scope="col">Description</th>
						<th scope="col">Price</th>
						<?php if ($permissions ) :?>
							<th scope="col">Action</th>
						<?php endif; ?>
					</tr>
				</thead>
				<tbody>
					<?php $counter = 1; ?>
					<?php foreach ($products as $product): ?>
						<tr>
							<th scope="row"><?php echo $counter++; ?></th>
							<td><?php echo $product->name; ?></td>
							<td><?php echo $product->description; ?></td>
							<td><?php echo $product->price; ?> RON</td>
							<?php if ($permissions) :?>
								<td>Edit</td>
							<?php endif; ?>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>

		<?php if ($permissions ) :?>
			<div class="col-12 col-md-4 border border-1 py-2">
				<h2 class="mb-0">Add Product</h2>
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
		<?php endif; ?>
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
	document.addEventListener('DOMContentLoaded', function() {
		var toastElList = document.querySelectorAll('.toast');
		toastElList.forEach(function(toastEl) {
			new bootstrap.Toast(toastEl).show();
		});
	});
</script>
