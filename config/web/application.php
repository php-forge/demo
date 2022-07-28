<?php

declare(strict_types=1);

use Forge\App\Handler\NotFoundHandler;
use Forge\App\Middleware\Locale;
use Yiisoft\Definitions\DynamicReference;
use Yiisoft\Definitions\Reference;
use Yiisoft\Middleware\Dispatcher\MiddlewareDispatcher;
use Yiisoft\Yii\Http\Application;

/** @var array $params */

return [
    Application::class => [
        '__construct()' => [
            'dispatcher' => DynamicReference::to(
                [
                    'class' => MiddlewareDispatcher::class,
                    'withMiddlewares()' => [$params['middlewares']],
                ],
            ),
            'fallbackHandler' => Reference::to(
                $params['yiisoft/yii/http']['notFoundHandler'] ?? NotFoundHandler::class,
            ),
        ],
    ],
    Locale::class => [
        '__construct()' => [
            'locales' => $params['locales'],
        ],
    ],
];
