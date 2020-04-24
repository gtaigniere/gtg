<?php

use Html\Form;
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

            <?php foreach ($forms as $form) :
                if ($form instanceof Form) : ?>

                    <tr>

                        <form action="?target=admin&admTarg=link&action=update" method="POST">

                            <?= $form->input('idLink', null, ['style' => 'display: none;', 'type' => 'hidden']); ?>

                            <td>
                                <?= $form->input('label', null, ['required' => 'required']); ?>
                            <td>
                                <?= $form->input('adrOrFile', null, ['required' => 'required']); ?>
                            <td>
                                <?php
                                $options = [];
                                foreach($rubrics as $rubric) {
                                    $options[$rubric->getIdRub()] = $rubric->getLabel();
                                }
                                ?>
                                <?= $form->select('idRub', $options, null, '--null--') ?>
                            </td>

                            <td>
                                <?php
                                $options = [];
                                foreach($types as $type) {
                                    $options[$type->getIdType()] = $type->getLabel();
                                }
                                ?>
                                <?= $form->select('idType', $options, null, '--null--') ?>
                            </td>

                            <td class="td-modif">
                                <button class="btn btn-warning">Modifier</button>
                            </td>

                        </form>

                        <td class="td-suppr">
                            <a href="?target=admin&admTarg=link&action=delete&id=<?= $link->getIdLink() ?>" class="btn btn-danger">Supprimer</a>
                        </td>

                    </tr>

                <?php endif;
            endforeach; ?>

            <form action="?target=admin&admTarg=link&action=insert" method="POST">
                <tr>

                    <td>
                        <?= $formAdd->input('label', null, ['required' => 'required']); ?>
                    <td>
                        <?= $formAdd->input('adrOrFile', null, ['required' => 'required']); ?>
                    <td>
                        <?php
                        $options = [];
                        foreach($rubrics as $rubric) {
                            $options[$rubric->getIdRub()] = $rubric->getLabel();
                        }
                        ?>
                        <?= $formAdd->select('idRub', $options, null, 'Choose an option') ?>
                    </td>

                    <td>
                        <?php
                        $options = [];
                        foreach($types as $type) {
                            $options[$type->getIdType()] = $type->getLabel();
                        }
                        ?>
                        <?= $formAdd->select('idType', $options, null, 'Choose an option') ?>
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