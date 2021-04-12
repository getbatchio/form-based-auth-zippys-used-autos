<?php include('/admin/view/header.php'); ?>

<h2 class="text-primary">Register a new admin user</h2>



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

  
<div class="zippylinks">
    <?php if ($action !== 'list_vehicles') { ?>
  
    <p><a href=".">View Full Vehicle List</a></p>
    <?php } ?>
    <?php if ($action !== 'show_add_form') { ?>
    <p><a href=".?action=show_add_form">Click here</a> to add a vehicle.</p>
    <?php } ?>
    <?php if ($action !== 'list_makes') { ?>
    <p><a href=".?action=list_makes">View/Edit Vehicle Makes</a></p>
    <?php } ?>
    <?php if ($action !== 'list_types') { ?>
    <p><a href=".?action=list_types">View/Edit Vehicle Types</a></p>
    <?php } ?>
    <?php if ($action !== 'list_classes') { ?>
    <p><a href=".?action=list_classes">View/Edit Vehicle Classes</a></p>
    <?php } ?>
</div>

<footer>
    <p>&copy; <?= date("Y"); ?> Zippy Used Autos</p>
</footer>
</main>
</body>

</html>

<?php include('/admin/view/footer.php'); ?>
