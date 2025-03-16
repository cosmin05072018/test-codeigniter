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
                    <td scope="col">Actions</td>
                <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
