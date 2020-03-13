<aside id="<?= $key ?>_aside">

    <h2><?= ucfirst($key) ?></h2>

    <ul>

        <?php foreach ($values as $link) : ?>
            <li><a href="<?= $link->getAdrOrFile() ?>"><?= $link->getLabel() ?></a></li>
        <?php endforeach; ?>

    </ul>

</aside>