<?php

declare(strict_types=1);

namespace Forge\Demo\Tests\Functional;

use Forge\Demo\Tests\Support\FunctionalTester;

final class IndexCest
{
    public function testIndexPage(FunctionalTester $I): void
    {
        $I->wantTo('index page works.');
        $I->amOnPage('/');

        $I->expectTo('see page index.');
        $I->see('Hello!');
    }
}
