<?php

use Html\Form;
use Util\ErrorManager;
use Util\SuccessManager;

ob_start();

?>

    <section id="section_reply">

        <h1>Réponse</h1>

        <?php
        foreach (SuccessManager::getMessages() as $message) : ?>
            <div class="alert alert-success" role="alert">
                <?= $message ?>
            </div>
        <?php endforeach;
        SuccessManager::destroy();

        foreach (ErrorManager::getMessages() as $message) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $message ?>
            </div>
        <?php endforeach;
        ErrorManager::destroy();
        ?>

        <?php if ($form instanceof Form) : ?>

        <form class="form_contact" action="?target=admin&admTarg=contact&action=sendReply" method="POST">

            <div>
                <?= $form->input('mail', 'Mail :', ['type' => 'email', 'value' => $contactForm->getValue('mail'),'required' => 'required']); ?>
            </div>

            <div>
                <?= $form->input('object', 'Objet :', ['value' => 'rep->' . $contactForm->getValue('object'), 'required' => 'required']); ?>
            </div>

            <div class="message_reply">
                <?= $form->textarea('message', 'Message :', ['class' => 'contact', 'rows' => '8', 'maxlength' => '800', 'required' => 'required',
                    'placeholder' => $contactForm->getValue('firstname') . PHP_EOL .
                    $contactForm->getValue('received') . PHP_EOL .
                    $contactForm->getValue('object') . PHP_EOL .
                    $contactForm->getValue('message') . PHP_EOL]); ?>
            </div>

            <button class="btn btn-info">Envoyer</button>

        </form>

        <?php endif; ?>

    </section>

  <?php $section = ob_get_clean(); ?>