<?php

declare(strict_types=1);

namespace Forge\App\Tests\Acceptance;

use Forge\App\Tests\AcceptanceTester;

final class HomePageCest
{
    public function homePageWork(AcceptanceTester $I): void
    {
        $I->amGoingTo('go to the index page');
        $I->amOnPage('/');

        $I->expectTo('see page index.');
        $I->see('Hello!');
        $I->see("Let's start something great with Yii3!");
    }
}
