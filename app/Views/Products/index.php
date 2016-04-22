<br>
<nav>
    <div class="nav-wrapper brown lighten-1">
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="left hide-on-med-and-down">
            <?php foreach ($categories as $category) : ?>
                <li><a href='<?= $category->url; ?>'><?= ucfirst($category->name); ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</nav>

<br>

<div class="slider">
    <ul class="slides">
        <li>
            <img src="http://cdn.freshome.com/wp-content/uploads/2010/06/new-modern-kitchen6.jpg"> <!-- random image -->
            <div class="caption center-align">
                <h3>This is our big Tagline!</h3>
                <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
            </div>
        </li>
        <li>
            <img src="http://vandals.xyz/wp-content/uploads/2015/11/Good-kitchen-design-modern-2013.jpg"> <!-- random image -->
            <div class="caption left-align">
                <h3>Left Aligned Caption</h3>
                <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
            </div>
        </li>
        <li>
            <img src="http://inminutes.com/wp-content/uploads/2014/11/Wonderful-Indian-Kitchen-Design-Ideas-5.jpg"> <!-- random image -->
            <div class="caption right-align">
                <h3>Right Aligned Caption</h3>
                <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
            </div>
        </li>
        <li>
            <img src="http://www.staticwhich.co.uk/media/images/adhoc/modern-kitchens--wickes-kitchen-297917.jpg"> <!-- random image -->
            <div class="caption center-align">
                <h3>This is our big Tagline!</h3>
                <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
            </div>
        </li>
        <li>
            <img src="http://www.dekrisdesign.com/wp-content/uploads/2011/05/modern-kitchen-design-by-Darren-James.jpg"> <!-- random image -->
            <div class="caption center-align">
                <h3>This is our big Tagline!</h3>
                <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
            </div>
        </li>
    </ul>
</div>


<br>

<div class="row">
    <div class="col s12">
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
                        <img class="col s6" height="150" src="<?= 'Pictures/' . $product->picture; ?>"
                             alt="<?= $product->name; ?>">
                        <div class="col s12"><?= $product->Excerpt; ?></div>
                    </div>
                </a>
            </div>

        <?php endforeach ?>
    </div>

</div>
