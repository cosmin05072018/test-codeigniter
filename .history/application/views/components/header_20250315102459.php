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
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <!-- Butonul de meniu pentru mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Conținutul navbar-ului -->
        <div class="collapse navbar-collapse d-lg-flex justify-content-center align-items-center" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0">
                <?php
                $current_page = basename($_SERVER['PHP_SELF']); // Obține pagina curentă

                $nav_items = [
                    "index.php" => "Home",
                    "users.php" => "Users",
                    "manage_products.php" => "Manage Products"
                ];

                foreach ($nav_items as $url => $title): ?>
                    <li class="nav-item">
                        <a class="nav-link <?= ($current_page == $url) ? 'active' : '' ?>" href="<?= $url ?>">
                            <?= $title ?>
                        </a>
                    </li>
                <?php endforeach; ?>

                <?php if ($this->session->userdata('logged_in')): ?>
                    <li class="nav-item">
                        <a class="nav-link btn btn-danger text-white px-3" href="logout.php">Logout</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

