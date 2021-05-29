<?php
    if (isset($_GET['id'])) {
        $sql_client = "DELETE FROM `voitures` WHERE id = ? LIMIT 1";

        $res_client = $database->prepare($sql_client);

        $res_client->execute(array(
            $_GET['id']
        ));

        redirect("?page=voitures");
    }