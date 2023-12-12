<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Adventurelist> $adventurelists
 */
?>
<div class="adventurelists index content">
    <?= $this->Html->link(__('New Adventurelist'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Adventurelists') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('campaign_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($adventurelists as $adventurelist): ?>
                <tr>
                    <td><?= $this->Number->format($adventurelist->id) ?></td>
                    <td><?= h($adventurelist->name) ?></td>
                    <td><?= h($adventurelist->created) ?></td>
                    <td><?= h($adventurelist->modified) ?></td>
                    <td><?= $adventurelist->hasValue('campaign') ? $this->Html->link($adventurelist->campaign->name, ['controller' => 'Campaigns', 'action' => 'view', $adventurelist->campaign->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $adventurelist->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $adventurelist->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $adventurelist->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adventurelist->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
