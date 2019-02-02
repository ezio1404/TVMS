<?php
    include_once 'model/enforcerModel.php';
    $enforcer = new Enforcer();
    $id = $_GET['id'];
    $enforcer->deleteEnforcer(array($id));
    header("location:enforcer.php");
?>