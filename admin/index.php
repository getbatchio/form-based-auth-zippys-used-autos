<?php

$lifetime = 60 * 60 * 24 * 14; 
session_set_cookie_params($lifetime, '/');
session_start();

require('../model/database.php');
require('../util/util.php');

// Model 
require('../model/vehicles_table.php');
require('../model/makes_table.php');
require('../model/types_table.php');
require('../model/classes_table.php');
require('../model/admin_db.php');

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if (!$action) {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
    if (!$action) {
        $action = 'vehicles_list';
    }
}

// Controllers
require('controller/vehicles.php');
require('controller/makes.php');
require('controller/types.php');
require('controller/classes.php');
require('controller/admin.php');
