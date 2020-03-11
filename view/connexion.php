<?php ob_start(); ?>

    <section id="section_connexion">

        <h2>Connexion</h2>

        <?php if ($cNoSuccess == 1) : ?>
            <div class= "alert alert-success" role="alert">
                Cet utilisateur n'existe pas !
            </div>
        <?php elseif ($cNoSuccess == 2) : ?>
            <div class= "alert alert-success" role="alert">
                Le mot de passe et le nom d'utilisateur ne correspondent pas !
            </div>
        <?php endif; ?>

        <form action="connexion.ctrl.php" method="POST">

        <div>
        <label>Nom d'utilisateur :</label>
        <input type="nomUser" name="nomUser" value="<?php if(isset($nomUser)) {echo $nomUser;} ?>" required />
        </div>

        <div>
        <label>Mot de passe :</label>
        <input type="password" name="pwd" required />
        </div>

        <button class="btn btn-info">Se connecter</button>

        </form>

    </section>

<?php $section = ob_get_clean(); ?>