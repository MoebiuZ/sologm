<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Adventurelist $adventurelist
 * @var string[]|\Cake\Collection\CollectionInterface $campaigns
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $adventurelist->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $adventurelist->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Adventurelists'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="adventurelists form content">
            <?= $this->Form->create($adventurelist) ?>
            <fieldset>
                <legend><?= __('Edit Adventurelist') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('campaign_id', ['options' => $campaigns]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
