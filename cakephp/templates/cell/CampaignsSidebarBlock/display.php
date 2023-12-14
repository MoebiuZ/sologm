<?php foreach ($campaigns as $campaign) : ?>
<li class="nav-item menu-close">
    <a href="#" class="nav-link active">
        <i class="nav-icon fas fa-feather"></i>
        <p>
            <?= h($campaign->name) ?>
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>

<ul class="nav nav-treeview">
    <?= $this->cell("ScenesSidebarBlock", [$campaign->id]) ?>
</ul>
</li>
<?php endforeach; ?>