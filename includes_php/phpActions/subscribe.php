<?php
// include database connection
require_once "includes_php\\databaseConnection\\databaseSubscriberConnection.php";

$userName = $_POST['name'];
$userEmail = $_POST['email'];
$userDate = date("Y-m-d H:i:s");

$sqlQuery = "INSERT INTO 'moviedatabase_subscription' ('name', 'email', 'dateCreated') VALUES ('$userName', '$userEmail', '$userDate')";
echo $sqlQuery;

?>