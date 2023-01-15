<?php
include('checkSession.php');
include('UserDefinedLibrary.php');
$txtPress = $_GET['txtPress'];
$txtShiftCode = $_GET['txtShiftCode'];
$dtStartTime = $_GET['dtStartTime'];
$dtEndTime = $_GET['dtEndTime'];
$txtBilletAlloy = $_GET['txtBilletAlloy'];
$StartDateLength = strlen($dtStartTime);
$EndDateLength = strlen($dtEndTime);
$txtFilter = getFilterData_prd($_GET);

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
	<title>Log Sheet</title>
    <link rel="icon" href="../staticfiles/img/logo.png">
	<link rel="stylesheet" href="../staticfiles/css/style.css">
	<script src="../staticfiles/js/jquery-3.3.1.js"></script>
	<script src="../staticfiles/js/reusable.js"></script>
    <script type="text/javascript" src="ExportToCSV.js"></script>


</head>
<body>
    <!-- Start : for menu bar -->
	<!-- End for menu bar -->
    <center><div >
        <div class="container">
            <div class="contact-form medium-padding120">
            <br><h1>Log Sheet Report</h1><br>
            <form name="ReportLogSheet" method="post" action="../php/ReportLogSheet.php">   
            <!-- Log No  :  <input type="text" name="txtLogNo" id="txtLogNo" placeholder="" value="" >
            <br>Start Date(From)  :  <input type="date" name="dtStartTime" id="dtStartTime" placeholder="">
            <br>Start Date(To)  :  <input type="date" name="dtEndTime" id="dtEndTime" placeholder="" value="">
                                                        <?php //$date=date_create("2022-01-01"); echo date_format($date,"Y-m-d H:i:s"); ?> -->
                             
            <table id="dataTable_1" border="2">
                        
                               
                </form>
                
                <?php
                
                $checkrecord = count($_POST);
                if ($checkrecord >= 0)
                {
                   
                    // echo $txtFilter ;
                     $qry = "SELECT * 
                        FROM alpro_prod.v_productionlogsheet t ".$txtFilter;  
                                          
                    
                    $data = getDataFromDB($qry);
                    
                    $param = 'txtPress='.$txtPress.'&txtShiftCode='.$txtShiftCode.'&dtStartTime='.$dtStartTime.'&dtEndTime='.$dtEndTime.'&txtBilletAlloy='.$txtBilletAlloy;
                    //$param = 'qryInput='.$qry;
                    ?>
                    
                    <?php

                    if ($data) {
                        ?>
                    <!-- <input type="text" size="20" id="myInput_lgNo" class="myInputCSS" onkeyup="myFunction('myInput_lgNo','0')" placeholder="Search for Log No">
            
                    <input type="text" size="20" id="myInput_op" class="myInputCSS" onkeyup="myFunction('myInput_op','1')" placeholder="Search for Operator"> -->
                        <table id="dataTable" border="2">
                        
                            <tr>
                                <th>Section</th>
                                <th>Section Description</th>
                                <th>Press</th>
                                <th>Shift</th>
                                <th>Date</th>
                                <th>DieNo</th>
                                <th>Cavity</th>
                                <th>Quanching Media</th>
                                <th>Running Hour</th>
                                <th>Alloy</th>
                                <th>Billet Length</th>
                                <th>No. of Billet</th>
                                <th>Input Weight</th>
                                <th>Cutting Length</th>
                                <th>Weight /Pcs.</th>
                                <th>Good Pcs.</th>
                                <th>Output Weight</th>
                                <th>Recovery%</th>
                                <th>Output Rate</th>
                                <th>Unload Reasons</th>
                                <th>Remarks</th>
                                							
                            </tr>
                        <?php
                        // output data of each row
                        while($row = $data->fetch_assoc()) {
                    ?>
                        <tr size=100>
                            <td><?php echo $row['txtSectionNo']; ?> </td>
                            <td><?php echo $row['txtSectionDesc']; ?> </td>
                            <td><?php echo $row['txtPress']; ?> </td>
                            <td><?php echo $row['txtShift']; ?> </td>
                            <td><?php echo $row['dtStartTime']; ?> </td>
                            <td><?php echo $row['txtDieNo']; ?> </td>
                            <td><?php echo $row['numCavity']; ?> </td>
                            <td><?php echo $row['txtQuenchMedia']; ?> </td>
                            <td><?php echo $row['numRunningHour']; ?> </td>
                            <td><?php echo $row['txtBilletAlloy']; ?> </td>
                            <td><?php echo $row['numBilletLength']; ?> </td>
                            <td><?php echo $row['numNoOfBillet']; ?> </td>
                            <td><?php echo $row['numInputWt']; ?> </td>
                            <td><?php echo $row['numCuttingLegth']; ?> </td>
                            <td><?php echo $row['numWtPerPc']; ?> </td>
                            <td><?php echo $row['numNoOfGoodPcs']; ?> </td>
                            <td><?php echo $row['numOutputWt']; ?> </td>
                            <td><?php echo $row['numRecovery']; ?> </td>
                            <td><?php echo $row['numOutputPerHour']; ?> </td>
                            <td><?php echo $row['txtReason']; ?> </td>
                            <td><?php echo $row['txtRemarks']; ?> </td>                            
                        </tr>                  
                  <?php
                        }
                        $qry = "SELECT sum(numNoOfBillet) numNoOfBillet, sum(numInputWt) numInputWt,sum(numNoOfGoodPcs) numNoOfGoodPcs,sum(numOutputWt) numOutputWt, round((sum(numOutputWt)/sum(numInputWt))*100,2) numRecovery   FROM alpro_prod.v_productionlogsheet t ".$txtFilter;  
                                          
                    
                    $data = getDataFromDB($qry);
                        while($row = $data->fetch_assoc()) {
                            ?>
                                <tr size=100>
                                    <td><b> Total: </b></td>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                    <td></td>
                                    <td></td>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                    <td></td>
                                    <td> </td>
                                    <td><b><?php echo $row['numNoOfBillet']; ?></b> </td>
                                    <td><b><?php echo $row['numInputWt']; ?> </b></td>
                                    <td> </td>
                                    <td> </td>
                                    <td><b><?php echo $row['numNoOfGoodPcs']; ?></b> </td>
                                    <td><b><?php echo $row['numOutputWt']; ?> </b></td>
                                    <td><b><?php echo $row['numRecovery']; ?></b> </td>
                                    <td> </td>
                                    <td></td>
                                    <td> </td>                            
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
                }
                
                ?>
                
            </div>
        </div>
    </div>

</body>