    <section id="section_algo">

        <h1>Algorithmie</h1>

        <h3 class="text_underline">Base</h3>
        <p>Algorithme = Texte sans ambiguïté décrivant une méthode pour résoudre un problème.</p>
        <p class="nomargin_bottom">I) Méthode : Suite d'actions ordonnées</p>
        <p class="indent1fois">&rarr; <span class="text_encad_red">Séquence</span> (séquence d'un film, "déroulé dans <span class="text_underline">le temps</span>").</p>
        <p>II) Domaine d'applications : Tout.</p>

        <table class="tab_in-out">

            <thead>
                <tr>
                    <td>III)</td>
                    <td colspan="2"><span class="text_encad_red">Entrées - Sorties</span></td>
                    <td>=</td>
                    <td>Les <span class="text_encerc_red">données</span> en informatique</td>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td></td>
                    <td>&swarr;</td>
                    <td>&searr;</td>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Ce qui est fourni pour résoudre le problème</td>
                    <td>Ce qui est produit pour résoudre le problème</td>
                    <td>&rarr;</td>
                    <td><span class="text_encerc_red">Structure des données</span></td>
                </tr>
            </tbody>

        </table>

        <h4>Langages algorithmiques</h4>
        <table class="tab_lang_algo">

            <thead>
                <tr>
                    <td>&rarr;</td>
                    <td>Textuel</td>
                    <td>:</td>
                    <td>"Pseudo-code"</td>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>&rarr;</td>
                    <td>Graphique</td>
                    <td>&rarr;</td>
                    <td>Diagramme d'activités d'UML</td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td>&searr;</td>
                    <td>Diagramme de séquences d'UML</td>
                </tr>
                <tr>
                    <td>&rarr;</td>
                    <td>Symbolique</td>
                    <td>&rarr;</td>
                    <td>[ / a ! = b ? a &larr; a - b | b &larr; b - a ]</td>
                </tr>
            </tbody>

        </table>

        <h4>Tester les algos</h4>
        <pre>    &rarr; Faire tourner à la main
    &rarr; Coder &rarr; Python, JavaScrip
    PDG => Paradigme
    PDG 0 : Débutant : Tout dans le "main"
    PDG 1 : Prog. procédurale : Des fonctions <=> des étapes séparées avec cours E/S
    PDG 2 : Prog. modulaire : Regrouper les fonctions/étapes dans des fichiers &rarr; Bibliothèque
    PDG 3 : Prog. objet : Données structurées &rarr; objet/classe
    PDG 4 : Héritage &rarr; Polymorphisme
    PDG 5 : Généricité
    PDG final : Productivité &rarr; Framework</pre>

        <h4>Notions algorithmiques</h4>
        <ul>
            <li>Affectation / Variables</li>
            <li>Tests</li>
            <li>Boucles : Répétitions</li>
            <li>Procédures</li>
            <li>Tableaux &rarr; Tour de Hanoï, allumettes</li>
            <li>Structures &rarr; Tableaux à structures</li>
            <li>Chaines &rarr; Algo de César</li>
        </ul>

        <h4>Méthode</h4>
        <p class="nomargin_bottom">E/S : Nb photocopies &rarr; Prix</p>
        <p class="nomargin_bottom">Simuler "à la main" le problème et sa résolution</p>
        <p class="nomargin_bottom">Photocopies :</p>
        <p class="nomargin_bottom">Saisir le Nb</p>

        <table class="tab_photocop">

            <thead>
                <tr>
                    <th>Photocopies</th>
                    <th>Prix</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>1</td>
                    <td>&rarr; 10</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>&rarr; 2 &times; 10</td>
                </tr>
                <tr>
                    <td>&brvbar;</td>
                    <td></td>
                </tr>
                <tr>
                    <td>10</td>
                    <td>&rarr; 10 &times; 10</td>
                </tr>
                <tr>
                    <td>11</td>
                    <td>&rarr; 10 &times; 10 + 1 &times; 8</td>
                </tr>
                <tr>
                    <td>&brvbar;</td>
                    <td></td>
                </tr>
                <tr>
                    <td>30</td>
                    <td>&rarr; 10 &times; 10 + 20 &times; 8</td>
                </tr>
                <tr>
                    <td>31</td>
                    <td>&rarr; 10 &times; 10 + 20 &times; 8 + 1 &times; 7</td>
                </tr>
                <tr>
                    <td>&brvbar;</td>
                    <td></td>
                </tr>
                <tr>
                    <td>&brvbar;</td>
                    <td></td>
                </tr>
                <tr>
                    <td>40</td>
                    <td>&rarr; 10 &times; 10 + 20 &times; 8 + 10 &times; 7</td>
                </tr>
            </tbody>

        </table>

        <h4 class="nomargin_bottom">Exemple d'algorithme avec des constantes (<span class=" text_red">Elles s'écrivent en <span class="text_majuscule">majuscules</span></span>)</h4>
        <pre class="algo">PROG Photocopies
    PRIX_1 = 10; LIMITE_1 = 10;
    PRIX_2 = 8; LIMITE_2 = 30;
    PRIX_3 = 7;
    lire (n)
    si n &le; LIMITE_1
        prix = n * PRIX_1
    sinon si n &le; LIMITE_2
        prix = PRIX_1 * LIMITE_1 + (n -LIMITE_1) * PRIX_2
    sinon // n >
        prix = PRIX_1 * LIMITE_1 + (LIMITE_2 - LIMITE_1) * PRIX_2 + (n - LIMITE_2) * PRIX_3
