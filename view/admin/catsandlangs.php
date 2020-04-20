<?php

use Html\Form;
use Model\Cat;
use Model\Language;
use Util\ErrorManager;
use Util\SuccessManager;

ob_start();

?>

<section class="sect-adm" id="sect-adm_catslangs">

	<h1>Catégories et languages</h1>

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

	<div>

		<table>
		
			<thead>
				<tr>
					<th>Catégorie</th>
					<th colspan="2">Options</th>
				</tr>
			</thead>
			<tbody>

				<?php foreach($forms as $form) :
					if ($form instanceof Form) : ?>

						<tr>

							<form action="?target=admin&admTarg=cat&action=update" method="POST">

								<td style="display: none;">
                                    <?= $form->input('idCat', null, ['style' => 'display: none;', 'type' => 'hidden']); ?>
<!--                                    <input type="hidden" name="idCat"-->
<!--                                            value="--><?//= $cat->getIdCat() ?><!--"/></td>-->

								<td>
                                    <?= $form->input('label', 'Label :', ['required' => 'required']); ?>
<!--                                    <input type="text" name="label"-->
<!--                                           value="--><?php //if ($cat->getLabel() != null) {
//										echo $cat->getLabel();
//									} ?><!--"/></td>-->

								<td class="td-modif">
									<button class="btn btn-warning">Modifier</button>
								</td>

							</form>

							<td class="td-suppr">
								<a href="?target=admin&admTarg=type&action=delete&idCat=<?= $cat->getIdCat() ?>" class="btn btn-danger">Supprimer</a>
							</td>

						</tr>

					<?php endif;
				endforeach; ?>

				<form action="?target=admin&admTarg=cat&action=insert" method="POST">
				
					<tr>

						<td>
                            <?= $form->input('label', 'Label :', ['required' => 'required']); ?>
<!--                            <input type="text" name="label" value="--><?php //if (isset($label)) {
//								echo $label;
//							} ?><!--" required /></td>-->

						<td class="td-ajout" colspan="2">
							<button class="btn btn-success">Ajouter</button>
						</td>

					</tr>
					
				</form>

			</tbody>
		</table>

		<table>
			<thead>
				<tr>
					<th>Language</th>
					<th colspan="2">Options</th>
				</tr>
			</thead>
			<tbody>

				<?php foreach($languages as $language) :
					if ($language instanceof Language) : ?>

						<tr>

							<form action="?target=admin&admTarg=language&action=update" method="POST">

								<td style="display: none;">
                                    <?= $form->input('idRub', null, ['style' => 'display: none;', 'type' => 'hidden']); ?>
<!--                                    <input type="hidden" name="idRub"-->
<!--                                            value="--><?//= $language->getIdLang() ?><!--"/></td>-->

								<td>
                                    <?= $form->input('label', 'Label :', ['required' => 'required']); ?>
<!--                                    <input type="text" name="label"-->
<!--                                           value="--><?php //if ($language->getLabel() != null) { echo $language->getLabel(); } ?><!--"/></td>-->

								<td class="td-modif"><button class="btn btn-warning">Modifier</button></td>

							</form>

							<td class="td-suppr">
                                <a href="?target=admin&admTarg=language&action=delete&idLang=<?= $language->getIdLang() ?>" class="btn btn-danger">Supprimer</a>
                            </td>

						</tr>

					<?php endif;
				endforeach; ?>

				<form action="?target=admin&admTarg=language&action=insert" method="POST">
					<tr>

						<td>
                            <?= $form->input('label', 'Label :', ['required' => 'required']); ?>
<!--							<input type="text" name="label"-->
<!--                                   value="--><?php //if (isset($label)) { echo $label; } ?><!--" required />-->
						</td>

						<td class="td-ajout" colspan="2">
                            <button class="btn btn-success">Ajouter</button>
                        </td>

					</tr>
				</form>

			</tbody>
		</table>

	</div>

	<p>
		<a href="?target=admin&admTarg=snippet">
			<button class="btn btn-primary">Snippets</button>
		</a>
	</p>

</section>

<?php $section = ob_get_clean(); ?>