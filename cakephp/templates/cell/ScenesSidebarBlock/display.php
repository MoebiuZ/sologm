<?php foreach ($scenes as $scene) : ?>
<li class="nav-item">
    <a href="/scenes/view/<?= h($scene->id) ?>" class="nav-link active">
        <i class="fas fa-scroll nav-icon"></i>
        <p><?= h($scene->name) ?></p>
    </a>
</li>
<?php endforeach; ?>
<li class="nav-item">
    <a href="/scenes/add" class="nav-link">
        <i class="far fa-plus nav-icon"></i>
        <p><?= __('New scene') ?></p>
    </a>
</li>