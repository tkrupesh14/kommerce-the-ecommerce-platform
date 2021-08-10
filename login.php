<?php
require './top.inc.php';

if(isset($_POST['register'])){
    $name = get_safe_value($con, $_POST['name']);
    $email = get_safe_value($con, $_POST['email']);
    $mobile = get_safe_value($con, $_POST['mobile']);
    $password = get_safe_value($con, $_POST['password']);

    $ck_user = mysqli_num_rows(mysqli_query($con, "SELECT * FROM users where email = '$email'"));
    if($ck_user>0){
        echo "<script>alert('$email, is already exists use another email') </script>";
    }
    else{
        $sql = "INSERT INTO users (name, password, email, mobile) VALUES ('$name', '$password', '$email', '$mobile')";
        $run = mysqli_query($con, $sql);
       

        if($run){
            echo "<script>alert('$name, Welcome to Kommerce! Now Login') </script>";
            echo "<script>window.location.href = 'login.php'</script>";
        }else{
			echo "<script>alert('$name, Please try again') </script>";
            
        }
    }
}
if(isset($_POST['login'])){
	
	$email = get_safe_value($con, $_POST['Loginemail']);
	
    $password = get_safe_value($con, $_POST['Loginpassword']);
	$sql = "SELECT * FROM users where email = '$email' AND password = '$password'";
	$run = mysqli_query($con, $sql);
    $ck_user = mysqli_num_rows($run);
    if($ck_user>0){
		$row = mysqli_fetch_assoc($run);
        $_SESSION['USER_LOGIN']='yes';
        $_SESSION['USER_ID']=$row ['id'] ;
        $_SESSION['USER_NAME']=$row ['name'] ;
        echo "<script>alert('$email, Welcome Back!') </script>";
		echo "<script>window.location.href = 'index.php'</script>";

    }
    else{

            echo "<script>alert('$email, Please try again or Register') </script>";
            
        }
    }

?>
<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/bg.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.html">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">Login</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
  <section class="htc__contact__area ptb--100 bg__white">
            <div class="container">
                <div class="row">
					<div class="col-md-6">
						<div class="contact-form-wrap mt--60">
							<div class="col-xs-12">
								<div class="contact-title">
									<h2 class="title__line--6">Login</h2>
								</div>
							</div>
							<div class="col-xs-12">
								<form id="contact-form"  method="post">
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="email" name="Loginemail" placeholder="Your Email*" style="width:100%">
										</div>
									</div>
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="password" name="Loginpassword" placeholder="Your Password*" style="width:100%">
										</div>
									</div>
									
									<div class="contact-btn">
										<button type="submit" class="fv-btn" name="login">Login</button>
									</div>
								</form>
								<div class="form-output">
									<p class="form-messege"></p>
								</div>
							</div>
						</div> 
                
				</div>
				

					<div class="col-md-6">
						<div class="contact-form-wrap mt--60">
							<div class="col-xs-12">
								<div class="contact-title">
									<h2 class="title__line--6">Register</h2>
								</div>
							</div>
							<div class="col-xs-12">
								<form method="post" >
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="text" name="name" placeholder="Your Name*" style="width:100%" id="name" >
										</div>
									</div>
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="email" name="email" placeholder="Your Email*" style="width:100%" id="email"  >
										</div>
										<span id="email_otp_result" style="font-size: 16px; font-family: poppins; color:green;"></span>
										<span id="email_error" style="font-size: 16px; font-family: poppins; color:red;"></span>
										
									
									</div>
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="number" name="mobile" placeholder="Your Mobile*" style="width:100%" id="mobile" >
										</div>
									</div>
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="password" name="password" placeholder="Your Password*" style="width:100%" id="password" >
										</div>
									</div>
									
									<div class="contact-btn">
										<button type="submit" class="fv-btn" name="register" >Register</button>
									</div>
								</form>
								<div class="form-output">
									<p class="form-messege"></p>
									
								</div>
							</div>
						</div> 
                
				</div>
				</div>
					
            </div>
        </section>
		
		<?php

	
		?>
<?php require './footer.inc.php';?>