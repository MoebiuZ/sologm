<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Scene $scene
 */
?>

<?php foreach ($scene->blocks as $block): ?>
<div class="row">
    <div class="col pblock">
        <div class="float-right">
            <button id="edit-<?= $block->id ?>" class="editblock btn btn-xs btn-primary hidden"  type="button"><i class="fas fa-edit"></i></button>
            <button id="save-<?= $block->id  ?>" class="saveblock btn btn-xs btn-primary hidden" type="button"><i class="fas fa-save"></i></button>
        </div><br />
        <div id="block-<?= $block->id  ?>" class="pblocktext">
            <?= $block->content ?>
        </div>
    </div>
</div>
<?php endforeach; ?>


