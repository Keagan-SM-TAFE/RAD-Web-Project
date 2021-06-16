<?php
/*
 * Short description for file
 * Test and signin an Administrator 
 * Sets the error message if there is an error with the user input
 *
 * PHP version 8
 *
 * @category  Rapid_Application_Development
 * @package   PEAR
 * @author    Keagan Young <keaganyoun554@gmail.com>
 * @author    Andrew Tuitupou <Atuitupou2@gmail.com>
 * @copyright 1997-2021 The PHP Group
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      https://pear.php.net/package/PEAR
 */
 ?>
<?php require_once "includes_php\\databaseConnection\\databaseConnection.php"; ?>
<?php
session_start();
$ERROR = "";
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
   $username = $_POST['username'];
   $password = $_POST['password'];
   $conn = openConn();
   $query = "SELECT * FROM moviedatabase_admin WHERE Username = '$username' AND Password1 = '$password';";
   $result = mysqli_query($conn,$query);
   $resultCheck = mysqli_num_rows($result);
   $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
   if(($row['Username'] ==  $username) &&($row['Password1'] ==  $password))
   {
     $_SESSION['username'] = $row['Username'];
     header("Location: privateAdmin/subscribers.php");
   }else{
     $ERROR = "<div class='alert alert-danger'>PLease enter a correct username and password </div>";
   }
}
?>
 <!-- START Head -->
<?php require_once "includes_php\\templates\\head.php"; ?>
<!-- END Head -->
<!-- START Body -->
<?php require_once "includes_php\\templates\\navBar.php"; ?>
<!-- START Showcase -->
<?php require_once "includes_php\\templates\\showcase.php"; ?>
<!-- END Showcase -->
<!-- Connection -->
<!-- START of Main Website Content -->
<section class="container-fluid">
    <div class="container col-lg-8">
        <h2>Admin Sign In</h2>
        <br>
    </div>
    <div class="container col-lg-8">
        <form method="post" class = "col-lg-4" action="">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username:</label>
                        <input type="text" class="form-control form-control-lg" id="username" 
                            placeholder="Enter Username"  name="username" value="">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" class="form-control form-control-lg" id="genre" 
                            placeholder="Enter Password"  name="password" value="">
                    </div>
                    <button type="submit" class="btn btn-outline-success btn-lg">Login</button>
                    <br><br>
        </form> 
        <?php echo $ERROR; ?> 
    </div>
</section>
<br><br><br><br><br><br><br><br><br><br>
<?php require_once "includes_php\\templates\\genericFooter.php"; ?>