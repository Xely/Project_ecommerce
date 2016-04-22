<h1>Choisissez une adresse de destination</h1>

<form action="" method="post">
    <div class="col-sm-6">
        <h2>Adresses existantes :</h2>
        <?php $nb = 0;
        foreach ($addresses as $address) { ?>
            <div class="radio">
                <input type="radio" name="address" value="<?= $nb; ?>" id="<?= $nb; ?>">
                <label for="<?= $nb; ?>">
                    <?php echo $address->street_number . ', ' . $address->street_name; ?>
                    <br>
                    <?php echo $address->postal_code . ' ' . $address->city_name; ?>
                    <br>
                </label>
            </div>
            <?php $nb++;
        } ?>
    </div>
    <div class="col-sm-6">
        <div class="radio">
            <h2><input type="radio" name="address" id="order__new__address" value="new">
                <label for="order__new__address">Nouvelle adresse :</label></h2>

            <div class="form-group">
                <label>Numero de rue</label>
                <input type="text"
                       name="street_number"
                       value=""
                       class="form-control order__newaddress"
                       disabled>
            </div>
            <div class="form-group">
                <label>Nom de rue</label>
                <input type="text"
                       name="street_name"
                       value=""
                       class="form-control order__newaddress"
                       disabled>
            </div>
            <div class="form-group">
                <label>Code Postal</label>
                <input type="number"
                       name="postal_code"
                       value=""
                       class="form-control order__newaddress"
                       disabled>
            </div>
            <div class="form-group">
                <label>Ville</label>
                <input type="text"
                       name="city_name"
                       value=""
                       class="form-control order__newaddress"
                       disabled>
            </div>
            <div class="form-group">
                <label class="checkbox"><input class="order__newaddress" type="checkbox" value="add_address" disabled>Ajouter a mes adresses</label>
            </div>
            <br>
            <div class="form-group">
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Envoyer a l'adresse selectionnee</button>
</form>


