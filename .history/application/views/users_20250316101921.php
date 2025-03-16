<div class="container mt-5">
	<h2 class="mb-4">User List</h2>

	<!-- Table to display users -->
	<table class="table table-striped">
		<thead>
			<tr>
				<th scope="col">ID</th>
				<th scope="col">Username</th>
				<?php if ($logged_in_user->role_id == 1): ?>
					<th scope="col">Actions</th>
				<?php endif; ?>
			</tr>
		</thead>
		<tbody>
			<?php $counter = 1; ?>
			<?php foreach ($users as $user): ?>
				<tr>
					<td><?php echo $counter++; ?></td>
					<td><?php echo $user->username; ?></td>
					<?php if ($logged_in_user->role_id == 1): ?>
						<td scope="col">
							<!-- Button trigger modal -->
							<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#<?= $user->id?>">
								Edit Permission
							</button>
							<!-- Modal -->
							<div class="modal fade" id="modal-<?= $user->id ?>" tabindex="-1" aria-labelledby="modalLabel-<?= $user->id ?>" aria-hidden="true">
							<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h1 class="modal-title fs-5" id="exampleModalLabel">Add Permissions</h1>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											<form>
												<div class="mb-3">
													<label for="createProduct" class="form-label">Create Product</label>
													<input type="checkbox" class="form-check-input" id="createProduct">
												</div>
												<div class="mb-3">
													<label for="editProduct" class="form-label">Edit Product</label>
													<input type="checkbox" class="form-check-input" id="editProduct">
												</div>
												<div class="mb-3">
													<label for="deleteProduct" class="form-label">Delete Product</label>
													<input type="checkbox" class="form-check-input" id="deleteProduct">
												</div>
											</form>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
											<button type="button" class="btn btn-primary">Save changes</button>
										</div>
									</div>
								</div>
							</div>
						</td>
					<?php endif; ?>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
