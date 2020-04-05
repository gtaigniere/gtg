<?php ob_start(); ?>

<section class="sect-adm" id="sect-adm_validation">

    <h1>Demande de confirmation</h1>

    <form action="" method="POST">
        <?php foreach ($datas as $name => $value) : ?>
            <input type="hidden" name="<?= $name ?>" value="<?= $value ?>">
        <?php endforeach; ?>
        <p>Etes-vous sûr ?</p>
        <input class="btn btn-success" type="submit" name="validate" value="Confirmer">
    </form>

</section>

<?php $section = ob_get_clean(); ?>