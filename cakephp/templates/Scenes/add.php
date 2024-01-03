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
                <h3 class="card-title"><?= __('New scene') ?></h3>
            </div>
            <div class="card-body ">
            <?= $this->Form->create($scene) ?>
            <fieldset>
                <div class="form-group mb-3">
                <?= $this->Form->label(__('Campaign')) ?>
                <div><?= $campaign->name ?></div>
                </div>
                <div class="form-group mb-3">
                    <?= $this->Form->label(__('Scene name')) ?>
                    <?= $this->Form->text('name', ['required' => true, 'class' => 'form-control', 'placeholder' => __('Name')]) ?>
                </div>
                <div class="form-group mb-3">
                    <?= $this->Form->label(__('Chaos')) ?>
                    <?= $this->Form->select('chaos', ['1' => '1', '2' => '2',  '3' => '3',  '4' => '4',  '5' => '5',  '6' => '6',  '7' => '7',  '8' => '8',  '9' => '9'], ['class' => 'custom-select', 'value' => $campaign->current_chaos]) ?>
                    <small><?= __('Current campaign chaos: ') . $campaign->current_chaos ?></small>
                </div>
            </fieldset>
            <?= $this->Form->submit(__('Create'), array('class' => 'btn btn-primary btn-block')); ?>
            <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
