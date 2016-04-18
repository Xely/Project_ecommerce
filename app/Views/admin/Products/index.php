<h1>Administrer les produits</h1>

<p>
    <a href="?p=products.add" class="btn btn-success">Ajouter</a>
</p>


<table class="table">
    <thead>

    <tr>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($products as $product) : ?>
        <tr>
            <td><?= $product->id ?></td>
            <td><?= $product->name ?></td>
            <td>
                <a class="btn btn-primary" href="?p=admin.products.edit&id=<?= $product->id; ?>">Editer</a>
                <form action="?p=admin.products.delete" method="post" style="display: inline">
                    <input type="hidden" name="id" value="<?= $product->id ?>">
                    <button type ="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>

    </tbody>


</table>
