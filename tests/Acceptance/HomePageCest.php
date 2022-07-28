<?php

declare(strict_types=1);

namespace Forge\Demo\Tests\Acceptance;

use Forge\Demo\Tests\AcceptanceTester;

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
