<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Scene $scene
 * @var \Cake\Collection\CollectionInterface|string[] $campaigns
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
            <?= $this->Form->create($scene) ?>
            <fieldset>
                <div class="form-group mb-3">
                    <?= $this->Form->label(__('Name')) ?>
                    <?= $this->Form->text('name', ['required' => true, 'class' => 'form-control', 'placeholder' => __('Name')]) ?>
                </div>
                <div class="form-group mb-3">
                    <?= $this->Form->label(__('Chaos')) ?>
                    <?= $this->Form->text('chaos', ['required' => true, 'class' => 'form-control', 'placeholder' => __('Current chaos: ') . $campaign->current_chaos]) ?>
                </div>
            </fieldset>
            <?= $this->Form->submit(__('Create'), array('class' => 'btn btn-primary btn-block')); ?>
            <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
