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
		<link rel="stylesheet" href="<?= __DIR__ ?>/../style/bootstrap-4.2.1/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?= __DIR__ ?>/../style/style.css">

	</head>

	<body>

		<header>

			<nav id="nav_header">

				<div>
				<!--
				<input id="zone_recherche" type="text" name="recherche" placeholder="Chercher" autofocus>
				<button id="btn_recherche" type="submit"><img src="<?php //echo MYSITE_PATH; ?>img/icons/loupe.png" alt="Bouton loupe" title="Lancez la recherche"></button>
				-->
					<a class="ws-nowrap" href="<?= __DIR__ ?>/../ctrl/autres_liens.ctrl.php">Autres sites</a>
				</div>

				<ul>

					<li><a href="<?= __DIR__ ?>/../index.php">Accueil</a></li>

					<li><a href="<?= __DIR__ ?>/../ctrl/vietnam.ctrl.php">Vietnam</a></li>

					<?php if (isset($_SESSION['nomUser']))	: ?>
						<li><a href="<?= __DIR__ ?>/../ctrl/user/warhammer.ctrl.php">Warhammer JDRF</a></li>
						<li><a href="<?= __DIR__ ?>/../ctrl/deconnexion.php">Déconnexion</a></li>
					<?php else : ?>
						<li><a href="<?= __DIR__ ?>/../ctrl/connexion.ctrl.php">Connexion</a></li>
					<?php endif; ?>

				</ul>

			</nav>

			<div>

				<figure>
					<?php if (isset($_SESSION['nomUser']) AND $_SESSION['nomUser'] == 'gilleste') : ?>
						<a href="<?= __DIR__ ?>/../ctrl/admin/accueil-admin.ctrl.php"><img src="<?= __DIR__ ?>/../imgs/logo.png" alt="Logo"></a>
					<?php else : ?>
						<img src="<?= __DIR__ ?>/../imgs/logo.png" alt="Logo">
					<?php endif; ?>
				</figure>

				<div>
					<h1>GILTG</h1>
				</div>

			</div>

		</header>

		<main>

			<?= $navSide ?>

			<?= $section ?>

			<div id="asides">

				<?= $supportAside ?>
				<?= $codeAside ?>
				<?= $siteExtAside ?>

			</div>

		</main>

		<footer>

			<div>
				<p><a href="<?= __DIR__ ?>/../ctrl/contact.ctrl.php">Contact</a></p>
			</div>

			<div>
				<p>© Copyright 2019 - <strong><a href="#">Giltg.fr</a></strong> - <span class="ws-nowrap">Tous droits réservés</span></p>
			</div>

			<div>

			</div>

		</footer>

		<!-- Chargement du JavaScript Bootstrap JS -->
		<script src="<?= __DIR__ ?>/../bootstrap-4.2.1/js/bootstrap.js"></script>
		<!-- Chargement d'autres JavaScript -->

	</body>

</html>