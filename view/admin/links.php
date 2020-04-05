<?php

use Model\Link;
use Util\ErrorManager;
use Util\SuccessManager;

ob_start();

?>

<section class="sect-adm" id="sect-adm_links">

    <h1>Les liens</h1>

    <?php
        foreach (SuccessManager::getMessages() as $message) : ?>
            <div class="alert alert-success" role="alert">
                <?= $message ?>
            </div>
        <?php endforeach;
        SuccessManager::destroy();

        foreach (ErrorManager::getMessages() as $message) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $message ?>
            </div>
        <?php endforeach;
        ErrorManager::destroy();
    ?>

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

                        <form action="?target=admin&admTarg=link&action=update" method="POST">

                            <td style="display: none;"><input type="hidden" name="idLink"
                                        value="<?= $link->getIdLink() ?>"/></td>
<!--                            <td style="display: none;">--><?php //$form->input('idLink') ?><!--</td>-->

                            <td><input type="text" name="label"
                                       value="<?php if (!is_null($link->getLabel())) {
                                    echo $link->getLabel();
                                } ?>"/></td>

                            <td><input type="text" name="adrOrFile"
                                       value="<?php if (!is_null($link->getAdrOrFile())) {
                                    echo $link->getAdrOrFile();
                                } ?>"/></td>

                            <td>
                                <select name="idRub">
                                    <option value="">-- null --</option>
                                    <?php foreach ($rubrics as $rubric) : ?>
                                        <option value="<?= $rubric->getIdRub() ?>"
                                            <?= (($link->getRubric() != null) && $link->getRubric()->getIdRub() == $rubric->getIdRub()) ? 'selected' : ''; ?>
                                        ><?= $rubric->getLabel() ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>

                            <td>
                                <select name="idType">
                                    <option value="">-- null --</option>
                                    <?php foreach ($types as $type) : ?>
                                        <option value="<?= $type->getIdType() ?>"
                                            <?= (($link->getType() != null) && $link->getType()->getIdType() == $type->getIdType()) ? 'selected' : ''; ?>
                                        ><?= $type->getLabel() ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>

                            <td class="td-modif">
                                <button class="btn btn-warning">Modifier</button>
                            </td>

                        </form>

                        <td class="td-suppr">
                            <a href="?target=admin&admTarg=link&action=delete&idLink=<?= $link->getIdLink() ?>" class="btn btn-danger">Supprimer</a>
                        </td>

                    </tr>

                <?php endif;
            endforeach; ?>

            <form action="?target=admin&admTarg=link&action=insert" method="POST">
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
                                <option value="<?= $rubric->getIdRub() ?>"><?= $rubric->getLabel() ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>

                    <td>
                        <select name="idType">
                            <option value="">Choose an option</option>
                            <?php foreach ($types as $type) : ?>
                                <option value="<?= $type->getIdType() ?>"><?= $type->getLabel() ?></option>
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
            <a href="?target=admin&admTarg=user">
                <button class="btn btn-primary">Utilisateurs</button>
            </a>
            <a href="?target=admin&admTarg=typAndRub">
                <button class="btn btn-primary">Types et Rubriques</button>
            </a>
            <a href="?target=admin&admTarg=recette">
                <button class="btn btn-primary">Recettes</button>
            </a>
        </p>

    </div>

</section>

<?php $section = ob_get_clean(); ?>