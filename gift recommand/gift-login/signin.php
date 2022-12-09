<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php

include 'config.php'
?>

    <div class="bgtext_signin">

    <div class="leftbox">
        <h1>    Sign in Here</h1>

        <form action="/LOGIN-GIFTREC/signin.php" method="POST" >
           <input type="text" class="inputbox" placeholder="Enter the username" name="username" required>
           
           <!-- <input type="email" class="inputbox" placeholder="Enter Emailid" name="email" required> -->
           
           <input type="password" class="inputbox" placeholder="Enter the password" name="password" required>
           
           <!-- <input type="Password" class="inputbox" placeholder="Enter Confirm Password" required> -->

           <button name="submit" class="submitbutton">Sign In</button>
           <br>
           Don't have an account?  <a href="/LOGIN-GiftREC/signup.php">click here</a>
        </form>

     
        <br>

   
        <span class="righttitle">Sign in with <br> Social Network</span>

        <button class="facebook  - social" >Log in with facebook </button>
        <button class="Twitter  - social">Log in with Twitter </button>
        <button class="google  - social">Log in with Google+ </button>


    </div>
   

      

        <?php

$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] =="POST"){
   
   $username=$_POST["username"];
//    $email=$_POST["email"];
   $password=$_POST["password"];
//    $cpassword=$_POST["cpassword"];
//    $exists=false;

  
       $sql="SELECT * FROM `user_signup` WHERE username = '$username' AND password='$password'  ";
       $result=mysqli_query($con,$sql);

       //it takes how many records are in there 
       $num = mysqli_num_rows($result);

       if($num==1){
       
          $login=true;
          //logged in successfully!
          //now start the session
          session_start();
          $_SESSION['loggedin']=true;
          //set username...
          $_SESSION['username']=$username;


          //when user logged in where to send user !
          header("location:welcome.php");

          //welcome.php -check it user is loggin that? really if not then make user logged out!and send user into login page ..
          //now going on welcome.php to write script
          

       }

       else{
           $showError = "invalid credentials";
           // echo "data can not insert !";
       }
   


   
}
?>

<div class="container">



<?php
if($login){
echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
   <strong>Success!</strong> You are loggod in.
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">×</span>
   </button>
</div> ';
}
if($showError){
echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
   <strong>Error!</strong> '. $showError.'
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">×</span>
   </button>
</div> ';
}
?>

</div>
</div>
</body>
</html>