<?php
use App\Controller\ProductsController;

//unset($_SESSION['cart']);
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) { ?>
    <h3>Votre panier est vide.</h3>
<?php } else { ?>
    <div class="row cart__table">
        <div class="col s8 offset-s2">
            <table class="table striped">
                <thead>
                <tr>
                    <th data-field="name">Article</th>
                    <th data-field="quantity">Quantité</th>
                    <th data-field="price">Prix unitaire</th>
                    <th data-field="id" style="visibility: hidden; width: 0px;"></th>
                </tr>
                </thead>
                <tbody id="cart-tablebody">


                <?php $form = new \Core\HTML\BootstrapForm();

                $total = 0;

                $ProductsController = new ProductsController();
                foreach ($_SESSION['cart'] as $k => $v) :
                    $product = $ProductsController->Product->getOne($k);
                    ?>
                    <tr style="height: 2px;" class="cartItem">

                        <td><a href="<?= $product->url; ?>"><?= $product->name; ?></a></td>
                        <td class="cartQuantity col s6">
                            <?= $form->selectNumber('quantity', null, $product->stock, (int)$v); ?>
                        </td>
                        <td class="cartPrice"><?= $product->price; ?></td>
                        <?php $total += $product->price * $v; ?>
                        <td><a href="index.php?p=products.deleteFromCart&id=<?= $product->id; ?>"
                               class="btn red">Supprimer</a></td>
                        <td class="cartId" style="visibility: hidden; width: 0px;"><?= $product->id; ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col offset-s2">
            Sous-total : EUR <span class="subtotal"></span>
            &nbsp;
            <a href="index.php?p=orders.login" class="btn btn-primary">Passer la commande</a>
        </div>
    </div>
<?php } ?>

