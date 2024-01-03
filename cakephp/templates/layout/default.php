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

<body class="hold-transition <?php if ($this->Identity->isLoggedIn()) : ?> sidebar-mini <?php endif; ?> layout-fixed layout-footer-fixed"> <!-- layout-navbar-fixed">-->
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
                    <div id="campaign-id-<?= $campaign_id ?>" class="h6">
                        <span id="campaign-name"><?= $campaign_name ?></span> 
                        <span id="editcampaign-<?= $campaign_id ?>" class="btn-editcampaignname pl-1 small hidden" type="button"> <i class="fas fa-pencil"></i></span>
                    </div>
                        <?php if ($this->get('scene')->id != null): ?>
                        <div id="scene-id-<?= $this->get('scene')->id ?>" class="small">
                            <i class="fa-solid fa-scroll"></i> <span id="scene-name"><?= $this->get('scene')->name ?></span> 
                            <span id="editcampaign-<?= $this->get('scene')->id ?>" class="btn-editscenename small pl-1 hidden" type="button"> <i class="fas fa-pencil"></i></span>
                        </div>
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
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="threads">
                                    <button class="nav-link active" id="pills-threads-tab" data-toggle="pill" data-target="#pills-threads" type="button" role="tab" aria-controls="pills-threads" aria-selected="true"><?= __('Threads')?></button>
                                </li>
                                <li class="nav-item" role="characters">
                                    <button class="nav-link" id="pills-characters-tab" data-toggle="pill" data-target="#pills-characters" type="button" role="tab" aria-controls="pills-characters" aria-selected="false"><?= __('Characters') ?></button>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-threads" role="tabpanel" aria-labelledby="pills-threads-tab">
                                    <table>
                                        <tr><td>asdasd</td></tr>
                                    </table>
                                </div>

                                <div class="tab-pane fade" id="pills-characters" role="tabpanel" aria-labelledby="pills-characters-tab">

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
        <?php if ($this->get('scene') != null) : ?>
        <footer class="main-footer">
            <div class="d-flex justify-content-around">
                <div class="px-1">
                    <button type="button" class="btn btn-primary p-2"  data-toggle="modal" data-target="#fatemodal">
                        <i class="fa fa-dice pr-1"></i> <?= __("Fate") ?>
                    </button>
                    <button type="button" class="btn btn-primary p-2">
                        <i class="fa fa-dice pr-1"></i> <?= __("Focus event") ?>
                    </button>
                </div>
                <div class="px-1 ml-auto">
                    <button type="button" data-widget="control-sidebar" class="btn btn-warning">
                        <i class="fa fa-list pr-1"></i> <?= __("Adventure lists") ?>
                    </button>
                </div>
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