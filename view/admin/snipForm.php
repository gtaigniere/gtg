<?php

use Core\Html\Form;

require_once ROOT_DIR . 'view/fragment/searchForm.php';

if (isset($form, $action, $languages, $cats) && $form instanceof Form) :

?>

        <section id="sect-adm_snippet">

            <h1>
                <?= ($action == 'insert') ? 'Ajout d\'un snippet' : $form->getValue('title'); ?>
            </h1>

                <form method="POST">

                    <div>
                        <?= $form->input('id', null, ['style' => 'display: none;', 'type' => 'hidden']); ?>
                    </div>

                    <div>
                        <?= $form->input('title', 'Titre :', ['required' => 'required']); ?>
                    </div>

                    <div class="areatext_snippet">
                        <?= $form->textarea('code', 'Code :', ['rows' => '10', 'cols' => '50', 'required' => 'required']); ?>
                    </div>

                    <?php if ($action != 'insert') : ?>
                        <div>
                            <?= $form->input('dateCrea', 'Date de création :', ['readonly' => 'readonly']); ?>
                        </div>
                    <?php endif; ?>

                    <div class="areatext_snippet">
                        <?= $form->textarea('comment', 'Commentaire :', ['rows' => '5', 'cols' => '50']); ?>
                    </div>

                    <div class="areatext_snippet">
                        <?= $form->textarea('requirement', 'Prérequis :', ['rows' => '2', 'cols' => '50']); ?>
                    </div>

                    <div>
                        <?php
                            $values = [];
                            foreach($languages as $language) {
                                $values[$language->getIdLang()] = $language->getLabel();
                            }
                        ?>
                        <?= $form->select('idLang', $values, 'Language :', $action == 'insert' ? 'Choose an option' : '--null--') ?>
                    </div>

                    <?php if ($action != 'insert') : ?>
                        <div>
                            <?= $form->input('pseudo', 'Créé par :', ['readonly' => 'readonly']); ?>
                        </div>
                    <?php endif; ?>

                    <div class="areatext_snippet">
                        <?php
                            $values = [];
                            foreach($cats as $cat) {
                                $values[$cat->getIdCat()] = $cat->getLabel();
                            }
                        ?>
                        <?= $form->select('cats', $values, 'Catégorie(s) :', $action == 'insert' ? 'Choose option(s)' : '--null--', [], true); ?>
                    </div>

                    <?php if ($action == 'insert') : ?>
                        <button class="btn btn-success">Ajouter</button>
                    <?php elseif ($action == 'update') : ?>
                        <button class="btn btn-warning">Modifier</button>
                    <?php elseif ($action == 'delete') : ?>
                        <button class="btn btn-danger">Supprimer</button>
                    <?php endif; ?>

            </form>

        </section>

<?php

endif;

?>