FIN PROG</pre>

        <h3 class="text_underline">Avancé</h3>
        <p>Trier 3 nombres (E : x, y, z / S : x, y, x)</p>
        <p>Exemple : E : x = 5, y = 3, z = 4 / S : x = 3, y = 4, z = 5</p>
        <p><span class="text_underline">Méthode 1 :</span> Arbre dichotomique &rarr; Tous les cas</p>
        <figure><img src="../img/arbre_dicotomique.jpg" alt="Arbre dicotomique"></figure>
        <p>Bilan : 3 tests et 2 permutations max</p>
        <p><span class="text_underline">Méthode 2 :</span> Inversion au fur et à mesure</p>
        <pre class="algo">si x > y
    permuter (x, y) // x &gt; y
finsi
    si z < x
        permuter (x, z) &rarr; <span class="text_encerc_black">x z y</span>
    finsi
    si z < y
        permuter (y, z) &rarr; <span class="text_encerc_black">x y z</span>
    finsi</pre>
        <p>Bilan : 3 tests et 3 permutations max</p>

        <h4>Algorithme avec "switch"</h4>
        <p class="nomargin_bottom">Nombre de jours d'un mois dans une année</p>
        <p class="indent1fois nomargin_bottom">E : mois : entier, annee : entier</p>
        <p class="indent1fois nomargin_bottom">S : nbjours : entier</p>
        <pre class="algo">SWITCH mois VAUT
    1, 3, 5, 7, 8, 10, 12 :
        nbjours = 31
    4, 6, 9, 11 :
        nbjours = 30
    2 : // Avec un arbre dichotomique
        <button type="button" class="btn btn-warning myPopover" data-toggle="popover" data-placement="right" title="Right Popover" data-content="Popover show on right" data-trigger="hower">si annee % 4 != 0</button>
            nbjours = 28
        sinon si annee % 100 != 0
            nbjours = 29
        sinon si annee % 400 != 0
            nbjours = 28
        sinon
            nbjours = 29
        finsi
        finsi
        finsi
FIN SWITCH</pre>

        <div style="display: none"><pre>ou, si AN % 400 == 0, NBJ = 29
    sinon si AN % 100 == 0, NBJ = 28
    sinon si AN % 4 == 0, NBJ = 29
    sinon NBJ = 28</pre></div>

        <h3 class="text_underline">Boucles</h3>
        <ul class="etoile">
            <li>Variable / Affectation</li>
            <li>Test</li>
            <li>Boucle</li>
            <li>Procédures</li>
            <li>Tant que</li>
            <li>Pour</li>
            <li>Break, Continue</li>
        </ul>
        <p>Exercice 1 : Nombre premier ou non</p>
        <p class="indent1fois nomargin_bottom">E : n : entier / S : premier : booléen (vrai si premier)</p>
        <pre class="algo">lire (n)
POUR i de (2 à n - 1)
    si n % i == 0
        premier = faux
    sinon
        premier = vrai
    finsi
FIN POUR
afficher (premier)</pre
        <p>Exercice 2 : Arbre d'étoiles</p>
        <p class="indent1fois nomargin_bottom">E : n : nombre de niveaux / S : Ecran = Affichage</p>
        <pre class="algo">lire (n)
POUR i de [1 à n] // I : n° ligne
    pour j de (1 à n - i)
        afficher (" ")
    finpour
    pour k de (1 à i - 1)
        afficher ("&lowast;")
    finpour
    afficher ("&verbar;")
    pour k de (1 à n - i)
        afficher ("&lowast;")
    finpour
    afficher ("")
FIN POUR
pour i de (1 à n - 1)
    afficher (" ")
finpour
afficher ("&verbar;")
afficher ("")
pour i de (1 à n - 2)
    afficher (" ")
