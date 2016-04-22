<?php
use App\Controller\ProductsController;

//unset($_SESSION['cart']);
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) { ?>
    <h3>Votre panier est vide.</h3>
<?php } else { ?>
    <div class="row">
        <div class="col s8">
            <table class="table striped">
                <thead>
                <tr>
                    <th data-field="id" style="visibility: hidden; width: 0px;"></th>
                    <th data-field="name">Article</th>
                    <th data-field="quantity">Quantité</th>
                    <th data-field="price">Prix unitaire</th>
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
                        <td class="cartId" style="visibility: hidden; width: 0px;"><?= $product->id; ?></td>
                        <td><a href="<?= $product->url; ?>"><?= $product->name; ?></a></td>
                        <td class="cartQuantity">
                            <?= $form->selectNumber('quantity', null, $product->stock, (int)$v); ?>
                        </td>
                        <td class="cartPrice"><?= $product->price; ?></td>
                        <?php $total += $product->price * $v; ?>
                        <td><a href="index.php?p=products.deleteFromCart&id=<?= $product->id; ?>"
                               class="btn red">Supprimer</a></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <p>Sous-total : EUR <span class="subtotal"></span></p>

    <a href="index.php?p=orders.login" class="btn btn-primary">Passer la commande</a>
    <button id="confirm-command" class="waves-effect waves-light btn">Passer la commande</button>
<?php } ?>

