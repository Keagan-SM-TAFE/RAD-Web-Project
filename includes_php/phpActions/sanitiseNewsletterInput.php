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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    /*
    * newsletterName
    */ 
    if (isset($_POST["newsletterName"])) {
        $verifiedName = testUserInput($_POST["newsletterName"]);
    }
    /*
    * newsletterEmail
    */
    if (isset($_POST["newsletterEmail"])) {
        if (preg_match('/^[^\@]+@.*.[a-z]{2,15}$/i', $_POST["newsletterEmail"])) {
           $verifiedEmail = testUserInput($_POST["newsletterEmail"]); 
        }
    }
    /*
    * Only run request when the form is submitted, not when the page reloads
    */
    $submitted = ($_POST["submit"]);
}
/**
 * Summary Examples
 * the htmlspecialchars() function converts special characters to HTML entities. 
 * This means that it will replace HTML characters like < and > with &lt; and &gt;. 
 * This prevents attackers from exploiting the code by 
 * injecting HTML or Javascript code (Cross-site Scripting attacks) in forms.
 * 
 * @param string $userData the string to sanitise
 * 
 * @return string userData
 */
function testUserInput($userData)
{
    $userData = trim($userData);
    $userData = stripslashes($userData);
    $userData = htmlspecialchars($userData);
    return $userData;
}
if (count($_POST)>0) {
    $verifiedName = mb_htmlentities($_POST['newsletterName']);
    $verifiedEmail = mb_htmlentities($_POST['newsletterEmail']);

}
?>