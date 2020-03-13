<aside id="site-ext_aside">

    <h2>Site(s)</h2>

    <ul>

        <?php foreach ($links['site-ext'] as $link) : ?>
            <li><a href="<?= $link->getAdrOrFile() ?>"><?= $link->getLabel() ?></a></li>
        <?php endforeach; ?>

    </ul>

</aside>