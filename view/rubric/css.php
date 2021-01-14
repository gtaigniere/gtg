    <section id="section_css">

        <h1>CSS</h1>

        <h5>Quelques infos :</h5>
        <p class="indent1fois">On privilégie une police sans sérif pour les titres et une avec sérif pour le reste.</p>
        <p class="indent1fois">Line-height: 1.4;</p>
        <p class="indent1fois">Commencer par le CSS pour les mobiles en premier est plus simple (technique Mobile first).</p>
        <p class="indent1fois">Reset CSS : Bootstrap intègre une normalisation pour tous les navigateurs, ce qui est pratique.</p>
        <p class="indent1fois">Penser à la propriété "inherit" pour ne pas hériter du parent (peut-être utilisé sur n’importe quelle propriété CSS).</p>
        <p class="indent1fois">Propriété "font-display", à mettre dans les "font-face".</p>
        <p class="indent1fois">Unité de mesure : width VW et height VH (en % mais on écrit 1-100) : Relative par rapport à la fenêtre et au parent.</p>
        <p class="indent1fois">margin-bottom: 1.5em (1,5 fois la hauteur de la police).</p>
        <p class="indent1fois">rem : Taille par rapport aux balises body ou html.</p>
        <p class="indent1fois">Lorsque l'on a un lien ou un titre ou autre, et que celui-ci est composé de 2 mots (exemple : A propos) mais que l'on ne veut pas que ceux-ci soit séparés (par exemple lorsque la taille d'écran est plus petite), alors on peut utiliser "white-space: nowrap".</p>
        <p class="indent1fois">Si html, body { font-size : 20px; }, alors 1rem sera égal à 20px.</p>
        <p class="css">display : table; (permet d’avoir un bloc sans marges).</p>
        <p class="indent1fois">Tailles de bloc : si l’on veut qu’une partie fasse toujours 80px et une autre le reste, on peut faire : width : calc(100% - 80px).</p>
        <p class="indent1fois">La propriété "transform" peut permettre de décaler une image sans que cela n'affecte les éléments à côté, contrairement à position (se fait sur la propriété que l'on veut).</p>
        <p class="indent1fois">Pour les tableaux (&lt;table&gt;), si l'on veut que les lignes soient plus lisibles, on peut utiliser les mots clefs "odd" et "even" avec la pseudo classe "nth-child()", en indiquant pour chacun un background différent.</p>

        <h3>Propriétés</h3>

        <h4>Texte</h4>
        <p class="margleft">font: Cette propriété permet de définir toutes les propriétés de font en même temps (font:15px/18px Calibri bold italic ; font:Arial, Cambria 100%/120% italic)<br>
            font-family : Famille de police (serif - sans-serif - monospace - cursive - fantasy)<br>
            font-style : Style de police (normal - italic - oblique)<br>
            font-variant : Variante de police (normal - small-caps)<br>
            font-size : Taille de police (30pt - 30px - 1cm - 200% - 1em - xx-large - x-large - large - medium - small - x-small - xx-small - larger - smaller)<br>
            font-weight : Graisse de police (100 - 400 - 700 - 900 - Normal - bold - bolder - lighter)<br>
            font-stretch : Etirement de la police (normal - condensed - expanded - ultra-expanded - ultra-condensed)<br>
            word-spacing : Espace entre les mots (normal - 1rem - 4px - 120% - -.4ch)<br>
            letter-spacing : Espace entre les lettres (normal - .2rem - 1px - -1px)<br>
            text-decoration : Permet de définir plusieurs décorations en une fois (underline dotted red), ou il est possible d’utiliser des propriétés séparéments (text-decoration-color, text-decoration-style, text-decoration-line)<br>
            text-transform : Transformation du texte (uppercase, lowercase, capitalize)<br>
            color : Couleur du texte (#FFFFFF - rgb(255, 255, 255) - white)<br>
            text-shadow : Ombrage du texte (décalage-x décalage-y rayon-de-flou couleur : 1px 1px 2px pink;)</p>

        <h4>Alignement</h4>
        <p class="margleft">text-align : Alignement horizontal (left, right, center, justify)<br>
            text-indent : Retrait du texte (10%, 10pt)<br>
            line-height: Contrôle de l'interligne (normal - 2.5 - 3em - 150% - 32px)<br>
            vertical-align : Alignement vertical (top, middle, bottom, baseline : aligner sur la ligne de base ou en bas s'il n'y a pas de ligne de base, sub : mettre en indice sans réduire la taille de la police, super : mettre en exposant sans réduire la taille de la police, text-top : aligner sur le bord supérieur de l'écriture, text-bottom : aligner sur le bord inférieur de l'écriture)<br>
            white-space: Fixe le passage à la ligne (normal – nowrap – pre – pre-wrap – pre-line)</p>

        <h4>Marges</h4>
        <p class="margleft">margin: Permet de définir la valeur des 4 marges (top - right - bottom - left)<br>
            margin-top / margin-right / margin-botton / margin-left (20pt - 30px - 1cm - 10%)<br>
            padding: Permet de définir la valeur des 4 paddings (top - right - bottom - left)<br>
            padding-top / padding-bottom / padding-left / padding-right</p>

        <h4>Bordures</h4>
        <p class="margleft">border[-top, -left, -right, -bottom] : Bordure en général<br>
            border[-top, -left, -right, -bottom]-width : Epaisseur de la bordure<br>
            border[-top, -left, -right, -bottom]-color : Couleur de la bordure<br>
            border[-top, -left, -right, -bottom]-style : Type de la bordure<br>
            border-style: (none, hidden : cachée, dotted : pointillés, dashed : tirets, solid : pleine, double : double et pleine, groove : relief, ridge : effet 3D, inset : rentrante, outset : sortante)<br>
            border-width: (thin : fine, medium : moyenne, thick : épaisse) ou numérique<br>
            border-color: (red – rgb(220, 220, 220) - #FFFFFF)</p>

        <h4>Arrière plan</h4>
        <p class="margleft">background : Regroupe les 5 propriétés suivantes (background: rgb(120, 100, 214), #005500, blue)<br>
            background-color : Couleur de fond (rgb(120, 100, 214) - #005500 - blue)<br>
            background-image : Image de fond (background-image: url("image.jpg"); linear-gradient(to bottom, rgba(255,255,0,0.5), rgba(0,0,255,0.5));)<br>
            background-repeat : Effet de répétition (repeat, repeat-x, repeat-y, no-repeat)<br>
            background-attachment : Effet de filigrane (scroll, fixed)<br>
            background-position : Position de l’arrière-plan (background-position: left; background-position: bottom 50px right 100px;)</p>

        <h4>Positionnement</h4>
        <p class="margleft">position : Mode de positionnement (absolute : Positionnement absolu, mesuré à partir du bord de l'élément parent, peut défiler ; fixed : Positionnement absolu, mesuré à partir du bord de l'élément parent, reste fixe lors du défilement ; relative : Positionnement relatif mesuré à partir de la position de départ de l'élément proprement dit ; static : Pas de positionnement spécial, flux normal de l'élément (réglage par défaut))</p>
        <p class="margleft">width : Largeur (min-width, max-width)<br>
            height : Hauteur(min-height, max-height)</p>
        <p class="margleft">overflow : Passage d'élément au contenu trop important (visible : L'élément sera agrandi de manière à ce que son contenu soit complètement visible dans tous les cas ; hidden : L'élément sera coupé s'il dépasse les limites ; scroll : L'élément sera coupé s'il dépasse les limites. Le navigateur doit pourtant proposer des barres de défilement, un peu comme dans une fenêtre cadre incorporée ; auto : Le navigateur doit décider en cas de conflit, comment l'élément sera affiché. Proposer des barres de défilement est également permis)<br>
            direction : Fixe le sens d’écriture (ltr : de gauche à droite ; rtl : de droite à gauche)</p>
        <p class="margleft">float : Cours du texte (left : L'élément se trouve à gauche et sera entouré par la droite des éléments qui le suivent ; right : L'élément se trouve à droite et sera entouré par la gauche des éléments qui le suivent ; none : L'élément ne sera pas entouré (réglage normal)<br>
            clear : Suite pour le cours du texte afin de forcer la poursuite sous l'élément/le passage entouré (left : impose pour float: left la poursuite dessous ; right : impose pour float:right la poursuite dessous ; both : impose dans chaque cas la poursuite dessous ; none : n'impose pas de poursuite dessous (réglage normal))</p>
        <p class="margleft">content : Permet de générer du contenu (content: '#';)</p>
        <p class="margleft">z-index : Position de la couche en cas de superposition (auto, valeur entière(5, 100, …))</p>
        <p class="margleft">visibility : Affichage ou non affichage avec réservation de place (hidden, visible, collapse)</p>
        <p class="margleft">attr() : Pour récupérer la valeur d'un attribut afin de l'utiliser</p>

        <h4>Listes</h4>
        <p class="margleft">list-style: Permet de définir dans un seul format, les propriétés suivantes (list-style : georgian inside;)<br>
            list-style-type: Type de puce ou numérotation pour la liste (none : pas de puce ; disc: puce ronde noire pleine ; circle: puce ronde vide ; square: puce carrée vide ; decimal: numérotation (1, 2, 3, …) ; decimal-leading-zero: numérotation avec zéros (001, 002, etc)<br>
            list-style-image: Permet de définir une image comme puce de la liste (list-style-image:url("puce.gif");)<br>
            list-style-position: Permet de définir un alignement sur la puce ou sur la marge du texte de la liste (outside : toutes les lignes sont alignées sur la puce ; inside : à partir de la seconde ligne, le texte retourne à la marge)</p>

        <h4>Liens</h4>
        <pre class="margleft zmargin_bottom">Type (a:link ; a:visited ; a:hover ; a:active)
    Exemple :</pre>
        <pre class="css margleft indent1fois">a {text-decoration:none; color:#FF0000}
      a:hover {text-decoration:underline; color:red}</pre>

        <p>Display : Cette propriété définit le type d’affichage pour le rendu d’un élément et il y a beaucoup beaucoup de chose dessus, voir <a href="https://developer.mozilla.org/fr/docs/Web/CSS/display">ici</a></p>
        <h4>Animations</h4>
        <p class="margleft">transition : Regroupe les 4 propriétés suivantes ()<br>
            transition-property : Propriétés affectés par la transition (all - margin-right, color)<br>
            transition-duration : Durée de la transition (2s - 250ms)<br>
            transition-timing-function : Différentes fonctions, voir <a href="https://developer.mozilla.org/fr/docs/Web/CSS/transition-timing-function">ici</a><br>
            transition-delay : Délai avant le début de la transition (1s - 150ms)</p>

        <h4>Boîtes</h4>
        <p class="margleft">box-shadow : Ombrage de boîte (décalage-x décalage-y rayons-de-flou-et-d-étalements couleur : 2px 2px 2px 1px rgba(0, 0, 0, 0.2);)<br>
            box-sizing : Définit la façon dont la hauteur et la largeur totale d'un élément est calculée (content-box, border-box)</p>

        <h4>Compteurs</h4>
        <p class="margleft">counter() : Renvoie une chaîne de caractères qui représente la valeur courante du compteur<br>
            counter-increment : Augmente la valeur du compteur<br>
            counter-reset : Permet de réinitialiser un compteur avec une valeur donnée<br>
            counter-set : Définit un compteur avec une certaine valeur</p>

        <h3>Flexbox</h3>
        <p class="margleft">display : flex | inline-flex;<br>
            flex-direction : row | row-reverse | column | column-reverse<br>
            flex-wrap : nowrap | wrap | wrap-reverse<br>
            flex-flow: &lt;'flex-direction'&gt; || &lt;'flex-wrap'&gt;<br>
            justify-content : flex-start | flex-end | center | space-between | space-around<br>
            align-items : flex-start | flex-end | center | baseline | stretch<br>
            align-content : flex-start | flex-end | center | space-between | space-around | stretch<br>
            order : &lt;nombre entier&gt;<br>
            flex-grow : &lt;nombre entier&lt; (0, par défaut)<br>
            flex-shrink : &lt;nombre entier&gt; (1, par défaut)<br>
            flex-basis : &lt;longueur&gt; | auto (auto, par défaut)<br>
            flex : none | [ &lt;'flex-grow'&gt; &lt;'flex-shrink'&gt;? || &lt;'flex-basis'&gt; ]<br>
            align-self : auto | flex-start | flex-end | center | baseline | stretch</p>

        <h3>Media queries</h3>
        <pre class="css">@media screen and (max-width: 800px)  {
    Indiquer les propriétés CSS ici
}
@media screen and (min-width: 1200px)  {
    Indiquer les propriétés CSS ici
}</pre>
        <p class="margleft">Il est préférable de définir des points en rapport avec la taille d'écran en pixels à partir desquels on va modifier le CSS plutôt que de définir différents formats d'écran comme cela se faisait avant.</p>
        <p class="margleft"><a href="https://developer.mozilla.org/fr/docs/Web/CSS/Requ%C3%AAtes_m%C3%A9dia/Utiliser_les_Media_queries">Plus d'infos sur les Media queries</a></p>

        <h3>Sélecteurs</h3>
        <table id ="selectors" class="css">
            <tr>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <td>*</td>
                <td>Tous les éléments de la page</td>
            </tr>
            <tr>
                <td>#</td>
                <td>Un élément par son "id"</td>
            </tr>
            <tr>
                <td>.</td>
                <td>Les éléménts ayant la même "class"</td>
            </tr>
            <tr>
                <td>li a</td>
                <td>Sélecteur descendant : tous les "a" dans des "li"</td>
            </tr>
            <tr>
                <td>ul</td>
                <td>Tous les éléments de type "ul"</td>
            </tr>
            <tr>
                <td>li + a</td>
                <td>Sélecteur adjacent : seul l'élément "a" directement situé après un élément "li" sera affecté</td>
            </tr>
            <tr>
                <td>li &gt; a</td>
                <td>Sélectionne les éléments enfants directs, pas les petits enfants</td>
            </tr>
            <tr>
                <td>nav ~ ul</td>
                <td>Les éléments "ul" suivants un élément "nav"</td>
            </tr>
            <tr>
                <td>p[title]</td>
                <td>Que les éléments "p" ayant un attribut "title"</td>
            </tr>
            <tr>
                <td>a[href="http://test.fr"]</td>
                <td>Seulement les éléments "a" ayant un lien "http://test.fr"</td>
            </tr>
            <tr>
                <td>a[href*="test"]</td>
                <td>Tous les éléments "a" avec un lien contenant "test"</td>
            </tr>
            <tr>
                <td>a[href^="test"]</td>
                <td>Tous les éléments "a" avec un lien commençant par "test"</td>
            </tr>
            <tr>
                <td>a[href$="test"]</td>
                <td>Tous les éléments "a" avec un lien finissant par "test"</td>
            </tr>
            <tr>
                <td>a:visited</td>
                <td>Pseudo-classe : ici les "a" déjà visités</td>
            </tr>
            <tr>
                <td>input[type=radio]:checked</td>
                <td>Pseudo-classe : ici juste les "input" de type "radio" déjà cochés</td>
            </tr>
            <tr>
                <td>p:after</td>
                <td>Pseudo-classe : ici on va ajouter des changements après les "p"</td>
            </tr>
            <tr>
                <td>ul:hover</td>
                <td>Pseudo-classe : cette fois, les "ul" au survol de la souris</td>
            </tr>
            <tr>
                <td>p:not(.test)</td>
                <td>Pseudo-classe : tous les "p" qui n'ont pas la classe "test"</td>
            </tr>
            <tr>
                <td>li:nth-child(3)</td>
                <td>Pseudo-classe : le troisième élémént "li" de son parent</td>
            </tr>
            <tr>
                <td>li:nth-last-child(1)</td>
                <td>Pseudo-classe : ici l'avant avant dernier "li" de son parent</td>
            </tr>
            <tr>
                <td>p:nth-of-type(2)</td>
                <td>Pseudo-classe : Seulement le second élément de type "p"</td>
            </tr>
            <tr>
                <td>h2:nth-last-of-type(2)</td>
                <td>Pseudo-classe : ici juste l'avant avant avant dernier "h2"</td>
            </tr>
            <tr>
                <td>h3:only-child</td>
                <td>Pseudo-classe : permet de cibler les seuls enfants "h3" de leur parent</td>
            </tr>
            <tr>
                <td>p::first-line</td>
                <td>Pseudo-élément : la première ligne des "p"</td>
            </tr>
            <tr>
                <td>h1::first-letter</td>
                <td>Pseudo-élément : ici la première lettre des "h1"</td>
            </tr>
        </table>

        <p><strong>Attention</strong>, les pseudos éléments ne fonctionneront pas sur des éléments qui n'ont pas de contenu (img, br, etc...)</p>

        <h3>Variables</h3>
        <p class="margleft">Elles commencent toujours par "--".</p>
        <p class="margleft">"root" est plus spécifique que "html" donc il aura priorité.</p>
        <pre class="css">:root {
    --primary: red;
}</pre>
        <pre class="css">html {
    --primary: #0488CA
}</pre>
        <p class="margleft">Le sélecteur de classe est plus précis donc il l'emporte sur "root" et donc sur "html".</p>
        <pre class="css">.theme-vert {
    --primary: green;
}</pre>
        <p class="margleft">La seconde valeur de "background" est une valeur par défaut au cas où "--primary" ne serait pas définie.</p>
        <pre class="css">.topbar {
    color: #FFF;
}</pre>

    </section>
