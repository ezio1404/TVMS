<?php
  include_once 'model/agencyModel.php';
  $agency = new Agency();

  if(isset($_POST['adds'])){

    $sender = $_POST['sender'];
    $code = $_POST['code'];
    $sub = 'Active';
    $new = $_POST['sub'];
    $current = date("Y-m-d");

    $image = "image/".$_FILES['image']['name'];
            $imageType = strtolower(pathinfo($image,PATHINFO_EXTENSION));
            $checkimage = getimagesize($_FILES['image']['tmp_name']);
            if($checkimage !== false){
                if($imageType != "jpg" && $imageType != "png" && $imageType != "jpeg" && $imageType != "gif"){

                }else{
                    move_uploaded_file($_FILES['image']['tmp_name'],$image);
                    if($new == "+1 Year"){
                      $exp = Date('Y-m-d', strtotime($new));
                      $fee = 5000;
                      $agency->addSub(array($image,$sender,$code,$_SESSION['pay'],$current,$exp,$fee));
                      unset($_SESSION['pay']);
                  }
                }
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
    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>


</head>
  <body class="">
    <img class="center" src="../dist/images/logo2.png" alt="" width="500">
    
    <form class="form-signin" method="POST" enctype="multipart/form-data">
    <h1 class="h3 mb-3 font-weight-normal text-center">Payment</h1>
    <!--     <i class="h3 mb-3 font-weight-normal">Step 1</i><br><br>
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
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="adds">Register</button>-->

        <div class="form-group text-center">
          <label class="hover" for="image">
          <img src="image/receipt.png" id="preview" data-tooltip="true" title="Upload service image" data-animation="false" alt="Driver image" style="width:200px;height:200px" ><br>
          </label><input type="file" name="image" onchange="loadImage(event)" style="visibility:hidden" id="image"></div><br>
        <input type="text" name="sender" class="form-control" placeholder="Sender Name"><br>
        <input type="text" name="code" class="form-control" placeholder="Receipt Code"><br>
        <select name="sub" class="form-control">
          <option selected disabled>Select Subscription</option>
          <option value="+3 Month">3 Months</option>
          <option value="+6 Month">6 Months</option>
          <option value="+1 Year">1 Year</option>
        </select>

        <div id="pay"></div>
        <script>
            paypal.Buttons().render('#pay');
        </script><br>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="adds">Done</button>
    </form>
    <h5 class="text-center">Want to go back? Click <a href="index.php" style="text-decoration:none">here!</a></h5>
    <p class="mt-5 mb-3 text-muted text-center">&copy; 2018-2019</p>
  </body>
    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Load the required checkout.js script -->
    <script src="https://www.paypalobjects.com/api/checkout.js" data-version-4></script>

    <!-- Load the required Braintree components. -->
    <script src="https://js.braintreegateway.com/web/3.39.0/js/client.min.js"></script>
    <script src="https://js.braintreegateway.com/web/3.39.0/js/paypal-checkout.min.js"></script>

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

    function loadImage(){
      var loadImg = document.getElementById('preview');
      loadImg.src = URL.createObjectURL(event.target.files[0]);
    }
  </script>
  
</html>
