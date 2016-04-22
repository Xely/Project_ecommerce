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

<br>

<div class="owl-carousel animated col s6">
    <div><img src="http://lorempixel.com/580/250/nature/1"></div>
    <div><img src="http://lorempixel.com/580/250/nature/2"></div>
    <div><img src="http://lorempixel.com/580/250/nature/3"></div>
    <div><img src="http://lorempixel.com/580/250/nature/4"></div>
    <div><img src="http://lorempixel.com/580/250/nature/5"></div>
</div>

<br>

<div class="row">
    <div class="col s9">
        <?php
        foreach ($products as $product) : ?>

            <div class="col s4 index__product">
                <a href="<?= $product->url ?>">
                    <div class="col s12 index__product__inner">
                        <div class="col s6">
                            <h5 class="index__product__link"><?= $product->name ?></h5>
                            <p>
                                <em><?= ucfirst($product->category); ?></em>
                            </p>
                        </div>
                        <img class="col s6" height="100px" src="<?= 'Pictures/' . $product->picture; ?>"
                             alt="<?= $product->name; ?>">
                        <div class="col s12"><?= $product->Excerpt; ?></div>
                    </div>
                </a>
            </div>

        <?php endforeach ?>
    </div>

    <div class="col s3">

        <nav>
            <ul id="slide-out" class="side-nav full">
                <?php foreach ($categories as $category) : ?>
                    <li><a href='<?= $category->url; ?>'><?= $category->name; ?></a></li>
                <?php endforeach; ?>
            </ul>
            <a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
        </nav>
    </div>



</div>
