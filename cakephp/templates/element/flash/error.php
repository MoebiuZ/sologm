<?php
/**
 * @var \App\View\AppView $this
 * @var array $params
 * @var string $message
 */
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="message error alert alert-danger alert-dismissible" onclick="this.classList.add('hidden');"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<i class="icon fas fa-ban"></i><?= $message ?></button></div>
