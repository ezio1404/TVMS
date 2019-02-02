<?php
    include_once 'model/agencyModel.php';
    $agency = new Agency();
    if(isset($_SESSION['id']) && isset($_SESSION['head'])){
        if(isset($_POST['edit'])){
            $name = $_POST['name'];
            $head = $_POST['head'];
            $addr1 = $_POST['address1'];
            $addr2 = $_POST['address2'];
            $land1 = $_POST['land1'];
            $land2 = $_POST['land2'];
            $email = $_POST['email'];
            $id = $_SESSION['id'];
            $agency->updateAgency(array($name,$head,$email,$addr1,$addr2,$land1,$land2,$id));
        }
    }
    else{
        echo "<script> window.location='index.php'; </script>";
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

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>
        <?php 
        include_once 'model/agencyModel.php';
        include_once "nav.php"; ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User Profile</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <table class="table">
                    <?php
                        $datas = $agency->getAgencyById(array($_SESSION['id']));  
                    ?>
                    <tr>
                        <td>Agency Name</td>
                        <td><?php echo $datas['agency_name'] ?></td>
                    </tr> 
                    <tr>
                        <td>Agency Head</td>
                        <td><?php echo $datas['agency_head'] ?></td>
                    </tr>
                    <tr>
                        <td>Email Address</td>
                        <td><?php echo $datas['agency_email'] ?></td>
                    </tr>
                    <tr>
                        <td>Agency Address 1</td>
                        <td><?php echo $datas['agency_address1'] ?></td>
                    </tr>
                    <tr>
                        <td>Agency Address 2</td>
                        <td><?php echo $datas['agency_address2'] ?></td>
                    </tr>
                    <tr>
                        <td>Agency landline Cebu 1</td>
                        <td><?php echo $datas['agency_tel1'] ?></td>
                    </tr>
                    <tr>
                        <td>Agency landline Cebu 2</td>
                        <td><?php echo $datas['agency_tel2'] ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><a href="#edit<?php echo $datas['agency_id'] ?>" data-toggle="modal" style="text-decoration:none" class="btn btn-outline btn-info" >Edit Account</button></td>
                    </tr>
                </table>
            </div>
            <!-- /.container-fluid -->
            <div class="modal fade" id="edit<?php echo $datas['agency_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="enforcerModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h5 class="modal-title" id="enforcerModalLabel">Edit Agency</h5>
                        </div>
                        <div class="modal-body">
                        <form method = 'POST'>
                            <p>Name</p>
                            <input type="text" name="name" class="form-control" value="<?php echo $datas['agency_name'] ?>"  autofocus><br>
                            <p>Head</p>
                            <input type="text" name="head" class="form-control" value="<?php echo $datas['agency_head'] ?>"  autofocus><br>
                            <p>Email</p>
                            <input type="text" name="email" class="form-control" value="<?php echo $datas['agency_email'] ?>"  autofocus><br>
                            <p>Address 1</p>
                            <input type="text" name="address1" class="form-control" value="<?php echo $datas['agency_address1'] ?>"  autofocus><br>
                            <p>Address 2</p>
                            <input type="text" name="address2" class="form-control" value="<?php echo $datas['agency_address2'] ?>"  autofocus><br>
                            <p>Agency Landline 1</p>
                            <input type="text" name="land1" class="form-control" value="<?php echo $datas['agency_tel1'] ?>"  autofocus><br>
                            <p>Agency Landline 1</p>
                            <input type="text" name="land2" class="form-control" value="<?php echo $datas['agency_tel2'] ?>" autofocus><br>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" name="edit" class="btn btn-primary" value="Update">
                        </div>
                        </form>
                    </div>
                    </div>
                </div>

    </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>




</body>

</html>
