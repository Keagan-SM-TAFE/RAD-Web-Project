<!-- START Head -->
<?php require_once "includes_php\\templates\\head.php"; ?>
<!-- END Head -->
<!-- START Body -->
<?php require_once "includes_php\\templates\\navBar.php"; ?>
<!-- START Showcase -->
<?php require_once "includes_php\\templates\\showcase.php"; ?>
<!-- END Showcase -->
<!-- START of Main Website Content -->
<section class="container-fluid">
<?php
	require_once "includes_php\\databaseConnection\\databaseConnection.php";
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
        <?php require_once "includes_php\\phpActions\\inputAdmin.php"; ?>
 	</div>
</section>
<br><br><br><br><br><br><br><br><br><br>
<!-- START Footer -->
<?php require_once "includes_php\\templates\\genericFooter.php";?>
<!-- END Footer -->
<!-- END Body -->
<!-- END HTML DOCUMENT -->