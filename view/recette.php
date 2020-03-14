<?php ob_start(); ?>

    <section id="section_recette">

        <h2><?= $recette->getLabel() ?></h2>

        <p><?= $recette->getInfos() ?></p>

        <p><?= $recette->getpourCombien() ?></p>

        <p><?= $recette->getIngredient() ?></p>

        <figure><img class="img_recette" src="../imgs/recettes/<?= $recette->getPhoto() ?>" alt="<?= $recette->getPhoto() ?>" /></figure>

        <p><?= $recette->getDetail() ?></p>

    </section>

<?php $section = ob_get_clean(); ?>
