<!-- view-users.php -->

<div class="container my-4">
    <h2 class="mb-4">Users List</h2>

    <!-- Check if there are any users -->
    <?php if (empty($users)): ?>
        <div class="alert alert-info" role="alert">
            No users found.
        </div>
    <?php else: ?>
        <!-- Table with Bootstrap 5 styling -->
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Rol</th>
                    <th scope="col">Created At</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo $user->id; ?></td>
                        <td><?php echo $user->name; ?></td>
                        <td><?php echo $user->email; ?></td>
                        <td>...</td>
                        <td><?php echo $user->created_at; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
