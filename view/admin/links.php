<?php

use Model\Link;
use Util\ErrorManager;
use Util\SuccessManager;

ob_start();

?>

<section id="section_links-admin">

    <h2>Les liens</h2>

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

                        <form action="?target=links&action=update" method="POST">

                            <td style="display: none;"><input type="hidden" name="idLink"
                                                              value="<?= $link->getIdLink() ?>"/></td>
<!--                            <td style="display: none;">--><?php //$form->input('idLink') ?><!--</td>-->

                            <td><input type="text" name="label" value="<?php if (!is_null($link->getLabel())) {
                                    echo $link->getLabel();
                                } ?>"/></td>

                            <td><input type="text" name="adrOrFile" value="<?php if (!is_null($link->getAdrOrFile())) {
                                    echo $link->getAdrOrFile();
                                } ?>"/></td>

                            <td>
                                <select name="idRub">
                                    <option value="">-- null --</option>
                                    <?php foreach ($rubrics as $rubric) : ?>
                                        <option value="<?= $rubric->getIdRub() ?>"
                                            <?= (!is_null($link->getRubric()) && $link->getRubric()->getIdRub() == $rubric->getIdRub()) ? 'selected' : ''; ?>
                                        ><?= $rubric->getLabel() ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>

                            <td>
                                <select name="idType">
                                    <option value="">-- null --</option>
                                    <?php foreach ($types as $type) : ?>
                                        <option value="<?= $type->getIdType() ?>"
                                            <?= (!is_null($link->getType()) && $link->getType()->getIdType() == $type->getIdType()) ? 'selected' : ''; ?>
                                        ><?= $type->getLabel() ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>

                            <td class="td-modif">
                                <button class="btn btn-warning">Modifier</button>
                            </td>

                        </form>

                        <td class="td-suppr">
                            <a href="?target=links&action=delete&idLink=<?= $link->getIdLink() ?>" class="btn btn-danger">Supprimer</a>
                        </td>

                    </tr>

                <?php endif;
            endforeach; ?>

            <form action="?target=links&action=insert" method="POST">
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

<!--<script src="--><?php //ROOT_DIR ?><!--../script/mod-sup-form.js"></script>-->

<?php $section = ob_get_clean(); ?>