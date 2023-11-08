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
                <h3 class="card-title"><?= __('Please enter the activation code we have sent to your email.') ?></h3>
            </div>
            <div class="card-body ">
                <?= $this->Form->create() ?>
                <fieldset>
                    <div class="form-group mb-3">
                        <?= $this->Form->label(__('Activation code')) ?>
                        <?= $this->Form->text('activation_nonce', ['required' => true, 'class' => 'form-control', 'placeholder' => 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx']) ?>
                    </div>
                     
                </fieldset>
                <?= $this->Form->submit(__('Activate'), array('class' => 'btn btn-primary btn-block')); ?>
                <?= $this->Form->end() ?>

            </div>
        </div>
    </div>
</div>

