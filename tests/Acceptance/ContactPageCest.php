<?php

declare(strict_types=1);

namespace Forge\Demo\Tests\Acceptance;

use Forge\Demo\Tests\Support\AcceptanceTester;

final class ContactPageCest
{
    public function contactPageWorks(AcceptanceTester $I)
    {
        $I->amGoingTo('go to the contact page');
        $I->amOnPage('/contact');
        $I->wantTo('ensure that contact page works');
        $I->see('Contact');
    }

    public function contactFormCanBeSubmitted(AcceptanceTester $I)
    {
        $I->amGoingTo('go to the contact page');
        $I->amOnPage('/contact');
        $I->amGoingTo('submit contact form with correct data');
        $I->fillField('#contactform-name', 'tester');
        $I->fillField('#contactform-email', 'tester@example.com');
        $I->fillField('#contactform-subject', 'test subject');
        $I->fillField('#contactform-message', 'test content');

        $I->click('Send');

        $I->see('Thank you for contacting us');
    }
}
