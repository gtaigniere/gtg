    <section id="section_connexion">

        <h1>Connexion</h1>

        <form action="" method="POST">

        <div>
            <label for="pseudo">Pseudo :</label>
            <input id="pseudo" type="text" name="pseudo"
                   value="<?php if(isset($pseudo)) {echo $pseudo;} ?>" required />
        </div>

        <div>
            <label for="pwd">Mot de passe :</label>
            <input id="pwd" type="password" name="pwd" required />
        </div>

        <button class="btn btn-info">Se connecter</button>

        </form>

    </section>