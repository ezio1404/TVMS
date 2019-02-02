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
    
    <form class="form-signin" method="POST" action="register2.php">
      <h1 class="h3 mb-3 font-weight-normal text-center">Registeration</h1>
      <i class="h3 mb-3 font-weight-normal">Step 1</i><br><br>
      <input type="text" name="name" class="form-control" placeholder="Agency name" required autofocus>
      <input type="text" name="head" class="form-control" placeholder="Agency head" required autofocus>
      <input type="text" name="email" class="form-control" placeholder="Email address" required autofocus>
      <input type="password" name="password" class="form-control" placeholder="Password" required>
      <input type="password" name="confirm" class="form-control" placeholder="Confirm Password" required>
      <input type="text" name="addr1" class="form-control" placeholder="Address 1" required autofocus>
      <input type="text" name="addr2" class="form-control" placeholder="Address 2" required autofocus>
      <input type="number" name="tel1" class="form-control" placeholder="Tel no. 1" required autofocus>
      <input type="number" name="tel2" class="form-control" placeholder="Tel no. 2" required autofocus>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="add">Proceed</button>
      <h5 class="text-center">Already have an account? Click <a href="index.php" style="text-decoration:none">here!</a></h5>
      <p class="mt-5 mb-3 text-muted text-center">&copy; 2017-2018</p>
    </form>
  </body>
</html>
