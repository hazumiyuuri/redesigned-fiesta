<?php
    // Adding new client to database
    if (isset($_POST['SAVE_CLIENT'])) {
        print_r($_POST);
    }
?>

<form method="post">
    <div>
        <label>Nom</label>
        <input type="text" name="nom">
    </div>
    <div>
        <label>Prénom</label>
        <input type="text" name="prenom">
    </div>
    <div>
        <label>Email</label>
        <input type="text" name="email">
    </div>
    <button>Ajouter</button>
    <input type="hidden" name="SAVE_CLIENT"/>
</form>