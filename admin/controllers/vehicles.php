<?php 
    switch($action) {
        case 'show_add_form':
            include('view/add_vehicle_form.php');
            break;
        case 'add_vehicle':
            if ($make_id && $type_id && $class_id && $year && $model && $price) {
                add_vehicle($make_id, $type_id, $class_id, $year, $model, $price);
            } else {
                $error = "Invalid vehicle data. Check all fields and try again.";
                include('view/error.php');
                exit();
            }
            header("Location: .");
            break;
        case 'delete_vehicle':
            if ($vehicle_id) {
                try {
                    delete_vehicle($vehicle_id);
                } catch (PDOException $e) {
                    $error = "Missing or incorrect vehicle id.";
                    include('view/error.php');
                    exit();
                }
            }
            header("Location: .");
            break;
        case 'list_vehicles':
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
            include('view/vehicle_list.php');
    }