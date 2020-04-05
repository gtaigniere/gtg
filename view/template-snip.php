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
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
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
                    <?php if (isset($_SESSION['User']))	: ?>
                        <li><a href="?target=snippets">Snippets</a></li>
                    <?php endif; ?>
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
            <aside id="navcol">
                <ul>Languages
                    <li><a href=".">Tous les langages</a></li>
                    <?php foreach ($languages as $language) : ?>
                        <li><a href="?language=<?= $language->getIdLang() ?>"><?= $language->getLabel() ?></a></li>
                    <?php endforeach; ?>
                </ul>
                <ul>Catégories
                    <li><a href=".">Toutes les catégories</a></li>
                    <?php foreach ($cats as $cat) : ?>
                        <li><a href="?cat=<?= $cat->getIdCat() ?>"><?= $cat->getLabel() ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </aside>
            <?php $cat = (isset($_GET['cat'])) ? '&cat=' . $_GET['cat'] : ''; ?>
            <aside id="listsnippets">
                <h1>Tous les snippets</h1>
                <ul>
                    <?php foreach ($snippetsDto as $item) : ?>
                        <a href="?action=oneSnippet&id=<?= $item->getIdSnip() . $cat ?>">
                            <li class="<?= isset($snippet) && $item->getIdSnip() == $snippet->getIdSnip() ? 'selected' : ''; ?>">
                                <h2><?= $item->getTitle(); ?></h2>
                                <p><?= $item->getLanguage()->getLabel(); ?></p>
                                <p><?= date('d-m-Y', strtotime($item->getDateCrea())); ?></p>
                            </li>
                        </a>
                    <?php endforeach; ?>
                </ul>
            </aside>
            <?= $content ?>
        </main>
        <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.18.1/highlight.min.js"></script>
        <script>hljs.initHighlightingOnLoad();</script>

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

		<!-- Chargement du JavaScript Bootstrap JS -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
		<!-- Chargement d'autres JavaScript -->
        <!--<script src="../script/animRub.js"></script>-->

	</body>

</html>