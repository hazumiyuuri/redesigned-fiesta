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

    if (isset($_GET['voiture_id'])) {
        $voiture_id = $_GET['voiture_id'];

        $sql_voiture = "SELECT *, DATE_FORMAT(voitures.created_at, \"%d/%m/%Y %h:%i\") as date_creation FROM voitures WHERE id = ?";
        $res_voiture = $database->prepare($sql_voiture);
        $res_voiture->execute([
            $voiture_id
        ]);

        $voiture = $res_voiture->fetch();
    }

    // Récupération de la liste des propriétaires du véhicule
    $sql_client_voitures = "SELECT 
                                client_voitures.id,
                                clients.nom,
                                clients.prenom,
                                clients.email
                            FROM client_voitures
                            INNER JOIN clients ON clients.id = client_voitures.client_id 
                            WHERE voiture_id = ?";

    $res_client_voitures = $database->prepare($sql_client_voitures);

    $res_client_voitures->execute(
        array(
            $_GET['voiture_id']
        )
    );

    $client_voitures = $res_client_voitures->fetchAll();
?>

<div class="container mt-4">
    <div class="d-flex">
        <div style="width: 50%; background-color: rgba(0, 0, 0, .05); padding: 25px; margin-right: 10px;">
            <h2>Information concernant la voiture</h2>
            <div class="mb-3">
                <label class="fw-bold">Date de création :</label>
                <div><?php echo $voiture->date_creation; ?></div>
            </div>
            <div class="mb-3">
                <label class="fw-bold">Modèle :</label>
                <div><?php echo $voiture->model; ?></div>
            </div>
            <div class="mb-3">
                <label class="fw-bold">Marque :</label>
                <div><?php echo $voiture->marque; ?></div>
            </div>
            <div class="mb-3">
                <label class="fw-bold">Type moteur :</label>
                <div><?php echo $voiture->type_moteur; ?></div>
            </div>
        </div>
        <div style="width: 50%; background-color: rgba(80, 80, 0, .05); padding: 25px; margin-left: 10px;">
            <h3>Liste des propriétais du véhicule</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($client_voitures as $client) {
                            echo '<tr>
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
    </div>
    
</div>