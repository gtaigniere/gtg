    <section id="section_html">

        <h1>HTML</h1>

        <h3>Base d'une page HTML</h3>
        <pre class="html">&lt;!DOCTYPE html&gt;
&lt;html lang="[Abrégé de la langue (ex: fr)]"&gt;
    &lt;head&gt;
        &lt;meta charset="[Encodage de la page (ex: utf-8)]"&gt;
        &lt;meta name="description" content="[Contenu du site]"&gt;
        &lt;title&gt;[Titre]&lt;/title&gt;
        &lt;link rel="stylesheet" type="text/css" href="[chemin et nom du fichier CSS]"&gt;
    &lt;/head&gt;
    &lt;body&gt;
    &lt;/body&gt;
&lt;/html&gt;</pre>


    <p class="nomargin_bottom">Ensuite selon les besoins, dans la balise "body", nous pouvons mettre ces balises :</p>
        <pre class="html">&lt;header&gt;&lt;/header&gt;
&lt;nav&gt;&lt;/nav&gt;
&lt;section&gt;&lt;/section&gt;
&lt;article&gt;&lt;/article&gt;
&lt;aside&gt;&lt;/aside&gt;
&lt;footer&gt;&lt;/footer&gt;
&lt;div&gt;Pour englober des blocs&lt;/div&gt;
&lt;span&gt;Pour englober des mots ou des phrases&lt;/span&gt;</pre>
        <p class="nomargin_bottom">La balise "script" :</p>
        <p class="margleft">Comme ceci : <span class="balise">&lt;script type="text/javascript" src="[chemin et nom du fichier JavaScript]"&gt;&lt;/script&gt;</span>&nbsp;
            Exécutera le script nommé.<br>
            Ou : <span class="balise">&lt;script&gt;[Code JavaScript qui sera exécuté]&lt;/script&gt;</span>&nbsp;
        Cette balise peut être placée à différents endroits de la page mais elle sera généralement placée, soit dans la balise "head", soit après la balise "body", suivant que l'on désire que le script soit éxécuté à tel ou tel moment du chargement de la page.</p>

        <h3>Balises de base</h3>
        <pre class="html">&lt;h1&gt;Titre de premier niveau&lt;/h1&gt; à &lt;h7&gt;Titre de septième et dernier niveau&lt;/h7&gt;
&lt;p&gt;Paragraphe&lt;/p&gt;
&lt;ul&gt;Liste non ordonnée&lt;/ul&gt;
&lt;ol&gt;Liste ordonnée&lt;/ol&gt;
&lt;li&gt;Elément de liste&lt;/li&gt;
&lt;pre&gt;Conserve la mise en page&lt;/pre&gt;
&lt;hr&gt;Séparateur (ligne)
&lt;blockquote&gt;Citation&lt;/blockquote&gt;
&lt;strong&gt;Texte important (en gras)&lt;/strong&gt;
&lt;em&gt;Texte mis en valeur (italique)&lt;/em&gt;
&lt;br&gt;Aller à la ligne
&lt;sup&gt;Texte en exposant (plus haut et plus petit)&lt;/sup&gt;
&lt;sub&gt;Texte en indice (plus bas et plus petit)&lt;/sub&gt;
&lt;abbr&gt;Représente une abréviation&lt;/abbr&gt;
&lt;address&gt;Indique des informations de contact&lt;/address&gt;</pre>

        <h3>Liens hypertextes</h3>
        <pre class="margleft"><span class="balise">&lt;a href="[Adresse de lien, ou chemin et nom de fichier]"&gt;Lien hypertexte&lt;/a&gt;</span>
Quelques attributs et valeurs utilisables dans les liens :
    L'attribut "href" peut contenir "#[nom d'un id dans la page]" afin de mener à un autre endroit de la même page.
    Il peut contenir également "[une adresse mail]" afin d'écrire un email.
        "target" peut être utilisé avec "_blank" pour charger le lien dans une nouvelle page, et dans ce cas il faudra utiliser l'attribut "rel" avec :
            "noopener" rend l’utilisation du javascript avec «window.opener» nulle (sécurité).
            "noreferrer" empêche les sites externes visés via les liens hypertextes, d’obtenir des informations sur l’origine du trafic (sécurité).</pre>

        <h3>Tableaux</h3>
        <pre class="html">&lt;table&gt;Tableau&lt;/table&gt;
