<?php
    include_once 'model/enforcerModel.php';
    $enforcer = new Enforcer();
    $status = $_GET['status'];
    $id = $_GET['id'];
    if($status == 'Active'){
        $stats = 'Inactive';
        $enforcer->stats($stats,$id);
        echo "<script> window.location='enforcer.php'; </script>";
    }
    else{
        $stats = 'Active';
        $enforcer->stats($stats,$id);
        echo "<script> window.location='enforcer.php'; </script>";
    }
?>