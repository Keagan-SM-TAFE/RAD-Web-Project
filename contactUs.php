
<?php
$ERROR = "";

use PHPMailer\PHPMailer\PHPMailer;

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    
    $name = $_POST['contactName'];
    $email = $_POST['email'];
    $subject = $_POST['contactSubject'];
    $contactMessage = $_POST['contactMessage'];

    require_once "PHP_Mailer/PHPMailer.php";
    require_once "PHP_Mailer/SMTP.php";
    require_once "PHP_Mailer/Exception.php";

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "thetruth2451@gmail.com";
    $mail->Password = "";
    $mail->Port = 465;
    $mail->SMTPSecure = "ssl";

    $mail->isHTML(true);
    $mail->setFrom("Atuitpou2@gmail.com",$name);
    $mail->addAddress("thetruth2451@gmail.com");
    $mail->Subject = ("$email ($subject)");
    $mail->Body = $contactMessage;

    if($mail->send())
    {
        $status = "success";
        $response = "Email is sent!";
        header("Location: index.php");
    }    
    else
    {
        $status = "failed";
        $response = "Something went wrong: <br>". $mail->ErrorInfo;
    }

    //exit(json_encode(array("status" => $status, "response" => $response)));

}

?>

<!-- START Head -->
<?php require_once "includes_php\\templates\\head.php"; ?>
<script src="main.js"></script>
<!-- END Head -->
<!-- START Body -->
<?php require_once "includes_php\\templates\\navBar.php"; ?>
<!-- START Showcase -->
<?php require_once "includes_php\\templates\\showcase.php"; ?>
<!-- END Showcase -->
<!-- START of Main Website Content -->
<section class="container-fluid">



<?php
if($messageSent):
?>
    <h3>Message sent!! We wil be in touch</h3>
<?php
else:
?>
<div class="container">
    <form action="" method="POST" class="form">
        <div class="mb-3">
            <label for="contactName" class="form-label">Your Name</label>
            <input type="text" class="form-control form-control-lg" id="contactName" 
            name="contactName" placeholder="Enter Name..." tabindex="1" required>
        </div>
        <div class="mb-3">
            <label for="contactEmail" class="form-label">Your Email</label>
            <input type="email" class="form-control form-control-lg" id="contactEmail" 
            name="contactEmail" placeholder="Enter Email..." tabindex="2" required>
        </div>
        <div class="mb-3">
            <label for="contactSubject" class="form-label">Subject</label>
            <input type="text" class="form-control form-control-lg" id="contactSubject" 
            name="contactSubject" placeholder="Enter Subject..." tabindex="3" required>
        </div>
        <div class="mb-3">
            <label for="contactMessage" class="form-label">Message</label>
            <textarea class="form-control form-control-lg" rows="5" cols="50" id="contactMessage" 
            name="contactMessage" placeholder="Enter Message..." tabindex="4"></textarea>
        </div>
        <div>
            <button type="submit" class="btn btn-outline-success btn-lg">Send Message!</button>
        </div>
    </form>
</div>
<?php
endif;
?>
    <br><br><br><br><br><br><br><br><br>
<!-- START Footer -->
<?php require_once "includes_php\\templates\\subscribtionFooter.php"; ?>
<!-- END Footer -->
<!-- END Body -->
<!-- END HTML DOCUMENT -->