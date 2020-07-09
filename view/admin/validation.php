<section class="sect-adm" id="sect-adm_validation">

    <h1>Demande de confirmation</h1>

    <form action="" method="POST">
        <?php foreach ($datas as $name => $value) :
            if (!is_array($value)) : ?>
                <input type="hidden" name="<?= $name ?>" value="<?= $value ?>">
            <?php else :
                foreach($value as $val) : ?>
                    <input type="hidden" name="<?= $name . '[]' ?>" value="<?= $val ?>">
                <?php endforeach;
            endif; ?>
        <?php endforeach; ?>
        <!-- Permet d'indiquer que le formulaire a été validé -->
        <input type="hidden" name="validate" value="true">
        <p>Etes-vous sûr ?</p>
        <input class="btn btn-success" type="submit" value="Confirmer">
    </form>

</section>