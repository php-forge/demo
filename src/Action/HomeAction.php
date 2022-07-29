<?php

declare(strict_types=1);

namespace Forge\Demo\Action;

use Psr\Http\Message\ResponseInterface;
use Yiisoft\Yii\View\ViewRenderer;

final class HomeAction
{
    public function run(ViewRenderer $viewRenderer): ResponseInterface
    {
        return $viewRenderer->render('blog/home');
    }
}
