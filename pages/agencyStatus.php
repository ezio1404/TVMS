<?php
    require_once 'model/agencyModel.php';
    $agency = new Agency();
    $status = $_GET['status'];
    $id = $_GET['id'];
    if($status == 'Active'){
        $stats = 'Inactive';
        $agency->stats($stats,$id);
        echo "<script> window.location='adminAgency.php'; </script>";
    }
    else{
        $stats = 'Active';
        $agency->stats($stats,$id);
        echo "<script> window.location='adminAgency.php'; </script>";
    }
?>