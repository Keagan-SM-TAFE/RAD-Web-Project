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

	require_once "includes_php\\db_connection.php";
	$username = $password = $confirm= null;
?>
 	<div class="container">
 		<h2>Administrator Sign Up</h2>
 		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                    <input type="text" class="form-control form-control-lg" id="username" 
                        placeholder="Enter Username"  name="username" value="<?php echo $username; ?>">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                    <input type="text" class="form-control form-control-lg" id="genre" 
                        placeholder="Enter Password"  name="password" value="<?php echo $password; ?>">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Confirm Password</label>
                    <input type="text" class="form-control form-control-lg" id="genre" 
                        placeholder="Confirm Password"  name="password" value="<?php echo $password; ?>">
            </div>
            <button type="submit" class="btn btn-outline-success btn-lg">Register</button>
            <br><br>
        </form>
 	</div>
</section>
<!-- All the important stuff for the <footer> -->
<?php require_once "includes_php\\footer.php"; ?>
</body>
</html>