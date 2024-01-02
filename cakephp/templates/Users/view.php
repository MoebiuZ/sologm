<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class="row">
    <div class="mx-auto">
        <?= $this->Flash->render() ?>
    </div>
</div>


<div class="row">
    <div class="col-md-3">
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="../../dist/img/user4-128x128.jpg" alt="<?= __("User profile picture") ?>">
                </div>
                <h3 class="profile-username text-center"><?= __($user->name) ?></h3>
                <br 7>
                <p class="text-muted"><?= __('Last edited:') ?></`>
                <p><?= $last_campaign->name ?>: <?= $last_scene->name ?> </p>
                <a href="/scenes/view/<?= $last_scene->id ?>" class="btn btn-primary btn-block"><b>Continue</b></a>
            </div>
        </div>
    </div>

    <div class="col-md-9">
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#campaigns" data-toggle="tab"><?= __("Campaigns") ?></a></li>
                    <li class="nav-item"><a class="nav-link" href="#preferences" data-toggle="tab"><?= __("Preferences") ?></a></li>
                    <li class="nav-item"><a class="nav-link" href="#profile" data-toggle="tab"><?= __("Profile") ?></a></li>
                </ul>
            </div>

            <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="campaigns">

                        <div class="post">
                            <div class="user-block">
                                
                            </div>

                            <?php if (!empty($user->campaigns)): ?>
                            <table class="table">
                                <tbody> 
                                    <?php foreach ($user->campaigns as $campaigns): ?>
                                    <tr>
                                        <td><?= h($campaigns->name) ?></td>
                                        <td class="actions"><?= $this->Form->postLink('<i class="fa fa-trash"></i>', ['controller' => 'Campaigns', 'action' => 'delete', $campaigns->id], ['class' => 'btn btn-sm btn-outline-danger', 'escape'=>false, 'confirm' => __('Are you sure you want to delete campaign: "{0}"?', $campaigns->name)]) ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <?php else: ?> 
                                <div>No campaigns yet.</div>
                            <?php endif; ?>
                            
                        </div>

                    </div>
          

                    <div class="tab-pane" id="preferences">
                    <?= $this->Form->create($user, ['url' => '/users/edit/' . $user->id]) ?>
                        <fieldset style="width: 350px;">
                            <div class="form-group mb-3">
                                <?= $this->Form->label(__('Language')) ?>
                                <small>Not functional yet</small>
                                <?= $this->Form->select('pref_language', ['en_US' => __('English'), 'es_ES' => __('Spanish')], ['class' => 'custom-select']) ?>
                            </div>
                            <div class="form-group mb-3">
                                <?= $this->Form->label(__('Theme')) ?>
                                <small>Not functional yet</small>
                                <?= $this->Form->select('pref_theme', ['light' => __('Light'), 'dark' => __('Dark')], ['class' => 'custom-select']) ?>
                            </div>

                            <?= $this->Form->hidden('referer', ['value' => $this->getRequest()->getRequestTarget()]) ?>
                        </fieldset>
                        <?= $this->Form->submit(__('Save'), array('class' => 'btn btn-primary')); ?>
                        <?= $this->Form->end() ?>
                    </div>

                    <div class="tab-pane" id="profile">
                        <?= $this->Form->create($user, ['url' => '/users/edit/' . $user->id]) ?>
                        <fieldset style="width: 350px;">
                            <div class="form-group mb-3">
                                <?= $this->Form->label(__('Name')) ?>
                                <?= $this->Form->text('name', ['required' => true, 'class' => 'form-control', 'placeholder' => __('Name')]) ?>
                            </div>
                            <div class="form-group mb-3">
                                <?= $this->Form->label(__('Last name')) ?>
                                <?= $this->Form->text('last_name', ['required' => true, 'class' => 'form-control', 'placeholder' => __('Last name')]) ?>
                            </div>
                            <div class="form-group mb-3">
                                <?= $this->Form->label(__('Email')) ?>
                                <div class="input-group">
                                    <?= $this->Form->email('email', ['required' => true, 'class' => 'form-control', 'placeholder' => __('Email')]) ?>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-envelope"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <?= $this->Form->label(__('Password')) ?>
                                <div class="input-group">
                                    <?= $this->Form->password('password', ['required' => false, 'value' => '', 'class' => 'form-control', 'placeholder' => __('Leave empty to not change')]) ?>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <?= $this->Form->label(__('Confirm password')) ?>
                                <div class="input-group">
                                    <?= $this->Form->password('confirm_password', ['required' => false, 'class' => 'form-control', 'placeholder' => __('Leave empty to not change')]) ?>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?= $this->Form->hidden('referer', ['value' => $this->getRequest()->getRequestTarget()]) ?>
                        </fieldset>
                        <?= $this->Form->submit(__('Save'), array('class' => 'btn btn-primary')); ?>
                        <?= $this->Form->end() ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
