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
require_once "sanitiseContactForm.php";
$messageSent = false;
if (count($_POST)>0) {
    if (isset($_POST['contactName']) && isset($_POST['contactEmail']) 
        && isset($_POST['contactSubject']) && isset($_POST['contactMessage'])
    ) {
        $verifiedname = testUserInput($_POST["contactName"]);
        $verifiedEmail = testUserInput($_POST["contactEmail"]);
        $verifiedSubject = testUserInput($_POST["contactSubject"]);
        $verifiedMessage = testUserInput($_POST["contactMessage"]);
        if (filter_var($_POST['contactEmail'], FILTER_VALIDATE_EMAIL)) {
            $userName = $_POST['contactName'];
            $userEmail = $_POST['contactEmail'];
            $messageSubject = $_POST['contactSubject'];
            $message = $_POST['contactMessage'];
            $emailFrom = 'From: localhost/moviedatabase';
            $emailSendTo = "keaganyoung554@gmail.com";
            $emailMessageBody = "";
            $emailMessageBody .= "From: ".$userName. "\r\n";
            $emailMessageBody .= "contactEmail: ".$userEmail. "\r\n";
            $emailMessageBody .= "Mesage: ".$message. "\r\n";
            echo $emailMessageBody;
            if (mail($emailSendTo, $messageSubject, $emailMessageBody, $emailFrom)) {
                $messageSent = true;
                echo "Message sent";
            } else {
                // Debugging
                // Remove for Production
                echo "Error:1";
            }
        } else {
            // Debugging
            // Remove for Production
            echo "Error:2";
        }
    } else {
        // Debugging
        // Remove for Production
        echo "Error:3";
    }
} else {
    // Debugging
    // Remove for Production
    echo "Error:4";
}
?>