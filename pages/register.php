<?php
  include_once 'model/agencyModel.php';
  $agency = new Agency();

  if(isset($_POST['adds'])){
    $name = $_POST['name'];
    $head = $_POST['head'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];
    $addr1 = $_POST['addr1'];
    $addr2 = $_POST['addr2'];
    $tel1 = $_POST['tel1'];
    $tel2 = $_POST['tel2'];
    $status = 'Active';
    $sub = 0;
    if($password == $confirm){
      $agency->addAgency(array($name,$head,$email,$password,$addr1,$addr2,$tel1,$tel2,$status,$sub));
      echo "<script> window.location='index.php'; </script>";
    }else{
      echo "<script> window.location='register.php'; </script>";
    }
  }
    /*$sub = 'Active';
    $new = $_POST['sub'];
    $current = date("Y-m-d");
    if($password == $confirm){
      if($new == "+3 Month"){
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
    }else{
      echo "<script> window.location='register.php'; </script>";
    } */
    

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
    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>


</head>
    <style type="text/css">
      #form1 {
          display: block;
      }
      #form2 {
          display: none;
      }
      #cmd{
        display: none;
      }
    </style>
  <body class="">
    <img class="center" src="../dist/images/logo2.png" alt="" width="500">
    
    <form class="form-signin" method="POST">
    <h1 class="h3 mb-3 font-weight-normal text-center">Registeration</h1>
        <input type="text" name="name" class="form-control" placeholder="Agency name" required autofocus>
        <input type="text" name="head" class="form-control" placeholder="Agency head" required autofocus>
        <input type="text" name="email" class="form-control" placeholder="Email address" required autofocus>
        <input type="password" name="password" id="password1" class="form-control password" placeholder="Password" required>
        <input type="password" name="confirm" id="password2" class="form-control password" placeholder="Confirm Password" required>
        <label id="cmd"></label>
        <input type="text" name="addr1" class="form-control" placeholder="Address 1" required autofocus>
        <input type="text" name="addr2" class="form-control" placeholder="Address 2" required autofocus>
        <input type="number" name="tel1" class="form-control" placeholder="Tel no. 1" required autofocus>
        <input type="number" name="tel2" class="form-control" placeholder="Tel no. 2" required autofocus>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="adds">Register</button>
      <!-- <div id="form2">
        <i class="h3 mb-3 font-weight-normal">Step 2</i><br><br>
        <select name="sub" class="form-control">
          <option selected disabled>Select Subscription</option>
          <option value="+3 Month">3 Months</option>
          <option value="+6 Month">6 Months</option>
          <option value="+1 Year">1 Year</option>
        </select>
        <div id="paypal-button-container"></div><br>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="adds">Register</button>
        <button class="btn btn-lg btn-primary btn-block" id="back">Go back</button>
      </div> -->
    </form>
    <h5 class="text-center">Already have an account? Click <a href="index.php" style="text-decoration:none">here!</a></h5>
    <p class="mt-5 mb-3 text-muted text-center">&copy; 2018-2019</p>
  </body>
    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

  <script type="text/javascript">
    $(".password").keyup(function(){
      if($("#password1").val() === "" && $("#password2").val() === ""){
          $("#cmd").css("display", "none");
      }
      else{
          if($("#password1").val() == $("#password2").val()){
            $("#cmd").css({color:'green'});
            $("#cmd").html("Password Match!");
            $("#cmd").css("display","block");
        }
        else if($("#password1").val() != $("#password2").val()){
          $("#cmd").css({color:'red'});
          $("#cmd").html("Password Doesn't Match!");
          $("#cmd").css("display","block");
        }
      }
      
    });
         
         $("#proceed").click(function(e){
            e.preventDefault();
            $("#form1").css("display","none");
            $("#form2").css("display","block");
         });
         $("#back").click(function(e){
            e.preventDefault();
            $("#form1").toggle();
            $("#form2").toggle();
         });
    
  </script>
</html>
