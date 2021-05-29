<?php
    $options = [
        PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, //make the default fetch be an associative array
    ];

    try {
        $database = new PDO('mysql:host=localhost;dbname=redesigned-fiesta;charset=utf8mb4', 'root', '', $options);
    } catch(Exception $err) {
        if (isset($err)) {
            throw new Exception($err->getMessage());
        }
    }