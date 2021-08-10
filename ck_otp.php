<?php
require './connection.inc.php';

$otp = $_POST['otp'];
$email= $_SESSION['EMAIL'];
$sql = "SELECT * FROM users where email = '$email' and email_otp = '$otp'";

$run = mysqli_query($con, $sql);
$ck_user = mysqli_num_rows($run);
if($ck_user > 0){
    echo "<script> alert('done')</scropt>";
}else{
    
    echo "<script> alert('not done')</scropt>";
}

?>