<?php

    require_once ROOT_DIR . 'model/Rubric.php';
    ob_start();

?>

    <section id="section_accueil">

        <h2 class="h2_accueil"><strong>Bienvenue</strong></h2>

        <?php foreach ($rubrics as $rubric) :
            if ($rubric instanceof Rubric) : ?>
            <figure class="fig_rubrique">
                <a href="index.php?target=rubric&id=<?= $rubric->getIdRub() ?>"><img class="img_rubrique" id="<?= strtolower($rubric->getLabel()) ?>" src="../imgs/thumbmails/<?= $rubric->getImage() ?>" alt="<?= $rubric->getLabel() ?>" /></a>
            </figure>
            <?php endif;
        endforeach; ?>

    </section>

<?php $section = ob_get_clean(); ?>