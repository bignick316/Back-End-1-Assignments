<?php 
$dsn = "mysql:host=localhost; dbname=zippyusedautos";
$username = 'root';
// $password = '1234';
try {
    $db = new PDO($dsn, $username);
} 
catch (PDOException $e){
    $error_message = 'Database error';
    $error_message .= $e->getMessage();
    echo $error_message;
    //include('error.php');
    exit();
}
?>