<br>
<nav>
    <div class="nav-wrapper brown lighten-1">
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="left hide-on-med-and-down">
            <?php foreach ($categories as $category) : ?>
                <li><a href='<?= $category->url; ?>'><?= $category->name; ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</nav>

<h2><?= $category->name; ?></h2>

<div class="row">
    <div class="col-sm-8">
        <?php
        foreach ($products as $product) : ?>

            <h3>
                <a href="<?= $product->url ?>"><?= $product->name ?></a>
            </h3>
            <p>
                <em><?= $product->category; ?></em>
            </p>
            <p><?= $product->Excerpt; ?></p>

        <?php endforeach ?>
    </div>
    <div class="col-sm-4">
        <?php foreach ($categories as $category) : ?>
            <li><a href="<?= $category->url; ?>"><?= $category->name; ?></a></li>
        <?php endforeach; ?>
    </div>
</div>