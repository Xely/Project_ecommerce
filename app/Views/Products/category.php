<br>
<nav>
    <div class="nav-wrapper brown">
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="left hide-on-med-and-down">
            <?php foreach ($categories as $categoryL) : ?>
                <li><a <?php if ($categoryL->name === $category->name) { echo 'class="brown lighten-2"';}; ?> href='<?= $categoryL->url; ?>'><?= ucfirst($categoryL->name); ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</nav>

<div class="row productsByCat__row">
    <div class="col s12">
        <?php
        foreach ($products as $product) : ?>

            <div class="col s4 index__product">
                <a href="<?= $product->url ?>">
                    <div class="col s12 index__product__inner z-depth-2">
                        <div class="col s6">
                            <h5 class="index__product__link bold"><b><?= $product->name ?></b></h5>
                        </div>
                        <img class="col s6" height="150" src="<?= 'Pictures/' . $product->picture; ?>"
                             alt="<?= $product->name; ?>">
                        <div class="col s12"><?= $product->Excerpt; ?></div>
                    </div>
                </a>
            </div>

        <?php endforeach ?>
    </div>

</div>
