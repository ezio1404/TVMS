<?php
    include_once 'model/vehicleModel.php';
    $vehicle = new Vehicle();
    $id = $_GET['id'];
    $vehicle->deleteVehicle(array($id));
    //header("location:vehicles.php");
?>