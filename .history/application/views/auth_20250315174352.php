<div class="d-flex align-items-center justify-content-center min-vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 mb-4">
                <form
					class="bg-light bg-opacity-75 border border-secondary border-opacity-50 rounded-3 shadow-sm p-4"
					action="<?php base_url('index.php/create_account')?>"
					method="POST"
					>
                    <h2 class="mb-3">Register</h2>
                    <div class="mb-3">
                        <label for="registerName" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="registerName">
                    </div>
                    <div class="mb-3">
                        <label for="registerEmail" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="registerEmail">
                    </div>
                    <div class="mb-3">
                        <label for="registerPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="registerPassword">
                    </div>
                    <button type="submit" class="btn btn-success w-100">Register</button>
                </form>
            </div>

            <div class="col-md-5">
                <form class="bg-light bg-opacity-75 border border-secondary border-opacity-50 rounded-3 shadow-sm p-4">
                    <h2 class="mb-3">Login</h2>
                    <div class="mb-3">
                        <label for="loginEmail" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="loginEmail">
                    </div>
                    <div class="mb-3">
                        <label for="loginPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="loginPassword">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>
