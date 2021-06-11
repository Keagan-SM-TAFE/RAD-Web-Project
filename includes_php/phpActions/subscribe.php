<?php
// include database connection
require_once "..\\databaseConnection\\databaseConnection.php";
$conn = openConn();

$userDate = date("Y-m-d H:i:s");
require_once "sanitiseNewsletterInput.php";
$sqlQuery = "INSERT INTO `moviedatabase_subscribers`(`name`, `email`, `dateCreated`, `is_Subscribed`) 
VALUES ('$verifiedName', '$verifiedEmail', '$userDate', '1');";

if (count($_POST)>0) {
    $stmt = $conn->prepare($sqlQuery);
    $stmt->execute();
}
closeConn($conn);
?>