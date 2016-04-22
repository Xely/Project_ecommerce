<!--    <div class="alert alert-danger">-->
<!--        Erreurs-->
<!--    </div>-->
<div class="row">
    <div class="col s6 offset-s3">
        <form method="post" class="register__form col s12">
            <?= $form->input('name', 'Nom'); ?>
            <?= $form->input('firstname', 'Prenom'); ?>
            <?= $form->input('username', 'Nom d\'utilisateur'); ?>
            <?= $form->input('email', 'Email', ['type' => 'email']); ?>

            <?= $form->input('password', 'Mot de passe', ['type' => 'password']); ?>
            <?= $form->input('confpassword', 'Confirmez le mot de passe', ['type' => 'password']); ?>

            <?= $form->submit('Inscription'); ?>
        </form>
    </div>
</div>