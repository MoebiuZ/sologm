<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Scene $scene
 */
?>
<div id="blocks" class="timeline">
<?php foreach ($scene->blocks as $block): ?>
   <div id="soloblock-<?= $block->id ?>">
      <i class="fas <?= $block->blocktype == 'text' ? 'fa-file-lines bg-maroon' : '' ?> <?= $block->blocktype == 'fate' ? 'fa-clover bg-green' : '' ?>"></i>    
      <div class="pblock timeline-item pb-2">
      <?php if ($block->blocktype == "text") : ?>
          <div class="float-left">
              <button id="edit-<?= $block->id ?>" class="editblock btn btn-xs hidden" type="button"><i class="fas fa-pencil"></i></button>
              <button id="delete-<?= $block->id ?>" class="deleteblock btn btn-xs hidden text-danger" type="button"><i class="fas fa-trash"></i></button>
          </div><br />
          <div id="block-<?= $block->id  ?>" class="pblocktext">
              <?= $block->content ?>
          </div>
          <div class="ml-2">
              <button id="cancel-<?= $block->id  ?>" class="cancelblock btn btn-secondary hidden clearfix  my-2" type="button">Cancel</button>
              <button id="save-<?= $block->id  ?>" class="saveblock btn btn-primary hidden clearfix  my-2" type="button"><i class="fas fa-save"></i> Save</button>
          </div>
      <?php endif; ?>
      </div>
  </div>
<?php endforeach; ?>
</div>
<div id="new-block-editor" class="hidden">
    <div class="col pblock timeline-item">
        <br />
        <div id="block-new"></div>
        <div class="float-right">
            <button id="cancel-new" class="cancelnew btn btn btn-secondary clearfix" type="button">Cancel</button>
            <button id="save-new-<?= $scene->id ?>" class="savenew btn btn btn-primary  clearfix" type="button"><i class="fas fa-save"></i> Save</button>
        </div>
    </div>
</div>

<div id="new-block-button" class="row">
    <div class="col text-center"><button id="newpblock" class="btn text-primary"><h1><i class="fa-solid fa-circle-plus color-blue"></i></h1></button></div>
</div>


<!-- Focus modal -->
<div class="modal fade" id="fatemodal" tabindex="-1" role="dialog" aria-labelledby="fatemodal" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <span class="pr-2"><i class="fa fa-clover bg-green circle-icon"></i></span><h5 class="modal-title"><?= __('Make a Fate question') ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cancel">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <?= $this->Form->label('odds', __("Odds"), ['class' => 'form-group-label']); ?>
            <?= $this->Form->select('odds', [
                                              '0' => __('Certain'), 
                                              '1' => __('Nearly Certain'), 
                                              '2' => __('Very Likely'), 
                                              '3' => __('Likely'), 
                                              '4' => __('50/50'), 
                                              '5' => __('Unlikely'), 
                                              '6' => __('Very Unlikely'), 
                                              '7' => __('Nearly Impossible'), 
                                              '8' => __('Impossible')
                                            ], ['value' => '4', 'class' => 'custom-select']) ?>
          </div>
          <div class="mb-3">
            <?= $this->Form->label('question', __("Question"), ['class' => 'form-group-label']); ?>
            <?= $this->Form->textarea('question', ['rows' => '5', 'style' => 'height: 100%', 'class' => 'form-control form-control-md']); ?>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary">Roll</button>
      </div>
    </div>
  </div>
</div>
<!-- end Focus modal-->

<!-- confirmModal -->
<div class="modal fade" id="modal_confirm_dialog" role="dialog" aria-labelledby="modal_confirm_dialog_label" aria-hidden="true" style="z-index: 8192">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal_confirm_dialog_label">
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modal_confirm_dialog_body" align="center">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="confirm_cancel">Cancel</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="confirm_ok">OK</button>
      </div>
    </div>
  </div>
</div>
<!-- modal alert, confirm dialog -->