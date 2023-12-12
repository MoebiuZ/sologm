<?php foreach ($campaigns as $campaign) : ?>
    <li class="nav-item">
        <a href="#" class="nav-link active">
            <i class="far fa-circle nav-icon"></i>
            <p><?= h($campaign->name) ?></p>
        </a>
    </li>
<?php endforeach; ?>