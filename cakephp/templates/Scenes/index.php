<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Scene> $scenes
 */
?>
<div class="scenes index content">
    <?= $this->Html->link(__('New Scene'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Scenes') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('pos') ?></th>
                    <th><?= $this->Paginator->sort('chaos') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('campaign_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($scenes as $scene): ?>
                <tr>
                    <td><?= $this->Number->format($scene->id) ?></td>
                    <td><?= h($scene->name) ?></td>
                    <td><?= $this->Number->format($scene->pos) ?></td>
                    <td><?= $this->Number->format($scene->chaos) ?></td>
                    <td><?= h($scene->created) ?></td>
                    <td><?= h($scene->modified) ?></td>
                    <td><?= $scene->hasValue('campaign') ? $this->Html->link($scene->campaign->name, ['controller' => 'Campaigns', 'action' => 'view', $scene->campaign->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $scene->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $scene->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $scene->id], ['confirm' => __('Are you sure you want to delete # {0}?', $scene->id)]) ?>
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
