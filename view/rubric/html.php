<?php ob_start(); ?>

    <section id="section_html">

        <h1>HTML</h1>

        <h3>Base d'une page HTML</h3>
        <p class="html zmargin_bottom">&lt;!DOCTYPE html&gt;</p>
        <p class="html">&lt;html lang="[Abrégé de la langue (ex: fr)]"&gt;</p>
        <p class="html zmargin_bottom">&lt;head&gt;</p>
        <p class="html indent1fois zmargin_bottom">&lt;meta charset="[Encodage de la page (ex: utf-8)]"&gt;</p>
        <p class="html indent1fois zmargin_bottom">&lt;meta name="description" content="[Contenu du site]"&gt;</p>
        <p class="html indent1fois zmargin_bottom">&lt;title&gt;[Titre]&lt;/title&gt;</p>
        <p class="html indent1fois zmargin_bottom">&lt;link rel="stylesheet" type="text/css" href="[chemin et nom du fichier CSS]"&gt;</p>
        <p class="html">&lt;/head&gt;</p>
        <p class="html zmargin_bottom">&lt;body&gt;<br>
        <p class="html zmargin_bottom">&lt;/body&gt;<br>
        <p class="html">&lt;/html&gt;</p>

        <p class="nomargin_bottom">Ensuite selon les besoins, dans la balise "body", nous pouvons mettre ces balises :</p>
        <p class="html">&lt;header&gt;&lt;/header&gt;<br>
        &lt;nav&gt;&lt;/nav&gt;<br>
        &lt;section&gt;&lt;/section&gt;<br>
        &lt;article&gt;&lt;/article&gt;<br>
        &lt;aside&gt;&lt;/aside&gt;<br>
        &lt;footer&gt;&lt;/footer&gt;<br>
        &lt;div&gt;Pour englober des blocs&lt;/div&gt;<br>
        &lt;span&gt;Pour englober des mots ou des phrases&lt;/span&gt;</p>
        <p class="nomargin_bottom">La balise "script" :</p>
        <p class="html">Comme ceci : &lt;script type="text/javascript" src="[chemin et nom du fichier JavaScript]"&gt;&lt;/script&gt;Exécutera le script nommé.<br>
        Ou : &lt;script&gt;[Code JavaScript qui sera exécuté]&lt;/script&gt;<br>
        Cette balise peut être placée à différents endroits de la page mais elle sera généralement placée, soit dans la balise "head", soit après la balise "body", suivant que l'on désire que le script soit éxécuté à tel ou tel moment du chargement de la page.</p>

        <h3>Balises de base</h3>
        <p class="html">
        &lt;h1&gt;Titre de premier niveau&lt;/h1&gt; à &lt;h7&gt;Titre de septième et dernier niveau&lt;/h7&gt;<br>
        &lt;p&gt;Paragraphe&lt;/p&gt;<br>
        &lt;ul&gt;Liste non ordonnée&lt;/ul&gt;<br>
        &lt;ol&gt;Liste ordonnée&lt;/ol&gt;<br>
        &lt;li&gt;Elément de liste&lt;/li&gt;<br>
        &lt;pre&gt;Conserve la mise en page&lt;/pre&gt;<br>
        &lt;hr&gt;Séparateur (ligne)<br>
        &lt;blockquote&gt;Citation&lt;/blockquote&gt;<br>
        &lt;strong&gt;Texte important (en gras)&lt;/strong&gt;<br>
        &lt;em&gt;Texte mis en valeur (italique)&lt;/em&gt;<br>
        &lt;br&gt;Aller à la ligne<br>
        &lt;sup&gt;Texte en exposant (plus haut et plus petit)&lt;/sup&gt;<br>
        &lt;sub&gt;Texte en indice (plus bas et plus petit)&lt;/sub&gt;<br>
        &lt;abbr&gt;Représente une abréviation&lt;/abbr&gt;<br>
        &lt;address&gt;Indique des informations de contact&lt;/address&gt;
        </p>

        <h3>Liens hypertextes</h3>
        <p class="html zmargin_bottom">&lt;a href="[Adresse de lien, ou chemin et nom de fichier]"&gt;Lien hypertexte&lt;/a&gt;</p>
        <p class="html indent1fois zmargin_bottom">Quelques attributs et valeurs utilisables dans les liens :</p>
        <p class="html indent2fois zmargin_bottom">L'attribut "href" peut contenir "#[nom d'un id dans la page]" afin de mener à un autre endroit de la même page.</p>
        <p class="html indent2fois zmargin_bottom">Il peut contenir également "[une adresse mail]" afin d'écrire un email.</p>
        <p class="html indent3fois zmargin_bottom">"target" peut être utilisé avec "_blank" pour charger le lien dans une nouvelle page, et dans ce cas il faudra utiliser l'attribut "rel" avec :</p>
        <p class="html indent4fois zmargin_bottom">"noopener" rend l’utilisation du javascript avec «window.opener» nulle (sécurité).</p>
        <p class="html indent4fois">"noreferrer" empêche les sites externes visés via les liens hypertextes, d’obtenir des informations sur l’origine du trafic (sécurité).</p>

        <h3>Tableaux</h3>
        <p class="html zmargin_bottom">
        &lt;table&gt;Tableau&lt;/table&gt;<br>
        &lt;tr&gt;Une ligne de tableau&lt;/tr&gt;<br>
        &lt;th&gt;Une cellule de tableau qui sera l'en-tête&lt;/th&gt;<br>
        &lt;td&gt;Une cellule de tableau qui ne sera pas l'en-tête&lt;/td&gt;<br>
        &lt;caption&gt;Titre du tableau&lt;/caption&gt;<br>
        &lt;thead&gt;En-tête de tableau pour les grands tableaux&lt;/thead&gt;<br>
        &lt;tbody&gt;Corps de tableau pour les grands tableaux&lt;/tbody&gt;<br>
        &lt;tfoot&gt;Pieds de tableau pour les grands tableaux&lt;/tfoot&gt;</p>
        <p class="html indent1fois zmargin_bottom">Il y a deux attributs pour les cellules des tableaux et ils prennent un chiffre comme valeur :</p>
        <p class="html indent2fois zmargin_bottom">"colspan" permet de définir le nombre de colonne qu'occupera la cellule.</p>
        <p class="html indent2fois">"rowspan" permet de définir le nombre de ligne qu'occupera la cellule.</p>

        <h3>Images</h3>
        <p class="html zmargin_bottom">&lt;img src="[chemin et nom de fichier]" alt="[Texte]"&gt;</p>
        <p class="html indent1fois zmargin_bottom">L'attribut "alt" est un texte qui sera affiché à la place de m'image si celle-ci ne peut pas être chargée puis affichée.</p>
        <p class="html indent1fois zmargin_bottom">Une balise "img" dans une balise de lien rend l'image dans la balise "img" cliquable.</p>
        <p class="html indent1fois zmargin_bottom">Les formats d'images :</p>
        <p class="html indent2fois zmargin_bottom">"jpg" : Idéal pour les photos de bonne qualité sans être trop lourd.</p>
        <p class="html indent2fois zmargin_bottom">"png" : Bien pour les logos, et supporte la transparence.</p>
        <p class="html indent2fois zmargin_bottom">"gif" : A utiliser uniquement si l'on a besoin d'images animées.</p>
        <p class="html indent2fois zmargin_bottom">"svg" : Utilisé pour les logos, et il sauvegarde les formes.</p>
        <p class="html zmargin_bottom">&lt;figure&gt;Représente une figure&lt;/figure&gt;Permet de mettre l'image dans un type "block".</p>
        <p class="html zmargin_bottom">&lt;figcaption&gt;Légende de "figure"&lt;/figcaption&gt;</p>
        <p class="html indent1fois">Une balise "img" entourée d'une balise de lien rend l'image dans la balise "img" cliquable.</p>

        <h3>Iframes</h3>
        <p class="html zmargin_bottom">&lt;iframe&gt; src="[Adresse de lien, ou chemin et nom de fichier]"&lt;iframe&gt;</p>
        <p class="html indent1fois zmargin_bottom">C'est surtout utilisé pour intégrer du contenu multimédia (vidéo, map, etc...).</p>
        <p class="html indent1fois zmargin_bottom">Avec les attributs "width" et "height", on peut leur attribuer une largeur et une hauteur avec des valeurs en pixel.</p>
        <p class="html indent1fois">Il y a pas mal d'autres attributs, à voir ici : <a href="https://developer.mozilla.org/fr/docs/Web/HTML/Element/iframe">&lt;iframe&gt;</a>.</p>

        <h3>Formulaires</h3>
        <p class="html zmargin_bottom">&lt;form action="[chemin et nom de fichier]" method="[GET ou POST]"&gt;&lt;/form&gt;</p>
        <p class="html indent1fois zmargin_bottom">La valeur de "action" correspond à la page qui recevra les infos du formulaire.</p>
        <p class="html indent1fois zmargin_bottom">Si cette valeur est "#", cela sera la même courante.</p>
        <p class="html zmargin_bottom">&lt;fieldset&gt;Regroupe plusieurs éléments d'un formulaire&lt;/fieldset&gt;</p>
        <p class="html">&lt;legend&gt;Titre du formulaire&lt;/legend&gt;</p>

        <p class="html zmargin_bottom">&lt;label for="[(ex: test)]"&gt;Libellé du champ&lt;/label&gt;</p>
        <p class="html indent1fois">La valeur de l'attribut "for" doit correspondre à la valeur de l'attribut "id" de l'"input" ci-dessous, c'est ce qui permet de les lier.</p>

        <p class="html zmargin_bottom">&lt;input type="(ex: text)" name="[Identifiant/Clef]" id="[(ex: test)]"&gt;&lt;/input&gt;</p>
        <p class="html indent1fois zmargin_bottom">Il y a beaucoup de valeur pour le type, ci-dessous les plus courant :</p>
        <p class="html indent2fois zmargin_bottom">"text" défini un champ texte d'une seule ligne.</p>
        <p class="html indent2fois zmargin_bottom">"password" afin que les caractères entrés soient cachés par des "*".</p>
        <p class="html indent2fois zmargin_bottom">"email" permet de saisir une adresse électronique.</p>
        <p class="html indent2fois zmargin_bottom">"checkbox" pour case à cocher.</p>
        <p class="html indent2fois zmargin_bottom">"radio" pour ne pouvoir sélectionner qu'un seul des choix.</p>
        <p class="html indent3fois zmargin_bottom">Ils devront tous avoir le même attribut "name".</p>
        <p class="html indent3fois zmargin_bottom">L'attribut "checked" peut être ajouté pour qu'un des choix "radio" soit sélectionnée par défaut (fonctionne aussi pour le type "checkbox").</p>
        <p class="html indent2fois zmargin_bottom">"hidden" permet de cacher le champ.</p>
        <p class="html indent2fois zmargin_bottom">"submit" afin de pouvoir soumettre le formulaire.</p>
        <p class="html indent2fois zmargin_bottom">"reset", avec un attribut "value" qui contiendra le texte d'un bouton, permettra d'effacer le contenu du champ.</p>
        <p class="html indent2fois">Vous pouvez voir tous les types et attributs : <a href="https://developer.mozilla.org/fr/docs/Web/HTML/Element/input">&lt;input&gt;</a>.</p>

        <p class="html indent1fois zmargin_bottom">Plusieurs attributs peuvent être indiqués :</p>
        <p class="html indent2fois zmargin_bottom">"minlenght" et "maxlenght" pour limiter le nombre de caractères.</p>
        <p class="html indent2fois zmargin_bottom">"size" pour définir la taille du champ.</p>
        <p class="html indent2fois zmargin_bottom">"placeholder" permet d'indiquer un exemple de ce qu'il faut mettre dans le champ.</p>
        <p class="html indent2fois zmargin_bottom">"value" permet de pré-remplir le champ.</p>
        <p class="html indent2fois zmargin_bottom">"required" permet d'indiquer que le champ doit être rempli.</p>
        <p class="html indent2fois zmargin_bottom">"readonly" indique que le champ ne peut pas être modifié.</p>
        <p class="html indent1fois">Vous trouverez les informations sur tous les attributs de "form" ici : <a href="https://developer.mozilla.org/fr/docs/Web/HTML/Element/Form">&lt;form&gt;</a>.</p>

        <p class="html zmargin_bottom">&lt;textarea name="[Identifiant/Clef]" id="[(ex: test)]" cols="[Nombre de colonnes]" rows="Nombre de lignes"&gt;Texte sur plusieurs lignes&lt;/textarea&gt;</p>
        <p class="html indent1fois zmargin_bottom">Ce champ a l'avantage de garder la forme, soit les espaces et les sauts de ligne.</p>
        <p class="html indent1fois">Plus d'informations sur ce champ ici : <a href="https://developer.mozilla.org/fr/docs/Web/HTML/Element/Textarea">&lt;textarea&gt;</a>.</p>

        <p class="html">&lt;select name="[Identifiant/Clef]" id="[(ex: test)]"&gt;&lt;/select&gt;</p>

        <p class="html zmargin_bottom">&lt;option value="[Ce qui sera envoyé]"&gt;Option affichée&lt;/option&gt;</p>
        <p class="html indent1fois zmargin_bottom">L'attribut "selected" peut être ajouté pour que cette option soit sélectionnée par défaut.</p>
        <p class="html zmargin_bottom">&lt;optgroup label="[Libellé du groupe]"&gt;Regroupe des "option" dans un "select"&lt;/optgroup&gt;</p>
        <p class="html indent1fois zmargin_bottom">Cela donne une sorte de titre à une liste d'"option".</p>
        <p class="html zmargin_bottom">&lt;button&gt;Pour soumettre le formulaire (remplace l'"input" de type "submit").&lt;/button&gt;</p>
        <p class="html indent1fois">Il peut avoir le type "reset" pour faire comme un "input" du même type.</p>
        <p class="html"><em><span class="text_underline">Attention :</span> Plusieurs attributs, comme "required", ont un effet d'indication pour les utilisateurs mais ne protège pas lors de la réception des informations entrées dans le formulaire. Ces attributs peuvent être modifiés, avec du JavaScript ou dans l'url, par un utilisateur mal intensionné.</em></p>

        <h3>Audio et vidéo</h3>
        <p class="html zmargin_bottom">&lt;audio controls src="[chemin et nom de fichier]"&gt;</p>
        <p class="html indent1fois zmargin_bottom">L'attribut "controls" permet d'inclure les contrôles par défaut du navigateur.</p>
        <p class="html indent1fois zmargin_bottom">Comme pour la balise "img", il est possible d'utiliser les balises "figure" et "figcaption".</p>
        <p class="html indent1fois zmargin_bottom">"src" peut être omis dans "audio" et remplacé par :</p>
        <p class="html indent2fois zmargin_bottom">&lt;source src="[chemin et nom de fichier]" type="[(ex: audio/ogg]"&gt;</p>
        <p class="html indent1fois">D'autres informations sur "audio" ici : <a href="https://developer.mozilla.org/fr/docs/Web/HTML/Element/audio">&lt;audio&gt;</a>.</p>
        <p class="html zmargin_bottom">&lt;video src="[chemin et nom de fichier]"&gt;</p>
        <p class="html indent1fois zmargin_bottom">Tout comme pour la balise "audio" on peut utiliser la balise "source" avec l'attribut "type".</p>
        <p class="html indent1fois zmargin_bottom">Il y a également "controls" mais aussi les attributs "width" et "height" afin de définir une taille.</p>
        <p class="html indent1fois">Et aussi d'autres infos ici : <a href="https://developer.mozilla.org/fr/docs/Web/HTML/Element/Video">&lt;video&gt;</a>.</p>

        <h3>Balises type block et inline</h3>
        <p class="css">Block : Crée automatiquement un retour à la ligne avant et après.<br>
        Inline : Est toujours dans une balise de type "block".</p>
        <p class="css">Eléments de type "block" : p, h1, h2, etc., ol, ul, form, div.<br>
        Eléments de type "inline" : strong, em, a, img, span.</p>

        <p><em>Il est possible en HTML de créer ses propres attributs mais ils doivent commencer par "data-" (ex : data-perso="valeur").</em></p>

    </section>

<?php $section = ob_get_clean(); ?>
