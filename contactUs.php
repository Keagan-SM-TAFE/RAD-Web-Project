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
    <form action="includes_php\phpActions\sendMessage.php" method="POST" class="form">
        <div class="mb-3">
            <label for="name" class="form-label">Your Name</label>
            <input type="text" class="form-control form-control-lg" id="name" name="name" placeholder="Enter Name..." tabindex="1" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Your Email</label>
            <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Enter Email..." tabindex="2" required>
        </div>
        <div class="mb-3">
            <label for="subject" class="form-label">Subject</label>
            <input type="text" class="form-control form-control-lg" id="subject" name="subject" placeholder="Enter Subject..." tabindex="3" required>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea class="form-control form-control-lg" rows="5" cols="50" id="message" name="message" placeholder="Enter Message..." tabindex="4"></textarea>
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