<?php

use Core\Html\Form;
use Core\Util\{
    ErrorManager,
    SuccessManager
};
if (isset($forms, $formAddUser)) {
?>

    <section class="sect-adm" id="sect-adm_users">

        <h1>Les utilisateurs</h1>

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
                        <th>Pseudo</th>
                        <th>Email</th>
                        <th>Confirmed</th>
                        <th colspan="2">Options</th>
                    </tr>
                </thead>
                <tbody>

                <?php foreach($forms as $form) :
                    if ($form instanceof Form) : ?>

                    <tr>

                        <form action="?target=admin&admTarg=user&action=update&id=<?= $form->getValue('id') ?>" method="POST">

                            <td>
                                <?= $form->input('pseudo', null, ['required' => 'required']); ?>
                            </td>

                            <td class="t-email">
                                <?= $form->input('email', null, ['type' => 'email', 'required' => 'required']); ?>
                            </td>

                            <?= $form->input('pwd', null, ['style' => 'display: none;', 'type' => 'password', 'hidden' => 'hidden']); ?>

                            <?= $form->input('confirmKey', null, ['style' => 'display: none;', 'type' => 'hidden', 'hidden' => 'hidden']); ?>

                            <td class="t-confirmed">
                                <?= $form->input('confirmed', null, ['type' => 'checkbox']); ?>
                            </td>

                            <td class="td-modif">
                                <button class="btn btn-warning">Modifier</button>
                            </td>

                        </form>

                        <td class="td-suppr">
                            <a href="?target=admin&admTarg=user&action=delete&id=<?= $form->getValue('id') ?>" class="btn btn-danger">Supprimer</a>
                        </td>

                    </tr>

                    <?php endif;
                endforeach; ?>

                <form action="?target=admin&admTarg=user&action=insert" method="POST">

                    <tr>

                        <?= $formAddUser->input('id', null, ['style' => 'display: none;', 'type' => 'hidden']); ?>

                        <td>
                            <?= $formAddUser->input('pseudo', null, ['required' => 'required']); ?>
                        </td>

                        <td class="t-email">
                            <?= $formAddUser->input('email', null, ['type' => 'email', 'required' => 'required']); ?>
                        </td>

                        <?= $formAddUser->input('pwd', null, ['style' => 'display: none;', 'type' => 'password', 'hidden' => 'hidden']); ?>

                        <?= $formAddUser->input('confirmKey', null, ['style' => 'display: none;', 'type' => 'hidden', 'hidden' => 'hidden']); ?>

                        <td class="t-confirmed">
                            <?= $formAddUser->input('confirmed', null, ['type' => 'checkbox']); ?>
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
                <a href="?target=admin&admTarg=link">
                    <button class="btn btn-primary">Liens</button>
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
