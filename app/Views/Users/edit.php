<h1>Modifier votre profil</h1>
<br>
<form method="post" class="col-sm-4">
    <?= $form->input('name', 'Nom'); ?>
    <?= $form->input('firstname', 'Prenom'); ?>
    <?= $form->input('email', 'Email'); ?>
    <br>
    <?= $form->submit('Modifier'); ?>
</form>
