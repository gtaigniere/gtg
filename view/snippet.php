<?php

$title = 'Snippets';
$h1 = 'Tous les snippets';
$h2 = 'Un snippet';

use Model\Cat;
use Model\Snippet;

ob_start();

?>

<section id="section_snippets">

    <h1><?= $h2; ?></h1>

    <?php if ($snippet instanceof Snippet) : ?>

        <h2 id="titlesnippet"><?= $snippet->getTitle() ?></h2>

        <p><?= $snippet->getLanguage()->getLabel() ?></p>
        <pre>
            <code class="<?= $snippet->getLanguage()->getLabel(); ?>">
                <?= $snippet->getCode() ?>
            </code>
        </pre>
        <p><?= $snippet->getDateCrea()->format('Y-m-d H:i') ?></p>
        <p><?= $snippet->getComment() ?></p>
        <p><?= $snippet->getRequirement() ?></p>
        <p><?= $snippet->getUser()->getPseudo() ?></p>

        <p>Catégorie(s) : <em id="cat">
            <?= join(' | ', array_map(function (Cat $cat) {
                    return $cat->getLabel();
                }, $snippet->getCats()));
            ?>
        </em></p>

        <p>
            <a href="?action=ajouter"><button class="btn btn-success">Ajouter</button></a>
            <a href="?action=modifier"><button class="btn btn-warning">Modifier</button></a>
            <a href="?action=supprimer"><button class="btn btn-danger">Supprimer</button></a>
        </p>

    <?php endif; ?>

</section>

<?php $section = ob_get_clean(); ?>