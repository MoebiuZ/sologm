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
        <div class="card card-info" style="width: 350px;">
            <div class="card-header">
                <h3 class="card-title"><?= __('New user') ?></h3>
            </div>

            <div class="card-body">
                <?= $this->Form->create($user) ?>
                <fieldset>
                    <div class="form-group mb-3">
                        <?= $this->Form->label(__('Name')) ?>
                        <?= $this->Form->text('name', ['required' => true, 'class' => 'form-control', 'placeholder' => __('Name')]) ?>
                    </div>
                    <div class="form-group mb-3">
                        <?= $this->Form->label(__('last_name')) ?>
                        <?= $this->Form->text('last_name', ['required' => true, 'class' => 'form-control', 'placeholder' => __('Last name')]) ?>
                    </div>
                    <div class="form-group mb-3">
                        <?= $this->Form->label(__('Email')) ?>
                        <?= $this->Form->text('email', ['required' => true, 'class' => 'form-control', 'placeholder' => __('Email')]) ?>
                    </div>
                    <div class="form-group mb-3">
                        <?= $this->Form->label(__('Password')) ?>
                        <?= $this->Form->text('password', ['required' => true, 'class' => 'form-control', 'placeholder' => __('Password')]) ?>
                    </div>
                    <div class="form-group mb-3">
                        <?= $this->Form->label(__('Confirm password')) ?>
                        <?= $this->Form->text('confirm_password', ['required' => true, 'class' => 'form-control', 'placeholder' => __('Confirm password')]) ?>
                    </div>
                    <div class="form-group mb-3">
                        <?= $this->Form->label('role', __("Role"), ['class' => 'form-group-label']); ?>
                        <?= $this->Form->select('role', ['user' => __('User'), 'admin' => __('Admin')], ['class' => 'custom-select']) ?>
                    </div>
                    <div class="custom-control custom-switch mb-3">
                        <?= $this->Form->checkbox('enabled', ['class' => 'custom-control-input', 'id' => 'enabledSwitch']) ?>
                        <?= $this->Form->label('enabled', __("Enabled"), ['class' => 'custom-control-label', 'for' => "enabledSwitch"]); ?>
                    </div>
                </fieldset>
                <?= $this->Form->submit(__('Save'), array('class' => 'btn btn-primary btn-block')); ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
