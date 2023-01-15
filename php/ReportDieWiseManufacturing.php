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
	<title>Die Wise Manufacturing Report</title>
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
    <div class="myDiv">
        <div class="container">
            <div class="contact-form medium-padding120">
            <h1>Die Wise Manufacturing Report</h1><br>
            <form name="ReportDieWiseManufacturing" method="post" action="../php/ReportDieWiseManufacturing.php">   
            <!-- Log No  :  <input type="text" name="txtLogNo" id="txtLogNo" placeholder="" value="" >
            <br>Start Date(From)  :  <input type="date" name="dtStartTime" id="dtStartTime" placeholder="">
            <br>Start Date(To)  :  <input type="date" name="dtEndTime" id="dtEndTime" placeholder="" value="">
                                                        <?php //$date=date_create("2022-01-01"); echo date_format($date,"Y-m-d H:i:s"); ?> -->
                             
            <center><table id="dataTable_1" border="2">
                        <tr>
                            <th>Die No</th>
                            <th>Operator</th>
                            <th>Date (From)</th>
                            <th>Date (To)</th>
                        </tr>        
                        <tr>
                            <td>                
                                <input type="text" name="txtDieNo" id="txtDieNo" placeholder="" value="" >
                            </td>
                            <td>                
                                <!-- <input type="text" name="txtCompCode" id="txtCompCode" placeholder="" value="" > -->
                                <select name="txtEmpName" id="txtEmpName">
									<option value="">--All--</option>
									<?php
									$qry = "select distinct txtEmpNo, txtEmpName from alpro_prod.mst_employee order by txtEmpName";
									$data = getDataFromDB($qry);
									while($row = $data->fetch_assoc()) {
									?>
										<option value="<?php echo $row['txtEmpName']; ?>"><?php echo $row['txtEmpName']; ?></option>
									<?php	
									}
									?>
								</select>
                            </td>
                            <td>
                                <input type="date" name="dtStartTime" id="dtStartTime" placeholder="">
                                <?php //$date=date_create("2022-01-01"); echo date_format($date,"Y-m-d H:i:s"); ?>
                            </td>
                            <td>
                                <input type="date" name="dtEndTime" id="dtEndTime" placeholder="" value="">
                            </td>
                        </tr>
                    </table>
                    <br>
                    <input type="submit" name="Submit" id="Submit" value="View Report" class="myButton">   
                         
                               
                </form>
                
                <?php
                
                $checkrecord = count($_POST);
                if ($checkrecord >= 1)
                {
                    $txtDieNo = $_POST['txtDieNo'];
                    $txtEmpName = $_POST['txtEmpName'];
                    $dtStartTime = $_POST['dtStartTime'];
                    $dtEndTime = $_POST['dtEndTime'];
                    $StartDateLength = strlen($dtStartTime);
                    $EndDateLength = strlen($dtEndTime);

                    If ($dtStartTime > $dtEndTime){
                        ?>
                        <br>
                        <p style="color:red;">From Date should be greater than To Date</p>
                        <?php
                    }

                    if ($StartDateLength > 0 or $EndDateLength > 0){
                        $qry = "SELECT * from alpro_prod.Report_Diewisemanufacturing where (txtEmpName like '%$txtEmpName%' and txtDieNo like '%$txtDieNo%') and (dtStartTime between '$dtStartTime' and '$dtEndTime')";                    
                    }
                    else{
                        $qry = "SELECT * from alpro_prod.Report_Diewisemanufacturing where (txtEmpName like '%$txtEmpName%' and txtDieNo like '%$txtDieNo%')";                    
                    }
                    $data = getDataFromDB($qry);
                    $param = '&txtDieNo='.$txtDieNo.'&txtEmpName='.$txtEmpName.'&dtStartTime='.$dtStartTime.'&dtEndTime='.$dtEndTime;
                    //$param = 'qryInput='.$qry;
                    ?>
                    <td><a href="../php/ReportDieWiseManufacturingPrint.php?<?php echo $param; ?>" class="myButton" target="_blank">Print</a></td>
                    <?php
                    
                    if ($data) {
                        ?>
                    <!-- <input type="text" size="20" id="myInput_lgNo" class="myInputCSS" onkeyup="myFunction('myInput_lgNo','0')" placeholder="Search for Log No">
            
                    <input type="text" size="20" id="myInput_op" class="myInputCSS" onkeyup="myFunction('myInput_op','1')" placeholder="Search for Operator"> -->
                        <table id="dataTable" border="2">
                        
                            <tr>
                                <th>Die No</th>
                                <th>Component No</th>
                                <th>Component Name</th>
                                <th>Date</th>
                                <th>Shift</th>
                                <th>Operation</th>
                                <th>Operator</th>
                                <th>M/C No</th>
                                <th>Allocated Hours</th>
                                <th>Total Hours</th>
                            </tr>
                        <?php
                        // output data of each row
                        while($row = $data->fetch_assoc()) {
                    ?>
                        <tr size=100>
                            <td><?php echo $row['txtDieNo']; ?> </td>
                            <td><?php echo $row['txtCompCode']; ?> </td>
                            <td><?php echo $row['txtDieCompName']; ?> </td>
                            <td><?php echo $row['dtStartTime']; ?> </td>
                            <td><?php echo $row['txtShift']; ?> </td>
                            <td><?php echo $row['txtOperName']; ?> </td>
                            <td><?php echo $row['txtEmpName']; ?> </td>
                            <td><?php echo " "; ?> </td>
                            <td><?php echo " "; ?> </td>
                            <td><?php echo " "; ?> </td>
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
                    <button type="button" class="myButton" onclick="exportDatatoCSV('dataTable','DieWiseManufacturingReport')">
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