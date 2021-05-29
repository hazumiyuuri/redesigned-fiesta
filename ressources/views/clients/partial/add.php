<?php
    // Adding new client to database
    $errors = null;

    if (isset($_POST['SAVE_CLIENT'])) {
        // Checking sended data if not empty 
        $check_email = check_email($_POST['email']);
        $check_data = check_data(['nom', 'prenom', 'email']);

        if ($check_data) {
            $errors['empty'] = true;
        } else {
            if ($check_email) {
                $errors['insert'] = true;
            } else {
                $sql_client = "INSERT INTO `clients` 
                                        (`id`, `created_at`, `nom`, `prenom`, `email`) 
                                    VALUES 
                                    (NULL, ?, ?, ?, ?)";
    
                $res_client = $database->prepare($sql_client);
                $res_client->execute(
                    array(
                        date('Y-m-d H:i:s'),
                        $_POST['nom'],
                        $_POST['prenom'],
                        $_POST['email'],
                    )
                );
    
                redirect('?pages=clients');
            }
        }
    }
?>
<div class="add_form">
    <form method="post">
        <div class="content container">
            <h2>Ajout d'un nouveau client</h2>
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
                <input type="text" name="nom" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Prénom</label>
                <input type="text" name="prenom" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" name="email" class="form-control">
            </div>
            <button class="btn btn-primary">Ajouter</button>
            <a href="?pages=clients">
                <button type="button" class="btn btn-secondary">Annuler</button>
            </a>
        </div>
        
        <input type="hidden" name="SAVE_CLIENT"/>
    </form>
<div>

<style>
    .add_form {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.65);
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .add_form .content {
        background-color: white;
        padding: 25px 35px;
    }
</style>