<!DOCTYPE html>
<html lang="en">
<head>
<!-- All the important stuff for the <head> -->
<?php 
/**
 * Short description for file
 * Test and sanitise the user input
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
require_once "includes_php\\head.php";
?>
</head>
<body>
<!-- All the important stuff for the navbar -->
<?php require_once "includes_php\\navBar.php"; ?>

<!-- All the important stuff for the Jummbotron/Showcase -->
<?php require_once "includes_php\\jumbotron.php"; ?>

<!-- Start of the main content -->
<section class="container-fluid">
<?php
require_once "includes_php\\databaseConnection\\databaseConnection.php";
	$unsuscribe= null;
?>
    <div class="container col-lg-8">
    <h2>Admin Portal</h2>
    <br>
    </div>
 	<div class="container col-lg-8">
 		<form method="post" class = "col-lg-4" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="mb-3">
                <label for="Unsuscribe" class="form-label">Unsuscribe:</label>
                <input type="text" class="form-control form-control-lg" id="unsuscribe" 
                    placeholder="Enter email"  name="unsuscribe" value="<?php echo $unsuscribe; ?>">
            </div>
            <button type="submit" class="btn btn-outline-success btn-lg">Unsuscirbe</button>
            <br><br>
        </form>
 	</div>
</section>
<br><br><br><br><br><br><br><br><br><br>
<!-- All the important stuff for the <footer> -->
    <footer class="bg-light text-center">
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        <?php require_once "includes_php\\templates\\genericFooter.php"; ?>
        </div>
    </footer>
</body>
</html>