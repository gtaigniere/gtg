    <section id="section_js">

        <h1>JavaScript</h1>

        <p></p>

        <h3>Récupération d'éléments</h3>
        <p>Il y a plusieurs méthodes pour récupérer du contenu dans des pages html :<br>
            <span class="decal_begin_line"></span>getElementById('idName');<br>
            <span class="decal_begin_line"></span>getElementsByClassName('className');<br>
            <span class="decal_begin_line"></span>getElementsByName('name');<br>
            <span class="decal_begin_line"></span>getElementsByTagName('tagName');<br>
            <span class="decal_begin_line"></span>querySelector('selectorName');<br>
            <span class="decal_begin_line"></span>querySelectorAll('selectorName');<br>
        </p>
        <p>Récupérer un élement, par exemple :<br>
            <span class="decal_begin_line"></span>document.getElementById('elem_para'); // sur :<br>
            <span class="decal_begin_line text_italic">&lt;p class="paragraphe" id="elem_para"&gt;<span class="text_underline">&lt;a href="test.php"&gt;<strong>Text du lien</strong>&lt;/a&gt;<strong>Text du paragraphe</strong></span>&lt;/p&gt;</span>
        </p>
        <p>La partie en <span class="text_italic">italique</span> correspond à ce qui est récupéré avec la commande telle quelle est au-dessus.<br>
        Celle qui est <span class="text_underline">soulignée</span> correspond à ce qui est récupéré en ajoutant ".innerHTML" à la fin de la commande.<br>
        Et ce qui est en <strong>gras</strong> à ce qui est récupéré en ajoutant ".textContent" à la fin, à la place de ".innerHTML".
        </p>
        <p>Donc, avec la commande indiquée en premier, on récupère le contenu entre "&lt;" et "&gt;" de la balise de début de l'élément.<br>
        Avec ".innerHTML" en plus, on récupère le contenu qui se trouve entre la balise de début et la balise de fin de l'élement, dans notre exemple, "&lt;p&gt;" et "&lt;/p&gt;".<br>
        Et avec "textContent", on récupère uniquement le contenu texte.</p>
        <p>Il y a aussi 3 propriétés de "document" qu'il faut connaitre :<br>
            <span class="decal_begin_line"></span>body, title, links.</p>
        <p>document.getElementById('test').value; => Récupère uniquement le contenu de l'élément.</p>
        <p>previousSibling<br>
        nextSibling<br>
        previousElementSibling<br>
        nextElementSibling<br>
        parentElement<br>
        parentNode<br>
        childElements<br>
        childNodes<br>
        </p>

        <p>Pour faire un test afin de savoir si quelque chose est "undefined" ou "null", en JavaScript il faut faire :</p>
        <div class="programme">
            <p>if ([quelque chose]) {</p>
            <p class="indent1fois"></p>
            <p>}</p>
        </div>

        <h3>Ajax</h3>
        <p>Dans une requète Ajax, on peut utiliser :</p>
        <p class="indent1fois">GET, POST, PUT, DELETE, PATCH</p>

        <h3>JQuery</h3>
        <p>Dans un même fichier, on ne peut pas mélanger du JQuery et du JavaScript natif.</p>
        <p>Exemple : Voir fichier "req_ajax_jquery(receiv_student).js</p>

        <h3>Angular</h3>
        <p>Pour limiter les problèmes de fonctionnement lors de la création d'un projet :</p>
            <ul>
                <li>Création du composant</li>
                <li>Import dans le composant utilisateur</li>
                <li>Ajout dans le Html</li>
            </ul>
        <p><span class="text_underline">Info :</span> Toutes les méthodes (Fonctions) d'une classe sont dans le service de la classe et non dans la classe.</p>
        <p></p>



    </section>