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