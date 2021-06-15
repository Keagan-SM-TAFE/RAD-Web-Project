
<?php require_once "..\\databaseConnection\\databaseConnection.php"; ?>

<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $id = $_POST['ratingID'];
        $rating =$_POST['rating'];
        $conn = openConn();
        $query = "UPDATE moviedatabase_movies SET
         MovieRating= '$rating' WHERE ID='$id';";
         mysqli_query($conn,$query);
         closeConn($conn);
    }

    header("Location: ../../index.php")
    

?>