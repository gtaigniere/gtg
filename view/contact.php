<?php ob_start(); ?>

    <section id="section_contact">

        <h2>Contact</h2>

        <?php if ($coSuccess) : ?>
            <div class="alert alert-success" role="alert">
                Message envoyé !
            </div>
        <?php endif; ?>

        <?php if (isset($coNoSuccess) && $coNoSuccess != '') : ?>
            <div id="success" class="alert alert-danger" role="alert">
                <?php echo $coNoSuccess; ?>
            </div>
        <?php endif; ?>

        <form class="form_contact" action="../ctrl/contact.ctrl.php" method="POST">

            <div>
                <label>Nom : </label>
                <input type="text" name="nom" required>
            </div>

            <div>
                <label>Prénom : </label>
                <input type="text" name="prenom" required>
            </div>

            <div>
                <label>Mail : </label>
                <input type="email" name="mail" placeholder="contact@email.fr" required>
            </div>

            <div>
                <label>Objet : </label>
                <input type="text" name="objet" required>
            </div>

            <div class="message_contact">
                <label>Message : </label>
                <textarea class="textarea_contact" name="message" rows="8" maxlength="400" required></textarea>
            </div>

            <button class="btn btn-info">Envoyer</button>

        </form>

    </section>

  <?php $section = ob_get_clean(); ?>