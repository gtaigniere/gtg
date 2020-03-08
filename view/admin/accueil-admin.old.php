<?php include('../../header.php'); ?>

<div id="main">

  <section id="section_accueil-admin">

    <h2>Les liens</h2>

    <?php
      if (isset($lSuccess) AND isset($ams)) :
        switch ($ams) {
          case '1':
            $message = 'Lien ajouté avec succès !';
            break;
          case '2':
            $message = 'Lien modifié avec succès !';
            break;
          case '3':
            $message = 'Lien supprimé avec succès !';
            break;
        }
    ?>
      <div class= "alert alert-success" role="alert">
          <?php echo $message; ?>
      </div>
    <?php endif; ?>
    <?php
      if (isset($lNoSuccess)) :
        switch ($lNoSuccess) {
          case '1':
            $message = 'L\'adresse/fichier n\'est pas correcte !';
            break;
          case '2':
            $message = 'Le nom du lien ne peut contenir que des lettres, des chiffres, "_", "-", "(", ")", et " " !';
            break;
          case '3':
            $message = 'Echec de l\'ajout du lien';
            break;
          case '4':
            $message = 'Echec de la modification du lien';
            break;
          case '5':
            $message = 'Echec de la suppression du lien';
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
            <th>Rubrique</th>
            <th>Adresse / Fichier</th>
            <th>Nom du lien</th>
            <th colspan="2">Options</th>
          </tr>
        </thead>
        <tbody>

          <?php foreach($liensTypRub as list($idL, $lib, $nomR, $adrF, $lien)) : ?>
            <tr>

              <form action="modif-lien.ctrl.php" method="POST" onsubmit="return sure()">

                <td style="display: none;"><input type="text" name="idLien" value="<?php if(isset($idL)) {echo $idL;} ?>" /></td>

                <td>
                  <select name="libelle">
                    <?php foreach($types as $type) : ?>
                      <option value="<?php echo $type->getLibelle(); ?>"
                        <?php
                          if ($lib == $type->getLibelle()) {
                            echo ' selected ';
                          }
                        ?>
                        ><?php echo $type->getLibelle(); ?></option>
                    <?php endforeach; ?>
                  </select>
                </td>

                <td>
                  <select name="nomRub">
                    <?php foreach($rubriques as $rubrique) : ?>
                      <option value="<?php echo $rubrique->getNomRub(); ?>"
                        <?php
                          if ($nomR == $rubrique->getNomRub()) {
                            echo ' selected ';
                          }
                        ?>
                        ><?php echo $rubrique->getNomRub(); ?></option>
                    <?php endforeach; ?>
                  </select>
                </td>

                <!--<td><input type="text" name="libelle" value="<?php //if(isset($lib)) {echo $lib;} ?>" /></td>

                <td><input type="text" name="nomRub" value="<?php //if(isset($nomR)) {echo $nomR;} ?>" /></td>-->

                <td><input type="text" name="adrOuFich" value="<?php if(isset($adrF)) {echo $adrF;} ?>" /></td>

                <td><input type="text" name="nomLien" value="<?php if(isset($lien)) {echo $lien;} ?>" /></td>

                <td class="td-modif"><button class="btn btn-warning">Modifier</button></td>

              </form>

              <td class="td-suppr"><a href="suppr-lien.ctrl.php?idLien=<?php echo $idL; ?>" class="btn btn-danger" onclick="return confirm('Etes-vous sûr ?')">Supprimer</a></td>
            </tr>
          <?php endforeach; ?>

          <form action="ajout-lien.ctrl.php" method="POST" onsubmit="return sure()">
            <tr>

              <td>
                <select name="idType">
                  <?php foreach($types as $type) : ?>
                    <option value="<?php echo $type->getIdType(); ?>"><?php echo $type->getLibelle(); ?></option>
                  <?php endforeach; ?>
                </select>
              </td>

              <td>
                <select name="idRubrique">
                  <?php foreach($rubriques as $rubrique) : ?>
                    <option value="<?php echo $rubrique->getIdRubrique(); ?>"><?php echo $rubrique->getNomRub(); ?></option>
                  <?php endforeach; ?>
                </select>
              </td>

              <!--<td><input type="text" name="libelle" value="<?php //if(isset($libelle)) {echo $libelle;} ?>" required /></td>

              <td><input type="text" name="nomRub" value="<?php //if(isset($nomRub)) {echo $nomRub;} ?>" required /></td>-->

              <td><input type="text" name="adrOuFich" value="<?php if(isset($adrOuFich)) {echo $adrOuFich;} ?>" required /></td>

              <td><input type="text" name="nomLien" value="<?php if(isset($nomLien)) {echo $nomLien;} ?>" required /></td>

              <td class="td-ajout" colspan="2"><button class="btn btn-success">Ajouter</button></td>

            </tr>
          </form>

        </tbody>

      </table>

      <p>
        <a href="utilisateurs.ctrl.php"><button class="btn btn-primary">Utilisateurs</button></a>
        <a href="types_rubriques.ctrl.php"><button class="btn btn-primary">Types et Rubriques</button></a>
      </p>

    </div>

<!--    <?php //include('../../boutons_bas_sections.php'); ?>-->

  </section>

<!--  <?php //include('../../asides.php'); ?>-->

</div>

<!-- Chargement d'autres scripts JavaScript -->
<script>function sure() { return confirm("Etes-vous sûr ?"); }</script>

<?php include('../../footer.php'); ?>
