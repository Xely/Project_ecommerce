<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--    <link rel="stylesheet" href="../public/Bootstrap/css/bootstrap.css">-->
    <link rel="stylesheet" href="../public/animate.css">
    <link rel="stylesheet" href="../public/Javascript/assets/owl.carousel.css">
    <link rel="stylesheet" href="../public/materialize/css/materialize.css">
    <link rel="stylesheet" href="../public/main.css">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title><?= App::getInstance()->title; ?></title>
</head>
<body>

<div class="container">
    <div class="col header__main">
        <ul id="dropdown1" class="dropdown-content">
            <li><a href="#!">one</a></li>
            <li><a href="#!">two</a></li>
            <li class="divider"></li>
            <li><a href="#!">three</a></li>
        </ul>

        <nav>
            <div class="nav-wrapper brown lighten-1">
                <a href="index.php" class="brand-logo">Tabl'Art</a>
                <ul class="right hide-on-med-and-down">
                    <?php if (isset($_SESSION['admin']) && isset($_SESSION['registered']) && $_SESSION['admin'] == 1 && $_SESSION['registered']) { ?>
                        <li><a href="index.php?p=admin.products.index">Admin</a></li>
                    <?php } ?>
                    <?php if (isset($_SESSION['registered']) && $_SESSION['registered']) : ?>
                        <li><a href="index.php?p=users.logout">Bonjour <?= $_SESSION['username']; ?>
                                <br>Logout</a></li>
                    <?php else : ?>
                        <li><a class="modal-trigger" href="#modal_login">Login</a></li>
                        <!-- Modal Structure -->
                        <div id="modal_login" class="modal">
                            <div class="modal-content col s6">
                                <h4>Identification</h4>
                                <form action="index.php?p=users.login" method="post">
                                    <p><label for="username">Nom d'utilisateur <input type="text" id="username"></label>
                                    </p>
                                    <p><label for="password">Mot de passe <input type="password" id="password"></label>
                                    </p>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="modal-action waves-effect waves-green btn">Se connecter</button>
                                <!--                                <a href="#" class=" modal-action waves-effect waves-green btn">Se connecter</a>-->
                                </form>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['registered']) && $_SESSION['registered']) { ?>
                        <li><a href="index.php?p=users.profile">Profil</a></li>
                    <?php } else { ?>
                        <li><a href="index.php?p=users.register">Register</a></li>
                    <?php } ?>
                    <?php
                    $cartNb = 0;
                    if (isset($_SESSION['cart'])) {
                        foreach ($_SESSION['cart'] as $k => $v) {
                            $cartNb += $v;
                        }
                    }
                    ?>
                    <li><a class="btn-large" href="index.php?p=users.cart"><i
                                class="material-icons left">shopping_cart</i>
                            Panier: <span
                                class="header__cart"><?= $cartNb; ?></span>
                            articles</a></li>
                </ul>
            </div>
        </nav>
    </div>
</div>


<div class="container">

    <!--    <div class="" style="padding-top: 100px">-->
    <?= $content; ?>
    <!--    </div>-->

</div>

<script src="../public/Javascript/jquery-1.12.3.js"></script>
<script src="../public/Javascript/owl.carousel.js"></script>
<script src="../public/Javascript/owl.carousel.min.js"></script>
<script src="../public/ajax/ajax.js"></script>
<script src="../public/materialize/js/materialize.js"></script>
<script src="../public/Javascript/main.js"></script>

</body>
</html>

