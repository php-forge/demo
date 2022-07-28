<?php

declare(strict_types=1);

use Forge\App\Command\HelloCommand;
use Forge\App\Middleware\Locale;
use Yiisoft\Aliases\Aliases;
use Yiisoft\Cookies\CookieMiddleware;
use Yiisoft\Csrf\CsrfTokenInterface;
use Yiisoft\Definitions\Reference;
use Yiisoft\ErrorHandler\Middleware\ErrorCatcher;
use Yiisoft\Router\CurrentRoute;
use Yiisoft\Router\Middleware\Router;
use Yiisoft\Router\UrlGeneratorInterface;
use Yiisoft\Session\Flash\Flash;
use Yiisoft\Session\SessionMiddleware;
use Yiisoft\Translator\TranslatorInterface;
use Yiisoft\User\CurrentUser;
use Yiisoft\User\Login\Cookie\CookieLoginMiddleware;

return [
    'locales' => ['en' => 'en-US', 'es' => 'es-ES'],

    'middlewares' => [
        ErrorCatcher::class,
        SessionMiddleware::class,
        CookieMiddleware::class,
        CookieLoginMiddleware::class,
        Locale::class,
        Router::class,
    ],

    'yiisoft/aliases' => [
        'aliases' => [
            '@root' => dirname(__DIR__),
            '@assets' => '@root/public/assets',
            '@assetsUrl' => '/assets',
            '@images' => '@public/image',
            '@layout' => '@storage/layout',
            '@messages' => '@storage/messages',
            '@npm' => '@root/node_modules',
            '@public' => '@root/public',
            '@resources' => '@root/resources',
            '@runtime' => '@root/runtime',
            '@storage' => '@root/storage',
            '@translations' => '@root/storage/translations',
            '@vendor' => '@root/vendor',
            '@views' => '@storage/view',
            '@widget' => '@root/config/widget',
            '@widget' => '@root/config/widget',
        ],
    ],

    'yiisoft/router-fastroute' => [
        'enableCache' => false,
    ],

    'yiisoft/translator' => [
        'locale' => 'en',
        'fallbackLocale' => 'en',
        'defaultCategory' => 'app',
        'categorySources' => [
            // You can add categories from your application and additional modules using `Reference::to` below
            // Reference::to(ApplicationCategorySource::class),
            Reference::to('translation.app'),
        ],
    ],

    'yiisoft/view' => [
        'basePath' => '@views',
        'parameters' => [
            'aliases' => Reference::to(Aliases::class),
            'csrfToken' => Reference::to(CsrfTokenInterface::class),
            'currentRoute' => Reference::to(CurrentRoute::class),
            'currentUser' => Reference::to(CurrentUser::class),
            'flash' => Reference::to(Flash::class),
            'translator' => Reference::to(TranslatorInterface::class),
            'urlGenerator' => Reference::to(UrlGeneratorInterface::class),
        ],
        'theme' => [
            'pathMap' => [
                '@layout' => '@layout',
            ],
        ]
    ],

    'yiisoft/yii-console' => [
        'commands' => [
            'hello' => HelloCommand::class,
        ],
    ],
];
