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
    * contactName
    */ 
    if (isset($_POST["contactName"])) {
        $verifiedName = testUserInput($_POST["contactName"]);
    }
    /*
    * contactEmail
    */
    if (isset($_POST["contactEmail"])) {
        $verifiedEmail = testUserInput($_POST["contactEmail"]);
    }
    /*
    * contactSubject
    */ 
    if (isset($_POST["contactSubject"])) {
        $verifiedSubject = testUserInput($_POST["contactSubject"]);
    }
    /*
    * contactMessage
    */
    if (isset($_POST["contactMessage"])) {
        $verifiedMessage = testUserInput($_POST["contactMessage"]);
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
    $verifiedName = mb_htmlentities($_POST['contactName']);
    $verifiedEmail = mb_htmlentities($_POST['contactEmail']);
    $verifiedSubject = mb_htmlentities($_POST['contactSubject']);
    $verifiedMessage = mb_htmlentities($_POST['contactMessage']);

}
?>