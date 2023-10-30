<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <div class="column">
        <div class="users form content">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('Sign up') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('last_name', ['label' => __('Last name')]);
                    echo $this->Form->control('email', ['type' => 'email']);
                    echo $this->Form->control('password', ['type' => 'password']);
                    echo $this->Form->control('confirm_password', ['type' => 'password']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Register')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
