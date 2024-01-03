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
    <div class="mx-auto col-auto">
        <div class="card card-dark" style="width: 350px;">
            
            <div class="card-header">
                <h3 class="card-title"><?= __('Edit user') ?></h3>
            </div>
            <div class="card-body ">
                <?= $this->Form->create($user, ['type' => 'file']) ?>
                <fieldset>
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
                    <div class="form-group mb-3">
                        <?= $this->Form->label(__('Profile picture')) ?>
                        <div class="input-group">
                            <?= $this->Form->file('profile_picture_file', ['required' => false, 'accept' => 'image/jpeg,image/png']) ?>
                        </div>
                    </div>
                    <?php if ($this->Identity->get('role') == "admin"): ?>
                    <div class="form-group mb-3">
                        <?= $this->Form->label('role', __("Role"), ['class' => 'form-group-label']); ?>
                        <?= $this->Form->select('role', ['user' => __('User'), 'admin' => __('Admin')], ['class' => 'custom-select']) ?>
                    </div>
                    <div class="custom-control custom-switch mb-3">
                        <?= $this->Form->checkbox('enabled', ['class' => 'custom-control-input', 'id' => 'enabledSwitch']) ?>
                        <?= $this->Form->label('enabled', __("Enabled"), ['class' => 'custom-control-label', 'for' => "enabledSwitch"]); ?>
                    </div>
                    
                <?php endif; ?>
                <?= $this->Form->hidden('referer', ['value' => $referer]) ?>
                </fieldset>
                <?= $this->Form->submit(__('Save'), array('class' => 'btn btn-primary btn-block')); ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
