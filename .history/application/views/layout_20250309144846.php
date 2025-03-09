<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title : 'Pagina mea'; ?></title>
    <link rel="stylesheet" href="<?= base_url('application/assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('application/assets/css/custom.css'); ?>">
</head>
<body>

    <?php $this->load->view('components/header'); ?>

    <div class="container">
        <?php $this->load->view($view, $view_data); ?>
    </div>

    <?php $this->load->view('components/footer'); ?>

    <script src="<?= base_url('application/assets/js/bootstrap.bundle.min.js'); ?>"></script>
</body>
</html>
