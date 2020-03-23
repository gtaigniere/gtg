<?php

use Model\Recette;

ob_start();

?>

    <section id="section_recettes-admin">

        <h2>Les recettes</h2>

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
                    <th>Label</th>
                    <th>Pour</th>
                    <th>Photo</th>
                    <th colspan="2">Options</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($recettes as $recette) :
                    if ($recette instanceof Recette) : ?>

                        <tr>

                            <form action="" method="POST" onsubmit="return sure()">

                                <td style="display: none;"><input type="text" name="idRec" value="<?= $recette->getIdRec() ?>" /></td>

                                <td><input type="text" name="label" value="<?php if (is_null($recette->getLabel())) { echo $recette->getLabel(); } ?>" required /></td>

                                <td><input class="input-pour" type="number" name="pour" value="<?php if (is_null($recette->getPour())) { echo $recette->getPour(); } ?>" required /></td>

                                <td><input type="text" name="photo" value="<?php if (is_null($recette->getPhoto())) { echo $recette->getPhoto(); } ?>" required /></td>

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
                            <input type="text" name="label" value="<?php if(isset($label)) {
                                echo $label;
                            } ?>" required />
                        </td>

                        <td>
                            <input class="input-pour" type="number" name="pour" value="<?php if(isset($pour)) {
                                echo $pour;
                            } ?>" required />
                        </td>

                        <td>
                            <input type="text" name="photo" value="<?php if(isset($photo)) {
                                echo $photo;
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
                <a href="?target=users">
                    <button class="btn btn-primary">Utilisateurs</button>
                </a>
            </p>

        </div>

    </section>

<?php $section =ob_get_clean(); ?>