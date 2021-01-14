<?php

use Core\{
    Html\Form,
    Util\ErrorManager
};

if (isset($form) && $form instanceof Form) :

    $isUpdate = $form->getValue('id') != null;

?>

        <section id="sect-adm_recette">

            <h1>
                <?= ($isUpdate) ? $form->getValue('label') : 'Ajout d\'une recette'; ?>
            </h1>

            <?php foreach (ErrorManager::getMessages() as $message) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= $message ?>
                </div>
            <?php endforeach;
            ErrorManager::destroy();
            ?>

                <form method="POST">

                    <?php if($isUpdate) : ?>
                    <div>
                        <?= $form->input('id', null, ['style' => 'display: none;', 'type' => 'hidden']); ?>
                    </div>
                    <?php endif; ?>

                    <div>
                        <?= $form->input('label', 'label :', ['required' => 'required']); ?>
                    </div>
                    <div class="areatext_recette">
                        <?= $form->textarea('infos', 'Infos :', ['rows' => '5', 'cols' => '50', 'required' => 'required']); ?>
                    </div>
                    <div>
                        <?= $form->input('pour', 'pour', ['required' => 'required']); ?>
                    </div>
                    <div class="areatext_recette">
                        <?= $form->textarea('ingredient', 'Ingrédients :', ['rows' => '10', 'cols' => '50', 'required' => 'required']); ?>
                    </div class="areatext_recette">
                    <div>
                        <?= $form->input('photo', 'Photo :', ['required' => 'required']); ?>
                    </div>
                    <div class="areatext_recette">
                        <?= $form->textarea('detail', 'Détail :', ['rows' => '20', 'cols' => '50', 'required' => 'required']); ?>
                    </div>

                    <?php if ($isUpdate) : ?>
                        <button class="btn btn-warning">Modifier</button>
                    <?php else : ?>
                        <button class="btn btn-success">Ajouter</button>
                    <?php endif; ?>

            </form>

            <?php if ($isUpdate) : ?>
                <a href="?target=admin&admTarg=recette&action=delete&id=<?= $form->getValue('id') ?>" class="btn btn-danger">Supprimer</a>
            <?php endif; ?>

        </section>

<?php

endif;

?>
