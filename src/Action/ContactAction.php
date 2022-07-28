<?php

declare(strict_types=1);

namespace Forge\Demo\Action;

use Forge\Demo\Form\ContactForm;
use Forge\Service\Mailer;
use Forge\Service\View;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Yiisoft\Aliases\Aliases;
use Yiisoft\Csrf\CsrfTokenInterface;
use Yiisoft\Http\Method;
use Yiisoft\Router\UrlGeneratorInterface;
use Yiisoft\Session\Flash\Flash;
use Yiisoft\Translator\TranslatorInterface;
use Yiisoft\Validator\ValidatorInterface;
use Yiisoft\Yii\View\ViewRenderer;

final class ContactAction
{
    public function run(
        Aliases $aliases,
        CsrfTokenInterface $csrfToken,
        Flash $flash,
        Mailer $mailer,
        ServerRequestInterface $serverRequest,
        TranslatorInterface $translator,
        UrlGeneratorInterface $urlGenerator,
        ValidatorInterface $validator,
        View $view
    ): ResponseInterface {
        /** @var string[] */
        $body = $serverRequest->getParsedBody();
        $method = $serverRequest->getMethod();

        $contactForm = new ContactForm($translator);

        if ($method === Method::POST && $contactForm->load($body) && $validator->validate($contactForm)->isValid()) {
            $contactFormName = $contactForm->getFormName();
            /** @var array */
            $attachments = $serverRequest->getUploadedFiles()[$contactFormName] ?? [];
            $mailerResult = $mailer
                ->attachments($attachments)
                ->from($contactForm->getEmail())
                ->subject($contactForm->getSubject())
                ->signatureImage($aliases->get('@images/mail-yii3-signature.png'))
                ->viewPath($aliases->get('@storage/mailer'))
                ->send(
                    'admin@example.com',
                    [
                        'message' => $contactForm->getMessage(),
                        'username' => $contactForm->getName(),
                    ],
                );

            if ($mailerResult) {
                $flash->add(
                    'forge-app',
                    [
                        'content' => 'Thank you for contacting us, we\'ll get in touch with you as soon as possible.',
                        'type' => 'success',
                    ]
                );
            } else {
                $flash->add(
                    'forge-app',
                    [
                        'content' => 'There was an error sending your message. Please try again later.',
                        'type' => 'danger',
                    ]
                );
            }

            $contactForm->reset();
        }

        return $view->render('contact/index', ['form' => $contactForm, 'urlGenerator' => $urlGenerator]);
    }
}
