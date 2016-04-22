<form method="post">
    <?= $form->input('name', 'Nom de l\'article'); ?>
    <?= $form->input('description', 'Description', ['type' => 'textarea']); ?>
    <?= $form->select('id_category', 'Categorie', $categories); ?>
    <div>
        <div class="col-sm-12"><?= $form->input('picture', 'Image', ['type' => 'file']); ?></div>
    </div>
    <?= $form->submit('Ajouter'); ?>
</form>
