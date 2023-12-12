<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Campaign> $campaigns
 */
?>
<div class="campaigns index content">
    <?= $this->Html->link(__('New Campaign'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Campaigns') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('current_chaos') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($campaigns as $campaign): ?>
                <tr>
                    <td><?= $this->Number->format($campaign->id) ?></td>
                    <td><?= h($campaign->name) ?></td>
                    <td><?= $this->Number->format($campaign->current_chaos) ?></td>
                    <td><?= h($campaign->created) ?></td>
                    <td><?= h($campaign->modified) ?></td>
                    <td><?= $campaign->hasValue('user') ? $this->Html->link($campaign->user->name, ['controller' => 'Users', 'action' => 'view', $campaign->user->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $campaign->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $campaign->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $campaign->id], ['confirm' => __('Are you sure you want to delete # {0}?', $campaign->id)]) ?>
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
