<nav id="nav_side">

    <ul>

        <?php foreach ($links['menu_rubrique'] as $link) : ?>
            <li><a href="<?= $link->getAdrOrFile() ?>"><?= $link->getName() ?></a></li>
        <?php endforeach; ?>

    </ul>

</nav>