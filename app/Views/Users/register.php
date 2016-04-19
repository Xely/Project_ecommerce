<!--    <div class="alert alert-danger">-->
<!--        Erreurs-->
<!--    </div>-->
<form method="post">
    <?= $form->input('name', 'Nom'); ?>
    <?= $form->input('firstname', 'Prenom'); ?>
    <?= $form->input('username', 'Nom d\'utilisateur'); ?>
    <?= $form->input('email', 'Email', ['type' => 'email']); ?>

    <?= $form->input('password', 'Mot de passe', ['type' => 'password']); ?>
    <?= $form->input('confpassword', 'Confirmez le mot de passe', ['type' => 'password']); ?>

    <?= $form->submit('Inscription'); ?>
</form>
