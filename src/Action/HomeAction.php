<?php

declare(strict_types=1);

namespace Forge\Demo\Action;

use Forge\Service\View;
use Psr\Http\Message\ResponseInterface;

final class HomeAction
{
    public function run(View $view): ResponseInterface
    {
        return $view->render('blog/home');
    }
}
