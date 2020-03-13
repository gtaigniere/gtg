<?php session_start(); ?>

<!DOCTYPE html>

<html lang="fr">

	<head>

		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="Récapitulatif de cours en développement">
		<meta name="keywords" content="">

		<title>Giltg</title>
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="../style/style.css">

	</head>

	<body>

		<header>

			<nav id="nav_header">

				<div>
					<a class="ws-nowrap" href="index.php?target=autres_sites">Autres sites</a>
				</div>

                <!--
				<input id="zone_recherche" type="text" name="recherche" placeholder="Chercher" autofocus>
				<button id="btn_recherche" type="submit"><img src="<?php //echo MYSITE_PATH; ?>img/icons/loupe.png" alt="Bouton loupe" title="Lancez la recherche"></button>
				-->

				<ul>
					<li><a href="index.php">Accueil</a></li>
                    <?php if (isset($_SESSION['nomUser']))	: ?>
                        <li><a href="index.php?target=snippets">Snippets</a></li>
                    <?php endif; ?>
					<li><a href="index.php?target=vietnam">Vietnam</a></li>

					<?php if (isset($_SESSION['nomUser']))	: ?>
						<li><a href="index.php?target=warhammer">Warhammer JDRF</a></li>
						<li><a href="ctrl/deconnexion.php">Déconnexion</a></li>
					<?php else : ?>
						<li><a href="index.php?target=connexion">Connexion</a></li>
					<?php endif; ?>

				</ul>

			</nav>

			<div>

				<figure>
					<?php if (isset($_SESSION['nomUser']) AND $_SESSION['nomUser'] == 'gilleste') : ?>
						<a href="ctrl/admin/accueil-admin.ctrl.php"><img src="imgs/thumbmails/logo.png" alt="Logo"></a>
					<?php else : ?>
						<img src="imgs/thumbmails/logo.png" alt="Logo">
					<?php endif; ?>
				</figure>

				<div>
					<h1>GILTG</h1>
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

            <?php if ($showLinks && !empty($links['support']) || !empty($links['code']) || !empty($links['site-ext'])) : ?>
			    <div id="asides">

                    <?php if (!empty($links['support'])) {
                            require_once ROOT_DIR . 'view/fragment/support_aside.php';
                        }
                        if (!empty($links['code'])) {
                            require_once ROOT_DIR . 'view/fragment/code_aside.php';
                        }
                        if (!empty($links['site-ext'])) {
                            require_once ROOT_DIR . 'view/fragment/site-ext_aside.php';
                        }
                    ?>

			    </div>
            <?php endif; ?>

		</main>

		<footer>

			<div>
				<p><a href="index.php?target=contact">Contact</a></p>
			</div>

			<div>
				<p>© Copyright 2019 - <strong><a href="index.php">GiltG.fr</a></strong> - <span class="ws-nowrap">Tous droits réservés</span></p>
			</div>

			<div>

			</div>

		</footer>

		<!-- Chargement du JavaScript Bootstrap JS -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
		<!-- Chargement d'autres JavaScript -->
        <!--<script src="script/.js"></script>-->

	</body>

</html>