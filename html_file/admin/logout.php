<?php
        
        session_start();
    
        // clear all session variables
        session_unset();
        $_SESSION[]=array();
        
        // destroy the session
        session_destroy();
        
        header("Location: ../../index.php");
?>
