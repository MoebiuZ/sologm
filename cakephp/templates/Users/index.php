<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 */
?>
<div class="card index content">
    <div class="card-header">
    <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'btn btn-primary float-right']) ?>
    <h3><?= __('Users') ?></h3>
</diV>
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('role') ?></th>
                    <th><?= $this->Paginator->sort('enabled') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('last_name') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('last_login') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $this->Number->format($user->id) ?></td>
                    <td><?= h($user->email) ?></td>
                    <td><?= h($user->role) ?></td>
                    <td><?php if ($user->enabled) : ?><i class="fa fa-check"></i><?php endif; ?></td>
                    <td><?= h($user->name) ?></td>
                    <td><?= h($user->last_name) ?></td>
                    <td><?= h($user->created) ?></td>
                    <td><?= h($user->last_login) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('<i class="fa fa-eye"></i>', ['action' => 'view', $user->id], ['class' => 'btn btn-sm btn-outline-secondary', 'escape' => false]) ?>
                        <?= $this->Html->link('<i class="fa fa-edit"></i>', ['action' => 'edit', $user->id], ['class' => 'btn btn-sm btn-outline-secondary', 'escape' => false]) ?>
                        <?= $this->Form->postLink('<i class="fa fa-trash"></i>', ['action' => 'delete', $user->id], ['class' => 'btn btn-sm btn-outline-danger', 'escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="card-footer clear-fix">
        <div>
        <ul class="pagination">
            <?= $this->Paginator->first('<i class="fa-solid fa-backward"></i>' , ['escape' => false]) ?>
            <?= $this->Paginator->prev('<i class="fa-solid fa-caret-left"></i>',  ['escape' => false]) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next('<i class="fa-solid fa-caret-right"></i>', ['escape' => false]) ?>
            <?= $this->Paginator->last('<i class="fa-solid fa-forward"></i>', ['escape' => false]) ?>
        </ul>
                    </div>
        <div class="float-right"><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></div>
    </div>
</div>
