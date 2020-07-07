--
-- Base de données :  `gtg`
--
CREATE DATABASE IF NOT EXISTS gtg DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

USE gtg;

-- --------------------------------------------------------

--
-- Structure de la table `rubric`
--
CREATE TABLE IF NOT EXISTS rubric (
    idRub SMALLINT(5) NOT NULL AUTO_INCREMENT,
    label VARCHAR(20) COLLATE utf8_general_ci NOT NULL,
    image VARCHAR(30) COLLATE utf8_general_ci DEFAULT NULL,
    PRIMARY KEY (idRub)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Contenu de la table `rubric`
--
INSERT INTO rubric (idRub, label, image) VALUES
    (NULL, 'Boole', 'algebre_de_boole.jpg'),
    (NULL, 'Algorithmie', 'algorithmie.png'),
    (NULL, 'UML', 'uml.png'),
    (NULL, 'Model_BdD', 'modelisation_bdd.png'),
    (NULL, 'HTML', 'html.png'),
    (NULL, 'CSS', 'css.png'),
    (NULL, 'JavaScript', 'javascript.png'),
    (NULL, 'PHP', 'php.png'),
    (NULL, 'Java', 'java.png'),
    (NULL, 'SQL', 'sql.png'),
    (NULL, 'MySQL', 'mysql.png'),
    (NULL, 'Oracle', 'oracle.png'),
    (NULL, 'Vietnam', 'vietnam.png');

-- --------------------------------------------------------

--
-- Structure de la table `type`
--
CREATE TABLE IF NOT EXISTS type (
    idType SMALLINT(5) NOT NULL AUTO_INCREMENT,
    label VARCHAR(40) COLLATE utf8_general_ci NOT NULL,
    PRIMARY KEY (idType)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Contenu de la table `type`
--
INSERT INTO type (idType, label) VALUES
    (NULL, 'Support'),
    (NULL, 'Code'),
    (NULL, 'Site-ext'),
    (NULL, 'Menu-rubrique');

-- --------------------------------------------------------

--
-- Structure de la table `link`
--
CREATE TABLE IF NOT EXISTS link (
    idLink SMALLINT(5) NOT NULL AUTO_INCREMENT,
    label VARCHAR(40) COLLATE utf8_general_ci NOT NULL,
    adrOrFile tinytext COLLATE utf8_general_ci NOT NULL,
    idRub SMALLINT(5) DEFAULT NULL,
    idType SMALLINT(5) DEFAULT NULL,
    PRIMARY KEY (idLink)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Contraintes pour la table `link`
--
ALTER TABLE link
    ADD CONSTRAINT lien_rubric_fk FOREIGN KEY (idRub) REFERENCES rubric (idRub),
    ADD CONSTRAINT lien_type_fk FOREIGN KEY (idType) REFERENCES type (idType);

--
-- Contenu de la table `link`
--
INSERT INTO link (idLink, label, adrOrFile, idRub, idType) VALUES
    (NULL, 'Notions fondamentales', 'Algo-Notions_fondamentales-Cours.pdf', 2, 1),
    (NULL, 'Nombre premier', 'NombrePremierOuNon.py', 2, 2),
    (NULL, 'Table de 7', 'tableDe7.py', 2, 2),
    (NULL, 'Affectation', 'Algo_P01_Affectation.pdf', 2, 1),
    (NULL, 'Conditions', 'Algo_P02_Tests.pdf', 2, 1),
    (NULL, 'Boucles', 'Algo_P03_Boucles.pdf', 2, 1),
    (NULL, 'Procédures et fonctions', 'Algo_P04_Procedures_Fonctions.pdf', 2, 1),
    (NULL, 'Tableaux', 'Algo_P05_Tableaux.pdf', 2, 1),
    (NULL, 'Exercices', 'Algo_TD_serie d_exercices.pdf', 2, 1),
    (NULL, 'Inverse tableau', 'Fct_invTab.py', 2, 2),
    (NULL, 'Suppr doublons tableau', 'Fct_suppDoublonsTab.py', 2, 2),
    (NULL, 'Somme N 1er nombres', 'sommeDesNPremiersNombres-2.py', 2, 2),
    (NULL, 'Pyramide d''étoiles', 'PyramideDEtoiles.py', 2, 2),
    (NULL, 'Palindrome', 'Fct_palindrome.py', 2, 2),
    (NULL, 'Prix photocopies', 'Fct_prixPhotocopies.py', 2, 2),
    (NULL, 'Nb jours dans mois', 'Fct_nbJoursDansMois.py', 2, 2),
    (NULL, 'Un user avec tests', 'unUserAvecTests.py', 2, 2),
    (NULL, 'Choix programme', 'Choix_Programme.py', 2, 2),
    (NULL, 'Page structurée', 'page_structure.html', 5, 2),
    (NULL, 'Bases du HTML', 'Les_bases_du_HTML.pdf', 5, 1),
    (NULL, 'HTML avancé', 'Fonctionnalites_HTML_avancees.pdf', 5, 1),
    (NULL, 'Listes', 'listes.html', 5, 2),
    (NULL, 'Tableau', 'tableau.html', 5, 2),
    (NULL, 'Autre tableau', 'autre_tableau.html', 5, 2),
    (NULL, 'Formulaire', 'formulaire.html', 5, 2),
    (NULL, 'Autre formulaire', 'autre_formulaire.html', 5, 2),
    (NULL, 'Menu simple', 'menu_simple.html', 5, 2),
    (NULL, 'Menu avec sous-menus', 'menu_avec_sous-menus.html', 5, 2),
    (NULL, 'Doc MDN HTML', 'https://developer.mozilla.org/fr/docs/Web/HTML', 5, 3),
    (NULL, 'Amp-What', 'http://www.amp-what.com/', 5, 3),
    (NULL, 'Validateur W3C', 'https://validator.w3.org/', 5, 3),
    (NULL, 'Grafikart', 'https://www.grafikart.fr/', 5, 3),
    (NULL, 'Pierre GIRAUD', 'https://www.pierre-giraud.com/', 5, 3),
    (NULL, 'Apprendre-a-coder.com', 'https://apprendre-a-coder.com/', 5, 3),
    (NULL, 'PrimFX.com', 'https://www.primfx.com/', 5, 3),
    (NULL, 'AlsaCréations', 'https://www.alsacreations.com/', 5, 3),
    (NULL, 'Doc MDN CSS', 'https://developer.mozilla.org/fr/docs/Web/CSS', 6, 3),
    (NULL, 'Validateur CSS', 'https://jigsaw.w3.org/css-validator/', 6, 3),
    (NULL, 'Autoprefixer', 'https://autoprefixer.github.io/', 6, 3),
    (NULL, 'Calculateur', 'https://specificity.keegan.st/', 6, 3),
    (NULL, 'Transfonter', 'https://transfonter.org/', 6, 3),
    (NULL, 'Grid Garden', 'https://cssgridgarden.com/#fr', 6, 3),
    (NULL, 'Grafikart', 'https://www.grafikart.fr/', 6, 3),
    (NULL, 'Pierre GIRAUD', 'https://www.pierre-giraud.com/', 6, 3),
    (NULL, 'Apprendre-a-coder.com', 'https://apprendre-a-coder.com/', 6, 3),
    (NULL, 'PrimFX.com', 'https://www.primfx.com/', 6, 3),
    (NULL, 'AlsaCréations', 'https://www.alsacreations.com/', 7, 3),
    (NULL, 'Doc MDN JavaScript', 'https://developer.mozilla.org/fr/docs/Web/JavaScript', 7, 3),
    (NULL, 'Anthony WELC', 'https://anthonywelc.com/', 7, 3),
    (NULL, 'Grafikart', 'https://www.grafikart.fr/', 7, 3),
    (NULL, 'Pierre GIRAUD', 'https://www.pierre-giraud.com/', 7, 3),
    (NULL, 'Apprendre-a-coder.com', 'https://apprendre-a-coder.com/', 7, 3),
    (NULL, 'PrimFX.com', 'https://www.primfx.com/', 7, 3),
    (NULL, 'AlsaCréations', 'https://www.alsacreations.com/', 7, 3),
    (NULL, 'Bases du CSS', 'Les_bases_du_CSS.pdf', 6, 1),
    (NULL, 'Manuel PHP', 'https://php.net/manual/fr/intro-whatis.php', 8, 3),
    (NULL, 'Grafikart', 'https://www.grafikart.fr/', 8, 3),
    (NULL, 'Pierre GIRAUD', 'https://www.pierre-giraud.com/', 8, 3),
    (NULL, 'Apprendre-a-coder.com', 'https://apprendre-a-coder.com/', 8, 3),
    (NULL, 'PrimFX.com', 'https://www.primfx.com/', 8, 3),
    (NULL, 'Bertrand LIAUDET', 'http://bliaudet.free.fr/', 1, 3),
    (NULL, 'Bertrand LIAUDET', 'http://bliaudet.free.fr/', 2, 3),
    (NULL, 'Flexbox, guide complet', 'https://la-cascade.io/flexbox-guide-complet/#exemples', 6, 3),
    (NULL, 'Flexbox Froggy', 'https://flexboxfroggy.com/#fr', 6, 3),
    (NULL, 'Ajout de polices', 'ajout_police.css', 6, 2),
    (NULL, 'Media Queries', 'media_queries.css', 6, 2),
    (NULL, 'Reset CSS', 'reset.css', 6, 2),
    (NULL, 'Normalisation CSS', 'normalisation.css', 6, 2),
    (NULL, 'Création attribut', 'counter_attr.html', 5, 2),
    (NULL, 'Counter et attr()', 'counter_attr.html', 6, 2),
    (NULL, 'Counter et attr() (CSS)', 'counter_attr.css', 6, 2),
    (NULL, 'Animation Keyframes', 'keyframes.html', 6, 2),
    (NULL, 'Keyframes (CSS)', 'keyframes.css', 6, 2),
    (NULL, 'Blockquote', 'blockquote.html', 5, 2),
    (NULL, 'Before et after', 'before_after.css', 6, 2),
    (NULL, 'Introduction', 'Jour1_Introduction_Javascript.pdf', 7, 1),
    (NULL, 'Javascript-1', 'Jour2_Javascript.pdf', 7, 1),
    (NULL, 'Javascript-2', 'Jour3_Javascript.pdf', 7, 1),
    (NULL, 'Ajax et jQuery', 'Jour4-5-6_Ajax_jQuery.pdf', 7, 1),
    (NULL, 'Avancé', '#avance', 2, 4),
    (NULL, 'Fonctions', '#fonctions', 2, 4),
    (NULL, 'Tableaux', '#tableaux', 2, 4),
    (NULL, 'Récapitulatif', '#recap', 2, 4),
    (NULL, 'Routard.com', 'https://www.routard.com/guide/code_dest/vietnam.htm', 13, 3),
    (NULL, 'Galerie', 'index.php?target=galerie', 13, 4);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--
CREATE TABLE IF NOT EXISTS user (
    idUser SMALLINT(5) NOT NULL AUTO_INCREMENT,
    pseudo VARCHAR(40) COLLATE utf8_general_ci NOT NULL,
    email VARCHAR(50) COLLATE utf8_general_ci NOT NULL,
    pwd VARCHAR(100) COLLATE utf8_general_ci NOT NULL,
    confirmKey VARCHAR(255) COLLATE utf8_general_ci DEFAULT NULL,
    confirmed BOOLEAN DEFAULT FALSE NOT NULL,
    PRIMARY KEY (idUser)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Contenu de la table `user`
--
INSERT INTO user (idUser, pseudo, email, pwd, confirmKey, confirmed) VALUES
    (NULL, 'gilleste', 'gilleste@nanterre.fr', '$2y$12$YRgfcdmX2X8KZx3.lMQG3OgyoXi3SOe4uTnf31jjSWuPL2X5LYvoG', NULL, FALSE),
    (NULL, 'davidht', 'davidht@soisy.fr', '$2y$12$WHCdRWGsVVvZKUPI77uBbOZNk4iavwqpuJZJeorcrx/SO2s1E9wn.', NULL, FALSE),
    (NULL, 'didierhn', 'didierhn@paris.fr', '$2y$12$c/oLC8PUBGkGnijJ2A9oLuvRbO/77B5jIsmeCwpmqM4WGLMSy/MW2', NULL, FALSE),
    (NULL, 'jérémyht', 'jeremyht@etel.fr', '$2y$12$YAdLTb/ZhTIrcjvH7ygAbuBxvcWvFUxIdrmYC3T9T/no0xjoBpAE.', NULL, FALSE);

# gilleste / gilles12 => $2y$12$YRgfcdmX2X8KZx3.lMQG3OgyoXi3SOe4uTnf31jjSWuPL2X5LYvoG
# davidht / david666 => $2y$12$WHCdRWGsVVvZKUPI77uBbOZNk4iavwqpuJZJeorcrx/SO2s1E9wn.
# didierhn / didier03 => $2y$12$c/oLC8PUBGkGnijJ2A9oLuvRbO/77B5jIsmeCwpmqM4WGLMSy/MW2
# jeremyht / jeremy56 => $2y$12$YAdLTb/ZhTIrcjvH7ygAbuBxvcWvFUxIdrmYC3T9T/no0xjoBpAE.

-- --------------------------------------------------------

--
-- Structure de la table `recette`
--
CREATE TABLE IF NOT EXISTS recette (
    idRec SMALLINT(5) NOT NULL AUTO_INCREMENT,
    label VARCHAR(40) COLLATE utf8_general_ci NOT NULL,
	infos TEXT COLLATE utf8_general_ci DEFAULT NULL,
	pour TINYINT NOT NULL,
	ingredient TEXT COLLATE utf8_general_ci NOT NULL,
    photo VARCHAR(30) COLLATE utf8_general_ci DEFAULT NULL,
    detail MEDIUMTEXT COLLATE utf8_general_ci NOT NULL,
    PRIMARY KEY (idRec)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Contenu de la table `recette`
--
# INSERT INTO recette (idRec, label, infos, pour, ingredient, photo, detail) VALUES
#     (NULL, '', '', , '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `cat`
--
CREATE TABLE IF NOT EXISTS cat (
    idCat SMALLINT(5) NOT NULL AUTO_INCREMENT,
    label VARCHAR(40) COLLATE utf8_general_ci NOT NULL,
    PRIMARY KEY (idCat)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Contenu de la table `cat`
--
INSERT INTO cat (idCat, label) VALUES
    (NULL, 'Sécurité'),
    (NULL, 'Envoi email'),
    (NULL, 'Infos');

-- --------------------------------------------------------

--
-- Structure de la table `language`
--
CREATE TABLE language (
    idLang INT NOT NULL AUTO_INCREMENT,
    label VARCHAR(40) NOT NULL,
    PRIMARY KEY (idLang)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Contenu de la table `language`
--
INSERT INTO language (idLang, label) VALUES
    (NULL, 'PHP'),
    (NULL, 'JS'),
    (NULL, 'CSS');

-- --------------------------------------------------------

--
-- Structure de la table `snippet`
--
CREATE TABLE snippet (
    idSnip INT NOT NULL AUTO_INCREMENT,
    title VARCHAR(60) NOT NULL,
    code TEXT NOT NULL,
    dateCrea DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    comment TEXT DEFAULT NULL,
    requirement TINYTEXT DEFAULT NULL,
    idLang INT DEFAULT NULL,
    idUser INT NOT NULL,
    PRIMARY KEY (idSnip)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
ALTER TABLE snippet
    ADD CONSTRAINT snip_user_fk FOREIGN KEY (idUser) REFERENCES user (idUser);
ALTER TABLE snippet
    ADD CONSTRAINT snip_lang_fk FOREIGN KEY (idLang) REFERENCES language (idLang);

--
-- Contenu de la table `snippet`
--
INSERT INTO snippet (idSnip, title, code, dateCrea, comment, requirement, idLang, idUser) VALUES
    (NULL, 'A vérifier', '<?php echo \'test\'; ?>\r\npeut être remplacé par\r\n<?= \'test\'; ?>\r\nA confirmer', '2020-02-05 12:35:27', 'Voir avec Matthieu', NULL, 1, 1),
    (NULL, 'VarLetConst', 'VAR est remplac&eacute; par CONST et LET depuis ES...', '2020-02-07 09:46:52', '', '', 2, 2),
    (NULL, 'Display', 'display:none; =&gt; ne sera pas affich&eacute;', '2020-02-06 22:15:08', '', '', 3, 2),
    (NULL, 'HtmlSpecialChar', 'HTMLSPECIALCHAR($_GET[\'variable\'])', '2020-02-08 16:47:18', NULL, NULL, 1, 1),
    (NULL, 'Envoyer un mail', 'mail("label@fournisseur", "Sujet", $message, $header);', '2020-02-07 00:00:00', NULL, NULL, 1, 2),
    (NULL, 'Test ajout', 'var $add = "Ajout d\'un snippet";console.log($add...', '2020-02-09 12:31:40', '', '', 2, 1),
    (NULL, 'Debugage', '<?phg debugueur ?>', '2020-02-08 07:31:20', NULL, NULL, 1, 2);

-- Sélection des snippets n'ayant pas de catégorie
SELECT s.* FROM snippet s WHERE NOT EXISTS (
        SELECT 1 FROM snipcat sc WHERE sc.idSnip = s.idSnip
    );
-- ou
SELECT s.* FROM snippet s WHERE s.idSnip NOT IN (
    SELECT sc.idSnip FROM snipcat sc
);

-- --------------------------------------------------------

--
-- Structure de la table `snipcat`
--
CREATE TABLE snipcat (
    idSnip INT,
    idCat INT
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
ALTER TABLE snipcat
    ADD CONSTRAINT snipcat_snippet_fk FOREIGN KEY (idSnip) REFERENCES snippet (idSnip);
ALTER TABLE snipcat
    ADD CONSTRAINT snipcat_cat_fk FOREIGN KEY (idCat) REFERENCES cat (idCat);

--
-- Contenu de la table `snipcat`
--
INSERT INTO snipcat (idSnip, idCat) VALUES
    (1, 3),
    (2, 3),
    (3, 3),
    (4, 1),
    (5, 2),
    (6, 1),
    (7, 2),
    (7, 3);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--
CREATE TABLE contact (
     id INT NOT NULL AUTO_INCREMENT,
     firstname VARCHAR(40) NOT NULL,
     mail VARCHAR(50) COLLATE utf8_general_ci NOT NULL,
     object VARCHAR(80) COLLATE utf8_general_ci NOT NULL,
     received DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
     message TEXT COLLATE utf8_general_ci NOT NULL,
     PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Contenu de la table `contact`
--
INSERT INTO message (id, firstname, mail, object, received, message) VALUES
(NULL, 'Dylan', 'dylan@free.fr', 'Question sur PHP', '2020-06-15 11:32:17', 'Bonjour, peut on faire un constructeur en PHP ?'),
(NULL, 'Bruno', 'bruno@bbox.fr', 'Tableaux en JavaScript', '2019-09-25 12:55:47', 'Bjr, possible de me dire si cette ligne vous parait ok ?'),
(NULL, 'Dylan', 'Maxime@yahoo.com', 'Python en backend', '2020-07-10 16:52:35', 'Avez-vous des connaissances en Python ?');
