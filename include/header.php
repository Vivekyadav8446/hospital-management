<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
      <script src="https://code.jquery.com/jquery-3.7.1.slim.js"
        integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.6.0/css/fontawesome.min.css">
    <link rel="stylesheet" type="text/css"
        herf="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-info bg-info">
        <h5 class="text-white">Hospital Management System</h5>
        <div class="mr-auto"></div>
        <ul class="navbar-nav">




            <?php
            if (isset($_SESSION['admin'])) {

                $user = $_SESSION['admin'];

                echo ' 
             <li class="nav-item"><a href="#" class="nav-link text-white">admin</a></li>
             <li class="nav-item"><a href="logout.php" class="nav-link text-white">logout</a></li>          
           ';
            } else if (isset($_SESSION['doctor'])) {
                $user = $_SESSION['doctor'];

                echo ' 
                <li class="nav-item"><a href="#" class="nav-link text-white">' . $user . '</a></li>
                <li class="nav-item"><a href="logout.php" class="nav-link text-white">logout</a></li>          
              ';

            } elseif (isset($_SESSION['patient'])) {

                $user = $_SESSION['patient'];


                echo ' 
                <li class="nav-item"><a href="#" class="nav-link text-white">' . $user . '</a></li>
                <li class="nav-item"><a href="logout.php" class="nav-link text-white">logout</a></li>          
              ';


            } else {

                echo '
            <li class="nav-item"><a href="index.php" class="nav-link text-white" style=" text-align: center;">Home</a><li>

            <li class="nav-item"><a href="adminloigin.php" class="nav-link text-white" style=" text-align: center;">Admin</a><li>
            
            <li class="nav-item"><a href="doctorlogin.php" class="nav-link text-white">Doctor</a></li>
            <li class="nav-item"><a href="patientlogin.php" class="nav-link text-white">Patient</a></li>
';
            }


            ?>


        </ul>
    </nav>
    <style>
        .navbar {
            display: flex;
            justify-content: center;
            /* Centers the entire content horizontally */
            align-items: center;
            /* Centers the content vertically */
            padding: 0.5rem 2rem;
            /* Adjusts padding for better appearance */
        }



        .navbar-nav {

            flex-grow: 1;
            /* Ensures the nav items also expand */
            justify-content: center;
            /* Centers the nav items horizontally */
        }

        .nav-item {
            margin: 0 10px;
            /* Adds spacing between items */
        }
    </style>
</body>

</html>