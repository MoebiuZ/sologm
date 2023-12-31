<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Campaign $campaign
 * @var \Cake\Collection\CollectionInterface|string[] $users
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
                <h3 class="card-title"><?= __('New campaign') ?></h3>
            </div>
            <div class="card-body ">
            <?= $this->Form->create($campaign) ?>
            <fieldset>
                <div class="form-group mb-3">
                    <?= $this->Form->label(__('Name')) ?>
                    <?= $this->Form->text('name', ['required' => true, 'class' => 'form-control', 'placeholder' => __('Name')]) ?>
                </div>
                <div class="form-group mb-3">
                    <?= $this->Form->label(__('Current Chaos')) ?>
                    <?= $this->Form->text('current_chaos', ['required' => true, 'class' => 'form-control', 'placeholder' => __('Current Chaos')]) ?>
                </div>
                <?= $this->Form->input('user_id', ['type' => 'hidden', 'value' =>  $user->id]) ?>
            </fieldset>
            <?= $this->Form->submit(__('Create'), array('class' => 'btn btn-primary btn-block')); ?>
            <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
