<?php
include('checkSession.php');
include('UserDefinedLibrary.php');
$txtLogNo = $_GET['txtLogNo'];
$txtDieNo = $_GET['txtDieNo'];
$txtCompCode = $_GET['txtCompCode'];
$dtStartTime = $_GET['dtStartTime'];
$dtEndTime = $_GET['dtEndTime'];
$StartDateLength = strlen($dtStartTime);
$EndDateLength = strlen($dtEndTime);
//$qry = "select * from alpro_prod.mst_section where txtSectionNo = '$txtIdentificationNo'";
//$data = getDataFromDB($qry);
//echo($data);
?>
<!-- HTML -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Heat Treatment Requisition Report</title>
    <link rel="icon" href="../staticfiles/img/logo.png">
	<link rel="stylesheet" href="../staticfiles/css/style.css">
	<script src="../staticfiles/js/jquery-3.3.1.js"></script>
	<script src="../staticfiles/js/reusable.js"></script>
    <script type="text/javascript" src="ExportToCSV.js"></script>


</head>
<center><body>
    <!-- Start : for menu bar -->
	   
	<!-- End for menu bar -->
    <div>
        <div class="container">
            <div class="contact-form medium-padding120">
                <?php
                
                $checkrecord = count($_POST);
                
                    

                    If ($dtStartTime > $dtEndTime){
                        ?>
                        <br>
                        <p style="color:red;">From Date should be greater than To Date</p>
                        <?php
                    }

                    if ($StartDateLength > 0 or $EndDateLength > 0){
                        $qry = "SELECT * from alpro_prod.Report_heattreatment a  where (a.txtLogNo like '%$txtLogNo%' and a.txtDieNo like '%$txtDieNo%' and a.txtCompCode like '%$txtCompCode%' and (a.dtRecvDate between '$dtStartTime' and '$dtEndTime'))";                    
                    }
                    else{
                        $qry = "SELECT * from alpro_prod.Report_heattreatment a  where (a.txtLogNo like '%$txtLogNo%' and a.txtDieNo like '%$txtDieNo%' and a.txtCompCode like '%$txtCompCode%')";                    
                    }
                    //echo $qry;
                    $data = getDataFromDB($qry);
                    
                    
                    if ($data) {
                        ?>
                    <!-- <input type="text" size="20" id="myInput_lgNo" class="myInputCSS" onkeyup="myFunction('myInput_lgNo','0')" placeholder="Search for Log No">
            
                    <input type="text" size="20" id="myInput_op" class="myInputCSS" onkeyup="myFunction('myInput_op','1')" placeholder="Search for Operator"> -->
                        <center><table id="dataTable" border="2">
                        <br><h1>Heat Treatment Requisition Report</h1>
                            <tr>
                                <th>Log No</th>
                                <th>Die No</th>
                                <th>Die Component No</th>
                                <th>Date Received</th>
                                <th>Date Sent</th>
                            </tr>
                        <?php
                        // output data of each row
                        while($row = $data->fetch_assoc()) {
                    ?>
                        <tr size=100>
                            <td><?php echo $row['txtLogNo']; ?> </td>
                            <td><?php echo $row['txtDieNo']; ?> </td>
                            <td><?php echo $row['txtDieCompName']; ?> </td>
                            <td><?php echo $row['dtRecvDate']; ?> </td>
                            <td><?php echo $row['dtSentDate']; ?> </td>
                        </tr>
                    <?php
                        }
                    }
                    else{
                        ?>
                        <p style="color:red;">No Record Found</p>
                        <?php
                    }
                    ?>
                    <br>
                    
                    

                    <?php
                
                
                ?>
                
                
            </div>
        </div>
    </div>

</body>