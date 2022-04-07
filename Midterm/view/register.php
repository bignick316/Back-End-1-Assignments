<?php include("header.php") ?>

<?php if (!$firstname) { ?>
    <section class="registration">
        <h2>Registration</h2>
        <form action="." method="GET" class="registration-form input-form">
            <input type="hidden" name="action" value="register">
            <input class="add-input" type="text" name="firstname" maxlength="25" placeholder="First Name" required>
            <button class="submit-button buttons add-input">Register</button>
        </form>
    </section>
<?php } else { ?>
    <section class="welcome">
        <h2>Thank you for registering, <?= $firstname ?>!</h2>
        <p class="vehicle-link"><a href="./?action=list_vehicles">View Vehicles</a></p>
    </section>
<?php } ?>

<?php include("footer.php") ?>