<?php
/**
 * Short description for file
 * Test and input Administrator data
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

 $usernameTest = $passwordTest = $confirmTest = $confirmEmail = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    //Connection Information From Server Configuration file
	require_once "config\\configDeveloper.php";
     // Validate username
    if(empty(trim($_POST["username"]))){
        $usernameTest = "Please enter a username.";
        echo '<span style="color:#cc2900;">Please enter a username.</span><br>';

    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST['username']))){
        $usernameTest = "Username can only contain letters, numbers, and underscores.";
        echo '<span style="color:#cc2900;">Username can only contain letters, numbers, and underscores.</span><br>';
    } else{
        // Prepare a select statement
        $sql = "SELECT ID FROM moviedatabase_admin WHERE Username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){

            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST['username']);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) ==1){
                    $usernameTest = "This username is already taken.";
                    echo '<span style="color:#cc2900;">This username is already taken.</span><br>';
                } else{
                    $param_username = trim($_POST['username']);
                }
            } else{
                '<span style="color:#cc2900;">Oops! Something went wrong. Please try again later.</span><br>';
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $passwordTest = "Please enter a password."; 
        echo '<span style="color:#cc2900;">Please enter a password.</span><br>';
    } elseif(strlen(trim($_POST["password"])) < 6){

        $passwordTest = "Password must have at least 6 characters.";
        echo '<span style="color:#cc2900;">Password must have atleast 6 characters.</span><br>';
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirmPassword"]))){
        $confirmTest = "Please confirm your password.";  
        echo '<span style="color:#cc2900;">Please confirm your password.</span><br>';
    } else{
        $confirm_password = trim($_POST["confirmPassword"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirmTest = "Password did not match.";
            echo '<span style="color:#cc2900;">Password did not match.</span><br>';
        }
    }

    //Validate email
    if(empty(trim($_POST["email"]))){
    	$confirmEmail = "Please enter an email address";
    	echo '<span style="color:#cc2900;">Please enter an email address</span><br>';
    } else {

    	if(!(str_contains($_POST["email"], '@'))){
    		$confirmEmail = "Please enter a valid email address";
    		echo '<span style="color:#cc2900;">Please enter a valid email address</span><br>';
    	}
    	else
    	{
    		$email = trim($_POST["email"]);
    	}

    }
    // Check input errors before inserting in database
    if(empty($usernameTest) && empty($passwordTest) && empty($confirmTest) && empty($confirmEmail)){
        // Prepare an insert statement
        
        $sql = "INSERT INTO moviedatabase_admin(ID,Email,Username,PasswordHash) VALUES (?, ?, ?, ?)";
        
        if($stmt = mysqli_prepare($link, $sql)){

        	// Bind variables to the prepared statement as parameters
            $works = mysqli_stmt_bind_param($stmt,"isss",$param_ID,$param_email, $param_username, $param_password);

            // Set parameters
            $param_ID = 0;
           	$param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); 
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                
                // Redirect to login page
                //header("location: login.php");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}

?>

    