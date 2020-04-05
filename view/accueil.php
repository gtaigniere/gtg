<?php

use Model\Rubric;

ob_start();

?>

    <section id="section_accueil">

        <h1><strong>Bienvenue</strong></h1>

        <?php foreach ($rubrics as $rubric) :
            if ($rubric instanceof Rubric) :
                if($rubric->getLabel() != 'Vietnam') : ?>
                    <figure class="fig_rubrique">
                        <a href="?target=rubric&id=<?= $rubric->getIdRub() ?>">
                            <img class="img_rubrique" id="<?= strtolower($rubric->getLabel()) ?>" src="../imgs/thumbmails/<?= $rubric->getImage() ?>" alt="<?= $rubric->getLabel() ?>" />
                        </a>
                    </figure>
                <?php endif;
            endif;
        endforeach; ?>

    </section>

<?php $section = ob_get_clean(); ?>