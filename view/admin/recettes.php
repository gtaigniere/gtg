<?php

use Model\Recette;
use Core\Util\{
    ErrorManager,
    SuccessManager
};
if (isset($recettes)) {
?>

    <section class="sect-adm" id="sect-adm_recettes">

        <h1>Les recettes</h1>

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
                    <th class="t-label">Label</th>
                    <th>Pour</th>
                    <th>Photo</th>
                    <th colspan="2">Options</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($recettes as $recette) :
                    if ($recette instanceof Recette) : ?>

                        <tr>

                            <td style="display: none;"><?= $recette->getIdRec() ?>/td>
                            <td class="t-label"><?php if ($recette->getLabel() != null) { echo $recette->getLabel(); } ?></td>
                            <td><?php if ($recette->getPour() != null) { echo $recette->getPour(); } ?></td>
                            <td><?php if ($recette->getPhoto() != null) { echo $recette->getPhoto(); } ?></td>

                            <td class="td-modif">
                                <a href="?target=admin&admTarg=recette&action=update&id=<?= $recette->getIdRec() ?>" class="btn btn-warning">Modifier</a>
                            </td>
                            <td class="td-suppr">
                                <a href="?target=admin&admTarg=recette&action=delete&id=<?= $recette->getIdRec() ?>" class="btn btn-danger">Supprimer</a>
                            </td>

                        </tr>

                    <?php endif;
                endforeach; ?>

                </tbody>

            </table>

            <p>
                <a href="?target=admin&admTarg=recette&action=insert"><button class="btn btn-success">Ajouter une recette</button></a>
                <form enctype="multipart/form-data" action="" method="POST">
                    <button class="btn btn-violet">Uploader une image</button>
                    <input type="hidden" name="MAX_FILE_SIZE" value="200000" />
                    <input type="file" name="myFile" />
                </form>
            </p>

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
                <a href="?target=admin&admTarg=user">
                    <button class="btn btn-primary">Utilisateurs</button>
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
