<?php ob_start(); ?>

    <section id="section_java">

    <h2>Java</h2>

    <p>Static => Se récupère à partir de la classe</p>
    <p>Non static => S’applique à une variable</p>
    <p>Void => Quand cela ne retourne rien</p>

    </section>

<?php $section = ob_get_clean(); ?>
