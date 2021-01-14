<?php
    if (isset($datas)) {
?>
<section class="sect-adm" id="sect-adm_validation">

    <h1>Demande de confirmation</h1>

    <form action="" method="POST">
        <?php foreach ($datas as $name => $value) :
            // Si $value est une valeur simple alors on crée un input simple avec 'name' et 'value'
            if (!is_array($value)) : ?>
                <input type="hidden" name="<?= $name ?>" value="<?= $value ?>">
            <?php else :
                /* Si $value est un tableau (exemple : provient d'un select multiple) alors il faut créé autant d'input
                    que la taille de $value. Il faut utiliser la notation html : <input name=$name[]> pour que l'html
                    l'interprète comme un tableau de valeur */
                foreach($value as $val) : ?>
                    <input type="hidden" name="<?= $name . '[]' ?>" value="<?= $val ?>">
                <?php endforeach;
            endif; ?>
        <?php endforeach; ?>
        <!-- Permet d'indiquer que le formulaire a été validé -->
        <input type="hidden" name="validate" value="true">
        <p>Etes-vous sûr ?</p>
        <input class="btn btn-success" type="submit" value="Confirmer">
        <p><a class="btn btn-secondary" href="">Annuler</a></p>
    </form>

</section>
<?php
}
?>
