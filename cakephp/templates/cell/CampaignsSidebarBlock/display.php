<?php foreach ($campaigns as $campaign) : ?>
    <li class="nav-item">
        <a href="/campaigns/view/<?= h($campaign->id) ?>" class="nav-link active">
            <i class="far fa-circle nav-icon"></i>
            <p><?= h($campaign->name) ?></p>
        </a>
    </li>
    <?= $this->cell("ScenesSidebarBlock", [$campaign->id]) ?>
<?php endforeach; ?>