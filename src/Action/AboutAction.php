<?php

declare(strict_types=1);

namespace Forge\App\Action;

use Forge\Service\View;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;

final class AboutAction
{
    public function run(View $view): ResponseInterface
    {
        return $view->render('blog/about');
    }
}
