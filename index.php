<?php

    // Start session management with a persistnet cookie
    $lifetime = 60 * 60 * 24 *14; // 2 weeks in seconds
    session_set_cookie_params($lifetime, '/');
    session_start();
    // Model 
    require('model/database.php');
    require('model/vehicle_db.php');
    require('model/type_db.php');
    require('model/class_db.php');
    require('model/make_db.php');

    // Get required data from Model
    $types = get_types();
    $classes = get_classes();
    $makes = get_makes();

    $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
    if (!$action) {
        $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
        if (!$action) {
            $action = 'vehicles_list';
        }
    }

    $firstname = filter_input(INPUT_GET, 'firstname', FILTER_SANITIZE_STRING);
    if ($firstname) {
        $_SESSION['userid'] = $firstname;
    }

    
    // Get Parameter data sent to Controller
    $make_id = filter_input(INPUT_GET, 'make_id', FILTER_VALIDATE_INT);
    $type_id = filter_input(INPUT_GET, 'type_id', FILTER_VALIDATE_INT);
    $class_id = filter_input(INPUT_GET, 'class_id', FILTER_VALIDATE_INT);
    $sort = filter_input(INPUT_GET, 'sort', FILTER_SANITIZE_STRING);


    if (!$sort) $sort = 'price';

    // Get Data for View
    /* if ($make_id) {
        $make_name = get_make_name($make_id);
        $vehicles = get_vehicles_by_make($make_id, $sort);
    } else if ($type_id) {
        $type_name = get_type_name($type_id);
        $vehicles = get_vehicles_by_type($type_id, $sort);
    } else if ($class_id) {
        $class_name = get_class_name($class_id);
        $vehicles = get_vehicles_by_class($class_id, $sort);
    } else {
        $vehicles = get_all_vehicles($sort);
    } */

    // Extra credit solution 
    $vehicles = get_all_vehicles($sort);
    if ($make_id) {
        $make_name = get_make_name($make_id);
        $vehicles = array_filter($vehicles, function($array) use ($make_name) {
            return $array["Make"] === $make_name;
        });
    }
    if ($type_id) {
        $type_name = get_type_name($type_id);
        $vehicles = array_filter($vehicles, function($array) use ($type_name) {
            return $array["Type"] === $type_name;
        });
    }
    if ($class_id) {
        $class_name = get_class_name($class_id);
        $vehicles = array_filter($vehicles, function($array) use ($class_name) {
            return $array["Class"] === $class_name;
        });
    }
   
    switch ($action) {
        case 'vehciles_list': {
            $vehicles = get_all_vehicles($sort);
            if ($make_id) {
                $make_name = get_make_name($make_id);
                $vehicles = array_filter($vehicles, function($array) use ($make_name) {
                    return $array["Make"] === $make_name;
                });
            }
            if ($type_id) {
                $type_name = get_type_name($type_id);
                $vehicles = array_filter($vehicles, function($array) use ($type_name) {
                    return $array["Type"] === $type_name;
                });
            }
            if ($class_id) {
                $class_name = get_class_name($class_id);
                $vehicles = array_filter($vehicles, function($array) use ($class_name) {
                    return $array["Class"] === $class_name;
                });
            }
        }
    case 'register': {
        include('view/register.php');
        break;
    }
    case 'logout': {
        $firstname = $_SESSION['userid'];
        unset($_SESSION['userid']);
        session_destroy();

        // Delete session cookie
        $session_name = session_name();
        $expire = strtotime('-1 year');
        $params = session_get_cookie_params();
        $path = $params['path'];
        $domain = $params['domain'];
        $secure = $params['secure'];
        $httponly = $params['httponly'];
        setcookie($session_name, '', $expire, $path, $domain, $secure, $httponly);

        include('view/logout.php');
        break;
    }

    }
    
    include('view/vehicle_list.php');