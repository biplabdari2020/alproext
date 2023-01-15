<?php
include('checkSession.php');
include('UserDefinedLibrary.php');

$txtSectionNo = $_GET['txtSectionNo'];
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
	<title>Die Cutting Order Report</title>
    <link rel="icon" href="../staticfiles/img/logo.png">
	<link rel="stylesheet" href="../staticfiles/css/style.css">
	<script src="../staticfiles/js/jquery-3.3.1.js"></script>
	<script src="../staticfiles/js/reusable.js"></script>
    <script type="text/javascript" src="ExportToCSV.js"></script>


</head>
<body>
    
    <div>
        <div class="container">
            <div class="contact-form medium-padding120">
            <center><h1>Die Cutting Order Report</h1><br>
                            <?php
                    
                    if ($StartDateLength > 0 or $EndDateLength > 0){
                        $qry = "SELECT * from alpro_prod.Report_DieCuttingOrder where (txtSectionNo like '%$txtSectionNo%' and txtDieNo like '%$txtDieNo%') and txtCompCode like '%$txtCompCode%' and (dtStartTime between '$dtStartTime' and '$dtEndTime')";                    
                    }
                    else{
                        $qry = "SELECT * from alpro_prod.Report_DieCuttingOrder where (txtSectionNo like '%$txtSectionNo%' and txtDieNo like '%$txtDieNo%' and txtCompCode like '%$txtCompCode%')";                    
                    }
                    $data = getDataFromDB($qry);
                    
                    
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
                
                    <?php
                
                
                ?>
                
            </div>
        </div>
    </div>

</body>