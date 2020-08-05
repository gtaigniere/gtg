<?php

use Model\Message;
use Core\Util\ErrorManager;
use Core\Util\SuccessManager;

?>

    <section id="sect-adm_contact">

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
            if ($contact instanceof Message) : ?>

            <div class="contact">
                <p class="firstname"><?= $contact->getFirstname(); ?></p>
                <p class="mail"><?= $contact->getMail(); ?></p>
                <p><?= $contact->getObject(); ?></p>
                <p><?= $contact->getReceived()->format('d-m-Y H:i'); ?></p>
                <p><?= $contact->getMessage(); ?></p>

                <p>
                    <a href="?target=admin&admTarg=contact&action=reply&id=<?= $contact->getId(); ?>"><button class="btn btn-secondary">Répondre</button></a>
                    <a href="?target=admin&admTarg=contact&action=delete&id=<?= $contact->getId(); ?>"><button class="btn btn-danger">Supprimer</button></a>
                </p>
            </div>

            <?php endif;
        endforeach; ?>

    </section>