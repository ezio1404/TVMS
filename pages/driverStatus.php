<?php
    include_once 'model/driverModel.php';
    $driver = new Driver();
    $status = $_GET['status'];
    $id = $_GET['id'];
    if($status == 'Active'){
        $stats = 'Inactive';
        $driver->stats($stats,$id);
        echo "<script> window.location='driver.php'; </script>";
    }
    else{
        $stats = 'Active';
        $driver->stats($stats,$id);
        echo "<script> window.location='driver.php'; </script>";
    }
?>