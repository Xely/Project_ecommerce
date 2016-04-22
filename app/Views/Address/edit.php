<h1>Modifier votre adresse</h1>
<br>
<form method="post" class="col-sm-4">
    <?= $form->input('street_number', 'Numero de rue'); ?>
    <?= $form->input('street_name', 'Nom de rue'); ?>
    <?= $form->input('postal_code', 'Code postal'); ?>
    <?= $form->input('city_name', 'Ville'); ?>
    <br>
    <?= $form->submit('Modifier'); ?>
</form>
