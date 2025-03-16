<div class="container mt-5">
    <h2 class="mb-4">User List</h2>

    <!-- Table to display users -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Username</th>
                <?php if (isset($logged_in_user_id)): ?>
                    <th scope="col">Actions</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo $user->id; ?></td>
                    <td><?php echo $user->username; ?></td>
                    <?php if (isset($logged_in_user_id) && $user->role_id === 1 && $user->id !== $logged_in_user_id): ?>
                        <td>
                            <a href="edit.php?id=<?php echo $user->id; ?>" class="btn btn-primary btn-sm">Edit</a>
                            <a href="delete.php?id=<?php echo $user->id; ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
