<div class="row">
    <div class="col-sm-8">
        <?php
        foreach ($products as $product) : ?>

            <h2>
                <a href="<?= $product->url ?>"><?= $product->name ?></a>
            </h2>
            <p>
                <em><?= $product->category; ?></em>
            </p>
            <p><?= $product->Excerpt; ?></p>

        <?php endforeach ?>
    </div>
    <div class="col-sm-4">
        <?php foreach ($categories as $category) : ?>
            <li><a href='<?= $category->url; ?>'><?= $category->name; ?></a></li>
        <?php endforeach; ?>
    </div>
</div>
