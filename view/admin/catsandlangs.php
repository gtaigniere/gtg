<?php

use Form\{
    CatForm,
    LanguageForm
};
use Core\Util\{
    ErrorManager,
    SuccessManager
};

require_once ROOT_DIR . 'view/fragment/searchForm.php';

if (isset($catForms, $formAddCat, $languageForms, $formAddLang)) {
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

				<?php foreach($catForms as $catForm) :
					if ($catForm instanceof CatForm) : ?>

						<tr>

							<form action="?target=admin&admTarg=cat&action=update&id=<?= $catForm->getValue('id') ?>" method="POST">

                                <?= $catForm->input('id', null, ['style' => 'display: none;', 'type' => 'hidden']); ?>

								<td>
                                    <?= $catForm->input('label', null, ['required' => 'required']); ?>
                                </td>
								<td class="td-modif">
									<button class="btn btn-warning">Modifier</button>
								</td>

							</form>

							<td class="td-suppr">
								<a href="?target=admin&admTarg=cat&action=delete&id=<?= $catForm->getValue('id') ?>" class="btn btn-danger">Supprimer</a>
							</td>

						</tr>

					<?php endif;
				endforeach; ?>

				<form action="?target=admin&admTarg=cat&action=insert" method="POST">
				
					<tr>

						<td>
                            <?= $formAddCat->input('label', null, ['required' => 'required']); ?>
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

				<?php foreach($languageForms as $languageForm) :
					if ($languageForm instanceof LanguageForm) : ?>

						<tr>

							<form action="?target=admin&admTarg=language&action=update&id=<?= $languageForm->getValue('id') ?>" method="POST">

                                <?= $languageForm->input('id', null, ['style' => 'display: none;', 'type' => 'hidden']); ?>

								<td>
                                    <?= $languageForm->input('label', null, ['required' => 'required']); ?>
								<td class="td-modif"><button class="btn btn-warning">Modifier</button></td>

							</form>

							<td class="td-suppr">
                                <a href="?target=admin&admTarg=language&action=delete&id=<?= $languageForm->getValue('id') ?>" class="btn btn-danger">Supprimer</a>
                            </td>

						</tr>

					<?php endif;
				endforeach; ?>

				<form action="?target=admin&admTarg=language&action=insert" method="POST">
					<tr>

						<td>
                            <?= $formAddLang->input('label', null, ['required' => 'required']); ?>
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
<?php
}
?>
