<?php
    $sql_client = "SELECT * FROM clients";
    $res_client = $database->prepare($sql_client);
    $res_client->execute();
    $clients = $res_client->fetchAll();
?>
<div class="container mt-4">
    <h2>Liste des clients</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if (count($clients) <= 0) {
                    echo '  <tr>
                                <td colspan="4" class="text-center">Vide pour le moment.</td>
                            </tr>';
                }

                foreach ($clients as $client) {
                    echo '  <tr>
                                <td>' . $client->id . '</td>
                                <td>' . $client->nom . '</td>
                                <td>' . $client->prenom . '</td>
                                <td>' . $client->email . '</td>
                            </tr>';
                }
            ?>
        </tbody>
    </table>
    
</div>
