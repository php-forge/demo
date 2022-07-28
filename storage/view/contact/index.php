<?php

declare(strict_types=1);

use Forge\App\Form\ContactForm;
use Forge\Form\ButtonGroup;
use Forge\Form\Field;
use Forge\Form\Form;
use Forge\Form\Input\File;
use Forge\Form\Input\Text;
use Forge\Form\TextArea;

/** @var \Yiisoft\View\WebView $this */
$this->setTitle($translator->translate('contact.title'));
$field = Field::create($aliases->get('@widget/form/bootstrap5/Contact.php'));
?>

<h1 class="mb-3"><?= $this->getTitle() ?></h1>

<div class="alert alert-info mb-4 shadow" role="alert">
    <?= $translator->translate('contact.alert') ?>
</div>

<?= Form::create($aliases->get('@widget/form/bootstrap5/Form.php'))
    ->action($urlGenerator->generate('contact'))
    ->csrf($csrfToken->getValue())
    ->begin()
?>
    <div class="col-md-6 mb-3">
        <?= $field
            ->widget(Text::create(construct: [$form, 'name']))
            ->before('<span class="input-group-text"><i class="bi bi-person-fill"></i></span>')
            ->render();
        ?>
    </div>

    <div class="col-md-6 mb-3">
        <?= $field
            ->widget(Text::create(construct: [$form, 'email']))
            ->before('<span class="input-group-text">@</span>')
            ->render();
        ?>
    </div>

    <?= $field
        ->widget(Text::create(construct: [$form, 'subject']))
        ->before('<span class="input-group-text"><i class="bi bi-chat-left-fill"></i></span>')
        ->containerClass('mb-3')
        ->render();
    ?>

    <?= $field
        ->widget(TextArea::create(construct: [$form, 'message'])->attributes(['style' => 'height: 100px'])->rows(5))
        ->before('<span class="input-group-text"><i class="bi bi-textarea-t"></i></span>')
        ->containerClass('mb-3')
        ->render();
    ?>

    <?= $field
        ->widget(File::create(construct: [$form, 'attachment'])->multiple())
        ->beforeInput('<span class="input-group-text"><i class="bi bi-paperclip"></i></span>')
        ->containerClass('mb-3')
        ->inputContainerAttributes(['class' => 'input-group'])
        ->inputTemplate('{beforeInput}' . PHP_EOL . '{input}')
        ->labelClass('control-label mb-2')
        ->template('{label}' . PHP_EOL . '{field}')
        ->render();
    ?>

    <?= Field::create()
        ->widget(
            ButtonGroup::create()
                ->buttons(
                    [
                        [
                            'label' => $translator->translate('contact.button.submit'),
                            'type' => 'submit',
                            'attributes' => ['class' => 'btn btn-lg btn-primary'],
                        ],
                        [
                            'label' => $translator->translate('contact.button.reset'),
                            'type' => 'reset',
                            'attributes' => ['class' => 'btn btn-lg btn-danger'],
                        ],
                    ],
                )
                ->containerClass('btn-group'),
        )
        ->containerClass('justify-content-end btn-toolbar')
    ?>
<?= Form::end();
