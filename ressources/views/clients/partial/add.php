<?php
    // Adding new client to database
    if (isset($_POST['SAVE_CLIENT'])) {
        print_r($_POST);
    }
?>

<form method="post">
    <div class="container mt-4">
        <h2>Ajout d'un nouveau client</h2>
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
    </div>
    
    <input type="hidden" name="SAVE_CLIENT"/>
</form>