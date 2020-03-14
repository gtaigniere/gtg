<?php ob_start(); ?>

    <section id="section_galerie">

        <h2>Galerie</h2>

        <?php foreach ($photos as $photo) : ?>

                        <a href="index.php?target=galerie&id=<?= $photo->getIdPhoto() ?>"><img src="../imgs/galerie/<?= $photo->getLabel() ?>" alt="<?= $photo->getLabel() ?>" /></a>

        <?php endforeach; ?>

    </section>

<?php $section = ob_get_clean(); ?>
