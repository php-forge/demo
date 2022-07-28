<?php

declare(strict_types=1);

use Forge\Html\Widgets\Components\Alert;
use Yiisoft\Session\Flash\Flash;

/** @var Flash $flash */
$flashMessages = $flash->getAll() ?? [];

var_dump($flashMessages);

foreach ($flashMessages as $flashMessage) {
    foreach ($flashMessage as $key => $message) {
        echo Alert::create()
            ->content($message['content'] ?? '')
            ->dismissing(true)
            ->type($message['type'] ?? 'primary')
            ->render();
    }
}
