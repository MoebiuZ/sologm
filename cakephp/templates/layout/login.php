<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */



$user = $this->request->getAttribute('identity');

$title = 'Solo GM';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?>: <?= $this->fetch('title') ?></title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css(['fontawesome/css/all.min', 'adminlte.min', 'sologm']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>

</head>

<body class="hold-transition">
    <!-- content -->
    <div class="d-flex align-items-center vh-100">
        <div class="container">
            <?= $this->fetch('content') ?>
        </div>
    </div>
    <!-- content -->

<?= $this->Html->script(['jquery-3.6.0.min', 'bootstrap.bundle.min', 'adminlte.min', 'sologm']) ?>
<?php $this->fetch('script') ?>
</body>

</html>
