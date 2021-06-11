<?php
// include database connection
require_once "..\\databaseConnection\\databaseConnection.php";
$conn = openConn();

$userDate = date("Y-m-d H:i:s");
require_once "sanitiseNewsletterInput.php";
$sqlQuery = "INSERT INTO `moviedatabase_subscribers`(`name`, `email`, `dateCreated`) VALUES ('$verifiedName', '$verifiedEmail', '$userDate');";

if (count($_POST)>0) {
    echo    '
            <div class="alert alert-success">
                <strong>Success!</strong> Form Submitted!
            </div>
            ';
            echo $sqlQuery;
    $stmt = $conn->prepare($sqlQuery);
    $stmt->execute();
}
closeConn($conn);
?>