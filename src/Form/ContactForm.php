<?php

declare(strict_types=1);

namespace Forge\App\Form;

use Forge\FormValidator\Error\RequiredError;
use Forge\FormValidator\FormValidator;
use Yiisoft\Translator\TranslatorInterface;
use Yiisoft\Validator\Rule\Required;

final class ContactForm extends FormValidator
{
    use RequiredError;

    public function __construct(private TranslatorInterface $translator)
    {
        parent::__construct();
    }

    private array $attachment = [];
    private string $email = '';
    private string $message = '';
    private string $name = '';
    private string $subject = '';

    public function getLabels(): array
    {
        return $this->contactTranslate();
    }

    public function getPlaceholders(): array
    {
        return $this->contactTranslate();
    }

    public function getRules(): array
    {
        $required = new Required(message: $this->getRequiredErrorMessage());

        return [
            'email' => [$required],
            'message' => [$required],
            'name' => [$required],
            'subject' => [$required],
        ];
    }

    public function reset(): void
    {
        $this->attachment = [];
        $this->email = '';
        $this->message = '';
        $this->name = '';
        $this->subject = '';
    }

    private function contactTranslate(): array
    {
        return [
            'email' => $this->translator->translate('contact.email'),
            'message' => $this->translator->translate('contact.message'),
            'name' => $this->translator->translate('contact.name'),
            'subject' => $this->translator->translate('contact.subject'),
        ];
    }
}
