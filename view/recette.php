<?php ob_start();

    if (isset($recette) && $recette instanceof Recette) :

?>

    <section id="section_recette">

        <h2><?= $recette->getLabel() ?></h2>

        <p><?= $recette->getInfos() ?></p>

        <p><?= $recette->getpour() ?></p>

        <p><?= $recette->getIngredient() ?></p>

        <figure><img class="img_recette" src="../imgs/recettes/<?= $recette->getPhoto() ?>" alt="<?= $recette->getPhoto() ?>" /></figure>

        <p><?= $recette->getDetail() ?></p>

    </section>

    <?php endif;

$section = ob_get_clean(); ?>
