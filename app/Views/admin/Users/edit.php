<form method="post" class="col-sm-4">
    <?= $form->input('firstname', 'Prenom'); ?>
    <?= $form->input('name', 'Nom'); ?>
    <?= $form->input('username', 'Nom d\'utilisateur'); ?>
    <?= $form->input('email', 'Email'); ?>
    <select name="admin" id="admin" class="form-control">
        <option value="1" <?php if ($user->admin) { echo 'selected';} ?>>Admin</option>
        <option value="0" <?php if (!$user->admin) { echo 'selected';} ?>>Standard</option>
    </select>
    <br>
    <?= $form->submit('Modifier'); ?>
</form>
