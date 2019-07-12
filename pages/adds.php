<?php
    include_once 'model/vehicleModel.php';
    $vehicle = new Vehicle();
    if(isset($_SESSION['id']) && isset($_SESSION['head'])){
        if(isset($_POST['add'])){
            //vehicle
            $plate = $_POST['plate'];
            $brand = $_POST['brand'];
            $color = $_POST['color'];
            $register = $_POST['register'];
            $expire = $_POST['expire'];
            $statusv = $_POST['statusv'];
            $vtype = $_POST['vtype'];
            //license
            $ltype = $_POST['ltype'];
            $res = $_POST['res'];
            $issue = $_POST['issue'];
            $exp = $_POST['exp'];
            $national = $_POST['national'];
            //driver
            $license = $_POST['license'];
            $pin = $_POST['pincode'];
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $mi = $_POST['mi'];
            $p = $_POST['addressP'];
            $c = $_POST['addressC'];
            $mobile = $_POST['mobile'];
            $tel = $_POST['tel'];
            $gender = $_POST['gender'];
            $email = $_POST['email'];
            $password = '';
            $dtype = $_POST['dtype'];
            $bday = $_POST['bday'];
            $status = 'Active';
            $image = "image/".$_FILES['image']['name'];
            $imageType = strtolower(pathinfo($image,PATHINFO_EXTENSION));
            $checkimage = getimagesize($_FILES['image']['tmp_name']);
            if($checkimage !== false){
                if($imageType != "jpg" && $imageType != "png" && $imageType != "jpeg" && $imageType != "gif"){

                }else{
                    move_uploaded_file($_FILES['image']['tmp_name'],$image);
                    $vehicle->addDriver(array($license,$pin,$image,$lname,$fname,$mi,$gender,$bday,$p,$c,$mobile,$tel,$dtype,$email,$password,$status));
                    $vehicle->addVehicle(array($plate,$brand,$color,$register,$expire,$statusv,$vtype));
                    $vehicle->addLicense(array($license,$ltype,$res,$issue,$exp,$national,$status));
                }
            }
        }
    }
    else{
        echo "<script> window.location='index.php'; </script>";
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <style type="text/css">
    #form1 {
        display:block;
    }
    #form2 {
        display:none;
    }
    #form3 {
        display:none;
    }
    </style>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="TVMS-Traffic Violation And Management System">
    <meta name="author" content="Potot,EJ Anton S.">

    <title>TVMS</title>
    <link rel="icon" href="../dist/images/tvms-1.png"  > 
    
    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Datatables CSS-->
    <link rel="stylesheet" href="../dist/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../dist/css/buttons.dataTables.min.css">


</head>

