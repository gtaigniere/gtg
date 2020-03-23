<?php

use Model\Type;
use Model\Rubric;

ob_start();

?>

    <section id="section_types_rubrics-admin">

        <h2>Les types et les rubriques</h2>

<!--        --><?php
//        if (isset($success) AND isset($ams) AND ($success == 'type' OR $success == 'rubrique')) :
//            switch ($ams) {
//                case '1':
//                    $message = 'Type ajouté avec succès !';
//                    break;
//                case '3':
//                    $message = 'Type modifié avec succès !';
//                    break;
//                case '5':
//                    $message = 'Type supprimé avec succès !';
//                    break;
//                case '2':
//                    $message = 'Rubrique ajoutée avec succès !';
//                    break;
//                case '4':
//                    $message = 'Rubrique modifiée avec succès !';
//                    break;
//                case '6':
//                    $message = 'Rubrique supprimée avec succès !';
//                    break;
//            }
//            ?>
<!--            <div class= "alert alert-success" role="alert">-->
<!--                --><?php //echo $message; ?>
<!--            </div>-->
<!--        --><?php //endif; ?>
<!--        --><?php
//        if (isset($trNoSuccess)) :
//            switch ($trNoSuccess) {
//                case '1':
//                    $message = 'Un type ne peut contenir que des lettres, "-", et "_" !';
//                    break;
//                case '2':
//                    $message = 'Une rubrique ne peut contenir que des lettres, "-", et "_" !';
//                    break;
//                case '3':
//                    $message = 'Echec de l\'ajout du type';
//                    break;
//                case '4':
//                    $message = 'Echec de l\'ajout de la rubrique';
//                    break;
//                case '5':
//                    $message = 'Echec de la modification du type';
//                    break;
//                case '6':
//                    $message = 'Echec de la modification de la rubrique';
//                    break;
//                case '7':
//                    $message = 'Echec de la suppression du type';
//                    break;
//                case '8':
//                    $message = 'Echec de la suppression de la rubrique';
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
                    <th>Type</th>
                    <th colspan="2">Options</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach($types as $type) :
                    if ($type instanceof Type) : ?>

                    <tr>

                        <form action="" method="POST" onsubmit="return sure()">

                            <td style="display: none;"><input type="text" name="idType" value="<?= $type->getIdType() ?>"/></td>

                            <td><input type="text" name="label" value="<?php if (!is_null($type->getLabel())) { echo $type->getLabel(); } ?>"/></td>

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
                            <input type="text" name="label" value="<?php if (isset($label)) { echo $label; } ?>" required />
                        </td>

                        <td class="td-ajout" colspan="2"><button class="btn btn-success">Ajouter</button></td>

                    </tr>
                </form>

                </tbody>
            </table>

            <table>
                <thead>
                <tr>
                    <th>Rubrique</th>
                    <th>Image</th>
                    <th colspan="2">Options</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach($rubrics as $rubric) :
                    if ($rubric instanceof Rubric) : ?>

                    <tr>

                        <form action="" method="POST" onsubmit="return sure()">

                            <td style="display: none;"><input type="text" name="idRub" value="<?= $rubric->getIdRub() ?>"/></td>

                            <td><input type="text" name="label" value="<?php if (!is_null($rubric->getLabel())) { echo $rubric->getLabel(); } ?>"/></td>

                            <td><input type="text" name="label" value="<?php if (!is_null($rubric->getImage())) { echo $rubric->getImage(); } ?>"/></td>

                            <td class="td-modif"><button class="btn btn-warning">Modifier</button></td>

                        </form>

                        <td class="td-suppr"><a href="?index.php&target=link&action=del" class="btn btn-danger"
                            onclick="return confirm('Etes-vous sûr ?')">Supprimer</a></td>

                    </tr>

                    <?php endif;
                endforeach; ?>

                <form action="" method="POST">
                    <tr>

                        <td>
                            <input type="text" name="label" value="<?php if (isset($label)) { echo $label; } ?>" required />
                        </td>

                        <td>
                            <input type="text" name="image" value="<?php if (isset($image)) { echo $image; } ?>" required />
                        </td>

                        <td class="td-ajout" colspan="2"><button class="btn btn-success">Ajouter</button></td>

                    </tr>
                </form>

                </tbody>
            </table>

        </div>

        <p>
            <a href="?target=links">
                <button class="btn btn-primary">Liens</button>
            </a>
            <a href="?target=users">
                <button class="btn btn-primary">Utilisateurs</button>
            </a>
            <a href="?target=recettes">
                <button class="btn btn-primary">Recettes</button>
            </a>

        </p>

    </section>

<?php $section = ob_get_clean(); ?>