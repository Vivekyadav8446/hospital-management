<?php
session_start(); // Start the session

if (isset($_SESSION['patient'])) {
    
    unset($_SESSION['patient']);
}




header("Location: ../index.php");

?>