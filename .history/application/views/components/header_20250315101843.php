<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title : 'Pagina mea'; ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/custom.css'); ?>">
</head>
<body class="d-flex flex-column min-vh-100 justify-content-between">
<nav class="navbar navbar-expand-lg">
	<div class="container-fluid">
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse d-lg-flex justify-content-center align-items-center" id="navbarSupportedContent">
			<ul class="navbar-nav mb-2 mb-lg-0">
				<li class="nav-item">
					<a class="nav-link" aria-current="page" href="">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" aria-current="page" href="">Users</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" aria-current="page" href="">Manage Products</a>
				</li>
				<?php if ($this->session->userdata('logged_in')): ?>
					<li class="nav-item text-white">
						<a class="nav-link btn btn-danger text-white" href="">Logout</a>
					</li>
				<?php endif; ?>
			</ul>
		</div>
	</div>
</nav>
