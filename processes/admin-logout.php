<?php 
    session_start();
    
    if (!empty($_SESSION["admin"])) {
        unset($_SESSION["admin"]);
        header("Location: ../admin-login.php");
    }
?>