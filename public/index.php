<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/vendor/autoload.php';

use Yiisoft\Config\Config;
use Yiisoft\Config\ConfigPaths;
use Yiisoft\Config\Modifier\RecursiveMerge;
use Yiisoft\Config\Modifier\ReverseMerge;
use Yiisoft\Yii\Runner\Http\HttpApplicationRunner;

$c3 = dirname(__DIR__) . '/c3.php';

if (is_file($c3)) {
    require_once $c3;
}

// PHP built-in server routing.
if (PHP_SAPI === 'cli-server') {
    /** @var string */
    $requestUri = $_SERVER['REQUEST_URI'] ?? '';

    if (is_file(__DIR__ . parse_url($requestUri, PHP_URL_PATH))) {
        return false;
    }

    // Explicitly set for URLs with dot.
    $_SERVER['SCRIPT_NAME'] = '/index.php';
}

/**
 *  In the above points to where configs will be copied to. The path is relative to where is. The option is read for
 *  the root package, which is typically an application. Default is "/config".
 */
define('YII_CONFIG_DIRECTORY', getenv('YII_CONFIG_DIRECTORY') ?: dirname(__DIR__));

/**
 *  Set debug value for web application runner, for default its `true` add additionally the validation of the
 *  container-di configurations (debug mode).
 */
define('YII_DEBUG', getenv('YII_DEBUG') ?: true);

/**
 *  Set environment value for web application runner, for default its `null`.
 *
 *  @link https://github.com/yiisoft/config#environments
 */
define('YII_ENV', getenv('YII_ENV') ?: null);

$config = new Config(
    new ConfigPaths(YII_CONFIG_DIRECTORY, 'config'),
    YII_ENV,
    [
        ReverseMerge::groups('events', 'events-web', 'events-console', 'routes', 'widgets'),
        RecursiveMerge::groups('events', 'events-web', 'events-console', 'params'),
    ],
);

// Run web application runner
$runner = (new HttpApplicationRunner(YII_CONFIG_DIRECTORY, YII_DEBUG, YII_ENV))
    ->withConfig($config)
    ->run();
