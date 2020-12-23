<?php
    session_start();
    
    if($_SESSION['identificado']!="SI"){
        header('location:Layout.php');
        exit();
    }

?>