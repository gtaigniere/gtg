<?php ob_start(); ?>

    <section id="section_inscription">

        <h2>Inscription</h2>

        <form action="inscription.ctrl.php" method="POST">

            <div>
                <label>Nom :</label>
                <input type="text" name="nomUser" value="<?php if(isset($nomUser)) {echo $nomUser;} ?>" required />
            </div>

            <div>
                <label>Prénom :</label>
                <input type="text" name="prenom" value="<?php if(isset($prenom)) {echo $prenom;} ?>" required />
            </div>

            <div>
                <label>Email :</label>
                <input type="email" name="email" value="<?php if(isset($email)) {echo $email;} ?>" placeholder="inscription@email.fr" required />
            </div>

            <div>
                <label>Mot de passe :</label>
                <input type="password" name="pwd" required />
            </div>

            <button class="btn btn-info">S'inscrire</button>

        </form>

    </section>

<?php $section = ob_get_clean(); ?>