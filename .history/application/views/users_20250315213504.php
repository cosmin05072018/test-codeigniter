<div class="container mt-5">
    <h2 class="mb-4">User List</h2>

    <!-- Table to display users -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Username</th>
                <?php foreach ($users as $user): ?>
                    <?php if ($user->role_id === 1): ?>  <!-- Verifici role_id al fiecărui utilizator -->
                        <th scope="col">Action</th>  <!-- Adăugi Action doar pentru utilizatorii cu role_id 1 -->
                    <?php endif; ?>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo $user->id; ?></td>
                    <td><?php echo $user->username; ?></td>
                    <?php if ($user->role_id === 1): ?>  <!-- Verifici role_id pentru fiecare utilizator -->
                        <td scope="col">1</td>  <!-- Coloană suplimentară pentru utilizatorii cu role_id 1 -->
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
