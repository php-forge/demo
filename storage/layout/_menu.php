<?php

declare(strict_types=1);

use Forge\Form\Form;
use Forge\Html\Helper\Encode;
use Forge\Html\Widgets\Components\Button;
use Forge\Html\Widgets\Components\Nav;
use Forge\Html\Widgets\Components\NavBar;
use Yiisoft\Aliases\Aliases;
use Yiisoft\Http\Method;
use Yiisoft\Router\CurrentRoute;

/**
 * @var Aliases $aliases
 * @var CurrentRoute $currentRoute
 */
$lang = Encode::content($currentRoute->getArgument('_language'));
?>

<?= NavBar::create($aliases->get('@widget/menu/navbar.php'))
    ->brandLink($urlGenerator->generate('home'))
    ->begin() ?>

    <?= Nav::create($aliases->get('@widget/menu/navleft.php'))
        ->currentPath($currentRoute->getUri()->getPath())
        ->items(
            [
                [
                    'label' => $translator->translate('layout.language.' . $lang),
                    'link' => '#',
                    'items' => [
                        [
                            'label' => $translator->translate('layout.language.en'),
                            'link' => $urlGenerator->generateFromCurrent(['_language' => 'en'], 'home'),
                        ],
                        [
                            'label' => $translator->translate('layout.language.es'),
                            'link' => $urlGenerator->generateFromCurrent(['_language' => 'es'], 'home'),
                        ],
                        [
                            'label' => $translator->translate('layout.language.ru'),
                            'link' => $urlGenerator->generateFromCurrent(['_language' => 'ru'], 'home'),
                        ],
                    ],
                ],
                [
                    'label' => $translator->translate('menu.contact'),
                    'link' => $urlGenerator->generate('contact', ['_language' => $lang]),
                ],
                [
                    'label' => $translator->translate('menu.about'),
                    'link' => $urlGenerator->generate('about', ['_language' => $lang]),
                ],
            ]
        )
    ?>

    <?= Nav::create($aliases->get('@widget/menu/navright.php'))
        ->currentPath($currentRoute->getUri()->getPath())
        ->items(
            [
                [
                    'label' => $translator->translate('menu.email.change'),
                    'link' => $urlGenerator->generate('email-change', ['_language' => $lang]),
                    'visible' => !$currentUser->isGuest(),
                ],
                [
                    'label' => $translator->translate('menu.register'),
                    'link' => $urlGenerator->generate('register', ['_language' => $lang]),
                    'visible' => $currentUser->isGuest(),
                ],
                [
                    'label' => $translator->translate('menu.login'),
                    'link' => $urlGenerator->generate('login', ['_language' => $lang]),
                    'visible' => $currentUser->isGuest(),
                ],
            ],
        )
    ?>

    <?php if (true !== $currentUser->isGuest()) : ?>
        <?= Form::create()
            ->action($urlGenerator->generate('logout'))
            ->class('ms-3')
            ->csrf($csrfToken->getValue())
            ->method(Method::POST)
            ->begin() ?>

            <?= Button::create()
                ->class('btn btn-outline-dark btn-sm')
                ->content(
                    $translator->translate('menu.logout') . ' (' . $currentUser->getIdentity()->account->username . ')',
                )
                ->id('logout')
                ->type('submit') ?>

        <?= Form::end() ?>
    <?php endif ?>
<?= NavBar::end();
