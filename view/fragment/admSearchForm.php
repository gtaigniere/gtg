<?php

use Core\Html\Form;
use Form\SearchForm;
use Model\Cat;
use Model\Language;
use Model\Snippet;

if (isset($searchForm, $languages, $cats, $search)) {
?>

<aside id="navcol">
        <h1>Recherche</h1>

        <form action="index.php" method="GET">

            <?php if ($searchForm instanceof Form) :
                echo $searchForm->input('action', null, ['type' => 'hidden']);
                echo $searchForm->input('admTarg', null, ['type' => 'hidden']);
                echo $searchForm->input('target', null, ['type' => 'hidden']);

                ?>
                <div>
                    <?= $searchForm->input('search', null); ?>
                </div>

                <div>
                    <h2>Langages</h2>
                    <?php
                    $values = [];
                    foreach($languages as $language) {
                        if ($language instanceof Language) {
                            $values[$language->getIdLang()] = $language->getLabel();
                        }
                    }
                    echo $searchForm->select('languages', $values, null, 'Tous', [], true) ?>
                </div>

                <div>
                    <h2>Catégories</h2>
                    <?php
                    $values = [];
                    $values[SearchForm::WITHOUT_CAT] = 'Sans catégorie';
                    foreach($cats as $cat) {
                        if ($cat instanceof Cat) {
                            $values[$cat->getIdCat()] = $cat->getLabel();
                        }
                    }
                    echo $searchForm->select('cats', $values, null, 'Toutes', [], true); ?>
                </div>

            <?php endif; ?>

            <button class="btn btn-info">Chercher</button>

        </form>

    </aside>

    <aside id="listsnippets">

        <h1><?= !empty($snippets) ? ($search ? 'Trouvé(s)' : 'Tous') : 'Aucun'; ?></h1>
        <?php
        if (!empty($snippets)) :
            ?>

            <ul>
                <?php foreach($snippets as $snip) : ?>
                    <?php if ($snip instanceof Snippet) : ?>
                        <a href="?target=admin&admTarg=snippet&id=<?= $snip->getIdSnip() ?>">
                            <li class="">
                                <h2><?= $snip->getTitle() ?></h2>
                                <p><?= $snip->getLanguage() != null ? $snip->getLanguage()->getLabel() : 'Pas de langage' ?></p>
                                <p><?= $snip->getDateCrea()->format('d-m-Y') ?></p>
                            </li>
                        </a>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

    </aside>
<?php
}
?>
