<?php
    require_once 'model/hotlineModel.php';
    $hotline = new Line();
    $id = $_GET['id'];
    $hotline->deleteHotline(array($id));
    //header("location:hotline.php");
?>