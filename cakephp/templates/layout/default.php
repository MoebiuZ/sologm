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

<body class="hold-transition <?php if ($this->Identity->isLoggedIn()) : ?> sidebar-mini <?php endif; ?> sidebar-collapse layout-fixed layout-footer-fixed"> <!-- layout-navbar-fixed">-->
    <div class="wrapper">
        <!-- navvbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

             <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/" class="nav-link"><?= __('Home') ?></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link"><?= __('Help') ?></a>
                </li>
            </ul>

            <?php if ($this->Identity->isLoggedIn()) : ?>
            <ul class="navbar-nav ml-auto">
                
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" data-slide="true" href="#" role="button">
                            <?= $this->Html->Image('user.jpg', array('class' => 'img-circle', 'alt' => $user->name, 'width' => '25px')) ?>
                            <i class="fa fa-angle-down ml-2 opacity-8"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-header"><?= $user->name ?></span>
                        <div class="dropdown-divider"></div>
                        <?= $this->Html->link('<i class="fa fa-user" aria-hidden="true"></i> ' . __('My profile'), ['controller' => 'users', 'action' => 'view', $user->id], ['class' => 'dropdown-item', 'escape' => false]) ?>
                        <div class="dropdown-divider"></div>

                        <?php if ($this->Identity->get('role') == "admin"): ?>
                        <?= $this->Html->link('<i class="fa fa-users" aria-hidden="true"></i> ' . __('List users'), ['controller' => 'users', 'action' => 'index', $user->id], ['class' => 'dropdown-item', 'escape' => false]) ?>
                        <div class="dropdown-divider"></div>
                        <?php endif; ?>

                        <?= $this->Html->link('<i class="fa fa-sign-out" aria-hidden="true"></i> ' . __('Logout'), ['controller' => 'users', 'action' => 'logout'], ['class' => 'dropdown-item', 'escape' => false]) ?>
                    </div>

                </li>
            </ul>
            <?php endif; ?>
        </nav>
        
        <!-- navvbar -->

        <!-- sidebar -->
        <?php if ($this->Identity->isLoggedIn()) : ?>
        <aside class="main-sidebar nav-collapse-hide-child nav-child-indent sidebar-dark-primary elevation-4">

            <a href="index3.html" class="brand-link">
                <?= $this->Html->Image('cake.icon.png', array('class' => 'brand-image img-circle elevation-3', 'style' => 'opacity: .8', 'alt' => $title)) ?>
                <span class="brand-text font-weight-light"><?= $title ?></span>
            </a>

            <div class="sidebar">

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    <?=__('Campaigns') ?>
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p><?=__('Campaign 1') ?></p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p><?=__('Campaign 2') ?></p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                <?=__('Scene 1') ?>
                                    <span class="right badge badge-danger">New</span>
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>

            </div>

        </aside>
        <?php endif; ?>
        <!-- sidebar -->

        <!-- content -->
        <div class="content-wrapper">

            <div class="content-header">
                <div class="container-fluid">
                 <!--   <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Titulo</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Starter Page</li>
                            </ol>
                        </div>
                    </div>-->
                </div>
            </div>


            <div class="content">
                <div class="container-fluid">
                    <?= $this->Flash->render() ?>
                    <?= $this->fetch('content') ?>
                </div>

                <aside class="control-sidebar control-sidebar-dark">

                    <div class="p-3">
                        <h5>Title</h5>
                        <p>Sidebar content</p>
                    </div>
                </aside>
            </div>

            
        </div>
        <!-- content -->

        <!-- footer -->
        <footer class="main-footer">
            <div class="float-right"> 
                <button type="button" data-widget="control-sidebar" class="btn btn-primary btn-block">
                    <i class="fa fa-wrench"></i> <?= __("Tools") ?>
                </button>
            </div>
        </footer>
        <!-- footer -->

    </div>

<?= $this->Html->script(['jquery-3.6.0.min', 'bootstrap.bundle.min', 'adminlte.min', 'sologm']) ?>
<?php $this->fetch('script') ?>
</body>

</html>
