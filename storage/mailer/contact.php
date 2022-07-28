<?php

declare(strict_types=1);

use Forge\Html\Helper\Encode;

/**
 * @var string $name
 * @var string $content
 * @var array $params
 */
?>

<?= Encode::content($params['message']) ?>

<p><?= Encode::content($params['username']) ?></p>
