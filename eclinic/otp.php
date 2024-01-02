<?php
include("home.php");
$email=$_POST['email'];
$otp=$_POST['otp'];

$to=$email;
$from="noreply@eclinicwork.com";
$fromName="E-Clinic Works";
$subject="OTP Authentication";
$message="Your OTP is: ".$otp;
$header='From:'.$fromName.'<'.$from.'>';
if(mail($to,$subject,$message,$header)){
    $msg="Sucessful";
}
?>

<form action="submitotp.php" method="POST">
    Enter OTP
    <input type="number" name="checkotp" placeholder="Enter OTP">
    <input type="hidden" name="otp" value="<?php echo $otp; ?>">
    <button type="submit"> Verify</button>
</form>
