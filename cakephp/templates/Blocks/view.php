<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Block $block
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Block'), ['action' => 'edit', $block->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Block'), ['action' => 'delete', $block->id], ['confirm' => __('Are you sure you want to delete # {0}?', $block->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Blocks'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Block'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="blocks view content">
            <h3><?= h($block->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Scene') ?></th>
                    <td><?= $block->hasValue('scene') ? $this->Html->link($block->scene->name, ['controller' => 'Scenes', 'action' => 'view', $block->scene->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($block->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Pos') ?></th>
                    <td><?= $this->Number->format($block->pos) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($block->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($block->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Hidden') ?></th>
                    <td><?= $block->hidden ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Content') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($block->content)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
