<?php
include("include/connection.php");
if (isset($_POST['create'])){

    $fname = $_POST['fname'];
    $sname = $_POST['sname'];
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $country = $_POST['country'];
    $password = $_POST['pass'];
    $con_pass = $_POST['con_pass'];


    $error = array();


    if(empty($fname)){
        $error['ac']= "Enter Firstname";
    }elseif(empty($sname)){
        $error['ac']="Enter Surname";
    }elseif(empty($uname)){
        $error['ac']="Enter Username";
    }elseif(empty($email)){
        $error['ac']="Enter Email";
    }elseif(empty($phone)){
        $error['ac']="Enter Phone Number";
    }elseif($gender==""){
        $error['ac']="Select Your Gender";
    }elseif($country==""){
        $error['ac']="Select Your Country";
    }elseif(empty($password)){
        $error['ac']="Enter Password";
    }elseif($con_pass != $password){
        $error['ac']="Both password do not match";
    }

    if(count($error)==0){
        $query = "INSERT INTO patient(firstname, surname, username, email, phone,gender, country, password, date_reg,profile) VALUES ('$fname','$sname','$uname','$email','$gender','$phone','$country','$password',NOW(),'patient.jpg')";

        $res = mysqli_query($connect,$query);
        if($res){

            header("Location:patientlogin");
        }else{
            echo"<script>alert('failed')/script>";
        }
    }

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
</head>
<body>
    <?php
    include("include/header.php");
    ?>
     <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 my-5 bg-light p-4 my-3 border rounded" >
                    <h5 class="text-center text-info my-2">Create Account</h5>
                    <form method="post">
                        <div class="form-group">
                            <label>Firstname</label>
                            <input type="text" name="fname" class="form-control"
                            autocomplete="off" placeholder="Enter Firstname">
                        </div>
                        <div class="form-group">
                            <label>Surname</label>
                            <input type="text" name="sname" class="form-control"
                            autocomplete="off" placeholder="Enter Surname">
                        </div>
                        <div class="form-group">

                        <label>Username</label>
                        <input type="text" name="uname" class="form-control"
                        autocomplete="off" placeholder="Enter Email Address"> 
                       
                        
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control"
                        autocomplete="off" placeholder="Enter Email Address">
                        
                    </div>

                    <div class="form-group">
                            <label>Phone No</label>
                            <input type="number" name="phone" class="form-control"
                            autocomplete="off" placeholder="Enter Phone Number">
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
                        <label>Select Country</label>
                        <select name="country" class="form-control">
                            <option value="">Select Your Country</option>

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
                        <input type="submit" name="create" class="btn btn-info my-3" value="Create Account">
                        <p>I alredy have an account <a href="patientlogin.php">Click hera.</a></p>
                    </form>

                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
</body>
</html>