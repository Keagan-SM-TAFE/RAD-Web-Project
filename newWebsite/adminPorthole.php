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
	$unsuscribe= null;
?>
    <div class="container col-lg-8">
    <h2>Administrator PortHole</h2>
    <br>
    </div>
 	<div class="container col-lg-8">
 		<form method="post" class = "col-lg-4" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="mb-3">
                        <label for="Unsuscribe" class="form-label">Unsuscribe:</label>
                        <input type="text" class="form-control form-control-lg" id="unsuscribe" placeholder="Enter email"  name="unsuscribe" value="<?php echo $unsuscribe; ?>">
                    </div>
                    <button type="submit" class="btn btn-outline-success btn-lg">Unsuscirbe</button>
                    <br><br>
                </form>
 	</div>
</section>
<br>
<!-- All the important stuff for the <footer> -->
<?php require_once "includes_php\\footer.php"; ?>
</body>
</html>