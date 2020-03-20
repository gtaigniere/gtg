<?php ob_start(); ?>

    <section id="section_type_rubrique-admin">

        <h2>Les types et les rubriques</h2>

        <?php
        if (isset($success) AND isset($ams) AND ($success == 'type' OR $success == 'rubrique')) :
            switch ($ams) {
                case '1':
                    $message = 'Type ajouté avec succès !';
                    break;
                case '3':
                    $message = 'Type modifié avec succès !';
                    break;
                case '5':
                    $message = 'Type supprimé avec succès !';
                    break;
                case '2':
                    $message = 'Rubrique ajoutée avec succès !';
                    break;
                case '4':
                    $message = 'Rubrique modifiée avec succès !';
                    break;
                case '6':
                    $message = 'Rubrique supprimée avec succès !';
                    break;
            }
            ?>
            <div class= "alert alert-success" role="alert">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
        <?php
        if (isset($trNoSuccess)) :
            switch ($trNoSuccess) {
                case '1':
                    $message = 'Un type ne peut contenir que des lettres, "-", et "_" !';
                    break;
                case '2':
                    $message = 'Une rubrique ne peut contenir que des lettres, "-", et "_" !';
                    break;
                case '3':
                    $message = 'Echec de l\'ajout du type';
                    break;
                case '4':
                    $message = 'Echec de l\'ajout de la rubrique';
                    break;
                case '5':
                    $message = 'Echec de la modification du type';
                    break;
                case '6':
                    $message = 'Echec de la modification de la rubrique';
                    break;
                case '7':
                    $message = 'Echec de la suppression du type';
                    break;
                case '8':
                    $message = 'Echec de la suppression de la rubrique';
                    break;
            }
            ?>
            <div class= "alert alert-danger" role="alert">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <div>

            <table>
                <thead>
                <tr>
                    <th>Type</th>
                    <th colspan="2">Options</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach($types as $type) : ?>
                    <tr>

                        <form action="modif-type.ctrl.php" method="POST" onsubmit="return sure()">

                            <td style="display: none;"><input type="text" name="idType" value="<?php echo $type->getIdType(); ?>" /></td>

                            <td><input type="text" name="libelle" value="<?php echo $type->getLibelle(); ?>" required /></td>

                            <td class="td-modif"><button class="btn btn-warning">Modifier</button></td>

                        </form>

                        <td class="td-suppr"><a href="suppr-type.ctrl.php?idType=<?php echo $type->getIdType(); ?>" class="btn btn-danger" onclick="return confirm('Etes-vous sûr ?')">Supprimer</a></td>

                    </tr>
                <?php endforeach; ?>

                <form action="ajout-type.ctrl.php" method="POST" onsubmit="return sure()">
                    <tr>

                        <td>
                            <input type="text" name="libelle" value="<?php if(isset($libelle)) {echo $libelle;} ?>" required />
                        </td>

                        <td class="td-ajout" colspan="2"><button class="btn btn-success">Ajouter</button></td>

                    </tr>
                </form>

                </tbody>
            </table>

            <table>
                <thead>
                <tr>
                    <th>Rubrique</th>
                    <th colspan="2">Options</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach($rubriques as $rubrique) : ?>
                    <tr>

                        <form action="modif-rubrique.ctrl.php" method="POST" onsubmit="return sure()">

                            <td style="display: none;"><input type="text" name="idRubrique" value="<?php echo $rubrique->getIdRubrique(); ?>" /></td>

                            <td><input type="text" name="nomRub" value="<?php echo $rubrique->getNomRub(); ?>" required /></td>

                            <td class="td-modif"><button class="btn btn-warning">Modifier</button></td>

                        </form>

                        <td class="td-suppr"><a href="suppr-rubrique.ctrl.php?idRubrique=<?php echo $rubrique->getIdRubrique(); ?>" class="btn btn-danger" onclick="return confirm('Etes-vous sûr ?')">Supprimer</a></td>

                    </tr>
                <?php endforeach; ?>

                <form action="ajout-rubrique.ctrl.php" method="POST">
                    <tr>

                        <td>
                            <input type="text" name="nomRub" value="<?php if(isset($nomRub)) {echo $nomRub;} ?>" required />
                        </td>

                        <td class="td-ajout" colspan="2"><button class="btn btn-success">Ajouter</button></td>

                    </tr>
                </form>

                </tbody>
            </table>

        </div>

        <p>
            <a href="accueil-admin.ctrl.php"><button class="btn btn-primary">Liens</button></a>
            <a href="utilisateurs.ctrl.php"><button class="btn btn-primary">Utilisateurs</button></a>

        </p>

    </section>

<?php $section = ob_get_clean(); ?>