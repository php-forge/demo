<?php

declare(strict_types=1);

namespace Forge\Demo\Tests\Acceptance;

use Forge\Demo\Tests\Support\AcceptanceTester;

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
