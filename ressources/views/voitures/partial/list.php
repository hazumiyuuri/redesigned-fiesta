<?php
    $sql_voiture = "SELECT * FROM voitures";
    $res_voiture = $database->prepare($sql_voiture);
    $res_voiture->execute();
    $voitures = $res_voiture->fetchAll();
?>
<div class="container mt-4">
    <h2>Liste des voitures</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Model</th>
                <th>Marque</th>
                <th>Type Moteur</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if (count($voitures) <= 0) {
                    echo '  <tr>
                                <td colspan="5" class="text-center">Vide pour le moment.</td>
                            </tr>';
                }

                foreach ($voitures as $voiture) {
                    echo '  <tr>
                                <td>' . $voiture->id . '</td>
                                <td>' . $voiture->model . '</td>
                                <td>' . $voiture->marque . '</td>
                                <td>' . $voiture->type_moteur . '</td>
                                <td class="d-flex">
                                    <form method="post" action="?page=voitures&module=detail&voiture_id=' . $voiture->id . '">
                                        <button type="submit" class="btn btn-warning btn-sm">Voir détail</button>
                                    </form>

                                    &nbsp;
                                    
                                    <form method="post" action="?page=voitures&module=action.delete&id=' . $voiture->id . '">
                                        <input type="hidden" value="' . $voiture->id . '" />
                                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                    </form>
                                </td>
                            </tr>';
                }
            ?>
        </tbody>
    </table>
</div>
