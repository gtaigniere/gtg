<!DOCTYPE html>

<html lang="fr">

	<head>

		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="Récapitulatif de cours en développement">
		<meta name="keywords" content="">

		<title>Gtg</title>
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <!-- Highlight JS -->
        <link rel="stylesheet"
              href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.1/styles/default.min.css">
		<link rel="stylesheet" type="text/css" href="../style/style.css">

	</head>

	<body>

		<header>

			<nav id="nav_header">

				<div>
					<a class="ws-nowrap" href="?target=autres_sites">Autres sites</a>
				</div>

                <!--
				<input id="zone_recherche" type="text" name="recherche" placeholder="Chercher" autofocus>
				<button id="btn_recherche" type="submit"><img src="<?php //echo MYSITE_PATH; ?>img/icons/loupe.png" alt="Bouton loupe" title="Lancez la recherche"></button>
				-->

                <?php if (!isset($_SESSION['User'])) : ?>
                    <div><a href="?target=auth&action=subscribe"><button id="button_inscription">Inscription</button></a></div>
                <?php endif; ?>

				<ul>
					<li><a href="index.php">Accueil</a></li>
<!--                    --><?php //if (isset($_SESSION['User']))	: ?>
                        <li><a href="?target=snippet">Snippets</a></li>
<!--                    --><?php //endif; ?>
					<li><a href="?target=vietnam">Vietnam</a></li>

					<?php if (isset($_SESSION['User']))	: ?>

                        <?php if ($_SESSION['User'] == 'v' || $_SESSION['User'] == 'w' || $_SESSION['User'] == 'x' || $_SESSION['User'] == 'z') : ?>
						    <li><a href="?target=warhammer">Warhammer JDRF</a></li>
                        <?php endif; ?>

						<li><a href="?target=auth&action=logout">Déconnexion</a></li>
					<?php else : ?>
						<li><a href="?target=auth&action=loginForm">Connexion</a></li>
					<?php endif; ?>

				</ul>

			</nav>

			<div>

				<figure>
                    <?php if (isset($_SESSION['User']) && $_SESSION['User'] == 'gilleste') : ?>
                        <a href="?target=admin&admTarg=link"><img src="imgs/thumbmails/logo.png" alt="Logo"></a>
                    <?php else : ?>
					    <img src="imgs/thumbmails/logo.png" alt="Logo">
                    <?php endif; ?>
				</figure>

				<div>
					<h1>GTG</h1>
				</div>

			</div>

		</header>

		<main>

            <?php $showLinks = isset($links);
                if ($showLinks && !empty($links['menu-rubrique'])) {
                    require_once ROOT_DIR . 'view/fragment/nav_side.php';
                }
            ?>

            <?= $section ?>

            <?php if ($showLinks && !empty($links['support']) || !empty($links['code'])
                || !empty($links['site-ext']) || !empty($links['recette'])) : ?>
			    <div id="asides">

                    <?php
                        if (isset($recettes)) {
                            require ROOT_DIR . 'view/fragment/aside_recettes.php';
                        }
                        foreach($links as $key => $values) {

                            if (!empty($values) && $key != 'menu-rubrique') {
                                require ROOT_DIR . 'view/fragment/asides.php';
                            }
                        }
                    ?>

			    </div>
            <?php endif; ?>

		</main>

		<footer>

			<div>
				<p><a href="?target=contact">Contact</a></p>
			</div>

			<div>
				<p>© Copyright 2019 - <strong><a href="index.php">gtg.fr</a></strong> - <span class="ws-nowrap">Tous droits réservés</span></p>
			</div>

			<div>

			</div>

		</footer>

		<!-- JavaScript Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <!-- Highlight JS -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.18.1/highlight.min.js"></script>
        <script>hljs.initHighlightingOnLoad();</script>
        <!-- Autres Script -->
        <script>$function() { $(".myPopover").popover(); });</script>
        <!--<script src="../script/animRub.js"></script>-->

	</body>

</html>