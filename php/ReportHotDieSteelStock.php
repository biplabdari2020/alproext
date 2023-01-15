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
	<title>Hot Die Steel Stock Report</title>
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
            <h1>Hot Die Steel Stock Report</h1><br>
            <form name="ReportHotDieSteelStock" method="post" action="../php/ReportHotDieSteelStock.php">   
            <!-- Log No  :  <input type="text" name="txtLogNo" id="txtLogNo" placeholder="" value="" >
            <br>Start Date(From)  :  <input type="date" name="dtStartTime" id="dtStartTime" placeholder="">
            <br>Start Date(To)  :  <input type="date" name="dtEndTime" id="dtEndTime" placeholder="" value="">
                                                        <?php //$date=date_create("2022-01-01"); echo date_format($date,"Y-m-d H:i:s"); ?> -->
                             
            <center><table id="dataTable_1" border="2">
                        <tr>
                            <th>Log Diameter(From)</th>
                            <th>Log Diameter(To)</th>
                            <th>Supplier</th>
                        </tr>        
                        <tr>
                            <td>                
                                <input type="float" name="txtLogDiaFrom" id="txtLogDiaFrom" placeholder="" value="0" >
                            </td>
                            <td>                
                                <input type="float" name="txtLogDiaTo" id="txtLogDiaTo" placeholder="" value="1000" >
                            </td>
                            <td>                
                                <!-- <input type="text" name="txtCompCode" id="txtCompCode" placeholder="" value="" > -->
                                <select name="txtSuppName" id="txtSuppName">
									<option value="">--All--</option>
									<?php
									$qry = "select distinct txtSuppName from alpro_prod.mst_hot_die_steel order by txtSuppName;";
									$data = getDataFromDB($qry);
									while($row = $data->fetch_assoc()) {
									?>
										<option value="<?php echo $row['txtSuppName']; ?>"><?php echo $row['txtSuppName']; ?></option>
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
                    $txtLogDiaFrom = $_POST['txtLogDiaFrom'];
                    $txtLogDiaTo = $_POST['txtLogDiaTo'];
                    $txtSuppName = $_POST['txtSuppName'];

                    
                    $qry = "SELECT *
                    from alpro_prod.Report_Hotdiesteelstock where (txtSuppName like '%$txtSuppName%' and numDia between $txtLogDiaFrom and $txtLogDiaTo)";                    
                    
                    $data = getDataFromDB($qry);

                    $param = 'txtLogDiaFrom='.$txtLogDiaFrom.'&txtLogDiaTo='.$txtLogDiaTo.'&txtSuppName='.$txtSuppName;
                    //$param = 'qryInput='.$qry;
                    ?>
                    <td><a href="../php/ReportHotDieSteelStockPrint.php?<?php echo $param; ?>" class="myButton" target="_blank">Print</a></td>
                    <?php
                    
                    
                    if ($data) {
                        ?>
                    <!-- <input type="text" size="20" id="myInput_lgNo" class="myInputCSS" onkeyup="myFunction('myInput_lgNo','0')" placeholder="Search for Log No">
            
                    <input type="text" size="20" id="myInput_op" class="myInputCSS" onkeyup="myFunction('myInput_op','1')" placeholder="Search for Operator"> -->
                        <table id="dataTable" border="2">
                        
                            <tr>
                                <th>Log No</th>
                                <th>Log Type</th>
                                <th>Invoice No</th>
                                <th>Date of Purchase</th>
                                <th>Supplier Name</th>
                                <th>Diameter</th>
                                <th>Length</th>
                                <th>Weight</th>
                                <th>Remarks</th>
                            </tr>
                        <?php
                        // output data of each row
                        while($row = $data->fetch_assoc()) {
                    ?>
                        <tr size=100>
                            <td><?php echo $row['txtLogNo']; ?> </td>
                            <td><?php echo $row['txtLogType']; ?> </td>
                            <td><?php echo $row['txtInvNo']; ?> </td>
                            <td><?php echo $row['dtLogRecv']; ?> </td>
                            <td><?php echo $row['txtSuppName']; ?> </td>
                            <td><?php echo $row['numDia']; ?> </td>
                            <td><?php echo $row['numLength']; ?> </td>
                            <td><?php echo $row['numLogWt']; ?> </td>
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
                    <button type="button" class="myButton" onclick="exportDatatoCSV('dataTable','DieStockReport')">
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