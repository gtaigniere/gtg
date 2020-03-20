<?php ob_start(); ?>

    <section id="section_inscription">

        <h2>Inscription</h2>

        <form action="" method="POST">

            <div>
                <label for="pseudo">Pseudo :</label>
                <input id="pseudo" type="text" name="nomUser" value="<?php if(isset($pseudo)) {echo $pseudo;} ?>" required />
            </div>

            <div>
                <label for="mail">Email :</label>
                <input id="mail" type="email" name="email" value="<?php if(isset($email)) {echo $email;} ?>" placeholder="inscription@email.fr" required />
            </div>

            <div>
                <label for="pwd">Mot de passe :</label>
                <input id="pwd" type="password" name="pwd" required />
            </div>

            <button class="btn btn-info">S'inscrire</button>

        </form>

    </section>

<?php $section = ob_get_clean(); ?>