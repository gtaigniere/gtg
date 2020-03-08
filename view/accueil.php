<?php ob_start(); ?>

    <section id="section_accueil">

        <h2 class="h2_accueil"><strong>Bienvenue</strong></h2>

        <figure class="fig_rubrique">
            <a href="<?= ROOT_DIR ?>RubricCtrl.php?target=rubric&show=boole"><img class="img_rubrique" id="boole" src="<?= ROOT_DIR ?>imgs/thumbmails/algebre_de_boole.jpg" alt="George Boole" /></a>
        </figure>

        <figure class="fig_rubrique">
            <a href="<?= ROOT_DIR ?>RubricCtrl.php?target=rubric&show=algorithmie"><img class="img_rubrique" id="algorithmie" src="<?= ROOT_DIR ?>imgs/thumbmails/algorithmie.png" alt="Algorithmie" /></a>
        </figure>

        <figure class="fig_rubrique">
            <a href="<?= ROOT_DIR ?>RubricCtrl.php?target=rubric&show=uml"><img class="img_rubrique" id="uml" src="<?= ROOT_DIR ?>imgs/thumbmails/uml.png" alt="UML" /></a>
        </figure>

        <figure class="fig_rubrique">
            <a href="<?= ROOT_DIR ?>RubricCtrl.php?target=rubric&show=model_bdd"><img class="img_rubrique" id="model_bdd" src="<?= ROOT_DIR ?>imgs/thumbmails/modelisation_bdd.png" alt="Exemple modélisation BdD " /></a>
        </figure>

        <figure class="fig_rubrique">
            <a href="<?= ROOT_DIR ?>RubricCtrl.php?target=rubric&show=html"><img class="img_rubrique" id="html" src="<?= ROOT_DIR ?>imgs/thumbmails/html.png" alt="HTML" /></a>
        </figure>

        <figure class="fig_rubrique">
            <a href="<?= ROOT_DIR ?>RubricCtrl.php?target=rubric&show=css"><img class="img_rubrique" id="css" src="<?= ROOT_DIR ?>imgs/thumbmails/css.png" alt="CSS" /></a>
        </figure>

        <figure class="fig_rubrique">
            <a href="<?= ROOT_DIR ?>RubricCtrl.php?target=rubric&show=javascript"><img class="img_rubrique" id="javascript" src="<?= ROOT_DIR ?>imgs/thumbmails/javascript.png" alt="JavaScript" /></a>
        </figure>

        <figure class="fig_rubrique">
            <a href="<?= ROOT_DIR ?>RubricCtrl.php?target=rubric&show=php"><img class="img_rubrique" id="php" src="<?= ROOT_DIR ?>imgs/thumbmails/php.png" alt="PHP" /></a>
        </figure>

        <figure class="fig_rubrique">
            <a href="<?= ROOT_DIR ?>RubricCtrl.php?target=rubric&show=java"><img class="img_rubrique" id="java" src="<?= ROOT_DIR ?>imgs/thumbmails/java.png" alt="Java" /></a>
        </figure>

        <figure class="fig_rubrique">
            <a href="<?= ROOT_DIR ?>RubricCtrl.php?target=rubric&show=sql"><img class="img_rubrique" id="sql" src="<?= ROOT_DIR ?>imgs/thumbmails/sql.png" alt="SQL" /></a>
        </figure>

        <figure class="fig_rubrique">
            <a href="<?= ROOT_DIR ?>RubricCtrl.php?target=rubric&show=mysql"><img class="img_rubrique" id="mysql" src="<?= ROOT_DIR ?>imgs/thumbmails/mysql.png" alt="MySQL" /></a>
        </figure>

        <figure class="fig_rubrique">
            <a href="<?= ROOT_DIR ?>RubricCtrl.php?target=rubric&show=oracle"><img class="img_rubrique" id="oracle" src="<?= ROOT_DIR ?>imgs/thumbmails/oracle.png" alt="Oracle" /></a>
        </figure>

    </section>

<?php $section = ob_get_clean(); ?>