<?php foreach ($campaigns as $campaign): ?>
<li class="nav-item <?= $campaign->id == $currentScene['campaign_id'] ? "menu-open" : "menu-close"; ?>">
    <a href="#" class="nav-link <?= $campaign->id == $currentScene['campaign_id'] ? "active" : ""  ?>">
        <i class="nav-icon fas fa-feather"></i>
        <p>
            <?= h($campaign->name) ?>
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>

    <ul class="nav nav-treeview">
        <?= $this->cell("ScenesSidebarBlock", [$campaign->id, $currentScene]) ?>
    </ul>
</li>
<?php endforeach; ?>