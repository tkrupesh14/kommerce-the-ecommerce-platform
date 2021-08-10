<?php

require './top.inc.php';


	if(isset($_POST['register'])){
		$email = $_POST['email'];
$_SESSION['EMAIL']= '$email';

		$html = rand(1111,9999);
		mysqli_query($con, "UPDATE users SET email_otp = $html WHERE users.email = '$email'");
        
	$receiver = "$email";
	$subject = "Kommerce OTP Verification";
	$body = "$html";
	$sender = "From:krupesh123vithlani@gmail.com";
	
	if(mail($receiver, $subject, $body, $sender)){
		echo "Email sent successfully to $receiver";
	}else{
		echo "Sorry, failed while sending mail!";
	}
	}
    

?>
<section class="htc__contact__area ptb--100 bg__white">
            <div class="container">
                <div class="row">
					<div class="col-md-12">
						<div class="contact-form-wrap mt--60">
							<div class="col-xs-12">
								<div class="contact-title">
									<h2 class="title__line--6"><center>OTP</center></h2>
								</div>
							</div>
							<div class="col-xs-12">
                                <center>
								<form id="contact-form" action="./ck_otp.php"  method="post">
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="number" name="otp" placeholder="Enter OTP*" style="width:40%; position: relative; left:20rem">
										</div>
									</div>
									
									
									<div class="contact-btn">
									<center>	<button type="submit" class="fv-btn" name="otpBtn">Verify OTP</button></center>
									</div>
								</form>
                                </center>
								<div class="form-output">
									<p class="form-messege"></p>
								</div>
							</div>
						</div> 
                
				</div>
</section>

<?php require './footer.inc.php'; ?>