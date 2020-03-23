<?php

use Model\User;

ob_start();

?>

    <section id="section_users-admin">

        <h2>Les utilisateurs</h2>

<!--        --><?php
//        if (isset($uSuccess) AND isset($ams)) :
//            switch ($ams) {
//                case '1':
//                    $message = 'Utilisateur ajouté avec succès !';
//                    break;
//                case '2':
//                    $message = 'Utilisateur modifié avec succès !';
//                    break;
//                case '3':
//                    $message = 'Utilisateur supprimé avec succès !';
//                    break;
//            }
//            ?>
<!--            <div class= "alert alert-success" role="alert">-->
<!--                --><?php //echo $message; ?>
<!--            </div>-->
<!--        --><?php //endif; ?>
<!--        --><?php
//        if (isset($uNoSuccess)) :
//            switch ($uNoSuccess) {
//                case '0':
//                    $message = 'L\'email ne peut contenir que lettres, chiffres, "-", "_", "&","@", et "." !';
//                    break;
//                case '1':
//                    $message = 'Le nom et le prénom ne peuvent contenir que des lettres et "-" !';
//                    break;
//                case '2':
//                    $message = 'Le mot de passe ne peut contenir que des lettres et des chiffres !';
//                    break;
//                case '3':
//                    $message = 'Echec de l\'ajout de l\'utilisateur';
//                    break;
//                case '4':
//                    $message = 'Echec de la modification de l\'utilisateur';
//                    break;
//                case '5':
//                    $message = 'Echec de la suppression de l\'utilisateur';
//                    break;
//            }
//            ?>
<!--            <div class= "alert alert-danger" role="alert">-->
<!--                --><?php //echo $message; ?>
<!--            </div>-->
<!--        --><?php //endif; ?>

        <div>

            <table>

                <thead>
                <tr>
                    <th>Pseudo</th>
                    <th>Email</th>
                    <th>Confirmed</th>
                    <th colspan="2">Options</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($users as $user) :
                    if ($user instanceof User) : ?>

                    <tr>

                        <form action="" method="POST" onsubmit="return sure()">

                            <td style="display: none;"><input type="text" name="idUser" value="<?= $user->getIdUser() ?>" /></td>

                            <td><input type="text" name="pseudo" value="<?php if (is_null($user->getPseudo())) { echo $user->getPseudo(); } ?>" required /></td>

                            <td><input type="email" name="email" value="<?php if (is_null($user->getEmail())) { echo $user->getEmail(); } ?>" required /></td>

                            <td style="display: none;"><input type="text" name="confirmKey" value="<?= $user->getConfirmKey() ?>" required /></td>

                            <td><input type="text" name="confirmed" value="<?php if (is_null($user->isConfirmed())) { echo $user->isConfirmed(); } ?>" required /></td>

                            <td class="td-modif"><button class="btn btn-warning">Modifier</button></td>

                        </form>

                        <td class="td-suppr"><a href="" class="btn btn-danger"
                            onclick="return confirm('Etes-vous sûr ?')">Supprimer</a></td>

                    </tr>

                    <?php endif;
                endforeach; ?>

                <form action="" method="POST">
                    <tr>

                        <td>
                            <input type="text" name="pseudo" value="<?php if(isset($pseudo)) {
                                echo $pseudo;
                            } ?>" required />
                        </td>

                        <td>
                            <input type="email" name="email" value="<?php if(isset($email)) {
                                echo $email;
                            } ?>" required />
                        </td>

                        <td>
                            <input type="text" name="confirmed" value="<?php if(isset($confirmed)) {
                                echo $confirmed;
                            } ?>" required />
                        </td>

                        <td class="td-ajout" colspan="2"><button class="btn btn-success">Ajouter</button></td>

                    </tr>
                </form>

                </tbody>

            </table>

            <p>
                <a href="?target=links">
                    <button class="btn btn-primary">Liens</button>
                </a>
                <a href="?target=typsrubs">
                    <button class="btn btn-primary">Types et Rubriques</button>
                </a>
                <a href="?target=recettes">
                    <button class="btn btn-primary">Recettes</button>
                </a>
            </p>

        </div>

    </section>

<?php $section =ob_get_clean(); ?>