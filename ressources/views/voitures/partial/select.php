<?php
    $sql_voiture = "SELECT * FROM
                    voitures";
    $res_voiture = $database->prepare($sql_voiture);
    $res_voiture->execute();
    $voitures = $res_voiture->fetchAll();
?>
<?php
    if (count($voitures) <= 0) {
        echo '  <tr>
                    <td colspan="5" class="text-center">Vide pour le moment.</td>
                </tr>';
    }
?>
<div>
    Choisir la voiture
    <select value="" class="form-control" name="voiture_id">
        <option disabled selected>---Séléctionner la voiture---</option>
        <?php
            foreach ($voitures as $voiture) {
                echo '  <option value="' . $voiture->id . '"> ' . $voiture->model . ' ' .  $voiture->marque . '
                        </option>';
            }
        ?>
    </select>
</div>