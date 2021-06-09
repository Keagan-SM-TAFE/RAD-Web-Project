<!DOCTYPE html>
<html lang="en">
<head>
<!-- All the important stuff for the <head> -->
<?php require_once "includes_php\\head.php"; ?>
</head>
<body>
<!-- All the important stuff for the navbar -->
<?php require_once "includes_php\\navBar.php"; ?>

<!-- All the important stuff for the Jummbotron/Showcase -->
<?php require_once "includes_php\\jumbotron.php"; ?>

<!-- Start of the main content -->
<section class="container-fluid">
<?php

	require_once "includes_php\\Database_Config\\db_connection.php";
	$username = $password = $confirm= $email = null;
?>
 	    <div class="container col-lg-8">
 		<h2>Administrator Sign Up</h2>
        </div>

        <div class="container col-lg-8">
        <br>
 		<form method="post" class = "col-lg-4" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                    <input type="text" class="form-control form-control-lg" id="username" 
                    placeholder="Enter Username"  name="username" value="<?php echo $username; ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email Address:</label>
                    <input type="text" class="form-control form-control-lg" id="email" 
                    placeholder="Enter Email"  name="email" value="<?php echo $email; ?>">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                    <input type="text" class="form-control form-control-lg" id="password" 
                    placeholder="Enter Password"  name="password" value="<?php echo $password; ?>">
            </div>
            <div class="mb-3">
                <label for="confirmPassword" class="form-label">Confirm Password</label>
                    <input type="text" class="form-control form-control-lg" id="confirmPassword"
                    placeholder="Confirm Password"  name="confirmPassword" value="<?php echo $confirm;?>">
            </div>
            <button type="submit" class="btn btn-outline-success btn-lg">Register</button>
            <br><br>
        </form>
        
        <?php require_once "includes_php\\inputAdmin.php"; ?>
        
 	</div>
</section>
<br><br>
<!-- All the important stuff for the <footer> -->
    <footer class="bg-light text-center">
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
<?php require_once "includes_php\\GenericFooter.php"; ?>
        </div>
    </footer>
</body>
</html>