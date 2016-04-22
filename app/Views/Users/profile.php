<div>Nom : <?= $user->name; ?></div>
<div>Prenom : <?= $user->firstname; ?></div>
<div>Nom d'utilisateur : <?= $user->username; ?></div>
<div>Email : <?= $user->email; ?></div>
<br>
<a href="index.php?p=users.edit&id=<?= $user->id; ?>" class="btn btn-primary">Modifier votre profil</a>
<br>
<br>
<div style="font-weight: bold">Adresse :</div>
<?php if (!$addresses) { ?>

    Vous n'avez pas d'adresse enregistree.
    <a href="users.address">Enregistrer une adresse.</a>
<?php } else {
    foreach ($addresses as $address) { ?>
        <div><?= $address->street_number . ', '; ?><?= $address->street_name; ?></div>
        <div><?= $address->postal_code . ' '; ?> <?= $address->city_name; ?></div>
        <br>
        <a href="index.php?p=addresses.edit&id=<?= $address->id; ?>" class="btn btn-primary">Modifier cette adresse</a>
        <a href="index.php?p=addresses.delete&id=<?= $address->id; ?>" class="btn btn-primary red">Supprimer cette adrese</a>
        <br><br>
    <?php }
} ?>