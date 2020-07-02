<?php

use Form\ContactForm;
use Util\ErrorManager;
use Util\SuccessManager;

ob_start();

?>

    <section id="section_contact">

        <h1>Contact</h1>

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

        <?php if ($contactForm instanceof ContactForm) : ?>

        <form class="form_contact" action="index.php" method="POST">



            <div>
                <?= $contactForm->input('firstname', 'Prénom :', ['required' => 'required']); ?>
            </div>

            <div>
                <?= $contactForm->input('mail', 'Mail :', ['type' => 'email', 'required' => 'required']); ?>
            </div>

            <div>
                <?= $contactForm->input('object', 'Objet :', ['required' => 'required']); ?>
            </div>

            <div class="message_contact">
                <?= $contactForm->textarea('message', 'Message :', ['class' => 'contact', 'rows' => '8', 'maxlength' => '400', 'required' => 'required']); ?>
            </div>

            <button class="btn btn-info">Envoyer</button>

        </form>

        <?php endif; ?>

    </section>

  <?php $section = ob_get_clean(); ?>