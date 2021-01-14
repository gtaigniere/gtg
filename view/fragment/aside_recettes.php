<?php

use Model\Recette;

if (isset($recettes)) {
?>
<aside id="recette_aside">

    <h2>Recettes</h2>

    <ul>

        <?php foreach ($recettes as $recette) :
            if ($recette instanceof Recette) : ?>

                <li>
                    <a href="index.php?target=recette&id=<?= $recette->getIdRec() ?>"><?= $recette->getLabel() ?></a>
                </li>

            <?php endif;
        endforeach; ?>

    </ul>

</aside>
<?php
}
?>
