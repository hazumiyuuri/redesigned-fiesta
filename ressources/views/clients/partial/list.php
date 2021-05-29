<?php
    $sql_client = "SELECT * FROM clients";
    $res_client = $database->prepare($sql_client);
    $res_client->execute();
    $clients = $res_client->fetchAll();
?>
<div class="container mt-4">
    <h2>Liste des clients</h2>
    <?php
        if (count($clients) <= 0) {
            echo 'Vide pour le moment.';
        }

        foreach ($clients as $client) {
            echo $client->name;
        }
    ?>
</div>
