<?php

declare(strict_types=1);

use Yiisoft\Http\Method;

return [
    'Form' => [
        'class()' => ['row'],
        'enctype()' => ['multipart/form-data'],
        'method()' => [Method::POST],
    ],
];
