<?php
  include_once 'model/agencyModel.php';
  $agency = new Agency();
  if(isset($_POST['add'])){
    $name = $_POST['name'];
    $head = $_POST['head'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];
    $addr1 = $_POST['addr1'];
    $addr2 = $_POST['addr2'];
    $tel1 = $_POST['tel1'];
    $tel2 = $_POST['tel2'];
    if($password != $confirm){
      header("location:register.php?e=Password not matched!");
    }

  }

  if(isset($_POST['adds'])){
    $name = $_POST['name'];
    $head = $_POST['head'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $addr1 = $_POST['addr1'];
    $addr2 = $_POST['addr2'];
    $tel1 = $_POST['tel1'];
    $tel2 = $_POST['tel2'];
    $status = 'Active';
    $sub = 'Active';
    $new = $_POST['sub'];
    $current = date("Y-m-d");
    if($new == "+1 Month"){
        $exp = Date('Y-m-d', strtotime($new));
        $fee = 0;
        $agency->addAgency(array($name,$head,$email,$password,$addr1,$addr2,$tel1,$tel2,$status,$current,$exp,$fee,$sub));
        echo "<script> window.location='index.php'; </script>";
    }
    else if($new == "+3 Month"){
        $exp = Date('Y-m-d', strtotime($new));
        $fee = 500;
        $agency->addAgency(array($name,$head,$email,$password,$addr1,$addr2,$tel1,$tel2,$status,$current,$exp,$fee,$sub));
        echo "<script> window.location='index.php'; </script>";
    }
    else if($new == "+6 Month"){
        $exp = Date('Y-m-d', strtotime($new));
        $fee = 1000;
        $agency->addAgency(array($name,$head,$email,$password,$addr1,$addr2,$tel1,$tel2,$status,$current,$exp,$fee,$sub));
        echo "<script> window.location='index.php'; </script>";
    }
    else if($new == "+1 Year"){
        $exp = Date('Y-m-d', strtotime($new));
        $fee = 2000;
        $agency->addAgency(array($name,$head,$email,$password,$addr1,$addr2,$tel1,$tel2,$status,$current,$exp,$fee,$sub));
        echo "<script> window.location='index.php'; </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="TVMS-Traffic Violation And Management System">
    <meta name="author" content="Potot,EJ Anton S.">

    <title>TVMS</title>
    <link rel="icon" href="../dist/images/tvms-1.png"  > 
    
    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../dist/css/signin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


</head>

  <body class="">
    <img class="center" src="../dist/images/logo2.png" alt="" width="500">
    
    <form class="form-signin" method="POST">
      <h1 class="h3 mb-3 font-weight-normal text-center">Registeration</h1>
      <i class="h3 mb-3 font-weight-normal">Step 2</i><br><br>
      <input type="hidden" name="name" value="<?php echo $name ?>" class="form-control" required autofocus>
      <input type="hidden" name="head" value="<?php echo $head ?>" class="form-control" required autofocus>
      <input type="hidden" name="email" value="<?php echo $email ?>" class="form-control" required autofocus>
      <input type="hidden" name="password" value="<?php echo $password ?>" class="form-control" required>
      <input type="hidden" name="addr1" value="<?php echo $addr1 ?>" class="form-control" required autofocus>
      <input type="hidden" name="addr2" value="<?php echo $addr2 ?>" class="form-control" required autofocus>
      <input type="hidden" name="tel1" value="<?php echo $tel1 ?>" class="form-control"  required autofocus>
      <input type="hidden" name="tel2" value="<?php echo $tel2 ?>" class="form-control" required autofocus>
      <select name="sub" class="form-control">
        <option selected disabled>Select Subscription</option>
        <option value="+1 Month">Free trial</option>
        <option value="+3 Month">3 Months</option>
        <option value="+6 Month">6 Months</option>
        <option value="+1 Year">1 Year</option>
      </select>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="adds">Register</button>
      <a href="register.php" class="btn btn-lg btn-primary btn-block" style="text-decoration:none">Go back</a>
      <p class="mt-5 mb-3 text-muted text-center">&copy; 2017-2018</p>
    </form>
  </body>
</html>
