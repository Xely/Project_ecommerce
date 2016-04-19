<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="iso-8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="../public/Bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../public/main.css">
    <title><?= App::getInstance()->title; ?></title>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header col-sm-1">
            <a class="navbar-brand" href="index.php">Tabl'Art</a>
        </div>
        <div class="navbar-header col-sm-1">
            <a class="navbar-brand" href="index.php?p=admin.products.index">Admin</a>
        </div>
        <div class="navbar-header col-sm-1">
            <a class="navbar-brand" href="index.php?p=users.login">Login</a>
        </div>
        <div class="navbar-header col-sm-1">
            <a class="navbar-brand" href="index.php?p=users.register">Register</a>
        </div>
    </div>
</nav>

<div class="container">

    <div class="" style="padding-top: 100px">
        <?= $content; ?>
    </div>

</div>

</body>
</html>

