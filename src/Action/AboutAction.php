<?php

declare(strict_types=1);

namespace Forge\Demo\Action;

use Psr\Http\Message\ResponseInterface;
use Yiisoft\Router\CurrentRoute;
use Yiisoft\Yii\View\ViewRenderer;

final class AboutAction
{
    public function run(CurrentRoute $currentRoute, ViewRenderer $viewRenderer): ResponseInterface
    {
        $lenguage = $currentRoute->getArgument('_language');
        return $viewRenderer->render('blog/' . $lenguage . '/about');
    }
}
