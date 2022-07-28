<?php

declare(strict_types=1);

namespace Forge\App\Tests\Acceptance;

use Forge\App\Tests\AcceptanceTester;

final class AboutPageCest
{
    public function aboutPageWorks(AcceptanceTester $I)
    {
        $I->amGoingTo('go to the about page');
        $I->amOnPage('/about');
        $I->wantTo('ensure that contact page works');
        $I->see('About');
    }
}
