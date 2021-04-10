<?php include('header.php'); ?>

<?php if(!$firstname) { ?>
    <form action="." method="GET" class="add_form">
        <div class="container">
            <input type="hidden" name="action" value="register">
            <div class="form_logon">
                <label for="firstname" class="form_label ">Please enter your firstname:</label>
                <input type="text" name="firstname" id="firstname" class="form_field" maxlength="100" required>
            </div>
            <div class="form_group ">
                <button class="">Register</button>
            </div>
        </div>
    </form>
<?php } else { ?>
    <h2 class="text-primary"><?= "Thank you for registering, {$firstname}!" ?></h2>
    <p><a href="?action=vehicles_list">Click here</a> to view our vehicle list.</p>
<?php } ?>

<?php include('footer.php'); ?>