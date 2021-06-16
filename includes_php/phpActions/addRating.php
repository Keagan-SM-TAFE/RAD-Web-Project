<?php
// include database connection
require_once "..\\databaseConnection\\databaseConnection.php";
$conn = openConn();

if($_POST['id'] > 0){
  $id = $_POST['id'];
  $star = $_POST['star'];
  $sqlQuery = "INSERT INTO `moviedatabase_ratings` (`movie_id`, `rating`)  VALUES ($id, $star)";
  $stmt = $conn->prepare($sqlQuery);
  $stmt->execute();
  closeConn($conn);
}
exit;
?>
