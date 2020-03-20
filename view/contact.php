<?php ob_start(); ?>

    <section id="section_contact">

        <h2>Contact</h2>

        <form class="form_contact" action="" method="POST">

            <div>
                <label for="prenom">Prénom : </label>
                <input id="prenom" type="text" name="prenom" required>
            </div>

            <div>
                <label for="mail">Mail : </label>
                <input id="mail" type="email" name="mail" placeholder="contact@email.fr" required>
            </div>

            <div>
                <label for="objet">Objet : </label>
                <input id="objet" type="text" name="objet" required>
            </div>

            <div class="message_contact">
                <label for="message">Message : </label>
                <textarea id="message" class="textarea_contact" name="message" rows="8" maxlength="400" required></textarea>
            </div>

            <button class="btn btn-info">Envoyer</button>

        </form>

    </section>

  <?php $section = ob_get_clean(); ?>