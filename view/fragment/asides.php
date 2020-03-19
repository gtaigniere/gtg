<?php

use Model\Link;

?>
<aside id="<?= $key ?>_aside">

    <h2><?= ucfirst($key) ?></h2>

    <ul>

        <?php foreach ($values as $link) :
            if ($link instanceof Link) : ?>

                <li>
                    <a href="<?= (in_array($link->getType()->getLabel(), ['Support', 'Code'])) ? '/' . 'files_asides' .
                        '/' . strtolower($link->getType()->getLabel()) .
                        '/' . strtolower($link->getRubric()->getLabel()) .
                        '/' .$link->getAdrOrFile() : $link->getAdrOrFile(); ?>">
                        <?= $link->getLabel() ?></a>
                </li>

            <?php endif;
        endforeach; ?>

    </ul>

</aside>