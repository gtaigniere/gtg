<?php
if (isset($links)) {
?>
<nav id="nav_side">

    <ul>

        <?php foreach ($links['menu-rubrique'] as $link) : ?>
            <li><a href="<?= $link->getAdrOrFile() ?>"><?= $link->getLabel() ?></a></li>
        <?php endforeach; ?>

    </ul>

</nav>
<?php
}
?>
