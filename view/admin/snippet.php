<?php

use Html\Form;

ob_start();

if (isset($form) && $form instanceof Form) :

?>

        <section id="sect-adm_snippet">

            <h1>
                <?= ($action == 'insert') ? 'Ajout d\'un snippet' : $form->getValue('titre'); ?>
            </h1>

                <form method="POST">

                    <div>
                        <?= $form->input('idSnip', null, ['style' => 'display: none;', 'type' => 'hidden']); ?>
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
                            $options = [];
                            foreach($languages as $language) {
                                $options[$language->getIdLang()] = $language->getLabel();
                            }
                        ?>
                        <?= $form->select('language', $options, 'Language :', $action == 'insert' ? 'Choose an option' : '--null--') ?>
                    </div>

                    <?php if ($action != 'insert') : ?>
                        <div>
                            <?= $form->input('user', 'Créé par :', ['readonly' => 'readonly']); ?>
                        </div>
                    <?php endif; ?>

                    <div class="areatext_snippet">
                        <?php
                            $options = [];
                            foreach($cats as $cat) {
                                $options[$cat->getIdCat()] = $cat->getLabel();
                            }
                            echo $form->select('cats[]', $options, 'Catégorie(s) :', $action == 'insert' ? 'Choose an option' : '--null--', ['multiple' => 'multiple']);
                        ?>
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

$section = ob_get_clean();

?>