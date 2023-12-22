<?php foreach ($campaigns as $campaign): ?>
<li class="nav-item 
<?php 
    if (isset($currentScene)) { echo ($campaign->id == $currentScene['campaign_id']) ? " menu-open" : " menu-close";  } ?>">
    <a href="#" class="nav-link<?php if (isset($currentScene)) { echo ($campaign->id == $currentScene['campaign_id']) ?  " active" :  " bg-secondary"; } ?>">
        <i class="nav-icon fas fa-feather"></i>
        <p>
            <?= h($campaign->name) ?>
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>

    <ul class="nav nav-treeview px-2">
        <?= $this->cell("ScenesSidebarBlock", [$campaign->id, $currentScene]) ?>
    </ul>
</li>
<?php endforeach; ?>