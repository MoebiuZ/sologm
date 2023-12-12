<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Scene $scene
 * @var \Cake\Collection\CollectionInterface|string[] $campaigns
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Scenes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="scenes form content">
            <?= $this->Form->create($scene) ?>
            <fieldset>
                <legend><?= __('Add Scene') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('pos');
                    echo $this->Form->control('chaos');
                    echo $this->Form->control('campaign_id', ['options' => $campaigns]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
