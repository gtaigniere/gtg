<?php

$title = 'Snippets';
$h1 = 'Tous les snippets';
$h2 = 'Un snippet';

use Model\Cat;
use Model\Snippet;
use Util\ErrorManager;
use Util\SuccessManager;

ob_start();

?>

<section id="section_snippet">

    <h1><?= $h2; ?></h1>

    <?php
    foreach (SuccessManager::getMessages() as $message) : ?>
        <div class="alert alert-success" role="alert">
            <?= $message ?>
        </div>
    <?php endforeach;
    SuccessManager::destroy();

    foreach (ErrorManager::getMessages() as $message) : ?>
        <div class="alert alert-danger" role="alert">
            <?= $message ?>
        </div>
    <?php endforeach;
    ErrorManager::destroy();
    ?>

    <?php if ($snippet instanceof Snippet) : ?>

        <h2 id="titlesnippet"><?= $snippet->getTitle() ?></h2>

        <p><?= $snippet->getLanguage()->getLabel() ?></p>
        <pre>
            <code class="<?= $snippet->getLanguage()->getLabel(); ?>">
                <?= $snippet->getCode() ?>
            </code>
        </pre>
        <p><?= $snippet->getDateCrea()->format('d-m-Y H:i') ?></p>
        <p><?= $snippet->getComment() ?></p>
        <p><?= $snippet->getRequirement() ?></p>
        <p><?= $snippet->getUser()->getPseudo() ?></p>

        <p>Catégorie(s) : <em id="cat">
            <?= join(' | ', array_map(function (Cat $cat) {
                    return $cat->getLabel();
                }, $snippet->getCats()));
            ?>
        </em></p>

<!--        --><?php //if(isset($_SESSION['User']) && $_SESSION['User'] == 'gilleste') : ?>
            <p id="last_p">
                <a href="?target=admin&admTarg=snippet&action=insert"><button class="btn btn-success">Ajouter</button></a>
                <a href="?target=admin&admTarg=snippet&action=update&id=<?= $snippet->getIdSnip() ?>"><button class="btn btn-warning">Modifier</button></a>
                <a href="?target=admin&admTarg=snippet&action=delete&id=<?= $snippet->getIdSnip() ?>"><button class="btn btn-danger">Supprimer</button></a>
            </p>
<!--        --><?php //endif; ?>

    <?php endif; ?>

</section>

<?php $section = ob_get_clean(); ?>