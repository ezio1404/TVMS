<?php
    include_once 'model/vdriversModel.php';
    $vdrivers = new Vdrivers();
    $id = $_GET['id'];
    $vdrivers->deleteVdrivers(array($id));
    header("location:vdrivers.php");
?>