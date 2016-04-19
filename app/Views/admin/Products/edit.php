<form method="post">
    <?= $form->input('name', 'Nom de l\'article'); ?>
    <?= $form->input('description', 'Description', ['type' => 'textarea']); ?>
    <?= $form->select('id_category', 'Categorie', $categories); ?>
    <div>
        <div class="col-sm-6"><?= $form->input('picture', 'Image', ['type' => 'file']); ?></div>
        <div class="col-sm-6"><img class="admin__products__edit__pic" src="<?= 'Pictures/' . $product->picture; ?>"
             alt="<?= $product->name; ?>"></div>
    </div>
    <!--    <input type="file" name="fileToUpload" id="fileToUpload">-->
    <?= $form->submit('Modifier'); ?>
</form>
