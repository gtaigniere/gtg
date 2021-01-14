<?php

use Core\Html\Form;
use Core\Util\{
    ErrorManager,
    SuccessManager
};

if (isset($forms, $rubrics, $types, $formAddLink)) {
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

                        <form action="?target=admin&admTarg=link&action=update&id=<?= $form->getValue('id') ?>" method="POST">

                            <?= $form->input('id', null, ['style' => 'display: none;', 'type' => 'hidden']); ?>

                            <td>
                                <?= $form->input('label', null, ['required' => 'required']); ?>
                            </td>
                            <td>
                                <?= $form->input('adrOrFile', null, ['required' => 'required']); ?>
                            </td>
                            <td>
                                <?php
                                $values = [];
                                foreach($rubrics as $rubric) {
                                    $values[$rubric->getIdRub()] = $rubric->getLabel();
                                }
                                ?>
                                <?= $form->select('idRub', $values, null, '--null--') ?>
                            </td>
                            <td>
                                <?php
                                $values = [];
                                foreach($types as $type) {
                                    $values[$type->getIdType()] = $type->getLabel();
                                }
                                ?>
                                <?= $form->select('idType', $values, null, '--null--') ?>
                            </td>
                            <td class="td-modif">
                                <button class="btn btn-warning">Modifier</button>
                            </td>

                        </form>

                        <td class="td-suppr">
                            <a href="?target=admin&admTarg=link&action=delete&id=<?= $form->getValue('id') ?>" class="btn btn-danger">Supprimer</a>
                        </td>

                    </tr>

                <?php endif;
            endforeach; ?>

            <form action="?target=admin&admTarg=link&action=insert" method="POST">
                <tr>

                    <td>
                        <?= $formAddLink->input('label', null, ['required' => 'required']); ?>
                    <td>
                        <?= $formAddLink->input('adrOrFile', null, ['required' => 'required']); ?>
                    <td>
                        <?php
                        $values = [];
                        foreach($rubrics as $rubric) {
                            $values[$rubric->getIdRub()] = $rubric->getLabel();
                        }
                        ?>
                        <?= $formAddLink->select('idRub', $values, null, 'Choose an option') ?>
                    </td>
                    <td>
                        <?php
                        $values = [];
                        foreach($types as $type) {
                            $values[$type->getIdType()] = $type->getLabel();
                        }
                        ?>
                        <?= $formAddLink->select('idType', $values, null, 'Choose an option') ?>
                    </td>
                    <td class="td-ajout" colspan="2">
                        <button class="btn btn-success">Ajouter</button>
                    </td>

                </tr>
            </form>

            </tbody>

        </table>

        <p>
            <a href="?target=admin&admTarg=contact">
                <button class="btn btn-primary">Contacts</button>
            </a>
            <a href="?target=admin&admTarg=user">
                <button class="btn btn-primary">Utilisateurs</button>
            </a>
            <a href="?target=admin&admTarg=typAndRub">
                <button class="btn btn-primary">Types et Rubriques</button>
            </a>
            <a href="?target=admin&admTarg=recette">
                <button class="btn btn-primary">Recettes</button>
            </a>
            <a href="?target=admin&admTarg=snippet">
                <button class="btn btn-primary">Snippets</button>
            </a>
        </p>

    </div>

</section>
<?php
}
?>
