<?php
    $errors = null;
    $sql_client = "SELECT * FROM clients WHERE id = ?";
    $res_client = $database->prepare($sql_client);
    $res_client->execute([
        $_GET['client_id']
    ]);
    $client = $res_client->fetch();

    // Updating existing client to database
    if (isset($_POST['SAVE_CLIENT'])) {
        // Checking sended data if not empty 
        $check_email = check_email($_POST['email'], true);
        $check_data = check_data(['nom', 'prenom', 'email']);

        if ($check_data) {
            $errors['empty'] = true;
        } else {
            if ($check_email) {
                $errors['insert'] = true;
            } else {
                $sql_client = "UPDATE `clients` 
                                    SET nom = ?,
                                        prenom = ?,
                                        email = ?
                                    WHERE id = ? LIMIT 1";
    
                $res_client = $database->prepare($sql_client);
                $res_client->execute(
                    array(
                        $_POST['nom'],
                        $_POST['prenom'],
                        $_POST['email'],
                        $_GET['client_id']
                    )
                );
    
                redirect('?pages=clients&action=list');
            }
        }
    }
?>
<div class="add_form">
    <form method="post">
        <div class="content container">
            <h2>Modification du client</h2>
            <?php
                if (isset($errors['insert'])) {
                    echo '<div class="alert alert-danger" role="alert">
                        Ce client est déjà existant ! Veuillez vérifier s\'il vous plait
                    </div>';
                }

                if (isset($errors['empty'])) {
                    echo '<div class="alert alert-warning" role="alert">
                        Veuillez remplir les champs s\'il vous plait
                    </div>';
                }
            ?>
            <div class="mb-3">
                <label class="form-label">Nom</label>
                <input type="text" name="nom" value="<?php echo $client->nom; ?>" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Prénom</label>
                <input type="text" name="prenom" value="<?php echo $client->prenom; ?>" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" name="email" value="<?php echo $client->email; ?>" class="form-control">
            </div>
            <button class="btn btn-warning">Mettre à jour</button>
            <a href="?pages=clients">
                <button type="button" class="btn btn-secondary">Annuler</button>
            </a>
        </div>
        
        <input type="hidden" name="SAVE_CLIENT"/>
    </form>
</div>