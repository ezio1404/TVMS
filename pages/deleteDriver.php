<?php
    include_once 'model/driverModel.php';
    $driver = new Driver();
    $id = $_GET['id'];
    $driver->deleteDriver(array($id));
    header("location:driver.php");
?>