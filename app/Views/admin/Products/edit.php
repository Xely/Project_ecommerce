<form method="post">
    <?= $form->input('name', 'Nom de l\'article'); ?>
    <?= $form->input('description', 'Description', ['type' => 'textarea']); ?>
    <?= $form->select('id_category', 'Categorie', $categories); ?>

    <?= $form->submit(); ?>
</form>
