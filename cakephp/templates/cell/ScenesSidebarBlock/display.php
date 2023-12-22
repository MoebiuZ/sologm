<?php foreach ($scenes as $scene) : ?>
<li class="nav-item">
    <a href="/scenes/view/<?= h($scene->id) ?>" class="nav-link<?php if (isset($currentScene)) { echo ($scene->id == $currentScene['id']) ? " active" : "";  } ?>">
        <i class="fas fa-scroll nav-icon"></i>
        <p><?= h($scene->name) ?></p>
    </a>
</li>
<?php endforeach; ?>
<li class="nav-item">
    <a href="/scenes/add" class="nav-link">
        <i class="fa-solid fa-circle-plus nav-icon"></i>
        <p><?= __('New scene') ?></p>
    </a>
</li>