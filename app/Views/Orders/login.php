<h1 style="text-align: center; font-size: 40px">Vous n'etes pas connecte.</h1>
<div class="container">
<br>
    <div class="col-sm-6">
        <h2>Vous possedez deja un compte:</h2>
        <?php if ($errors) : ?>
            <div class="alert alert-danger">
                Identifiants incorrects
            </div>
        <?php endif; ?>
        <form method="post">
            <?= $form->input('username', 'Nom d\'utilisateur'); ?>
            <?= $form->input('password', 'Mot de passe', ['type' => 'password']); ?>

            <?= $form->submit('Se connecter'); ?>
        </form>
    </div>
    <div class="col-sm-6">
        <h2>Vous ne possedez pas encore de compte:</h2>
        <a href="index.php?p=users.register">Creer un compte</a>
    </div>

</div>