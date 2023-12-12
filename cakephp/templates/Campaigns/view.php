<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Campaign $campaign
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Campaign'), ['action' => 'edit', $campaign->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Campaign'), ['action' => 'delete', $campaign->id], ['confirm' => __('Are you sure you want to delete # {0}?', $campaign->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Campaigns'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Campaign'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="campaigns view content">
            <h3><?= h($campaign->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($campaign->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $campaign->hasValue('user') ? $this->Html->link($campaign->user->name, ['controller' => 'Users', 'action' => 'view', $campaign->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($campaign->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Current Chaos') ?></th>
                    <td><?= $this->Number->format($campaign->current_chaos) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($campaign->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($campaign->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Adventure Lists') ?></h4>
                <?php if (!empty($campaign->adventure_lists)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Campaign Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($campaign->adventure_lists as $adventureLists) : ?>
                        <tr>
                            <td><?= h($adventureLists->id) ?></td>
                            <td><?= h($adventureLists->name) ?></td>
                            <td><?= h($adventureLists->created) ?></td>
                            <td><?= h($adventureLists->modified) ?></td>
                            <td><?= h($adventureLists->campaign_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'AdventureLists', 'action' => 'view', $adventureLists->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'AdventureLists', 'action' => 'edit', $adventureLists->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'AdventureLists', 'action' => 'delete', $adventureLists->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adventureLists->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Scenes') ?></h4>
                <?php if (!empty($campaign->scenes)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Pos') ?></th>
                            <th><?= __('Chaos') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Campaign Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($campaign->scenes as $scenes) : ?>
                        <tr>
                            <td><?= h($scenes->id) ?></td>
                            <td><?= h($scenes->name) ?></td>
                            <td><?= h($scenes->pos) ?></td>
                            <td><?= h($scenes->chaos) ?></td>
                            <td><?= h($scenes->created) ?></td>
                            <td><?= h($scenes->modified) ?></td>
                            <td><?= h($scenes->campaign_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Scenes', 'action' => 'view', $scenes->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Scenes', 'action' => 'edit', $scenes->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Scenes', 'action' => 'delete', $scenes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $scenes->id)]) ?>
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
