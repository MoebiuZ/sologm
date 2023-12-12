<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Scene $scene
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Scene'), ['action' => 'edit', $scene->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Scene'), ['action' => 'delete', $scene->id], ['confirm' => __('Are you sure you want to delete # {0}?', $scene->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Scenes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Scene'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="scenes view content">
            <h3><?= h($scene->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($scene->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Campaign') ?></th>
                    <td><?= $scene->hasValue('campaign') ? $this->Html->link($scene->campaign->name, ['controller' => 'Campaigns', 'action' => 'view', $scene->campaign->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($scene->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Pos') ?></th>
                    <td><?= $this->Number->format($scene->pos) ?></td>
                </tr>
                <tr>
                    <th><?= __('Chaos') ?></th>
                    <td><?= $this->Number->format($scene->chaos) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($scene->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($scene->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Blocks') ?></h4>
                <?php if (!empty($scene->blocks)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Content') ?></th>
                            <th><?= __('Pos') ?></th>
                            <th><?= __('Hidden') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('Scene Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($scene->blocks as $blocks) : ?>
                        <tr>
                            <td><?= h($blocks->id) ?></td>
                            <td><?= h($blocks->content) ?></td>
                            <td><?= h($blocks->pos) ?></td>
                            <td><?= h($blocks->hidden) ?></td>
                            <td><?= h($blocks->created) ?></td>
                            <td><?= h($blocks->modified) ?></td>
                            <td><?= h($blocks->scene_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Blocks', 'action' => 'view', $blocks->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Blocks', 'action' => 'edit', $blocks->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Blocks', 'action' => 'delete', $blocks->id], ['confirm' => __('Are you sure you want to delete # {0}?', $blocks->id)]) ?>
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
