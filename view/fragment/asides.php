<?php

use Model\Link;

if (isset($key, $values)) {
?>
<aside id="<?= $key ?>_aside">

    <h2><?= ucfirst($key) ?></h2>

    <ul>

        <?php foreach ($values as $link) :
            if ($link instanceof Link) : ?>

            <?php
                $href = $link->getType()->getLabel() == 'Recette' ?
                    $link->getAdrOrFile() :
                    'index.php?target=link&action=open&id=' . $link->getIdLink();
                ?>
                <li>
                    <a href="index.php?target=link&action=open&id=<?= $link->getIdLink() ?>">
                        <?= $link->getLabel() ?></a>
                </li>

            <?php endif;
        endforeach; ?>

    </ul>

</aside>
<?php
}
?>
