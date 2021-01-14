<?php

use Model\{
    Cat,
    Snippet
};
use Core\Util\{
    ErrorManager,
    SuccessManager
};

require_once ROOT_DIR . 'view/fragment/admSearchForm.php';

if (isset($snippet)) {
?>

<section id="section_snippet">

    <h1><?= !empty($snippets) ? 'Un snippet' : 'Pas de snippet'; ?></h1>

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

        <p><?= $snippet->getLanguage() != null ? $snippet->getLanguage()->getLabel() : 'Pas de langage' ?></p>
        <pre><code class="<?= $snippet->getLanguage() != null ?
                $snippet->getLanguage()->getLabel() :
                '' ?>"><?= $snippet->getCode() ?></code></pre>
        <p><?= $snippet->getDateCrea()->format('d-m-Y H:i') ?></p>

        <?php if (!empty($snippet->getComment())) : ?>
        <p><?= $snippet->getComment() ?></p>
        <?php
        endif;
        if (!empty($snippet->getRequirement())) : ?>
        <p><?= $snippet->getRequirement() ?></p>
         <?php endif; ?>
        <p><?= $snippet->getUser()->getPseudo() ?></p>

        <p>Catégorie(s) : <em id="cat">
            <?= join(' | ', array_map(function (Cat $cat) {
                    return $cat->getLabel();
                }, $snippet->getCats()));
            ?>
        </em></p>

        <p class="tooLast_p">
            <a href="?target=admin&admTarg=snippet&action=insert"><button class="btn btn-success">Ajouter</button></a>
            <a href="?target=admin&admTarg=snippet&action=update&id=<?= $snippet->getIdSnip() ?>"><button class="btn btn-warning">Modifier</button></a>
            <a href="?target=admin&admTarg=snippet&action=delete&id=<?= $snippet->getIdSnip() ?>"><button class="btn btn-danger">Supprimer</button></a>
        </p>
        <p class="tooLast_p">
            <a href="?target=admin&admTarg=catAndLang"><button class="btn btn-primary">Catégories et Langages</button></a>
            <a href="?target=admin&admTarg=link"><button class="btn btn-primary">Liens</button></a>
        </p>

    <?php endif; ?>

</section>
<?php
}
?>
