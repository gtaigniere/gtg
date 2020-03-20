<?php

use Model\Recette;

ob_start();

    if (isset($recette) && $recette instanceof Recette) :

?>

        <section id="section_recette-admin">

            <h2><?= $recette->getLabel() ?></h2>

            <form action="" method="POST">

                <div>
                    <label for="label">Nom :</label>
                    <input id="label" type="text" name="label" value="<?php if(isset($recette->getLabel())) {echo $recette->getLabel();} ?>" required />
                </div>

                <div>
                    <label for="infos">Infos :</label>
                    <input id="infos" type="text" name="infos" value="<?php if(isset($recette->getInfos())) {echo $recette->getInfos();} ?>" required />
                </div>

                <div>
                    <label for="pour">Pour :</label>
                    <input id="pour" type="number" name="pour" value="<?php if(isset($recette->getPour())) {echo $recette->getPour();} ?>" required />
                </div>

                <div>
                    <label for="ingredient">Ingrédients :</label>
                    <input id="ingredient" type="text" name="ingredient" value="<?php if(isset($recette->getIngredient())) {echo $recette->getIngredient();} ?>" required />
                </div>

                <div>
                    <label for="photo">Photo :</label>
                    <input id="photo" type="text" name="photo" value="<?php if(isset($recette->getPhoto())) {echo $recette->getPhoto();} ?>" required />
                </div>

                <div>
                    <label for="detail">Détail :</label>
                    <textarea id="detail" name="detail" rows="10" cols="50" required ><?php if(isset($recette->getDetail())) {echo $recette->getDetail();} ?></textarea>
                </div>

                <button class="btn btn-info">S'inscrire</button>

            </form>

        </section>

    <?php endif;

$section = ob_get_clean(); ?>
