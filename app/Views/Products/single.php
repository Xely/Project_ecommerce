<nav>
    <div class="nav-wrapper grey">
        <div class="col s12">
            <a href="index.php" class="breadcrumb">&nbspAcceuil</a>
            <a href="index.php?p=products.category&id=<?= $product->id_category; ?>"
               class="breadcrumb"><?= ucfirst($product->category); ?></a>
            <a href="#!" class="breadcrumb"><?= ucfirst($product->name); ?></a>
        </div>
    </div>
</nav>

<br>

<div class="row">
    <div class="col s6">
        <h1><?= ucfirst($product->name); ?></h1>

        <p><em><?= ucfirst($product->category); ?></em></p>

        <p><?= $product->description; ?></p>
        <br>
        <p style="font-size: 20px;">Prix: EUR <?= number_format((float)$product->price, 2, '.', ''); ?></p>
    </div>

    <img class="materialboxed" width="650" src="<?= 'Pictures/' . $product->picture; ?>">

</div>


<form method="post" class="row" id="product__single__add">
    <?= $form->selectNumber('quantity', 'Quantite:',
        isset($_SESSION['cart'][$product->id]) ? $product->stock - $_SESSION['cart'][$product->id] : $product->stock,
        1); ?>
    <br>
    <div class="single__add__button">
        <?= $form->submit('Ajouter au panier'); ?>
    </div>
</form>

