<div class="container pt-5">
	<form>
		<h1>Login</h1>
		<div class="mb-3">
			<label for="exampleInputEmail1" class="form-label">Email address</label>
			<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
			<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
		</div>
		<div class="mb-3">
			<label for="exampleInputPassword1" class="form-label">Password</label>
			<input type="password" class="form-control" id="exampleInputPassword1">
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
		<br>
		<a href="<?= base_url('index.php/register'); ?>">Crează un cont</a>
	</form>
</div>
