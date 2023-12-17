<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Scene $scene
 */
?>
<div class="row">

    <div class="column column-80">
    <?php foreach ($scene->blocks as $block): ?>
        <button id="edit-<?= $block->id ?>" class="editblock btn btn-xs btn-primary"  type="button"><i class="fas fa-edit"></i></button>
        <button id="save-<?= $block->id  ?>" class="saveblock btn btn-xs btn-primary" type="button"><i class="fas fa-save"></i></button>
        <div id="block-<?= $block->id  ?>">
            <?= $block->content ?>
        </div>
    <?php endforeach; ?>
    </div>
</div>
