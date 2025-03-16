<div class="container mt-5">
	<h2 class="mb-4">User List</h2>

	<!-- Table to display users -->
	<table class="table table-striped">
		<thead>
			<tr>
				<th scope="col">ID</th>
				<th scope="col">Username</th>
				<th scope="col"> <php= echo $logged_in_user->name?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($users as $user): ?>
				<tr>
					<?php
					$counter = 1;
					foreach ($users as $user) {
						echo "<td>" . $counter . "</td>";
						$counter++;
					}
					?>
					<td><?php echo $user->username; ?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
