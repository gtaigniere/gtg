<?php include('../../header.php'); ?>

<div id="main">

<!--  <?php //include('../../nav_side.php'); ?>-->

  <section id="section_accueil-admin">

    <h2>Les liens</h2>

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
          <?php foreach($liens as $lien) : ?>
            <tr>
              <td style="display: none;"><?php echo $lien->getIdLien(); ?></td>

              <td><?php echo $types[$lien->getIdType()]->libelle; ?></td>

              <td><?php echo $rubriques[$lien->getIdRubrique()]->nomRub; ?></td>

              <td><?php echo $lien->getAdrOuFich(); ?></td>
              <td><?php echo $lien->getNomLien(); ?></td>

              <td class="td-modif"><a href="pre-modif-lien.ctrl.php?idLien=<?php echo $lien->getIdLien(); ?>" class="btn btn-warning">Modifier</a></td>
              <td class="td-suppr"><a href="suppr-lien.ctrl.php?idLien=<?php echo $lien->getIdLien(); ?>" class="btn btn-danger">Supprimer</a></td>
            </tr>
          <?php endforeach; ?>

          <form action="ajout-lien.ctrl.php" method="POST">
            <tr>

              <td>
                <select name="libelle">
                  <option value="Support">Support</option>
                  <option value="Code" selected="selected">Code</option>
                  <option value="Site_ext">Site_ext</option>
                </select>
              </td>

              <td>
                <select name="nomRub">
                  <option value="Boole">Boole</option>
                  <option value="Algorithmie">Algorithmie</option>
                  <option value="UML">UML</option>
                  <option value="Model_BdD">Modélisation BdD</option>
                  <option value="HTML">HTML</option>
                  <option value="CSS">CSS</option>
                  <option value="JavaScript" selected="selected">JavaScript</option>
                  <option value="PHP">PHP</option>
                  <option value="Java">Java</option>
                  <option value="SQL">SQL</option>
                  <option value="MySQL">MySQL</option>
                  <option value="Oracle">Oracle</option>
                </select>
              </td>

              <td><input type="text" name="adrOuFich" value="<?php if(isset($adrOuFich)) {echo $adrOuFich;} ?>" required /></td>

              <td><input type="text" name="nomLien" value="<?php if(isset($nomLien)) {echo $nomLien;} ?>" required /></td>

              <td class="td-ajout" colspan="2"><button class="btn btn-success">Ajouter</button></td>

            </tr>
          </form>

        </tbody>

      </table>

      <p>
        <a href="utilisateurs.ctrl.php"><button class="btn btn-primary">Utilisateurs</button></a>
        <a href="../../index-old.php"><button class="btn btn-dark">Déconnexion</button></a>
      </p>

    </div>

<!--    <?php //include('../../boutons_bas_sections.php'); ?>-->

  </section>

<!--  <?php //include('../../vues/admin/asides.view.php'); ?>-->

</div>

<!-- Chargement d'autres scripts JavaScript -->

<?php include('../../footer.php'); ?>
