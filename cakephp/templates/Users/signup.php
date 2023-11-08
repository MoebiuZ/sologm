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
        <div class="card" style="width: 350px;">
            
            <div class="card-header">
                <h3 class="card-title"><?= __('Sign up') ?></h3>
            </div>
            <div class="card-body ">
                <?= $this->Form->create() ?>
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
                            <?= $this->Form->password('password', ['required' => true, 'class' => 'form-control', 'placeholder' => __('Password')]) ?>
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
                            <?= $this->Form->password('confirm_password', ['required' => true, 'class' => 'form-control', 'placeholder' => __('Confirm password')]) ?>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                
                </fieldset>
                <?= $this->Form->submit(__('Sign up'), array('class' => 'btn btn-primary btn-block')); ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
