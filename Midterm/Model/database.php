<?php 
$dsn = "mysql:host=kutnpvrhom7lki7u.cbetxkdyhwsb.us-east-1.rds.amazonaws.com; dbname=ux55zxvytq24jco8";
$username = 'v78frq1vj07wf2dg';
$password = 'xebh7d83ebx9z4wd';

try {
    $db = new PDO($dsn, $username, $password);
} 
catch (PDOException $e){
    $error_message = 'Database error';
    $error_message .= $e->getMessage();
    echo $error_message;
    //include('error.php');
    exit();
}
?>
