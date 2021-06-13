<!DOCTYPE html>
<html lang="en">
<head>
<!-- All the important stuff for the <head> -->
<?php require_once "..\\includes_php\\templates\\head.php"; ?>

</head>
<body>
<!-- All the important stuff for the navbar -->
<?php require_once "..\\includes_php\\templates\\navBar.php"; ?>

<!-- All the important stuff for the Jummbotron/Showcase -->
<?php require_once "..\\includes_php\\templates\\showcase.php"; ?>

<!-- Connection for display suscribers -->
<?php require_once "..\\includes_php\\databaseConnection\\databaseConnection.php"; ?>

<!-- Start of the main content -->
<section class="container-fluid">

    <div class="container col-lg-8">
    <h2>Administrator PortHole</h2>
    <br>
    </div>
 	<div class="container col-lg-8">
 		<form method="post" class = "col-lg-4" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
             <div class="mb-3">
                <label for="Unsuscribe" class="form-label">Unsuscribe:</label>
                <input type="text" class="form-control form-control-lg" id="email" placeholder="Enter email"  name="email" value="">
            </div>
                <button type="submit" class="btn btn-outline-success btn-lg">Unsuscribe</button>
                <br><br>
        </form>
 	</div>
    
<!-- Connection for display suscribers -->
<?php require_once "..\\includes_php\\databaseConnection\\databaseConnection.php";?>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = openConn();
    $email = $_POST['email'];
    $query = "UPDATE moviedatabase_subscribers SET is_Subscribed = 0 WHERE email= '$email';";
    $conn->query($query);
    echo    '
            <div class="alert alert-success">
                <strong>Success!</strong> Form Submitted!
            </div>
            ';
    $query = "SELECT * FROM moviedatabase_subscribers WHERE is_Subscribed = 1;";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();                            
    if (isset($result->num_rows) && $result->num_rows > 0) {   
        //Creation and headings Of the Table
        echo    '
                <div class="container">
                <div class="table-responsive">
                <table class="table table-hover table-condensed">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Date Created</th>
                    </tr>
                ';
        // output the data of each row
        while ($row = $result->fetch_assoc()) {            
            echo    "
                    <tr>
                        <td>" . $row["id"] . "</td>
                        <td>" . $row["name"] . "</td>
                        <td>" . $row["email"] . "</td>
                        <td>" . $row["dateCreated"] . "</td>
                    </tr>
                    ";
        }
        echo    "
                </table>
                </div>
                </div>
                ";
    }
    closeConn($conn);
}
?>        
</section>
<br>
<!-- All the important stuff for the <footer> -->
    <footer class="bg-light text-center">
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        <?php require_once "..\\includes_php\\templates\\genericFooter.php"; ?>
        </div>
    </footer>
</body>
</html>