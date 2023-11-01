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

<body class="hold-transition sidebar-mini sidebar-collapse layout-fixed layout-footer-fixed layout-nav-fixed dark-mode">
    <div class="wrapper">
        <!-- navvbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

             <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">

                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <div class="media">
                                <?= $this->Html->Image('cake-logo.png', array('class' => 'img-size-50 mr-3 img-circle')) ?>
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                        </a>
         
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <div class="media">
                                <img src="dist/img/user8-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                        </a>
 
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <div class="media">
                                <img src="dist/img/user3-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                            <?= $this->Html->Image('user.jpg', array('class' => 'img-circle', 'alt' => 'USER CHANGEME', 'width' => '25px')) ?>
                            <i class="fa fa-angle-down ml-2 opacity-8"></i>
                    </a>

                </li>
            </ul>
        </nav>
        <!-- navvbar -->

        <!-- sidebar -->
        <aside class="main-sidebar nav-collapse-hide-child nav-child-indent sidebar-dark-primary elevation-4">

            <a href="index3.html" class="brand-link">
                <?= $this->Html->Image('cake.icon.png', array('class' => 'brand-image img-circle elevation-3', 'style' => 'opacity: .8', 'alt' => $title)) ?>
                <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>

            <div class="sidebar">

                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <?= $this->Html->Image('cake-logo.png', array('class' => 'img-circle elevation-2', 'alt' => 'USER CHANGEME')) ?>
                
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Alexander Pierce</a>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Starter Pages
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Active Page</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Inactive Page</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Simple Link
                                    <span class="right badge badge-danger">New</span>
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>

            </div>

        </aside>
        <!-- sidebar -->

        <!-- content -->
        <div class="content-wrapper">

            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Starter Page</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Starter Page</li>
                            </ol>
                        </div>
                    </div>
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

            <div class="float-right d-none d-sm-inline">
            <button type="button" data-widget="control-sidebar" class="btn btn-primary btn-block">
                <i class="fa fa-wrench"></i> <?= __("Tools") ?>
            </button>
            </div>

            <strong>Copyright &copy; 2023-2024 Antonio Rodríguez.</strong> 
        </footer>
        <!-- footer -->

    </div>



            <!--
        <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark" aria-label="Main navigation">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">SoloGM</a>
                <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
    
                <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Notifications</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Profile</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Switch account</a>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false">Settings</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown01">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                    </li>
                </ul>
                <form class="d-flex">
                    <button class="btn btn-outline-success" type="submit">Logout</button>
                </form>
                <div class="header-btn-lg pr-0">
                    <div class="widget-content p-0">
                    <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                    <div class="btn-group">
                    <a data-toggle="popover" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                    <img width="42" class="rounded-circle" src="https://demo.dashboardpack.com/architectui-html-pro/assets/images/avatars/1.jpg" alt>
                    <i class="fa fa-angle-down ml-2 opacity-8"></i>
                    </a>
                    <div tabindex="-1" role="menu" aria-hidden="true" class="rm-pointers dropdown-menu-lg dropdown-menu dropdown-menu-right">
    
    
    
                </div>
            </div>
    
    
            <ul id="popover-content" class="list-group" style="display: none">
      <a href="#" class="list-group-item">Edit Event</a>
      <a href="#" class="list-group-item">Invite Members</a>
      <a href="#" class="list-group-item">Delete Event</a>
    </ul>
            </nav>
    
    
        <main class="main">
            <div class="container">
    
            </div>
        </main>
    
    -->


            <?= $this->Html->script(['jquery-3.6.0.min', 'adminlte.min', 'sologm']) ?>
            <?php $this->fetch('script') ?>
</body>

</html>
