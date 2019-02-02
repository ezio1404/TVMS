<?php
    include_once 'model/licenseModel.php';
    $license = new License();
    $status = $_GET['status'];
    $id = $_GET['id'];
    if($status == 'Active'){
        $stats = 'Inactive';
        $license->stats($stats,$id);
        echo "<script> window.location='license.php'; </script>";
    }
    else{
        $stats = 'Active';
        $license->stats($stats,$id);
        echo "<script> window.location='license.php'; </script>";
    }
?>