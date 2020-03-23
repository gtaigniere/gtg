<?php

use Model\Link;

ob_start();

?>

    <section id="section_links-admin">

        <h2>Les liens</h2>

<!--        --><?php
//        if (isset($lSuccess) AND isset($ams)) :
//            switch ($ams) {
//                case '1':
//                    $message = 'Lien ajouté avec succès !';
//                    break;
//                case '2':
//                    $message = 'Lien modifié avec succès !';
//                    break;
//                case '3':
//                    $message = 'Lien supprimé avec succès !';
//                    break;
//            }
//            ?>
<!--            <div class="alert alert-success" role="alert">-->
<!--                --><?php //echo $message; ?>
<!--            </div>-->
<!--        --><?php //endif; ?>
<!--        --><?php
//        if (isset($lNoSuccess)) :
//            switch ($lNoSuccess) {
//                case '1':
//                    $message = 'L\'adresse/fichier n\'est pas correcte !';
//                    break;
//                case '2':
//                    $message = 'Le nom du lien ne peut contenir que des lettres, des chiffres, "_", "-", "(", ")", et " " !';
//                    break;
//                case '3':
//                    $message = 'Echec de l\'ajout du lien';
//                    break;
//                case '4':
//                    $message = 'Echec de la modification du lien';
//                    break;
//                case '5':
//                    $message = 'Echec de la suppression du lien';
//                    break;
//            }
//            ?>
<!--            <div class="alert alert-danger" role="alert">-->
<!--                --><?php //echo $message; ?>
<!--            </div>-->
<!--        --><?php //endif; ?>

        <div>

            <table>

                <thead>
                <tr>
                    <th>Nom du lien</th>
                    <th>Adresse / Fichier</th>
                    <th>Rubrique</th>
                    <th>Type</th>
                    <th colspan="2">Options</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach ($links as $link) :
                    if ($link instanceof Link) : ?>

                    <tr>

                        <form action="" method="POST" onsubmit="return sure()">

                            <td style="display: none;"><input type="text" name="idLink" value="<?= $link->getIdLink() ?>"/></td>

                            <td><input type="text" name="label" value="<?php if (!is_null($link->getLabel())) { echo $link->getLabel(); } ?>"/></td>

                            <td><input type="text" name="adrOrFile" value="<?php if (!is_null($link->getAdrOrFile())) { echo $link->getAdrOrFile(); } ?>"/></td>

                            <td>
                                <select name="labelRubric">
                                    <?php foreach ($rubrics as $rubric) : ?>
                                        <option value="<?= $rubric->getIdRub() ?>"
                                            <?= $link->getRubric()->getIdRub() == $rubric->getIdRub() ? 'selected' : ''; ?>
                                        ><?= $rubric->getLabel() ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>

                            <td>
                                <select name="labelType">
                                    <?php foreach ($types as $type) : ?>
                                        <option value="<?= $type->getIdType() ?>"
                                            <?= $link->getType()->getIdType() == $type->getIdType() ? 'selected' : ''; ?>
                                        ><?= $type->getLabel() ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>

                            <td class="td-modif">
                                <button class="btn btn-warning">Modifier</button>
                            </td>

                        </form>

                        <td class="td-suppr"><a href="" class="btn btn-danger"
                            onclick="return confirm('Etes-vous sûr ?')">Supprimer</a></td>
                    </tr>

                    <?php endif;
                endforeach; ?>

                <form action="" method="POST">
                    <tr>

                        <td><input type="text" name="label" value="<?php if (isset($label)) {
                                echo $label;
                            } ?>" required/></td>

                        <td><input type="text" name="adrOrFile" value="<?php if (isset($adrOrFile)) {
                                echo $adrOrFile;
                            } ?>" required/></td>

                        <td>
                            <select name="idRub">
                                <option value="">Choose an option</option>
                                <?php foreach ($rubrics as $rubric) : ?>
                                    <option value="<?= $rubric->getLabel() ?>"><?= $rubric->getLabel() ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>

                        <td>
                            <select name="idType">
                                <option value="">Choose an option</option>
                                <?php foreach ($types as $type) : ?>
                                    <option value="<?= $type->getIdType() ?>"

                                    ><?= $type->getLabel() ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>

                        <td class="td-ajout" colspan="2">
                            <button class="btn btn-success">Ajouter</button>
                        </td>

                    </tr>
                </form>

                </tbody>

            </table>

            <p>
                <a href="?target=users">
                    <button class="btn btn-primary">Utilisateurs</button>
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

<?php $section = ob_get_clean(); ?>

