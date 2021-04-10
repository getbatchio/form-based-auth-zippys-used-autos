<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zippy Used Autos</title>
    <link rel="stylesheet" type="text/css" href="css/main.css" />
</head>

<body class="p-4">
    <header class="register">
        <?php if(!isset($_SESSION['userid']) &&
                ($action != 'register' && $action != 'logout')) { ?>

            <p class="align-self-end"><a href="?action=register" class="logged_on">Register</a></p>

        <?php } elseif (isset($_SESSION['userid']) &&
                        ($action != 'register' && $action != 'logout')) { ?>

            <p class="align-self-end"><?= "Welcome {$_SESSION['userid']}! "?>(<a href="?action=logout" class="logout">Sign Out</a>)</p>

        <?php } else { ?>
            <div></div>
        <?php } ?>
        <h1>Zippy Used Autos</h1>
    </header>
   <main>