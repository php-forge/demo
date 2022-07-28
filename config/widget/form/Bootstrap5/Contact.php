<?php

declare(strict_types=1);

return [
    'Field' => [
        'class()' => ['form-control'],
        'containerClass()' => ['form-group input-group me-3'],
        'inputContainer()' => [true],
        'inputContainerClass()' => ['form-floating flex-grow-1'],
        'inputTemplate()' => ['{input}' . PHP_EOL . '{label}'],
        'errorClass()' => ['d-block invalid-feedback'],
    ],
];
