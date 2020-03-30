<?php ob_start(); ?>

    <section id="section_galerie">

        <h2>Galerie</h2>

        <?php foreach ($photos as $photo) : ?>

        <figure>

            <img src="<?= $photo ?>" alt="<?= basename($photo) ?>" />

        </figure>

        <?php endforeach; ?>

    </section>

<?php $section = ob_get_clean(); ?>
