<?php 
include_once 'config/Database.php';
include_once 'class/Subscription.php';

$database = new Database();
$db = $database->getConnection();
$subscriber = new Subscription($db);

$verifyMessage = '';
if(!empty($_GET['email_verify'])){     
	$token = $_GET['email_verify']; 	
	$subscriber->verify_token = $token;
    if($subscriber->isValidToken()){ 
       	$subscriber->is_verified = 1;        
        if($subscriber->update()) { 
            $verifyMessage = '<p class="success">Your email address has been verified successfully.</p>'; 
        } else { 
            $verifyMessage = '<p class="error">Some problem occurred on verifying your email, please try again.</p>'; 
        } 
    } else { 
        $verifyMessage = '<p class="error">You have clicked on the wrong link, please check your email and try again.</p>'; 
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<title>!!!TEST!!!</title>
<div class="content"> 
	<div class="container-fluid">
		<h2>!!!TEST!!!</h2>
		<div class="row">
			<div class="col-lg-12">
				<?php echo $verifyMessage; ?>
			</div>
		</div>	 
	</div>       
</div>   		
</body>
</html>

