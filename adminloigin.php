


<?php

session_start();
include("include/connection.php");

if(isset($_POST['login']))
{

    $username=$_POST['uname'];
    $password=$_POST['pass'];

    $error=array();

    if(empty($username)){
        $error['admin']="enter username";

    }
    elseif(empty($password)){
        $error['admin']="enter password";
    }
   if(count ($error)==0){
    $query= "SELECT*FROM admin WHERE username='$username' AND password='$password'";
    
    $result = mysqli_query($connect,$query);

    if(mysqli_num_rows($result) ==1){
         echo"<script>alert('You have Login As an admin')</script>";
      
         $_SESSION['admin']=$username;
         header("Location:admin/index.php");
       
    }
    else{
        echo"<script>alert('Invaild username or password')</script>";
    }
   }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Admin Login Page </title>
</head>
<body>
<?php
include("include/header.php");
?>


<div style="margin-top: 60px;"></div>

<div class="container">
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6 bg-light p-4 my-3 border rounded">
      <h5 class="text-center my-3">Admin Login</h5>
        
        <form method="post" class="col-md-12">

        <div class="col-md-3">
      



   <?php
   if(isset($error['admin'])){
       $show=$error['admin'];

       

       

   }

   else{
       $show="";
   }
   echo $show;
   ?>
</div>





          <div class="form-group">
            <label>Username</label>
            <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" name="pass" class="form-control" placeholder="Enter Password">
          </div>
          <input type="submit" name="login"class="btn btn-success my-3">
        </form>
      </div>
    </div>
  </div>
</div>



</body>
</html>         