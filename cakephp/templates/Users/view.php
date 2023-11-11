<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class="row">
    <div class="mx-auto"> 
        <?= $this->Flash->render() ?>
    </div>
</div>
<div class="row">
    <div class="mx-auto col-auto">



    <div class="column column-80">
        <div class="users view content">
            <h3><?= h($user->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($user->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Role') ?></th>
                    <td><?= h($user->role) ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($user->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last name') ?></th>
                    <td><?= h($user->last_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Pref Theme') ?></th>
                    <td><?= h($user->pref_theme) ?></td>
                </tr>
                <tr>
                    <th><?= __('Pref Language') ?></th>
                    <td><?= h($user->pref_language) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($user->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($user->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($user->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Login') ?></th>
                    <td><?= h($user->last_login) ?></td>
                </tr>
                <tr>
                    <th><?= __('Enabled') ?></th>
                    <td><?= $user->enabled ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Campaigns') ?></h4>
                <?php if (!empty($user->campaigns)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Chaos') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->campaigns as $campaigns) : ?>
                        <tr>
                            <td><?= h($campaigns->id) ?></td>
                            <td><?= h($campaigns->name) ?></td>
                            <td><?= h($campaigns->chaos) ?></td>
                            <td><?= h($campaigns->created) ?></td>
                            <td><?= h($campaigns->modified) ?></td>
                            <td><?= h($campaigns->user_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Campaigns', 'action' => 'view', $campaigns->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Campaigns', 'action' => 'edit', $campaigns->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Campaigns', 'action' => 'delete', $campaigns->id], ['confirm' => __('Are you sure you want to delete # {0}?', $campaigns->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
