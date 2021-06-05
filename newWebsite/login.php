<?php require_once "includes_php\\loginAdmin.php"; ?>
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
	$username = $password = null;
?>
    <div class="container col-lg-8">
    <h2>Administrator Sign In</h2>
    <br>
    </div>
 	<div class="container col-lg-8">
 		<form method="post" class = "col-lg-4" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username:</label>
                        <input type="text" class="form-control form-control-lg" id="username" placeholder="Enter Username"  name="username" value="<?php echo $username; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="text" class="form-control form-control-lg" id="genre" placeholder="Enter Password"  name="password" value="<?php echo $password; ?>">
                    </div>
                    <button type="submit" class="btn btn-outline-success btn-lg">Login</button>
                    <br><br>
                </form>

    <?php 
        if($username_err != ''){echo $username_err; echo '<br>';}
        if($password_err != ''){echo $password_err; echo '<br>';}
        if($login_err != ''){echo $login_err; echo '<br>';}
    ?>
 	</div>
</section>
<br>
<!-- All the important stuff for the <footer> -->
<?php require_once "includes_php\\footer.php"; ?>
</body>
</html>