<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Adventurelist $adventurelist
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Adventurelist'), ['action' => 'edit', $adventurelist->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Adventurelist'), ['action' => 'delete', $adventurelist->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adventurelist->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Adventurelists'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Adventurelist'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="adventurelists view content">
            <h3><?= h($adventurelist->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($adventurelist->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Campaign') ?></th>
                    <td><?= $adventurelist->hasValue('campaign') ? $this->Html->link($adventurelist->campaign->name, ['controller' => 'Campaigns', 'action' => 'view', $adventurelist->campaign->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($adventurelist->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($adventurelist->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($adventurelist->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
