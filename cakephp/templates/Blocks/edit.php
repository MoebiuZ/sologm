<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Block $block
 * @var string[]|\Cake\Collection\CollectionInterface $scenes
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $block->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $block->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Blocks'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="blocks form content">
            <?= $this->Form->create($block) ?>
            <fieldset>
                <legend><?= __('Edit Block') ?></legend>
                <?php
                    echo $this->Form->control('content');
                    echo $this->Form->control('pos');
                    echo $this->Form->control('hidden');
                    echo $this->Form->control('scene_id', ['options' => $scenes]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
