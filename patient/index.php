<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Dashboard</title>

</head>
<body>
    <?php include("../include/header.php");
          include("../include/connection.php"); 
    ?>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 " style="margin-left: -30px;">
                <?php include("sidenav.php"); ?>
            </div>

            <!-- Main Content -->
            <div class="col-md-10">

                    <h5 class="my-3">Patient Dashboard</h5>

                    <div class="col-md-12">
                        <div class="row">
                            <div class="row">
                                <div class="col-md-3 bg-info mx-2" style="height: 150px;">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h5 class="text-white my-4">My Profile</h5>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="profile.php">
                                                    <i class="fa fa-user-circle fa-3x my-4 " style="color:white;"></i>
                                                </a>
                                            </div>
                                        </div>


                                    </div>

                                </div>
                                <div class="col-md-3 bg-warning mx-2" style="height: 150px;">
                                    
                                 <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h5 class="text-white my-4">Book Appointment</h5>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="appointment.php">
                                                    <i class="fa fa-calendar fa-3x my-4 " style="color:white;"></i>
                                                </a>
                                            </div>
                                        </div>
                                </div>
                                    </div>
                             
                                <div class="col-md-3 bg-success mx-2" style="height: 150px;">
                                <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h5 class="text-white my-4">My Invoice</h5>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="invoice.php">
                                                    <i class="fas fa-file-invoice-dollar fa-3x my-4 " style="color:white;"></i>
                                                </a>
                                            </div>
                                        </div>
                                </div>
                                    </div>
                              
                            </div>
                        </div>

                        <?php
                         if(isset($_POST['send'])){
                            $title = $_POST['send'];
                            $message=$_POST['message'];
                         

                            if(empty($title)){

                            }elseif(empty($message)){

                            }else{
                                $user=$_SESSION['patient'];
                                $query="INSERT INTO report(title,message,username,date_send) VALUES ('$title','$message','$user',NOW())";  
                            $res = mysqli_query($connect,$query);      
                        if($res) {
                            echo"<script>alert('You have sent Your Report')</script>";
                        }              }
                        }
                        
                        ?>


                        <div class="col-md-12">
                           <div class="col-md-3"></div>
                           <div class="col-md-5 bg-light p-4 my-3 border rounded  my-5">
                            <h5 class="text-center my-2">Send A Report</h5>
                            <form method="post">
                                <label>Title</label>
                                <input type="text" name="title" autocomplete="off" class="form-control" placeholder="Enter Title of the report">
                                <label>Message</label>
                                 <input type="text" name="message" autocomplete="off" class="form-control" placeholder="Enter Message">
                                 
                                 <input type="submit" name="send" value="Send Report" class="btn btn-success my-4">
                                </form>



                           </div>
                           <div class="col-md-3"></div>
                    
                        </div>


                    </div>
                
            </div>
        </div>
    </div>

    
</body>
</html>
