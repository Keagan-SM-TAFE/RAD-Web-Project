<?php
include_once "sanitiseContactForm.php";
$messageSent = false;
if (count($_POST)>0)
{
    if (isset($_POST['contactName']) && isset($_POST['contactEmail']) && isset($_POST['contactSubject']) && isset($_POST['contactMessage']))
    {
        $verifiedname = testUserInput($_POST["contactName"]);
        $verifiedEmail = testUserInput($_POST["contactEmail"]);
        $verifiedSubject = testUserInput($_POST["contactSubject"]);
        $verifiedMessage = testUserInput($_POST["contactMessage"]);
        if(filter_var($_POST['contactEmail'], FILTER_VALIDATE_EMAIL))
        {
            $userName = $_POST['contactName'];
            $userEmail = $_POST['contactEmail'];
            $messageSubject = $_POST['contactSubject'];
            $message = $_POST['contactMessage'];
            $emailFrom = 'From: localhost/moviedatabase';
            $emailSendTo = "vivokew965@pidhoes.com";
            $emailMessageBody = "";

            $emailMessageBody .= "From: ".$userName. "\r\n";
            $emailMessageBody .= "contactEmail: ".$userEmail. "\r\n";
            $emailMessageBody .= "Mesage: ".$message. "\r\n";
            echo $emailMessageBody;
            if (mail($emailSendTo,$messageSubject,$emailMessageBody,$emailFrom))
            {
                $messageSent = true;
                echo "Message sent";
            }
            else
            {
                echo "Error:1";
            }
        }
        else
        {
            echo "Error:2";
        }
    }
    else
    {
        echo "Error:3";
    }
}
else
{
    echo "Error:4";
}
?>