finpour
afficher ("_&verbar;_")
afficher ("")</pre>

        <h3 class="text_underline">Fonctions</h3>
        <p>Fonction : des E, une S avec Return</p>

        <table class="tabs_functions">

            <thead>
                <tr>
                    <td></td>
                    <td class="text_red">&darr;</td>
                    <td></td>
                    <td class="text_red">&darr;</td>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>surf (</td>
                    <td>larg</td>
                    <td>,&ensp;</td>
                    <td>long</td>
                    <td>) // S : Surface</td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="3"><img src="../img/acco_h_red.png" alt="Accolage horizontale rouge"></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="3" class="text_red">expression</td>
                    <td></td>
                </tr>
            </tbody>

        </table>

        <p>Procédure : pas de Return, des S en paramètres</p>

        <table class="tabs_functions">

            <thead>
                <tr>
                    <td></td>
                    <td class="text_red">&darr;</td>
                    <td></td>
                    <td class="text_red">&darr;</td>
                    <td></td>
                    <td class="text_red">&uarr;</td>
                    <td colspan="2"></td>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>surf (</td>
                    <td>larg</td>
                    <td>,&ensp;</td>
                    <td>long</td>
                    <td>,&ensp;</td>
                    <td>surface</td>
                    <td colspan="2">)</td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="3"><img src="../img/acco_h_red.png" alt="Accolage horizontale rouge"></td>
                    <td></td>
                    <td><img class="tab_functions_img3" src="../img/acco_h_red.png" alt="Accolage horizontale rouge"></td>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="3" class="text_red">expression</td>
                    <td></td>
                    <td class="text_red">variable</td>
                    <td class="text_red">&ensp;&harr;&ensp;</td>
                    <td class="text_red">référence pointeur</td>
                </tr>
            </tbody>

        </table>

        <table>

            <thead>
                <tr>
                    <td>Fonctions : Paramètres formels :&ensp;</td>
                    <td>E &rarr; Valeur non modifiée</td>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td></td>
                    <td>S &rarr; Valeur modifiée</td>
                </tr>
            </tbody>

        </table>

        <p>Exercice 1 : CalculPrix(NbPhotocopies)</p>
        <pre class="algo">Calcul le prix en fonction du nombre de photocopies
return prix
lire (n)
prix = CalculPrix(n)
print (prix)</pre>
        <p class="nomargin_bottom">Test unitaire :</p>

        <table class="indent1fois tab_func_cprix">

            <thead>
                <tr>
                    <td>Print (CalculPrix</td>
                    <td>(1)</td>
                    <td>)</td>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>&boxh;&boxh;&boxh;&boxh;&boxh;</td>
                    <td>(5)</td>
                    <td>)</td>
                </tr>
                <tr>
                    <td>&boxh;&boxh;&boxh;&boxh;&boxh;</td>
                    <td>(10)</td>
                    <td>)</td>
                </tr>
                <tr>
                    <td>&boxh;&boxh;&boxh;&boxh;&boxh;</td>
                    <td>(11)</td>
                    <td>)</td>
                </tr>
                <tr>
                    <td>&boxh;&boxh;&boxh;&boxh;&boxh;</td>
                    <td>(20)</td>
                    <td>)</td>
                </tr>
                <tr>
                    <td>&boxh;&boxh;&boxh;&boxh;&boxh;</td>
                    <td>(30)</td>
                    <td>)</td>
                </tr>
                <tr>
                    <td>&boxh;&boxh;&boxh;&boxh;&boxh;</td>
                    <td>(31)</td>
                    <td>)</td>
                </tr>
                <tr>
                    <td>&boxh;&boxh;&boxh;&boxh;&boxh;</td>
                    <td>(40)</td>
                    <td>)</td>
                </tr>
                <tr>
                    <td>&boxh;&boxh;&boxh;&boxh;&boxh;</td>
                    <td>(100)</td>
                    <td>)</td>
                </tr>
                <tr>
                    <td>&boxh;&boxh;&boxh;&boxh;&boxh;</td>
                    <td>(-1)</td>
                    <td>)</td>
                </tr>
                <tr>
                    <td>&boxh;&boxh;&boxh;&boxh;&boxh;</td>
                    <td>(-10)</td>
                    <td>)</td>
                </tr>
            </tbody>

        </table>

        <p class="indent1fois nomargin_bottom">CalculPrix(NbPhotocopies)</p>
        <pre class="algo">si n &lt; 0 : return -1
