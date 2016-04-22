<h1>Choisissez un mode de livraison</h1>
<br>
<form action="" method="post">

    <div class="radio">
        <label><input type="radio" name="shipping" id="long">GRATUIT : Livraison en 4 jours ouvrables -
            Recevez-le <?php
            $today = date('Y-m-d h:i:sa');
            $OrdersController = new \App\Controller\OrdersController();
            echo $OrdersController->addDays($today, 4); ?></label>
    </div>
    <br>
    <div class="radio">
        <label><input type="radio" name="shipping" id="fast">Livraison en 2 jours ouvres - Recevez-le <?php
            $today = date('Y-m-d h:i:sa');
            $OrdersController = new \App\Controller\OrdersController();
            echo $OrdersController->addDays($today, 2); ?>
        </label>
    </div>
    <br>
    <div class="radio">
        <label><input type="radio" name="shipping" id="veryfast">Livraison tres rapide: Recevez-le <?php
            $today = date('Y-m-d h:i:sa');
            $OrdersController = new \App\Controller\OrdersController();
            echo $OrdersController->addDays($today, 1); ?>
        </label>
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Continuer</button>


</form>