<?php
    try {
        $database = new PDO('mysql:host=localhost;dbname=redesigned-fiesta;charset=utf8mb4', 'root', '');
    } catch(Exception $err) {
        if (isset($err)) {
            throw new Exception($err->getMessage());
        }
    }