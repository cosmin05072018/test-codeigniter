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
						<?php if ($permissions && isset($permissions[1]) || isset($permissions[2])) : ?>
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
							<?php if (!empty($permissions)) : ?>
								<td>
									<?php if (isset($permissions[1])) : ?>
										<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal-<?= $product->id ?>">
											Edit
										</button>
										<!-- Modal -->
										<div class="modal fade" id="modal-<?= $product->id ?>" tabindex="-1" aria-labelledby="modalLabel-<?= $product->id ?>" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<div class="modal-body">
														<form method="post" action="<?= base_url('index.php/dashboard-edit-product'); ?>">
															<input type="hidden" name="id" value="<?php echo isset($product->id) ? $product->id : ''; ?>">
															<div class="mb-3">
																<label for="productName" class="form-label">Product Name</label>
																<input type="text" class="form-control" id="productName" name="name" value="<?php echo isset($product->name) ? $product->name : ''; ?>" required>
															</div>
															<div class="mb-3">
																<label for="productDescription" class="form-label">Product Description</label>
																<textarea class="form-control" id="productDescription" name="description" rows="3" required><?php echo isset($product->description) ? $product->description : ''; ?></textarea>
															</div>
															<div class="mb-3">
																<label for="productPrice" class="form-label">Product Price (RON)</label>
																<input type="number" class="form-control" id="productPrice" name="price" value="<?php echo isset($product->price) ? $product->price : ''; ?>" required>
															</div>
															<button type="submit" class="btn btn-primary">Save Changes</button>
														</form>
													</div>
												</div>
											</div>
										</div>
									<?php endif; ?>
									<?php if (isset($permissions[2])) : ?>
										<button type="button" class="btn btn-danger">Delete</button>
									<?php endif; ?>
								</td>
							<?php endif; ?>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>

		<?php if (!empty($permissions) && isset($permissions[0])) : ?>
			<?php foreach ($permissions as $permission): ?>
				<?php	echo $permission['id'] ?>
			<?php endforeach; ?>
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

<?php if ($this->session->flashdata('add-product-success')): ?>
	<div class="toast-container position-fixed bottom-0 end-0 p-3">
		<div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
			<div class="toast-header">
				<strong class="me-auto">Notification</strong>
				<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
			</div>
			<div class="toast-body">
				The product was successfully added
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

<?php if ($this->session->flashdata('success-edit')): ?>
	<div class="toast-container position-fixed bottom-0 end-0 p-3">
		<div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
			<div class="toast-header">
				<strong class="me-auto">Notification</strong>
				<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
			</div>
			<div class="toast-body">
			The product has been updated successfully!
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


		$('#editModal').on('show.bs.modal', function(event) {
			var button = $(event.relatedTarget); // Butonul care a declanșat modalul
			var name = button.data('name'); // Extrage valorile
			var description = button.data('description');
			var price = button.data('price');
			var productId = button.data('product-id');

			// Setează valorile în inputuri
			var modal = $(this);
			modal.find('#productName').val(name);
			modal.find('#productDescription').val(description);
			modal.find('#productPrice').val(price);
			modal.find('#productId').val(productId);
		});
	});
</script>
