<?php foreach ($scenes as $scene) : ?>
    <li class="nav-item">
        <a href="/scenes/view/<?= h($scene->id) ?>" class="nav-link active">
            <i class="far fa-circle nav-icon"></i>
            <p><?= h($scene->name) ?></p>
        </a>
    </li>
<?php endforeach; ?>