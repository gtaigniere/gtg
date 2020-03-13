<aside id="support_aside">

    <h2>Support</h2>

    <ul>

        <?php foreach ($links['support'] as $link) : ?>
            <li><a href="<?= $link->getAdrOrFile() ?>"><?= $link->getLabel() ?></a></li>
        <?php endforeach; ?>

    </ul>

</aside>