&lt;tr&gt;Une ligne de tableau&lt;/tr&gt;
&lt;th&gt;Une cellule de tableau qui sera l'en-tête&lt;/th&gt;
&lt;td&gt;Une cellule de tableau qui ne sera pas l'en-tête&lt;/td&gt;
&lt;caption&gt;Titre du tableau&lt;/caption&gt;
&lt;thead&gt;En-tête de tableau pour les grands tableaux&lt;/thead&gt;
&lt;tbody&gt;Corps de tableau pour les grands tableaux&lt;/tbody&gt;
&lt;tfoot&gt;Pieds de tableau pour les grands tableaux&lt;/tfoot&gt;</pre>
<pre class="margleft">Il y a deux attributs pour les cellules des tableaux et ils prennent un chiffre comme valeur :
    "colspan" permet de définir le nombre de colonne qu'occupera la cellule.
    "rowspan" permet de définir le nombre de ligne qu'occupera la cellule.</pre>

        <h3>Images</h3>
        <pre class="margleft"><span class="balise">&lt;img src="[chemin et nom de fichier]" alt="[Texte]"&gt;</span>
L'attribut "alt" est un texte qui sera affiché à la place de m'image si celle-ci ne peut pas être chargée puis affichée.
Une balise "img" dans une balise de lien rend l'image dans la balise "img" cliquable.</pre>

        <pre class="margleft">Les formats d'images :
    "jpg" : Idéal pour les photos de bonne qualité sans être trop lourd.
    "png" : Bien pour les logos, et supporte la transparence.
    "gif" : A utiliser uniquement si l'on a besoin d'images animées.
            "svg" : Utilisé pour les logos, et il sauvegarde les formes.</pre>

        <pre class="margleft"><span class="balise">&lt;figure&gt;Représente une figure&lt;/figure&gt;</span>Permet de mettre l'image dans un type "block".
<span class="balise">&lt;figcaption&gt;Légende de "figure"&lt;/figcaption&gt;</span></pre>
        <p class="margleft">Une balise "img" entourée d'une balise de lien rend l'image dans la balise "img" cliquable.</p>

        <h3>Iframes</h3>
        <pre class="margleft"><span class="balise">&lt;iframe&gt; src="[Adresse de lien, ou chemin et nom de fichier]"&lt;iframe&gt;</span>
C'est surtout utilisé pour intégrer du contenu multimédia (vidéo, map, etc...).
Avec les attributs "width" et "height", on peut leur attribuer une largeur et une hauteur avec des valeurs en pixel.</pre>
<p class="margleft">Il y a pas mal d'autres attributs, à voir ici : <a href="https://developer.mozilla.org/fr/docs/Web/HTML/Element/iframe">&lt;iframe&gt;</a>.</p>

        <h3>Formulaires</h3>
        <pre class="margleft"><span class="balise">&lt;form action="[chemin et nom de fichier]" method="[GET ou POST]"&gt;&lt;/form&gt;</span>
    La valeur de "action" correspond à la page qui recevra les infos du formulaire.
    Si cette valeur est "#", ce sera la page courante.
<span class="balise">&lt;fieldset&gt;Regroupe plusieurs éléments d'un formulaire&lt;/fieldset&gt;</span>
<span class="balise">&lt;legend&gt;Titre du formulaire&lt;/legend&gt;</span>
<span class="balise">&lt;label for="[(ex: test)]"&gt;Libellé du champ&lt;/label&gt;</span>
    La valeur de l'attribut "for" doit correspondre à la valeur de l'attribut "id" de l'"input" ci-dessous, c'est ce qui permet de les lier.</pre>

        <pre class="margleft"><span class="balise">&lt;input type="(ex: text)" name="[Identifiant/Clef]" id="[(ex: test)]"&gt;&lt;/input&gt;</span>
