<?php
    $view_folder = './ressources/views/';
    $public_folder = './public/';

    function load_component($page = 'clients', $module = 'list') {    
        global $view_folder;
        global $database;

        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        }

        if (isset($_GET['module'])) {
            $module = $_GET['module'];
        }

        require($view_folder . $page . '/' . handle_submodule($module) . '.php');
    }

    function handle_submodule($module) {
        $submodules = explode('.', $module);

        if (count($submodules) > 1) {
            return implode('/', $submodules);
        }

        return $module;
    }

    function asset($path) {
        echo 'http://' . $_SERVER['HTTP_HOST'] . '/public/' . $path;
    }