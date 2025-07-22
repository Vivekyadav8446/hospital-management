<?php

session_start();
include("include/connection.php");


if(isset($_POST['login'])){
  $uname = $_POST['uname'];
  $password = $_POST['pass'];

  $error = array();

  if(empty($uname)){
    $error['login'] = "Enter Username";
  }elseif(empty($password)){
    $error['login'] = "Enter Password";
  }

  if(count($error)==0){
    $query = "SELECT * FROM doctors WHERE username='$uname' AND password='$password'";
    $res = mysqli_query($connect,$query);

    if(mysqli_num_rows($res) > 0){
      $row = mysqli_fetch_array($res);
      
      if($row['status'] == "Pendding"){
        $error['login'] = "Please Wait For the admin to confirm"; 
      }elseif($row['status'] == "Rejected"){
        $error['login'] = "Try again Later";
      }else{
        echo"<script>alert('done')</script>";
        $_SESSION['doctor'] = $uname;
        header("Location:doctor/index.php");
        exit(); // Always exit after header redirect
      }
    }else{
      echo"<script>alert('Invalid Account')</script>";
    }
  }
}
if(isset($error['login'])){
  $l = $error['login'];
  $show = "<h5 class='text-center alert alert-danger '>$l</h5>";
}else{
  $show="";
} 



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-image: url(images/); background-size: cover; background-repeat: no-repeat;">
  <?php
  include("include/header.php");
  ?>  
  <div class="container-fluid">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 bg-light p-4 my-3 border rounded">
          <h5 class="text-center my-2">Doctor Login</h5>

          <div>
            <?php echo  $show; ?>
          </div>
          <form method="post">
            <div class="form-group mb-3">
              <label for="uname">Username</label>
              <input type="text" id="uname" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
            </div>
            <div class="form-group mb-3">
              <label for="pass">Password</label>
              <input type="password" id="pass" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password">
            </div>
            <input type="submit" name="login" class="btn btn-success w-100" value="Login">
            <p class="text-center mt-3">Don't have an account? <a href="apply.php">Apply Now!</a></p>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
