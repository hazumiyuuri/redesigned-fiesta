<?php
    $sql_client = "SELECT *, DATE_FORMAT(clients.created_at, \"%d/%m/%Y %h:%i\") AS date_creation FROM clients";
    $res_client = $database->prepare($sql_client);
    $res_client->execute();
    $clients = $res_client->fetchAll();
?>
<div class="container mt-4">
    <h2>Liste des clients</h2>
    <a href="?pages=clients&action=add_client">
        <button class="btn btn-success">Nouveau client</button>
    </a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Date de création</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if (count($clients) <= 0) {
                    echo '  <tr>
                                <td colspan="5" class="text-center">Vide pour le moment.</td>
                            </tr>';
                }

                foreach ($clients as $client) {
                    echo '  <tr>
                                <td>' . $client->id . '</td>
                                <td>' . $client->date_creation . '</td>
                                <td>' . $client->nom . '</td>
                                <td>' . $client->prenom . '</td>
                                <td>' . $client->email . '</td>
                                <td class="d-flex">
                                    <form method="post" action="?pages=clients&action=edit_client&client_id=' . $client->id . '">
                                        <button type="submit" class="btn btn-primary btn-sm">Editer</button>
                                    </form>

                                    &nbsp;

                                    <form method="post" action="?page=clients&module=detail&client_id=' . $client->id . '">
                                        <button type="submit" class="btn btn-warning btn-sm">Voir détail</button>
                                    </form>
                                </td>
                            </tr>';
                }
            ?>
        </tbody>
    </table>
    
</div>
