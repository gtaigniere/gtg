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
    confirmKey VARCHAR(255) COLLATE utf8_general_ci,
    confirmed boolean NOT NULL DEFAULT FALSE,
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
-- Structure de la table `photo`
--
CREATE TABLE IF NOT EXISTS photo (
    idPhoto SMALLINT(5) NOT NULL AUTO_INCREMENT,
    label VARCHAR(40) COLLATE utf8_general_ci NOT NULL,
    PRIMARY KEY (idPhoto)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Contenu de la table `photo`
--
INSERT INTO photo (idPhoto, label) VALUES
    (NULL, 'photo1-mini.jpg'),
    (NULL, 'photo2-mini.jpg'),
    (NULL, 'photo3-mini.jpg'),
    (NULL, 'photo4-mini.jpg'),
    (NULL, 'photo5-mini.jpg'),
    (NULL, 'photo6-mini.jpg');
