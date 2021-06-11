<?php
$messageSent = false;
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message']))
{
    $verifiedRating = testUserInput($_POST["name"]);
    $verifiedRating = testUserInput($_POST["email"]);
    $verifiedRating = testUserInput($_POST["subject"]);
    $verifiedRating = testUserInput($_POST["message"]);
    if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
    {
        $userName = $_POST['name'];
        $userEmail = $_POST['email'];
        $messageSubject = $_POST['subject'];
        $message = $_POST['message'];
        $emailFrom = 'From: moviedatabase';
        $emailSendTo = "vivokew965@pidhoes.com";
        $emailMessageBody = "";

        $emailMessageBody .= "From: ".$userName. "\r\n";
        $emailMessageBody .= "Email: ".$userEmail. "\r\n";
        $emailMessageBody .= "Mesage: ".$message. "\r\n";

        if (mail($emailSendTo,$messageSubject,$emailMessageBody,$emailFrom))
        {
            $messageSent = true;
            echo "Message sent";
        }
        else
        {
            echo "Error: Message could not send";
        }
    }
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
?>
