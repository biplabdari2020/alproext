<?php
include('checkSession.php');
include('UserDefinedLibrary.php');
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
	<title>Section Wise Off-Take</title>
    <link rel="icon" href="../staticfiles/img/logo.png">
	<link rel="stylesheet" href="../staticfiles/css/style.css">
	<script src="../staticfiles/js/jquery-3.3.1.js"></script>
	<script src="../staticfiles/js/reusable.js"></script>
    <script type="text/javascript" src="ExportToCSV.js"></script>

</head>
<body>
    <!-- Start : for menu bar -->
	<div id="menu_bar_php"></div>    
	<!-- End for menu bar -->
    <div class="myDiv" style="width: 100%">
        <div class="container">
            <div class="contact-form medium-padding120">
            <h1>Section Wise Off-Take</h1><br>
            <form name="ReportLogSheet" method="post" action="../php/ReportSectionWiseDieAvailability.php">
                <br>   
            <!-- Log No  :  <input type="text" name="txtLogNo" id="txtLogNo" placeholder="" value="" >
            <br>Start Date(From)  :  <input type="date" name="dtStartTime" id="dtStartTime" placeholder="">
            <br>Start Date(To)  :  <input type="date" name="dtEndTime" id="dtEndTime" placeholder="" value="">
                                                        <?php //$date=date_create("2022-01-01"); echo date_format($date,"Y-m-d H:i:s"); ?> -->
                             
                                <b>Start Date</b>
                                <input type="date" name="dtStartTime" id="dtStartTime" placeholder="" value="">                                
                                <b>End Date</b>
                                <input type="date" name="dtEndTime" id="dtEndTime" onclick="setEndDate('dtStartTime','dtEndTime')" placeholder="" value="">
                                <input type="text" size="20" id="myInput_1" class="myInputCSS" onkeyup="myFunction('myInput_1','0')" placeholder="Search for 1st Column" title="Search for 1st Column">

                    <br>
                    <input type="submit" name="Submit" id="Submit" value="View Report" class="myButton">   
                         
                               
                </form>
                
                <?php
                
                $checkrecord = count($_POST);
                if ($checkrecord >= 1)
                {
                    //$txtPress = $_POST['txtPress'];
                    //$txtShiftCode = $_POST['txtShiftCode'];
                    $dtStartTime = $_POST['dtStartTime'];
                    $dtEndTime = $_POST['dtEndTime'];
                    //$txtBilletAlloy = $_POST['txtBilletAlloy'];
                    $StartDateLength = strlen($dtStartTime);
                    $EndDateLength = strlen($dtEndTime);
                    $txtFilter = getFilterData_prd($_POST);
                    // echo $txtFilter ;
                    $qry = "SELECT txtSectionNo, txtSectionDesc, txtIdentificationNo, txtProfile, sum(Output_P1) Output_P1, sum(Output_P2) Output_P2, sum(Output_P3) Output_P3, sum(TotalOutput) TotalOutput ,round(sum(TotalOutput)/sum(numRunningHour)) OutPutRate
                    FROM alpro_prod.v_secdieview_oftake t  ".$txtFilter." group by txtSectionNo, txtSectionDesc, txtIdentificationNo, txtProfile";  
                  
                                          
                    //echo $qry;
                    $data = getDataFromDB($qry);
                    
                    $param = 'dtStartTime='.$dtStartTime.'&dtEndTime='.$dtEndTime;
                    //$param = 'qryInput='.$qry;
                    ?>
                    <td><a href="../php/ReporSectionOffTake.php?<?php echo $param; ?>" class="myButton" target="_blank">Print</a></td>
                    <?php

                    if ($data) {
                        ?>
                    <!-- <input type="text" size="20" id="myInput_lgNo" class="myInputCSS" onkeyup="myFunction('myInput_lgNo','0')" placeholder="Search for Log No">
            
                    <input type="text" size="20" id="myInput_op" class="myInputCSS" onkeyup="myFunction('myInput_op','1')" placeholder="Search for Operator"> -->
                        <table id="dataTable" border="2" style="margin: 0px auto;">
                        
                            <tr>
                            <th>Section</th> 
                            <th>Section Description</th>                        
                            <th>Drawing No</th>                        
                            <th>Profile</th>                        
							<th>OutPut (P1)</th>
							<th>OutPut (P2)</th>
							<th>OutPut (P3)</th>
							<th>Total</th>
							<th>Output Rate</th>
                            </tr>
                        <?php
                        // output data of each row
                        while($row = $data->fetch_assoc()) {
                    ?>
                        <tr>
                        <td><?php echo $row['txtSectionNo']; ?> </td>
                        <td><?php echo $row['txtSectionDesc']; ?> </td>
                        <td><?php echo $row['txtIdentificationNo']; ?> </td>
                        <td><?php echo $row['txtProfile']; ?> </td>
                        <td><?php echo $row['Output_P1']; ?> </td>
                        <td><?php echo $row['Output_P2']; ?> </td>
                        <td><?php echo $row['Output_P3']; ?> </td>
                        <td><?php echo $row['TotalOutput']; ?> </td>
                        <td><?php echo $row['OutPutRate']; ?> </td>
                        
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
                    <button type="button" class="myButton" onclick="exportDatatoCSV('dataTable', 'SectionWiseOffTake')">
                    Download
                    </button>
                    

                    <?php
                }
                
                ?>
                
                <br><br>
            </div>
        </div>
    </div>

</body>