<?php

    $view_folder = './ressources/views/';
    $public_folder = './public/';

    function load_component($page = null, $module = null) {
        $component = handle_component($page, $module);

        global $view_folder;
        global $database;

        require($view_folder . $component['page'] . '/' . handle_submodule($component['module']) . '.php');
    }

    function handle_component($page, $module) {
        $default_page = 'clients';
        $default_module = 'index';

        if (is_null($page)) {
            $page = $default_page;
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            }
        }
        
        if (is_null($module)) {
            $module = $default_module;
            if (isset($_GET['module'])) {
                $module = $_GET['module'];
            }
        }
        
        return [
            'page' => $page,
            'module' => $module
        ];
    }

    function handle_submodule($module) {
        $submodules = explode('.', $module);

        if (count($submodules) > 1) {
            return implode('/', $submodules);
        }

        return $module;
    }

    function asset($path) {
        $paths = explode('\\', dirname(__FILE__, 2));
        $root_folder = $paths[count($paths) - 1];
        echo 'http://' . $_SERVER['HTTP_HOST'] . '/' . $root_folder . '/public/' . $path;
    }