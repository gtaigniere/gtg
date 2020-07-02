<?php

use Model\Contact;
use Util\ErrorManager;
use Util\SuccessManager;

ob_start();

?>

    <section id="sect-adm_contacts">

        <h1>Messages de contact</h1>

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

        <?php foreach($contacts as $contact) :
            if ($contact instanceof Contact) : ?>

            <p><?= $contact->getFirstname(); ?></p>
            <p><?= $contact->getMail(); ?></p>
            <p><?= $contact->getObject(); ?></p>
            <p><?= $contact->getReceived()->format('d-m-Y H:i'); ?></p>
            <p><?= $contact->getMessage(); ?></p>

            <?php endif;
        endforeach; ?>

    </section>

<?php $section = ob_get_clean(); ?>

