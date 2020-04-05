<?php

use Model\Type;
use Model\Rubric;
use Util\ErrorManager;
use Util\SuccessManager;

ob_start();

?>

<section class="sect-adm" id="sect-adm_typsrubs">

	<h1>Les types et les rubriques</h1>

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
					<th>Type</th>
					<th colspan="2">Options</th>
				</tr>
			</thead>
			<tbody>

				<?php foreach($types as $type) :
					if ($type instanceof Type) : ?>

						<tr>

							<form action="?target=admin&admTarg=type&action=update" method="POST">

								<td style="display: none;"><input type="hidden" name="idType"
                                            value="<?= $type->getIdType() ?>"/></td>

								<td><input type="text" name="label"
                                           value="<?php if ($type->getLabel() != null) {
										echo $type->getLabel();
									} ?>"/></td>

								<td class="td-modif">
									<button class="btn btn-warning">Modifier</button>
								</td>

							</form>

							<td class="td-suppr">
								<a href="?target=admin&admTarg=type&action=delete&idType=<?= $type->getIdType() ?>" class="btn btn-danger">Supprimer</a>
							</td>

						</tr>

					<?php endif;
				endforeach; ?>

				<form action="?target=admin&admTarg=type&action=insert" method="POST">
				
					<tr>

						<td><input type="text" name="label" value="<?php if (isset($label)) {
								echo $label;
							} ?>" required /></td>

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
					<th>Rubrique</th>
					<th>Image</th>
					<th colspan="2">Options</th>
				</tr>
			</thead>
			<tbody>

				<?php foreach($rubrics as $rubric) :
					if ($rubric instanceof Rubric) : ?>

						<tr>

							<form action="?target=admin&admTarg=rubric&action=update" method="POST">

								<td style="display: none;"><input type="hidden" name="idRub"
                                            value="<?= $rubric->getIdRub() ?>"/></td>

								<td><input type="text" name="label"
                                           value="<?php if ($rubric->getLabel() != null) { echo $rubric->getLabel(); } ?>"/></td>

								<td><input type="text" name="image"
                                           value="<?php if ($rubric->getImage() != null) { echo $rubric->getImage(); } ?>"/></td>

								<td class="td-modif"><button class="btn btn-warning">Modifier</button></td>

							</form>

							<td class="td-suppr">
                                <a href="?target=admin&admTarg=rubric&action=delete&idRub=<?= $rubric->getIdRub() ?>" class="btn btn-danger">Supprimer</a>
                            </td>

						</tr>

					<?php endif;
				endforeach; ?>

				<form action="?target=admin&admTarg=rubric&action=insert" method="POST">
					<tr>

						<td>
							<input type="text" name="label"
                                   value="<?php if (isset($label)) { echo $label; } ?>" required />
						</td>

						<td>
							<input type="text" name="image"
                                   value="<?php if (isset($image)) { echo $image; } ?>" required />
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
		<a href="?target=admin&admTarg=link">
			<button class="btn btn-primary">Liens</button>
		</a>
		<a href="?target=admin&admTarg=user">
			<button class="btn btn-primary">Utilisateurs</button>
		</a>
		<a href="?target=admin&admTarg=recette">
			<button class="btn btn-primary">Recettes</button>
		</a>

	</p>

</section>

<?php $section = ob_get_clean(); ?>