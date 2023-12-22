<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Scene $scene
 */
?>

<?php foreach ($scene->blocks as $block): ?>
<div class="row soloblock">
    <div class="col pblock">
        <div class="float-left">
            <button id="edit-<?= $block->id ?>" class="editblock btn btn-xs hidden" type="button"><i class="fas fa-pencil"></i></button>
        </div><br />
        <div id="block-<?= $block->id  ?>" class="pblocktext">
            <?= $block->content ?>
        </div>
        <div class="float-right">
            <button id="save-<?= $block->id  ?>" class="saveblock btn btn btn-primary hidden float-right clearfix" type="button"><i class="fas fa-save"></i> Save</button>
        </div>
    </div>
</div>
<?php endforeach; ?>
<div id="blocks-end"></div>
<div id="new-block-editor" class="row hidden">
    <div class="col pblock">
        <br />
        <div id="block-new"></div>
        <div class="float-right">
            <button id="save-new-<?= $scene->id ?>" class="savenew btn btn btn-primary float-right clearfix" type="button"><i class="fas fa-save"></i> Save</button>
        </div>
    </div>
</div>

<div id="new-block-button" class="row">
    <div class="col text-center"><button id="newpblock" class="btn text-primary"><h1><i class="fa-solid fa-circle-plus color-blue"></i></h1></button></div>
</div>


