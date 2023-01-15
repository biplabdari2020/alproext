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
            <h1>Die Performance Report</h1><br>
            <form name="ReportDiePerformance" method="post" action="../php/DiePerformanceReportSelect.php">   
            <!-- Log No  :  <input type="text" name="txtLogNo" id="txtLogNo" placeholder="" value="" >
            <br>Start Date(From)  :  <input type="date" name="dtStartTime" id="dtStartTime" placeholder="">
            <br>Start Date(To)  :  <input type="date" name="dtEndTime" id="dtEndTime" placeholder="" value="">
                                                        <?php //$date=date_create("2022-01-01"); echo date_format($date,"Y-m-d H:i:s"); ?> -->
                             
            <table id="dataTable_1" border="2">
                        <tr>
                           
                           
                            <td>                
                                <!-- <input type="text" name="txtCompCode" id="txtCompCode" placeholder="" value="" > -->
                                Please Enter Die No:   <select name="txtDieNo" id="txtDieNo">
									<option value="">--All--</option>
									<?php
									$qry = "select txtDieNo from alpro_prod.mst_die order by txtDieNo;";
									$data = getDataFromDB($qry);
									while($row = $data->fetch_assoc()) {
									?>
										<option value="<?php echo $row['txtDieNo']; ?>"><?php echo $row['txtDieNo']; ?></option>
									<?php	
									}
									?>
								</select>
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
                        $qry = "SELECT * from alpro_prod.mst_die  where txtDieNo = '$txtDieNo'";                    
                   
                    $data = getDataFromDB($qry);
                    
                    $param ='&txtDieNo='.$txtDieNo;
                    //$param = 'qryInput='.$qry;
                    ?>
                    <td><a href="../php/DiePerformanceCard.php?<?php echo $param; ?>" class="myButton" target="_blank">Print</a></td>
                    <?php
                    
                    if ($data) {
                        ?>
                    <!-- <input type="text" size="20" id="myInput_lgNo" class="myInputCSS" onkeyup="myFunction('myInput_lgNo','0')" placeholder="Search for Log No">
            
                    <input type="text" size="20" id="myInput_op" class="myInputCSS" onkeyup="myFunction('myInput_op','1')" placeholder="Search for Operator"> -->
                        <center><table id="dataTable" border="2">
                        
                            <tr>
                            <th>Section no</th>
                            <th>Die No</th>
                            <th>Press</th>
                            <th>Cavity</th>
                            <th>Alloy</th>
                            <th>Nominal Weight (wt/mtr)</th>
                            <th>Estimated Die Life</th>
                            <th>Estimated Die Trial</th>
                            <th>Nitriding Frequency</th>
                            <th>Last Run Weight (wt/mtr)</th>
                            <th>Manufactured by</th> 
                            <th>Input Till Date (Kg)</th>  
                            <th>Current Status (Kg)</th>  
                            <th>Manufacturing Required</th>  
                            <th>Transaction Date</th>
                            </tr>
                        <?php
                        // output data of each row
                        while($row = $data->fetch_assoc()) {
                    ?>
                        <tr size=100>
                        <td><?php echo $row['txtSectionNo']; ?> </td>
                        <td><?php echo $row['txtDieNo']; ?> </td>
                        <td><?php echo $row['txtPress']; ?> </td>
                        <td><?php echo $row['NumCavity']; ?> </td>
                        <td><?php echo $row['txtAlloy']; ?> </td>
                        <td><?php echo $row['numDieWt']; ?> </td>
                        <td><?php echo $row['numEstLife']; ?> </td>
                        <td><?php echo $row['numEstTrial']; ?> </td>
                        <td><?php echo $row['numNitdrFreq']; ?> </td>
                        <td><?php echo $row['numLastRunWt']; ?> </td>
                        <td><?php echo $row['txtMfgBy']; ?> </td>
                        <td><?php echo $row['numInputTillDate']; ?> </td>
                        <td><?php echo $row['txtDieStatus']; ?> </td>
                        <td><?php echo $row['txtDieMfgRqrd']; ?> </td>
                        <td><?php echo $row['dtDateTime']; ?> </td>
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