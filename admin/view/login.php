<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="../css/main.css">

    <title>Zippy Used Autos</title>
</head>
<body class="p-4">
    <header class="admin_login"><h1>Zippy Admin</h1></header>
    <main>
        <p class="<?= (!isset($login_message) ? 'text-primary' : 'text-danger') ?> fw-bold">
            <?= (isset($login_message) ? $login_message : 'Please fill in your credentials to login.') ?>
        </p>

        <form action="." method="POST" class="add_form">
            <div class="container">
                <input type="hidden" name="action" value="login">
                <div class="form_group_admin_login">
                    <label for="username" class="admin_label_username">Username: </label>
                    <input class="form_field" type="text" name="username" id="username" maxlength="255" autocomplete="off" aria-required="true" autofocus required>
                </div>
                <div class="form_group_admin_login">
                    <label for="password" class="admin_label_password">Password: </label>
                    <input class="form_field" type="password" name="password" id="password" maxlength="255" autocomplete="off" aria-required="true" required>
                </div>
                <div class="form_group_sign_in">
                    <button class="btn_sign_in">Sign In</button>
                </div>
            </div>
        </form>
    </main>

 </body>
</html>