si n &le; 10 : return n &times; 10
si n &le; 30 : return 10 &times; 10 + (n - 10) &times; 8
return 10 &times; 10 + (n - 10) &times; 8 + (n - 30) &times; 7</pre>
        <p>Exercice 2 : Menu</p>
        <p class="indent1fois nomargin_bottom">E : Choix utilisateur &rarr; N° Exo</p>
        <p class="indent1fois nomargin_bottom">S : Exercice choix</p>
        <pre class="algo">PROG test_fonction
    continuer = vrai
    TANT QUE continuer
        clear_screen()
        print(choix 1 : Exo 1 : double)
        print(choix 2 : &ensp;&boxh;&ensp; 2 : ...
        print(choix 7 : &ensp;&boxh;&ensp; 7 : ...
        print(Entrez choix")
        lire (choix)
        SWITCH(choix)
            1 : lire (n)
            2 : lire (prix, tva)
            3 : lire (x1, x2)
            4 : etc...
                &brvbar;
        FIN SWITCH
        print("0 pour arrêter")
        lire continuer
    FIN TANT QUE
FIN PROG</pre>

        <h3 class="text_underline">Tableaux</h3>
        <p>Tableaux : Beaucoup d'infos, d'un même type</p>
        <p>Structures : Pas beaucoup d'infos, de types différents</p>

        <h4>Exercices de base :</h4>
        <p>Exercice 1 : Somme des éléments d'un tableau : E : tab</p>
        <pre class="algo">res = 0 // SS : somme
POUR i de (0 à n - 1)
res = res + tab[i]
FIN POUR</pre>
        <p>Exercice 2 : SS : booléen : vrai si présent, faux si absent</p>
        <pre class="algo">RECHERCHER (tab, val)
    POUR i de (0 à tab.len - 1)
        si tab[i] == val
            return True
        finsi
    FIN POUR
    return False
FIN RECHERCHER</pre>

        <h4>Exercices avancés :</h4>
        <p>Exercice 1 : Inversion d'un tableau : E : tab</p>
        <pre class="algo">inv(tab)
n = tab.len
POUR i de (0 à n - 1)
    tmp = tab[i]
    tab[i] = tab[n - 1 - i]
    tab[n - 1 - i] = tmp
FIN POUR</pre>
        <p class="before_prog">Exercice 2 : Suppression d'un élément dans un tableau</p>
        <p class="indent1fois nomargin_bottom">E-S : tab, E : Valeur à supprimer</p>
        <p class="indent1fois nomargin_bottom">SS : booléen : vrai si supprimé</p>
        <pre class="algo">n = tab.len
POUR i de (0 à n - 1)
    si tab[i] == val
        pour j de (i + 1 à n - 1)
            tab[j - 1] = tab[j]
        finpour
        tab.pop()
        return true
    finsi
FIN POUR
return false</pre>

        <h4>Structures :</h4>
        <p>Exercice 1 : Point en haut à droite d'un carré</p>
        <p class="indent1fois nomargin_bottom">E : Point haut droit du carré</p>
        <pre class="algo">PointHD(carre)
    Point pointHD // point HD = {}
    Point-HD.x = carre.pointBG.x + carre.cote
    Point-HD.y = carre.pointBG.x + carre.cote
Fin</pre>
        <p>Exercice 2 : Carré inclus dans un autre ?</p>
        <pre class="algo">inclus(c1, c2) // SS : booléen : vrai si c1 dans c2
    phd1 = pointHD(c1)
    phd2 = pointHD(c2)
    si c1.pointBG.x &lt; c2.pointBG.x
        return false
    finsi
    si c1.pointBG.y &lt; c2.pointBG.y
        return false
    finsi
    si phd1.x &gt; phd2.x
        return false
    finsi
    si phd1.y &gt; phd2.y
        return false
    finsi
    return true
Fin</pre>

        <h3 class="text_underline">Récapitulatif</h3>

        <h4>Méthode d'analyse algorithmique :</h4>
        <ul>
            <li>Comprendre le problème : bien lire le sujet et bien comprendre ce qu’il y a à faire.</li>
            <li>Lister ce dont on a besoin pour résoudre le problème (les données) et ce qu’on va produire (les résultats) : préciser les Entrées et les Sorties.</li>
            <li>Trouver un principe de résolution : se donner les grandes lignes, en français, de la méthode de résolution. Eventuellement, se donner des procédures ou des fonctions (des actions générales).</li>
            <li>Ecrire l’algorithme en détail.</li>
        </ul>

        <h4>Fonction et procédure :</h4>
        <p>Une fonction retourne une chose, et une seule (variable, tableau, etc...).</p>
        <p>Une procédure peut avoir plusieurs paramètres en sortie.</p>

        <h4>Ecritures :</h4>
        <p>Variable, Fonction => maFonction, maVariable.</p>
        <p>TypeStructure, Classe => MonType.</p>
        <p>Constante => MA_CONSTANTE.</p>
        <p>Séparer : Lecture, Traitement, Affichage.</p>
        <p>Traiter les cas particuliers avant les cas généraux.</p>

    </section>
