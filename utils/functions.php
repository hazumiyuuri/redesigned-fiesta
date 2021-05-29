<?php

    $view_folder = './ressources/views/';
    $public_folder = './public/';

    function load_component($page = null, $module = null, $force_default = false) {
        $component = handle_component($page, $module, $force_default);

        global $view_folder;
        global $database;

        require($view_folder . $component['page'] . '/' . handle_submodule($component['module']) . '.php');
    }

    function handle_component($page, $module, $force_default) {
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

        if ($force_default === true) {
            $module = $default_module;
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

    function refresh() {
        header("Refresh:0");
    }

    function redirect($to) {
        header('Location: ' . $to);
    }

    function check_data($columns) {
        $errors = 0;
        foreach($columns as $column) {
            if (!isset($_POST[$column])) {
                $errors++;
            } else {
                if (strlen($_POST[$column]) <= 0) {
                    $errors++;
                }
            }
        }

        return $errors;
    }
