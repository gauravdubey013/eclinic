<?php
$checkotp=$_POST['checkotp'];
$otp=$_POST['otp'];

if($checkotp==$otp){
    echo "OTP Verified";
}else{
    echo "Incorrect OTP";
}
?>