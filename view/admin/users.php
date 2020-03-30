<?php

use Model\User;
use Util\ErrorManager;
use Util\SuccessManager;

ob_start();

?>

    <section id="section_users-admin">

        <h2>Les utilisateurs</h2>

        <?php
            foreach (SuccessManager::getMessages() as $message) : ?>
                <div class="alert alert-success" role="alert">
                    <?= $message ?>
                </div>
            <?php endforeach;
            SuccessManager::destroy();

            foreach (ErrorManager::getMessages() as $message) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= $message ?>
                </div>
            <?php endforeach;
            ErrorManager::destroy();
        ?>

        <div>

            <table>

                <thead>
                    <tr>
                        <th>Pseudo</th>
                        <th>Email</th>
                        <th>Confirmed</th>
                        <th colspan="2">Options</th>
                    </tr>
                </thead>
                <tbody>

                <?php foreach($users as $user) :
                    if ($user instanceof User) : ?>

                    <tr>

                        <form action="?target=users&action=update" method="POST">

                            <td style="display: none;"><input type="hidden" name="idUser"
                                                    value="<?= $user->getIdUser() ?>" /></td>

                            <td><input type="text" name="pseudo"
                                       value="<?php if ($user->getPseudo() != null) {
                                    echo $user->getPseudo();
                                } ?>" required /></td>

                            <td class="t-email"><input type="email" name="email"
                                       value="<?php if ($user->getEmail() != null) {
                                    echo $user->getEmail();
                                } ?>" required /></td>

                            <td style="display: none;"><input type="hidden" name="pwd"
                                                              value="<?= $user->getPwd() ?>" /></td>

                            <td style="display: none;"><input type="hidden" name="confirmKey"
                                                                value="<?= $user->getConfirmKey() ?>" /></td>

                            <td class="t-confirmed"><input type="checkbox" name="confirmed"
                                        <?php if ($user->isConfirmed()) { echo 'checked'; } ?> /></td>

                            <td class="td-modif">
                                <button class="btn btn-warning">Modifier</button>
                            </td>

                        </form>

                        <td class="td-suppr">
                            <a href="?target=users&action=delete&idUser=<?= $user->getIdUser() ?>" class="btn btn-danger">Supprimer</a>
                        </td>

                    </tr>

                    <?php endif;
                endforeach; ?>

                <form action="?target=users&action=insert" method="POST">

                    <tr>

                        <td>
                            <input type="text" name="pseudo" value="<?php if(isset($pseudo)) {
                                echo $pseudo;
                            } ?>" required />
                        </td>

                        <td class="t-email">
                            <input type="email" name="email" value="<?php if(isset($email)) {
                                echo $email;
                            } ?>" required />
                        </td>

                        <td style="display: none;">
                            <input type="hidden" name="pwd" value="test" required />
                        </td>

                        <td class="t-confirmed">
                            <input type="checkbox" name="confirmed" />
                        </td>

                        <td class="td-ajout" colspan="2">
                            <button class="btn btn-success">Ajouter</button>
                        </td>

                    </tr>

                </form>

                </tbody>

            </table>

            <p>
                <a href="?target=links">
                    <button class="btn btn-primary">Liens</button>
                </a>
                <a href="?target=typsrubs">
                    <button class="btn btn-primary">Types et Rubriques</button>
                </a>
                <a href="?target=recettes">
                    <button class="btn btn-primary">Recettes</button>
                </a>
            </p>

        </div>

    </section>

<?php $section =ob_get_clean(); ?>