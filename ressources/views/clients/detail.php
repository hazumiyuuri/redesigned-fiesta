<?php
    if (isset($_POST['ASSOCIATE_CAR'])) {
        $check_data = check_data(['voiture_id']);

        if (!$check_data) {
            $sql_client_voiture = "INSERT INTO `client_voitures` 
                                        (`id`, `voiture_id`, `client_id`) 
                                    VALUES 
                                    (NULL, ?, ?)";

            $res_client_voiture = $database->prepare($sql_client_voiture);
            $res_client_voiture->execute(
                array(
                    $_POST['voiture_id'],
                    $_GET['client_id']
                )
            );

            refresh();
        }
    }

    if (isset($_GET['client_id'])) {
        $client_id = $_GET['client_id'];

        $sql_client = "SELECT *, DATE_FORMAT(clients.created_at, \"%d/%m/%Y %h:%i\") as date_creation FROM clients WHERE id = ?";
        $res_client = $database->prepare($sql_client);
        $res_client->execute([
            $client_id
        ]);

        $client = $res_client->fetch();
    }

    // Récupération de la liste des voitures du client
    $sql_client_voitures = "SELECT 
                                client_voitures.id,
                                voitures.model,
                                voitures.marque,
                                voitures.type_moteur
                            FROM client_voitures
                            INNER JOIN voitures ON voitures.id = client_voitures.voiture_id 
                            WHERE client_id = ?";

    $res_client_voitures = $database->prepare($sql_client_voitures);

    $res_client_voitures->execute(
        array(
            $_GET['client_id']
        )
    );

    $client_voitures = $res_client_voitures->fetchAll();
?>

<div class="container mt-4">
    <div class="d-flex">
        <div style="width: 50%; background-color: rgba(0, 0, 0, .05); padding: 25px; margin-right: 10px;">
            <h2>Information concernant le client</h2>
            <div class="mb-3">
                <label class="fw-bold">Date de création :</label>
                <div><?php echo $client->date_creation; ?></div>
            </div>
            <div class="mb-3">
                <label class="fw-bold">Nom :</label>
                <div><?php echo $client->nom; ?></div>
            </div>
            <div class="mb-3">
                <label class="fw-bold">Prénom :</label>
                <div><?php echo $client->prenom; ?></div>
            </div>
            <div class="mb-3">
                <label class="fw-bold">Email :</label>
                <div><?php echo $client->email; ?></div>
            </div>
        </div>
        <div style="width: 50%; background-color: rgba(80, 80, 0, .05); padding: 25px; margin-left: 10px;">
            <h2>Associer une voiture au client</h2>
            <form method="post">
                <div class="mb-2">
                    <?php
                        load_component('voitures', 'partial.select')
                    ?>
                </div>
                <input type="hidden" name="ASSOCIATE_CAR" />
                <button class="btn btn-success">Associer la voiture</button>
            </form>

            <hr />
            <h3>Liste de ces voitures</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Modèle</th>
                        <th>Marque</th>
                        <th>Type moteur</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($client_voitures as $voiture) {
                            echo '<tr>
                                <td>' . $voiture->id . '</td>
                                <td>' . $voiture->model . '</td>
                                <td>' . $voiture->marque . '</td>
                                <td>' . $voiture->type_moteur . '</td>
                            </tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    
</div>