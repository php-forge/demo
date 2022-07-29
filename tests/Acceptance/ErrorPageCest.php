<?php

declare(strict_types=1);

namespace Forge\Demo\Tests\Acceptance;

use Forge\Demo\Tests\Support\AcceptanceTester;

final class ErrorPageCest
{
    public function errorPage(AcceptanceTester $I): void
    {
        $I->amGoingTo('go to the error page');
        $I->amOnPage('/noexist');

        $I->wantTo('see error page.');
        $I->see('We were unable to find the page /en/noexist.');
    }
}
