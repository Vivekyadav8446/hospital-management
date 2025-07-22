<?php
include("include/connection.php");

if(isset($_POST['apply'])){

    $firstname = $_POST['fname'];
    $surname = $_POST['sname'];
    $username = $_POST['uname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $country = $_POST['country'];
    $password = $_POST['pass'];
    $confirm_password = $_POST['con_pass'];



    $error = array();

    if (empty($firstname)){
        $error['apply'] = "Enter Firstname";
    }elseif (empty($surname)){
        $error['apply'] = "Enter Surname";
    }elseif(empty($username)){
        $error['apply'] = "Enter Username";
    }elseif(empty($email)){
        $error['apply'] = "Enter Email Address";
    }elseif($gender == ""){
        $error['apply'] = "Select Your Gender";
    }elseif(empty($phone)){
        $error['apply'] = "Enter Phone Number";
    }elseif($country == ""){
        $error['apply'] = "Select Your Country";
    }elseif(empty($password)){
        $error['apply'] = "Enter Password";
    }elseif($confirm_password != $password){
        $error['apply'] = "Both Password do not match";
    }

    if(count($error) == 0){
        $query = "INSERT INTO doctors(firstname,surname,username,email,gender,phone,country,password,salary,data_reg,status,profile) VALUES('$firstname','$surname','$username','$email','$gender','$phone','$country','$password','0',NOW(),'Pendding','doctor.jpg')";

        $result = mysqli_query($connect,$query);
         if($result){
            echo"<script>alert('You have Successfully Appled')</script>";

            header("Location: doctorlogin.php");
         }else{
            echo"<script>alert('Failed')</script>";
         }
    }

}
if(isset($error['apply'])){
    $s = $error['apply'];

    $show = "<h5 class='text-center alert alert-danger'>$s</h5>";
}else{
    $show = "";
} 



?>





<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>Apply Now!!!</title>
</head>
<body>
    <?php
      include("include/header.php");
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3">

             </div>
                <div class="col-md-6 bg-light p-4 my-3 border rounded">
                <h5 class="text-center my-2">Apply Now!!!</h5>
                    
                <div>
                        <?php  echo  $show;  ?>
                     </div>
                <form method="post">
                    <div class="form-group">
                        <label>Firstname</label>
                        <input type="text" name="fname" class="form-control"
                        autocomplete="off" placeholder="Enter Firstname" 
                        value="<?php  if(isset($_POST['fname'])) echo $_POST['fname']; ?>">
                        
                    </div>
                    <div class="form-group">
                    <label>Surname</label>
                        <input type="text" name="sname" class="form-control" 
                         autocomplete="off" placeholder="Enter Surname" 
                          value="<?php if(isset($_POST['sname'])) echo $_POST['sname']; ?>">

                        
                    </div>
                    <div class="form-group">
                    <label>Username</label>
                        <input type="text" name="uname" class="form-control"
                        autocomplete="off" placeholder="Enter Email Address"  
                        value="<?php  if(isset($_POST['uname'])) echo $_POST['uname']; ?>">
                        
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control"
                        autocomplete="off" placeholder="Enter Email Address"  value="
                        <?php  if(isset($_POST['email'])) echo $_POST['email']; ?>">
                        
                    </div>
                   
                    <div class="form-group">
                        <label>Select Gender</label>
                        <select name="gender" class="form-control">
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>

                        </select>
                    </div>

                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="number" name="phone" class="form-control"
                        autocomplete="off" placeholder="Enter Mobile Number"  value="
                        <?php  if(isset($_POST['phone'])) echo $_POST['phone']; ?>">
                        
                    </div>
                   
                    <div class="form-group">
                        <label>Select Country</label>
                        <select name="country" class="form-control">
                            <option value="">Select Country</option>

                             <option value="AU">Australia</option>
                             <option value="BD">Bangladesh</option>
                             <option value="CA">Canada</option>
                              <option value="IN">India</option>
                             <option value="KR">Korea, South</option>
                               <option value="NZ">New Zealand</option>
                               <option value="RU">Russian Federation</option>
                               <option value="ZA">South Africa</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="pass" class="form-control"
                        autocomplete="off" placeholder="Enter Password">
                        
                    </div>

                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="con_pass" class="form-control"
                        autocomplete="off" placeholder="Enter Password">
                        
                    </div>
                    <input type="Submit" name="apply" value="Apply Now" class="btn btn-success">

                    <p>I already have an account <a href="doctorlogin.php">Click here</a> </p>
                </form>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</body>
</html>