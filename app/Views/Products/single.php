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

    <img class="col s3 responsive-img offset-s1" src="<?= 'Pictures/' . $product->picture; ?>"
         alt="<?= $product->name; ?>">
</div>


<form method="post" class="container" id="product__single__add">
    <div class="col s3"><?= $form->selectNumber('quantity', 'Quantite:',
            isset($_SESSION['cart'][$product->id]) ? $product->stock - $_SESSION['cart'][$product->id] : $product->stock,
            1); ?>
        <br>
        <?= $form->submit('Ajouter au panier'); ?>
    </div>

</form>