<body>
    <?php include_once "nav.php"; ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                <h1 class="page-header">Driver New Entries</h1>
                <form method="POST" enctype="multipart/form-data">
                    <div id="form1">
                    <h4 class="page-header">Driver</h4><br>
                    <div class="form-group text-center">
                        <label class="hover" for="image">
                        <img src="image/blank.png" id="preview" data-tooltip="true" title="Upload service image" data-animation="false" alt="Driver image" style="width:200px;height:200px" ><br>
                        </label><input type="file" name="image" onchange="loadImage(event)" style="visibility:hidden" id="image"></div>
                        <input type="number" name="pincode" class="form-control" placeholder="Driver Pincode" required autofocus><br>
                        <input type="text" name="fname" class="form-control" placeholder="Firstname" required autofocus><br>
                        <input type="text" name="lname" class="form-control" placeholder="Lastname" required autofocus><br>
                        <input type="text" name="mi" class="form-control" placeholder="Middle Initial" required autofocus><br>
                        <input type="text" name="addressP" class="form-control" placeholder="Provincial Address" required autofocus><br>
                        <input type="text" name="addressC" class="form-control" placeholder="City Address" required autofocus><br>
                        <input type="number" name="mobile" class="form-control" placeholder="Mobile No." required autofocus><br>
                        <input type="number" name="tel" class="form-control" placeholder="Telephone No." required autofocus><br>
                        <p>Gender</p>
                        <input type="radio" name="gender" class="text-center" value="Male" required autofocus>&nbsp&nbsp Male &nbsp&nbsp&nbsp
                        <input type="radio" name="gender" class="text-center" value="Female" autofocus>&nbsp&nbsp Female<br><br>
                        <input type="email" name="email" class="form-control" placeholder="Email" required autofocus><br>
                        <!-- <input type="password" name="password" class="form-control" placeholder="Password" require autofocus><br> --> 
                        <select name="dtype" class="form-control" placeholder="Type" required autofocus>
                            <option value='' disabled selected>Type</option>
                            <option value='Jeep' >Jeep</option>
                            <option value='Taxi' >Taxi</option>
                            <option value='Taxi' >Bus</option>
                        </select><br>
                        <p>Birthdate</p>
                        <input type="date" name="bday" class="form-control" required autofocus><br>
                        <button id="proceed1" class="btn btn-primary">Proceed</button>
                    </div>
                    
                    <div id = "form2">
                        <h4 class="page-header">License</h4><br>
                        <input type="number" name="license" class="form-control" placeholder="License ID" required autofocus><br>
                        <input type="text" name="ltype" class="form-control" placeholder="License Type" required autofocus><br>
                        <input type="text" name="res" class="form-control" placeholder="License Restriction" required autofocus><br>
                         <p>Date Issued</p>
                        <input type="date" name="issue" class="form-control" required autofocus><br>
                        <p>Expiration Date</p>
                        <input type="date" name="exp" class="form-control" required autofocus><br>
                        <input type="text" name="national" class="form-control" placeholder="Nationality" required autofocus><br>
                        <button id="back" class="btn btn-primary">Back</button>
                        <button id="proceed2" class="btn btn-primary">Proceed</button>
                    </div>
                    <div id="form3">
                            <h4 class="page-header">Vehicle</h4>
                            <input type="text" name="plate" class="form-control" placeholder="Plate Number" required autofocus><br>
                            <input type="text" name="brand" class="form-control" placeholder="Brand" required autofocus><br>
                            <input type="text" name="color" class="form-control" placeholder="Color" required autofocus><br>
                            <p>Last Registered Date</p>
                            <input type="date" name="register" class="form-control" required autofocus><br>
                            <p>Expiry Date</p>
                            <input type="date" name="expire" class="form-control" required autofocus><br>
                            <input type="text" name="statusv" class="form-control" placeholder="Status" required autofocus><br>
                            <input type="text" name="vtype" class="form-control" placeholder="Type" required autofocus><br>
                            <button id="back2" class="btn btn-primary">Back</button>
                            <input type="submit" name="add" class="btn btn-primary" value="Add">
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

     <!-- Datatable JavaScript -->
     <script src="../JS/jquery.dataTables.min.js"></script>
     <script src="../JS/dataTables.buttons.min.js"></script>
     <script src="../JS/buttons.print.min.js"></script>
     <script src="../JS/buttons.flash.min.js"></script>
     <script src="../JS/buttons.html5.min.js"></script>
     <script src="../JS/jszip.min.js"></script>
     <script src="../JS/pdfmake.min.js"></script>
     <script src="../JS/vfs_fonts.js"></script>
     <script type="text/javascript">
         $(document).ready(function () {
             $('#example').DataTable({
                 "pageLength": 20,
                 dom: 'Bfrtip',
                 buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
             });
         });

         function confirmation(anchor){
             var conf = confirm("Are you sure you want to delete this?");
             if(conf)
                window.location=anchor.attr("href");
         }
         function status(anchor){
             var conf = confirm("Are you sure you want to update status?");
             if(conf)
                window.location=anchor.attr("href");
         }

         function loadImage(){
             var loadImg = document.getElementById('preview');
             loadImg.src = URL.createObjectURL(event.target.files[0]);
         }

         $(document).ready(function(){
            $("[data-toggle='true']").tooltip(); 
         });
         $("#proceed1").click(function(){
            $("#form1").toggle();
            $("#form2").toggle();
         });
         $("#proceed2").click(function(){
            $("#form2").toggle();
            $("#form3").toggle();
         });
         $("#back").click(function(){
            $("#form1").toggle();
            $("#form2").toggle();
         });
         $("#back2").click(function(){
            $("#form2").toggle();
            $("#form3").toggle();
         });
         
     </script>
</body>

</html>
