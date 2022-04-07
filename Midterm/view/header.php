<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zippy's Used Autos</title>
    

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
</head>
<body>
<header>
    
    <div class="jumbotron text-center">
    <div class="text-right float-right"> 
        <?php if ($action != "register" && !isset($_SESSION["user_id"])) { ?>
                <div>
                    <p><a href="./?action=register">Register</a></p>
                </div>
            <?php } else if (isset($_SESSION["user_id"]) && ($action != "register" && $action != "logout")) { ?>
                <p class="welcome-message">Welcome, <?= $_SESSION["user_id"] ?> (<a href="./?action=logout">Logout</a>)</p>
        <?php } ?>
    </div>
        <h1>Zippy's Used Autos</h1>
    </div>
</header>
    
