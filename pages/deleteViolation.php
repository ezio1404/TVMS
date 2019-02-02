<?php
    include_once 'model/vpModel.php';
    $violation = new Violation();
    $id = $_GET['id'];
    $violation->deleteViolation(array($id));
    header("location:vp.php");
?>