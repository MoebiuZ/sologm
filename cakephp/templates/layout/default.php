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

$app_title = 'Solo GM';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $app_title ?>: <?= $this->fetch('title') ?></title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css(['fontawesome/css/all.min', 'adminlte.min', 'sologm', 'summernote-lite.min']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
</head>

<body class="hold-transition <?php if ($this->Identity->isLoggedIn()) : ?> sidebar-mini <?php endif; ?> sidebar-collapse layout-fixed layout-footer-fixed"> <!-- layout-navbar-fixed">-->
    <div class="wrapper">
        <!-- navvbar -->
        <?php if ($this->Identity->isLoggedIn()) : ?>
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

             <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            
                <li class="nav-item ml-2">
                    <?php 
                        if ($this->get('scene') != null) : 
                            if  ($this->get('campaign') != null) {
                                $campaign_id = $this->get('campaign')->id;
                                $campaign_name = $this->get('campaign')->name;
                            } else {
                                $campaign_id = $this->get('scene')->campaign->id;
                                $campaign_name = $this->get('scene')->campaign->name;
                            }
                    ?>
                    <div id="campaign-id-<?= $campaign_id ?>" class="h6"><span id="campaign-name"><?= $campaign_name ?></span> <span id="editcampaign-<?= $campaign_id ?>" class="btn-editcampaignname pl-1 small hidden" type="button"> <i class="fas fa-pencil"></i></span></div>
                        <?php if ($this->get('scene')->id != null): ?>
                        <div id="scene-id-<?= $this->get('scene')->id ?>" class="small"><i class="fa-solid fa-scroll"></i> <span id="scene-name"><?= $this->get('scene')->name ?></span> <span id="editcampaign-<?= $this->get('scene')->id ?>" class="btn-editscenename small pl-1 hidden" type="button"> <i class="fas fa-pencil"></i></span></div>
                        <?php endif; ?> 
                    <?php endif; ?>
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
                        <?= $this->Html->link('<i class="fa fa-shield" aria-hidden="true"></i> ' . __('My campaigns'), ['controller' => 'users', 'action' => 'view', $user->id], ['class' => 'dropdown-item', 'escape' => false]) ?>
                        <div class="dropdown-divider"></div>
                        <?= $this->Html->link('<i class="fa fa-user" aria-hidden="true"></i> ' . __('Edit profile'), ['controller' => 'users', 'action' => 'edit', $user->id], ['class' => 'dropdown-item', 'escape' => false]) ?>
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
        <?php endif; ?>
        <!-- navvbar -->

        <!-- sidebar -->
        <?php if ($this->Identity->isLoggedIn()) : ?>
        <aside class="main-sidebar nav-collapse-hide-child nav-child-indent sidebar-dark-primary elevation-4">

            <a href="#" class="brand-link">
                <div id="conway-grid" class="conway-mini d-inline-block" style="vertical-align:middle"><div></div></div>
                <span class="brand-text font-weight-light"><?= $app_title ?></span>
            </a>

            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="/campaigns/add" class="nav-link bg-success">
                                <i class="far fa-plus nav-icon"></i>
                                <p><?= __('New Campaign') ?></p>
                            </a>
                        </li>                        
                        <?= $this->cell("CampaignsSidebarBlock", [$user->id, $this->get('scene')]) ?>
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

                <!-- adventure-lists -->
                <aside class="control-sidebar control-sidebar-dark">
                    <div class="p-3">
                        <div class="row"><h5><?= __("Adventure lists") ?></h5></div>
                        <div class="row">
                            <div >
                                <div class="card card-tabs card-dark">
                                    <div class="card-header p-0 pt-1">
                                        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="custom-tabs-one-threads-tab" data-toggle="pill" href="#custom-tabs-one-threads" role="tab" aria-controls="custom-tabs-one-threads" aria-selected="true">Threads</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="custom-tabs-one-characters-tab" data-toggle="pill" href="#custom-tabs-one-characters" role="tab" aria-controls="custom-tabs-one-characters" aria-selected="false">Characters</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="tab-content" id="custom-tabs-one-tabContent">

                                            <div class="tab-pane fade show active" id="custom-tabs-one-threads" role="tabpanel" aria-labelledby="custom-tabs-one-threads-tab">
                                                <div class="row">
                                                    <div class="col-3" style="background: red;">1-2</div>
                                                    <div class="col-9">
                                                        <div class="row">
                                                            <div class="col-4">1-2</div>
                                                            <div class="col-8">afasdfasfasdfasdfasdfasdf</div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-4">3-4</div>
                                                            <div class="col-8">afasdfasfasdfasdfasdfasdf</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="custom-tabs-characters-profile" role="tabpanel" aria-labelledby="custom-tabs-one-characters-tab">
                                                Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris pharetra purus ut ligula tempor, et vulputate metus facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas sollicitudin, nisi a luctus interdum, nisl ligula placerat mi, quis posuere purus ligula eu lectus. Donec nunc tellus, elementum sit amet ultricies at, posuere nec nunc. Nunc euismod pellentesque diam.
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
                <!-- adventure-lists -->
                
            </div>

            
        </div>
        <!-- content -->

        <!-- footer -->
        <?php if ($this->Identity->isLoggedIn()) : ?>
        <footer class="main-footer">
            <div class="float-right"> 
                <button type="button" data-widget="control-sidebar" class="btn btn-primary btn-block">
                    <i class="fa fa-wrench"></i> <?= __("Adventure lists") ?>
                </button>
            </div>
        </footer>
        <?php endif; ?>
        <!-- footer -->

    </div>

<?= $this->Html->script(['jquery-3.6.0.min', 'bootstrap.bundle.min', 'adminlte.min', 'summernote-lite.min', 'sologm']) ?>
<script>
    var csrfToken = <?= json_encode($this->request->getCookie('csrfToken')) ?>;
</script>
<?php $this->fetch('script') ?>
</body>

</html>
