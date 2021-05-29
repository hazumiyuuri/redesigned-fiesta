<?php
    // Adding new client to database
    $errors = null;
    if (isset($_POST['SAVE_VOITURE'])) {
        $sql_client = "INSERT INTO `voitures` 
                                    (`id`, `created_at`, `model`, `marque`, `type_moteur`) 
                                VALUES 
                                (NULL, ?, ?, ?, ?)";

        $res_client = $database->prepare($sql_client);

        try {
            $res_client->execute(
                array(
                    date('Y-m-d H:i:s'),
                    $_POST['model'],
                    $_POST['marque'],
                    $_POST['type_moteur'],
                )
            );
        } catch(PDOException $err) {
            die($err->getMessage());
        }

        refresh();
    }
?>

<form method="post">
    <div class="container mt-4">
        <h2>Ajout d'un nouvelle voiture</h2>
        <div class="mb-3">
            <label class="form-label">Modèle</label>
            <input type="text" name="model" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Marque</label>
            <input type="text" name="marque" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Type moteur</label>
            <input type="text" name="type_moteur" class="form-control">
        </div>
        <button class="btn btn-primary">Ajouter</button>
    </div>
    
    <input type="hidden" name="SAVE_VOITURE"/>
</form>