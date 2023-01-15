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
	<title>Die Cutting Order Report</title>
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
            <h1>Die Cutting Order Report</h1><br>
            <form name="ReportDieCuttingOrder" method="post" action="../php/ReportDieCuttingOrder.php">   
            <!-- Log No  :  <input type="text" name="txtLogNo" id="txtLogNo" placeholder="" value="" >
            <br>Start Date(From)  :  <input type="date" name="dtStartTime" id="dtStartTime" placeholder="">
            <br>Start Date(To)  :  <input type="date" name="dtEndTime" id="dtEndTime" placeholder="" value="">
                                                        <?php //$date=date_create("2022-01-01"); echo date_format($date,"Y-m-d H:i:s"); ?> -->
                             
            <table id="dataTable_1" border="2">
                        <tr>
                            <th>Section No</th>
                            <th>Die No</th>
                            <th>Component Name</th>
                            <th>Start Date(From)</th>
                            <th>Start Date(To)</th>
                        </tr>        
                        <tr>
                            <td>                
                                <input type="text" name="txtSectionNo" id="txtSectionNo" placeholder="" value="" >
                            </td>
                            <td>                
                                <input type="text" name="txtDieNo" id="txtDieNo" placeholder="" value="" >
                            </td>
                            <td>                
                                <!-- <input type="text" name="txtCompCode" id="txtCompCode" placeholder="" value="" > -->
                                <select name="txtCompCode" id="txtCompCode">
									<option value="">--All--</option>
									<?php
									$qry = "select txtDieCompCode, txtDieCompName from alpro_prod.mst_const_diecomp order by txtDieCompName;";
									$data = getDataFromDB($qry);
									while($row = $data->fetch_assoc()) {
									?>
										<option value="<?php echo $row['txtDieCompCode']; ?>"><?php echo $row['txtDieCompName']; ?></option>
									<?php	
									}
									?>
								</select>
                            </td>
                            <td>
                                <input type="datetime-local" name="dtStartTime" id="dtStartTime" placeholder="">
                                <?php //$date=date_create("2022-01-01"); echo date_format($date,"Y-m-d H:i:s"); ?>
                            </td>
                            <td>
                                <input type="datetime-local" name="dtEndTime" id="dtEndTime" placeholder="" value="">
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
                    $txtSectionNo = $_POST['txtSectionNo'];
                    $txtDieNo = $_POST['txtDieNo'];
                    $txtCompCode = $_POST['txtCompCode'];
                    $dtStartTime = $_POST['dtStartTime'];
                    $dtEndTime = $_POST['dtEndTime'];
                    $StartDateLength = strlen($dtStartTime);
                    $EndDateLength = strlen($dtEndTime);

                    
                    if ($StartDateLength > 0 or $EndDateLength > 0){
                        $qry = "SELECT * from alpro_prod.Report_DieCuttingOrder where (txtSectionNo like '%$txtSectionNo%' and txtDieNo like '%$txtDieNo%') and txtCompCode like '%$txtCompCode%' and (dtStartTime between '$dtStartTime' and '$dtEndTime')";                    
                    }
                    else{
                        $qry = "SELECT * from alpro_prod.Report_DieCuttingOrder where (txtSectionNo like '%$txtSectionNo%' and txtDieNo like '%$txtDieNo%' and txtCompCode like '%$txtCompCode%')";                    
                    }
                    $data = getDataFromDB($qry);
                    
                    $param = '&txtSectionNo='.$txtSectionNo.'&txtDieNo='.$txtDieNo.'&txtCompCode='.$txtCompCode.'&dtStartTime='.$dtStartTime.'&dtEndTime='.$dtEndTime;
                    //$param = 'qryInput='.$qry;
                    ?>
                    <td><a href="../php/ReportDieCuttingOrderPrint.php?<?php echo $param; ?>" class="myButton" target="_blank">Print</a></td>
                    <?php
                    
                    if ($data) {
                        ?>
                    <!-- <input type="text" size="20" id="myInput_lgNo" class="myInputCSS" onkeyup="myFunction('myInput_lgNo','0')" placeholder="Search for Log No">
            
                    <input type="text" size="20" id="myInput_op" class="myInputCSS" onkeyup="myFunction('myInput_op','1')" placeholder="Search for Operator"> -->
                        <center><table id="dataTable" border="2">
                        
                            <tr>
                                <th>Start Date</th>
                                <th>Section No</th>
                                <th>Die No</th>
                                <th>Component</th>
                                <th>Log No</th>
                                <th>Length(Including Cutting Tolerance)</th>
                                <th>Remarks</th>
                            </tr>
                        <?php
                        // output data of each row
                        while($row = $data->fetch_assoc()) {
                    ?>
                        <tr size=100>
                            <td><?php echo $row['dtStartTime']; ?> </td>
                            <td><?php echo $row['txtSectionNo']; ?> </td>
                            <td><?php echo $row['txtDieNo']; ?> </td>
                            <td><?php echo $row['txtDieCompName']; ?> </td>
                            <td><?php echo $row['txtLogNo']; ?> </td>
                            <td><?php echo $row['numCuttingLength']; ?> </td>
                            <td><?php echo $row['txtRemarks']; ?> </td>
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
                    <button type="button" class="myButton" onclick="exportDatatoCSV('dataTable','DieCuttingOrderReport')">
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