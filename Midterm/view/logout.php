<?php include("header.php") ?>

<section class="welcome">
    <h2>Thank you for signing out, <?= $_SESSION["user_id"] ?>.</h2>
    <p class="vehicle-link"><a href="./?action=list_vehicles">View Vehicles</a></p>
</section>

<?php include("footer.php") ?>

<?php
    unset($_SESSION["user_id"]);
    session_destroy();
    setcookie("user_id", "", time()-3600);
?>