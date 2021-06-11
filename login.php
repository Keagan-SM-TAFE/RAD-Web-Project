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
	$username = $password = null;
?>
    <div class="container col-lg-8">
        <h2>Administrator Sign In</h2>
        <br>
    </div>
 	<div class="container col-lg-8">
 		<form method="post" class = "col-lg-4" action="includes_php\phpActions\loginAdmin.php">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username:</label>
                        <input type="text" class="form-control form-control-lg" id="username" 
                            placeholder="Enter Username"  name="username" value="<?php echo $username; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control form-control-lg" id="genre" 
                            placeholder="Enter Password"  name="password" value="<?php echo $password; ?>">
                    </div>
                    <button type="submit" class="btn btn-outline-success btn-lg">Login</button>
                    <br><br>
                </form>
<?php 
    if ($username_err != '') {
        echo $username_err; echo '<br>';
    }
    if ($password_err != '') {
        echo $password_err; echo '<br>';
    }
    if ($login_err != '') {
        echo $login_err; echo '<br>';
    }
?>
 	</div>
</section>
<br><br><br><br><br><br><br><br><br><br>
<!-- START Footer -->
<?php require_once "includes_php\\templates\\genericFooter.php"; ?>
<!-- END Footer -->
<!-- END Body -->
<!-- END HTML DOCUMENT -->