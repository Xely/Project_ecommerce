<h1>Administrer les utilisateurs</h1>

<table class="table">
    <thead>

    <tr>
        <td>Id</td>
        <td>Prenom</td>
        <td>Nom</td>
        <td>Nom d'utilisateur</td>
        <td>Email</td>
        <td>Admin</td>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user) : ?>
        <tr>
            <td><?= $user->id ?></td>
            <td><?= $user->firstname ?></td>
            <td><?= $user->name ?></td>
            <td><?= $user->username ?></td>
            <td><?= $user->email ?></td>
            <td><?php if ($user->admin) {
                    echo 'Admin';
                } else {
                    echo 'Standard';
                } ?></td>
            <td>
                <a class="btn btn-primary" href="?p=admin.users.edit&id=<?= $user->id; ?>">Editer</a>
                <form action="?p=admin.users.delete" method="post" style="display: inline">
                    <input type="hidden" name="id" value="<?= $user->id ?>">
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>

    </tbody>


</table>
