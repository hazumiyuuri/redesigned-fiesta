
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion client et voiture</title>
    <link rel="stylesheet" href="<?php asset('css/bootstrap/bootstrap.min.css') ?>">
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
</head>
<body style="position: relative;">
    <?php
        // Loading default component
        load_component('menu', null, true);
        load_component();
    ?>
</body>
</html>

