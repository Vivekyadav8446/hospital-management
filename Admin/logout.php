<?php
session_start(); // Start the session

if (isset($_SESSION['admin'])) {
    
    unset($_SESSION['admin']);
}




header("Location: ../index.php");

?>
