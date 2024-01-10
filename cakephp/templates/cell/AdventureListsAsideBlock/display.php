<aside class="control-sidebar control-sidebar-dark">
    <div class="p-3 w-100">
        
        <div class="row">
            <h5><?= __("Adventure lists") ?></h5>
        </div>
      
        <div class="row">
        
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="threads">
                    <button class="nav-link active" id="pills-threads-tab" data-toggle="pill" data-target="#pills-threads" type="button" role="tab" aria-controls="pills-threads" aria-selected="true"><?= __('Threads')?></button>
                </li>
                <li class="nav-item" role="characters">
                    <button class="nav-link" id="pills-characters-tab" data-toggle="pill" data-target="#pills-characters" type="button" role="tab" aria-controls="pills-characters" aria-selected="false"><?= __('Characters') ?></button>
                </li>
            </ul>
            
            <div class="tab-content" id="pills-tabContent">
                
                <div class="tab-pane fade show active" id="pills-threads" role="tabpanel" aria-labelledby="pills-threads-tab">
            
                    <table id="threadstable" class="table table-sm w-100">
                        <?php foreach ($threads as $thread): ?>
                        <tr id="threads-<?= $thread->id ?>" class="advlisttr">
                            <td style="word-wrap: break-word; min-width: 170px; max-width: 170px;"><?= $thread->content ?></td>
                            <td style="width: 50px"><button id="delete-<?= $thread->id ?>" class="deletelistitem btn hidden btn-xs text-danger" type="button"><i class="fas fa-trash"></i></button></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                    
                    <form id="threadsform">
                        <div class="mb-1">
                            <?= $this->Form->input('content', ['class' => 'form-control form-control-sm']); ?>
                        </div>
                        <?= $this->Form->hidden('campaign_id', ['value' => $campaign_id]) ?> 
                    </form>
                    <div><button id="newthread" class="btn btn-block btn-success btn-xs"><i class="fa-solid fa-circle-plus color-green"></i></button></div>
                </div>

                <div class="tab-pane fade" id="pills-characters" role="tabpanel" aria-labelledby="pills-characters-tab">
                    
                    <table id="characterstable" class="table table-sm">
                        <?php foreach ($characters as $character): ?>
                        <tr id="characters-<?= $character->id ?>" class="advlisttr">
                            <td style="word-wrap: break-word;min-width: 170px;max-width: 170px;"><?= $character->content ?></td>
                            <td style="width: 50px"><button id="delete-<?= $character->id ?>" class="deletelistitem btn btn-xs hidden text-danger" type="button"><i class="fas fa-trash"></i></button></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                    
                    <form id="charactersform">
                        <div class="mb-1">
                            <?= $this->Form->input('content', ['class' => 'form-control form-control-sm']); ?>
                        </div>
                        <?= $this->Form->hidden('campaign_id', ['value' => $campaign_id]) ?> 
                    </form>
                    <div><button id="newcharacter" class="btn btn-block btn-success btn-xs"><i class="fa-solid fa-circle-plus color-green"></i></button></div>
                </div>

            </div>
        </div>
    </div>
</aside>

