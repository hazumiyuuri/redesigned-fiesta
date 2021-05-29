<?php
    $sql_client = "SELECT * FROM clients";
    $res_client = $database->prepare($sql_client);
    $res_client->execute();
    $clients = $res_client->fetchAll();

    foreach ($clients as $client) {
        echo $client->name;
    }

    load_component('clients', 'partial.add');
?>