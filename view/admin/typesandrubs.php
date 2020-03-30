<?php

use Model\Type;
use Model\Rubric;
use Util\ErrorManager;
use Util\SuccessManager;

ob_start();

?>

<section id="section_types_rubrics-admin">

	<h2>Les types et les rubriques</h2>

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

							<form action="?target=types&action=update" method="POST">

								<td style="display: none;"><input type="hidden" name="idType"
                                                        value="<?= $type->getIdType() ?>"/></td>

								<td><input type="text" name="label"
                                           value="<?php if (!is_null($type->getLabel())) {
										echo $type->getLabel();
									} ?>"/></td>

								<td class="td-modif">
									<button class="btn btn-warning">Modifier</button>
								</td>

							</form>

							<td class="td-suppr">
								<a href="?target=types&action=delete&idType=<?= $type->getIdType() ?>" class="btn btn-danger">Supprimer</a>
							</td>

						</tr>

					<?php endif;
				endforeach; ?>

				<form action="?target=types&action=insert" method="POST">
				
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

							<form action="?target=rubrics&action=update" method="POST">

								<td style="display: none;"><input type="hidden" name="idRub"
                                                        value="<?= $rubric->getIdRub() ?>"/></td>

								<td><input type="text" name="label"
                                           value="<?php if (!is_null($rubric->getLabel())) { echo $rubric->getLabel(); } ?>"/></td>

								<td><input type="text" name="image"
                                           value="<?php if (!is_null($rubric->getImage())) { echo $rubric->getImage(); } ?>"/></td>

								<td class="td-modif"><button class="btn btn-warning">Modifier</button></td>

							</form>

							<td class="td-suppr">
                                <a href="?target=rubrics&action=delete&idRub=<?= $rubric->getIdRub() ?>" class="btn btn-danger">Supprimer</a>
                            </td>

						</tr>

					<?php endif;
				endforeach; ?>

				<form action="?target=rubrics&action=insert" method="POST">
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
		<a href="?target=links">
			<button class="btn btn-primary">Liens</button>
		</a>
		<a href="?target=users">
			<button class="btn btn-primary">Utilisateurs</button>
		</a>
		<a href="?target=recettes">
			<button class="btn btn-primary">Recettes</button>
		</a>

	</p>

</section>

<?php $section = ob_get_clean(); ?>