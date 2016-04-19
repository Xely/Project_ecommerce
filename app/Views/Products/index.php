<div class="row">
    <div class="col-sm-9">
        <?php
        foreach ($products as $product) : ?>
            <div class="col-sm-4">
                <div class="products__index__product">
                    <div class="col-sm-6">
                        <a href="<?= $product->url ?>"><?= $product->name ?></a>
                        <p>
                            <em><?= $product->category; ?></em>
                        </p>
                    </div>
                    <img class="col-sm-6" height="100px" src="<?= 'Pictures/' . $product->picture; ?>"
                         alt="<?= $product->name; ?>">
                    <div class="col-sm-12"><?= $product->Excerpt; ?></div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
    <div class="col-sm-3">
        <?php foreach ($categories as $category) : ?>
            <li><a href='<?= $category->url; ?>'><?= $category->name; ?></a></li>
        <?php endforeach; ?>
    </div>
</div>
