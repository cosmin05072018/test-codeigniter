<div class="container mt-5">
	<h2 class="mb-4">User List</h2>

	<!-- Table to display users -->
	<table class="table table-striped">
		<thead>
			<tr>
				<th scope="col">ID</th>
				<th scope="col">Username</th>
			</tr>
		</thead>
		<tbody>
			<?php $counter = 1; ?>
			<?php foreach ($users as $user): ?>
				<tr>
					<td><?php echo $counter++; ?></td>
					<td><?php echo $user->name; ?></td> <!-- Adaugă restul câmpurilor pe care vrei să le afișezi -->
					<td><?php echo $user->email; ?></td>
					<!-- Continuă cu alte coloane -->
				</tr>
			<?php endforeach; ?>

		</tbody>
	</table>
</div>
