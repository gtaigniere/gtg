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
                    <textarea id="infos" name="infos" rows="5" cols="50" required ><?php if(isset($recette->getInfos())) {echo $recette->getInfos();} ?></textarea>
                </div>

                <div>
                    <label for="pour">Pour :</label>
                    <input id="pour" type="number" name="pour" value="<?php if(isset($recette->getPour())) {echo $recette->getPour();} ?>" required />
                </div>

                <div>
                    <label for="ingredient">Ingrédients :</label>
                    <textarea id="ingredient" name="ingredient" rows="10" cols="50" required ><?php if(isset($recette->getIngredient())) {echo $recette->getIngredient();} ?></textarea>
                </div>

                <div>
                    <label for="photo">Photo :</label>
                    <input id="photo" type="text" name="photo" value="<?php if(isset($recette->getPhoto())) {echo $recette->getPhoto();} ?>" required />
                </div>

                <div>
                    <label for="detail">Détail :</label>
                    <textarea id="detail" name="detail" rows="20" cols="50" required ><?php if(isset($recette->getDetail())) {echo $recette->getDetail();} ?></textarea>
                </div>

                <button class="btn btn-info">Valider</button>

            </form>

        </section>

    <?php endif;

$section = ob_get_clean(); ?>
