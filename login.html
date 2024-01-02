<?php

//$otp=rand(00000,99999);

include("db.php");
if($_SERVER['REQUEST_METHOD']=="POST")
{
  $first_name = $_POST['name'];   
  $email =$_POST['email'] ;
}
if(!empty($first_name) && !empty($email))
{
    $query = "select * from form where name = '$first_name' limit 1";
    $result = mysqli_query($conn,$query);


    if($result)
    {
        if($result && mysqli_num_rows($result)>0)
        {
             $u_data = mysqli_fetch_assoc($result);
             if($u_data['email']==$email)
             {
               header("location:verify.html"); 
               die;
             }
        }
    } 
     echo "<script type='text/javascript'>alert('Name and Email id does not match' )</script>";
}
else{
    echo "<script type='text/javascript'>alert('Email id does not exist,register first')</script>";

}
?>