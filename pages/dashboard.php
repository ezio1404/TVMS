<?php
    include_once 'model/agencyModel.php';
    $agency = new Agency();
    if(!isset($_SESSION['id']) && !isset($_SESSION['head'])){
      echo "<script> window.location='index.php'; </script>";
    }
    else{
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

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Data tables -->
    <link rel="stylesheet" href="../dist/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../dist/css/buttons.dataTables.min.css">

    <style>
    .tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
    </style>
</head>


<body>
        <?php include_once "nav.php"; ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Dashboard</h1>
                    </div>

                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <!--  -->
                <div class="tab">
                        <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen"> Live Traffic</button>
                        <button class="tablinks" onclick="openCity(event, 'Paris')">Summary of Reports</button>
                      </div>                          
                <!--  -->
                <div id="London" class="tabcontent">
                        <div>
                                <p style="font-size:19px;" id="demo"></p>
                            </div>
                            <iframe src="https://embed.waze.com/iframe?zoom=14&lat=10.298&lon=123.897&pin=1&desc=1"
                        width="100%" height="550"></iframe>
                </div>
                <div id="Paris" class="tabcontent">
                <button onclick="print('print_div')">Print</button>
                      <div id="print_div">
                        <canvas id="chart" style="width: 100%; height: 65vh; margin-top: 10px;"></canvas>
                      </div>                      
                </div>
                <!--  -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/jquery/jQuery.print.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <!-- <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script> -->

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
    <script>
        var d = new Date();
        document.getElementById("demo").innerHTML = d;
        </script>
        <script>
                function openCity(evt, cityName) {
                  var i, tabcontent, tablinks;
                  tabcontent = document.getElementsByClassName("tabcontent");
                  for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                  }
                  tablinks = document.getElementsByClassName("tablinks");
                  for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                  }
                  document.getElementById(cityName).style.display = "block";
                  evt.currentTarget.className += " active";
                }
                // Get the element with id="defaultOpen" and click on it
                document.getElementById("defaultOpen").click();
                </script>
        <script>
				var ctx = document.getElementById("chart").getContext('2d');
    			var myChart = new Chart(ctx, {
        		type: 'bar',
		        data: {
		            labels: ['January','February','March','April','May','June','July','August','September','October','November','December'],
		            datasets: 
		            [{
		                label: 'Sales',
		                data: [1,2,3,4,5,6,7,8,9,3,4,3],
		                backgroundColor: '#87CEFA',
		                borderColor:'#87CEFA',
		                borderWidth: 3
		            },

		            {
		            	label: 'Users',
		                data: [9,8,7,6,5,4,3,2,1.5,5.5,8.5,6.5],
		                backgroundColor: '#1E90FF',
		                borderColor:'#1E90FF',
		                borderWidth: 3	
		            }]
		        },
		     
		        options: {
		            scales: {scales:{yAxes: [{beginAtZero: false}], xAxes: [{autoskip: true, maxTicketsLimit: 20}]}},
		            tooltips:{mode: 'index'},
		            legend:{display: true, position: 'top', labels: {fontColor: 'black', fontSize: 16}}
		        }
		    });
			</script>
      <script>
        // here we will write our custom code for printing our div
        $(function(){
            $('#print').on('click', function() {
                //Print ele2 with default options
                $.print(".print_div");
            });
        });
    </script>
</body>

</html>
<?php
    }
?>