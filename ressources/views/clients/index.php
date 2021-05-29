<?php
    if (isset($_GET['action']) && $_GET['action'] === 'add_client') {
        load_component('clients', 'partial.add');
    }

    if (isset($_GET['action']) && $_GET['action'] === 'edit_client') {
        load_component('clients', 'partial.edit');
    }

    load_component('clients', 'partial.list');

    function check_email($email) {
        global $database;


        $sql_client = "SELECT * FROM clients WHERE email = ? LIMIT 1";
        $res_client = $database->prepare($sql_client);
        $res_client->execute([
            $email
        ]);

        $client = $res_client->fetch();


        return isset($client->id) && $client->email != $email;
    }
?>