<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment 2</title>
    <link rel = "stylesheet" href = "css/main.css">
</head>
<body>
    <?php 
   // declare(strict_types = 1);
    /*print_r($_GET);
    print_r($_POST);
    $firstname = filter_input(INPUT_GET, "first", FILTER_SANITIZE_STRING);
    $lastname = filter_input(INPUT_GET, "last", FILTER_SANITIZE_STRING);
    $age = filter_input(INPUT_GET, "age", FILTER_SANITIZE_STRING);
    */

    if (isset($_GET['first']) && isset($_GET['last']) && isset($_GET['age'])) {
        $firstname = filter_input(INPUT_GET, "first", FILTER_SANITIZE_STRING);
        $lastname = filter_input(INPUT_GET, "last", FILTER_SANITIZE_STRING);
        $age = filter_input(INPUT_GET, "age", FILTER_SANITIZE_STRING);
        $currentdate = date('z') + 1;
      //  date_add($currentdate, date_interval_create_from_date_string($age . " years"));
        if(!empty($firstname) && !empty($lastname) && !empty($age)) {
          echo "Hello, my name is " . htmlspecialchars($firstname) . " " . htmlspecialchars($lastname) . ".<br>";
          function ageInDays (int $x, int $y) {
              return ($x * 365) + $y;
          }
          if ($age >= 18) {
            echo "I am old enough to vote in the United States.<br>";
            echo "Today: " . date("m/d/Y") . ". You are " . ageInDays($age, $currentdate) . " days old.<br>";
            
          }
          else {
              echo "I am not old enough to vote in the United States.<br>";
              echo "Today: " . date("m/d/Y") . ". You are " . ageInDays($age, $currentdate) . " days old.<br>";
            }
      }
      else {
          echo "Missing Data";
      }
    }

   
    
    ?>
    
    <h1>Basic Info Form</h1>
    <form action="<?php echo $_SERVER["PHP_SELF"] ?> ">
        <label for = "first">First Name: </label>
        <input type = "text" id = "first" name = "first" autocomplete = "off">
        <label for = "last">Last Name: </label>
        <input type = "text" id = "last" name = "last" autocomplete = "off">
        <label for = "age">Age: </label>
        <input type = "number" id ="age" name = "age" autocomplete = "off">
        <div>
            <button type = "submit">Submit</button>
            <button type = "submit" formmethod = "post">Reset</button>
        </div>
    </form>
</body>
</html>