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
                    <?php 
                        if (is_file(WWW_ROOT . DS . "img" . DS . "users" . DS . $user->profile_picture)) {
                            echo $this->Html->Image('users/' . $user->profile_picture, array('class' => 'profile-user-img img-fluid img-circle', 'alt' => $user->name . " " . $user->last_name, 'width' => '25px'));
                        } else {
                           echo $this->Html->Image('user.jpg', array('class' => 'profile-user-img img-fluid img-circle', 'alt' => $user->name . " " . $user->last_name, 'width' => '25px'));
                        }
                     ?>
                </div>
                <h3 class="profile-username text-center"><?= __($user->name . " " . $user->last_name) ?></h3>
                <br />
                <?php if ($last_campaign != null) : ?>
                <p><?= $last_campaign->name ?></p>
                <p><i class="fa-solid fa-scroll"></i> <?= $last_scene->name ?> </p>
                <a href="/scenes/view/<?= $last_scene->id ?>" class="btn btn-primary btn-block"><b><?= __('Resume scene') ?></b></a>
                <?php endif; ?>
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
                    <?php if (!empty($user->campaigns)): ?>
                        <div id="accordion">
                            <?php foreach ($user->campaigns as $campaign): ?>
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col">
                                        <strong><?= h($campaign->name) ?></strong>
                                        </div>
                                        <div class="col">
                                            <?= $this->Html->link('<i class="fa fa-caret-down"></i>', '#collapse-campaign-'. $campaign->id, ['data-toggle' => 'collapse', 'escape'=>false, 'class' => 'btn btn-sm btn-outline-secondary']) ?>
                                            <?= $this->Html->link('<i class="fa fa-trash"></i>', ['controller' => 'Campaigns', 'action' => 'delete', $campaign->id], ['class' => 'btn btn-sm btn-outline-danger', 'escape'=>false, 'confirm' => __('Are you sure you want to delete campaign: {0}?', $campaign->name)]) ?>
                                        </div>
                                    </div>
                                </div>
                                
                                <div id="collapse-campaign-<?= $campaign->id ?>" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                        <?php if (!empty($campaign->scenes)): ?>
                                            <?php usort($campaign->scenes, fn($a, $b) => $a->pos <=> $b->pos); // Sort the array by 'pos', because "contain" on controller do not allow to specify an order ?>
                                            <?php foreach ($campaign->scenes as $scene): ?>
                                            <div class="row pb-2 pl-3">
                                                <div class="col">
                                                <i class="fa fa-scroll pr-1"></i>  <?= $scene->name ?>
                                                </div>
                                                <div class="col">
                                                    <?= $this->Html->link('<i class="fa fa-trash"></i>', ['controller' => 'Scenes', 'action' => 'delete', $scene->id], ['class' => 'btn btn-sm btn-outline-danger', 'escape'=>false, 'confirm' => __('Are you sure you want to delete scene: {0}?', $scene->name)]) ?>
                                                </div>
                                            </div>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <div class="pl-3"><?= __('No scenes') ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <?php else: ?> 
                        <div>No campaigns yet.</div>
                        <div> <?= $this->Html->link(__('Create one'), ['controller' => 'campaigns', 'action' => 'add'], ['class' => 'btn btn-primary']) ?></div>
                        <?php endif; ?>
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
                        <?= $this->Form->create($user, ['url' => '/users/edit/' . $user->id, 'type' => 'file']) ?>
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
                                <?= $this->Form->label(__('Profile picture')) ?>
                                <div class="input-group">
                                    <?= $this->Form->file('profile_picture_file', ['required' => false, 'accept' => 'image/jpeg,image/png']) ?>
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
