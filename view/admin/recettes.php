<?php ob_start(); ?>

    <section id="section_recettes-admin">

        <h2>Les recettes</h2>

        <?php
        if (isset($uSuccess) AND isset($ams)) :
            switch ($ams) {
                case '1':
                    $message = 'Utilisateur ajouté avec succès !';
                    break;
                case '2':
                    $message = 'Utilisateur modifié avec succès !';
                    break;
                case '3':
                    $message = 'Utilisateur supprimé avec succès !';
                    break;
            }
            ?>
            <div class= "alert alert-success" role="alert">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
        <?php
        if (isset($uNoSuccess)) :
            switch ($uNoSuccess) {
                case '0':
                    $message = 'L\'email ne peut contenir que lettres, chiffres, "-", "_", "&","@", et "." !';
                    break;
                case '1':
                    $message = 'Le nom et le prénom ne peuvent contenir que des lettres et "-" !';
                    break;
                case '2':
                    $message = 'Le mot de passe ne peut contenir que des lettres et des chiffres !';
                    break;
                case '3':
                    $message = 'Echec de l\'ajout de l\'utilisateur';
                    break;
                case '4':
                    $message = 'Echec de la modification de l\'utilisateur';
                    break;
                case '5':
                    $message = 'Echec de la suppression de l\'utilisateur';
                    break;
            }
            ?>
            <div class= "alert alert-danger" role="alert">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <div>

            <table>

                <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th colspan="2">Options</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($users as list($idU, $name, $ftname, $mail)) : ?>
                    <tr>

                        <form action="modif-user.ctrl.php" method="POST" onsubmit="return sure()">

                            <td style="display: none;"><input type="text" name="idUser" value="<?php if(isset($idU)) {echo $idU;} ?>" /></td>

                            <td><input type="text" name="nomUser" value="<?php if(isset($name)) {echo $name;} ?>" required /></td>

                            <td><input type="text" name="prenom" value="<?php if(isset($ftname)) {echo $ftname;} ?>" required /></td>

                            <td><input type="text" name="email" value="<?php if(isset($mail)) {echo $mail;} ?>" required /></td>

                            <td class="td-modif"><button class="btn btn-warning">Modifier</button></td>

                        </form>

                        <td class="td-suppr"><a href="suppr-user.ctrl.php?idUser=<?php echo $idU; ?>" class="btn btn-danger" onclick="return confirm('Etes-vous sûr ?')">Supprimer</a></td>

                    </tr>
                <?php endforeach; ?>

                <form action="ajout-user.ctrl.php" method="POST" onsubmit="return sure()">
                    <tr>

                        <td><input type="text" name="nomUser" value="<?php if(isset($nomUser)) {echo $nomUser;} ?>" required /></td>

                        <td><input type="text" name="prenom" value="<?php if(isset($prenom)) {echo $prenom;} ?>" required /></td>

                        <td><input type="email" name="email" value="<?php if(isset($email)) {echo $email;} ?>" required /></td>

                        <td class="td-ajout" colspan="2"><button class="btn btn-success">Ajouter</button></td>

                    </tr>
                </form>

                </tbody>

            </table>

            <p>
                <a href="accueil-admin.ctrl.php"><button class="btn btn-primary">Liens</button></a>
                <a href="types_rubriques.ctrl.php"><button class="btn btn-primary">Types et Rubriques</button></a>
            </p>

        </div>

    </section>

<?php $section =ob_get_clean(); ?>