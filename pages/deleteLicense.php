<?php
    include_once 'model/licenseModel.php';
    $license = new License();
    $id = $_GET['id'];
    $license->deleteLicense(array($id));
    header("location:license.php");
?>