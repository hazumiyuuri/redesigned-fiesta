<?php
    require('./database/pdo.php');

    $sql_client = "SELECT * FROM clients";

    $res_client = $database->prepare($sql_client);
    $res_client->execute();
    $clients = $res_client->fetchAll();