Il y a beaucoup de valeur pour le type, ci-dessous les plus courant :
    "text" défini un champ texte d'une seule ligne.
    "password" afin que les caractères entrés soient cachés par des "*".
    "email" permet de saisir une adresse électronique.
    "checkbox" pour case à cocher.
    "radio" pour ne pouvoir sélectionner qu'un seul des choix.
    Ils devront tous avoir le même attribut "name".
    L'attribut "checked" peut être ajouté pour qu'un des choix "radio" soit sélectionnée par défaut (fonctionne aussi pour le type "checkbox").
    "hidden" permet de cacher le champ.
    "submit" afin de pouvoir soumettre le formulaire.
            "reset", avec un attribut "value" qui contiendra le texte d'un bouton, permettra d'effacer le contenu du champ.</pre>
        <p class="margleft">Vous pouvez voir tous les types et attributs : <a href="https://developer.mozilla.org/fr/docs/Web/HTML/Element/input">&lt;input&gt;</a>.</p>

        <pre class="margleft">Plusieurs attributs peuvent être indiqués :
    "minlenght" et "maxlenght" pour limiter le nombre de caractères.
    "size" pour définir la taille du champ.
    "placeholder" permet d'indiquer un exemple de ce qu'il faut mettre dans le champ.
    "value" permet de pré-remplir le champ.
    "required" permet d'indiquer que le champ doit être rempli.
            "readonly" indique que le champ ne peut pas être modifié.</pre>
        <p class="margleft">Vous trouverez les informations sur tous les attributs de "form" ici : <a href="https://developer.mozilla.org/fr/docs/Web/HTML/Element/Form">&lt;form&gt;</a>.</p>

        <pre class="margleft"><span class="balise">&lt;textarea name="[Identifiant/Clef]" id="[(ex: test)]" cols="[Nombre de colonnes]" rows="Nombre de lignes"&gt;Texte sur plusieurs lignes&lt;/textarea&gt;</span>
Ce champ a l'avantage de garder la forme, soit les espaces et les sauts de ligne.</pre>
<p class="margleft">Plus d'informations sur ce champ ici : <a href="https://developer.mozilla.org/fr/docs/Web/HTML/Element/Textarea">&lt;textarea&gt;</a>.</p>

        <pre class="margleft"><span class="balise">&lt;select name="[Identifiant/Clef]" id="[(ex: test)]"&gt;&lt;/select&gt;</span>
<span class="balise">&lt;option value="[Ce qui sera envoyé]"&gt;Option affichée&lt;/option&gt;</span>
L'attribut "selected" peut être ajouté pour que cette option soit sélectionnée par défaut.</pre>
        <pre class="margleft"><span class="balise">&lt;optgroup label="[Libellé du groupe]"&gt;Regroupe des "option" dans un "select"&lt;/optgroup&gt;</span>
Cela donne une sorte de titre à une liste d'"option".</pre>
        <pre class="margleft"><span class="balise">&lt;button&gt;Pour soumettre le formulaire (remplace l'"input" de type "submit").&lt;/button&gt;</span>
Il peut avoir le type "reset" pour faire comme un "input" du même type.</pre>
<p class="margleft"><span class="text_underline">Attention :</span> Plusieurs attributs, comme "required", ont un effet d'indication pour les utilisateurs mais ne protège pas lors de la réception des informations entrées dans le formulaire. Ces attributs peuvent être modifiés, avec du JavaScript ou dans l'url, par un utilisateur mal intensionné.</p>

        <h3>Audio et vidéo</h3>
        <pre class="margleft"><span class="balise">&lt;audio controls src="[chemin et nom de fichier]"&gt;</span>
    L'attribut "controls" permet d'inclure les contrôles par défaut du navigateur.
    Comme pour la balise "img", il est possible d'utiliser les balises "figure" et "figcaption".
    "src" peut être omis dans "audio" et remplacé par :
        <span class="balise">&lt;source src="[chemin et nom de fichier]" type="[(ex: audio/ogg]"&gt;</span></pre>
        <p class="margleft">D'autres informations sur "audio" ici : <a href="https://developer.mozilla.org/fr/docs/Web/HTML/Element/audio">&lt;audio&gt;</a>.</p>
        <pre class="margleft"><span class="balise">&lt;video src="[chemin et nom de fichier]"&gt;</span>
    Tout comme pour la balise "audio" on peut utiliser la balise "source" avec l'attribut "type".
    Il y a également "controls" mais aussi les attributs "width" et "height" afin de définir une taille.</pre>
        <p class="margleft">Et aussi d'autres infos ici : <a href="https://developer.mozilla.org/fr/docs/Web/HTML/Element/Video">&lt;video&gt;</a>.</p>

        <h3>Balises type block et inline</h3>
        <pre class="margleft">Block : Crée automatiquement un retour à la ligne avant et après.
Inline : Est toujours dans une balise de type "block".</pre>
        <pre class="margleft"">Eléments de type "block" : p, h1, h2, etc., ol, ul, form, div.
Eléments de type "inline" : strong, em, a, img, span.</pre>

        <p><em>Il est possible en HTML de créer ses propres attributs mais ils doivent commencer par "data-" (ex : data-perso="valeur").</em></p>

    </section>
