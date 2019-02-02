<?php 
    include_once 'model/agencyModel.php';
    if(isset($_SESSION['id']) && isset($_SESSION['head'])){
        session_unset();
        session_destroy();
        echo "<script> window.location='index.php'; </script>";
    }
    else{
        echo "<script> window.location='index.php'; </script>";
    }
?>