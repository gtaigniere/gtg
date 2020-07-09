<?php

use Model\Recette;

    if (isset($recette) && $recette instanceof Recette) :

?>

    <section id="section_recette">

        <h1><?= $recette->getLabel() ?></h1>

        <div>

            <p><?= $recette->getInfos() ?></p>

            <div>
                <p>Pour <?= $recette->getpour() ?> personnes</p>
                <p class="text_underline">Ingrédients</p>
            </div>

            <div>
                <figure>
                    <img class="img_recette"
                         src="../imgs/recettes/<?= $recette->getPhoto() ?>"
                             alt="<?= $recette->getPhoto() ?>" />
                </figure>

                <p><?= $recette->getIngredient() ?></p>
            </div>

            <p><?= $recette->getDetail() ?></p>

        </div>

    </section>

    <?php endif;
