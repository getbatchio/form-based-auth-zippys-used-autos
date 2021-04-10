<?php include('view/header.php'); ?>

<h2 class="text-primary">Register a new admin user</h2>

<?php if (isset($errors)) { ?>
<ul class="fw-bold">
    <?php foreach ($errors as $error) { ?>
        <li class="text-danger"><?= $error ?></li>
    <?php } ?>
</ul>
<?php } ?>

<form action="." method="POST" class="add_form">
    <div class="container">
        <input type="hidden" name="action" value="register">
        <div class="form_group_register">
            <label for="username" class="form_label_username">Username: </label>
            <input class="form_field" type="text" name="username" id="username" maxlength="255" autocomplete="off" aria-required="true" autofocus required>
        </div>
        <div class="form_group_register">
            <label for="password" class="form_label_password">Password: </label>
            <input class="form_field" type="password" name="password" id="password" maxlength="255" autocomplete="off" aria-required="true" required>
        </div>
        <div class="form_group_register">
            <label for="confirm_password" class="form_label_password">Confirm Password: </label>
            <input class="form_field" type="password" name="confirm_password" id="confirm_password" maxlength="255" autocomplete="off" aria-required="true" required>
        </div>
        <div class="form_group_register">
            <button class="btn_register">Register</button>
        </div>
    </div>
</form>

<?php include('view/footer.php'); ?>