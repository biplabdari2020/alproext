<?php
include('checkSession.php');
include('UserDefinedLibrary.php');
//$qryInput = $_GET['qryInput'];
$txtLogNo = $_GET['txtLogNo'];
$txtDieNo = $_GET['txtDieNo'];
$txtCompCode = $_GET['txtCompCode'];
$dtStartTime = $_GET['dtStartTime'];
$dtEndTime = $_GET['dtEndTime'];
$StartDateLength = strlen($dtStartTime);
$EndDateLength = strlen($dtEndTime);
//$qry = $qryInput;
//echo $qry;
if ($StartDateLength > 0 or $EndDateLength > 0){
    $qry = "SELECT * from alpro_prod.Report_HotDieSteelCons  where (txtLogNo like '%$txtLogNo%' and txtDieNo like '%$txtDieNo%' and txtCompCode like '%$txtCompCode%' and (dtStartTime between '$dtStartTime' and '$dtEndTime'))";                    
}
else{
    $qry = "SELECT * from alpro_prod.Report_HotDieSteelCons  where (txtLogNo like '%$txtLogNo%' and txtDieNo like '%$txtDieNo%' and txtCompCode like '%$txtCompCode%')";                    
}

$data = getDataFromDB($qry);
?>

<!-- HTML -->

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Hot Die Steel Consumption Report</title>
    <link rel="icon" href="../staticfiles/img/logo.png">
	<link rel="stylesheet" href="../staticfiles/css/style.css">
	<script src="../staticfiles/js/jquery-3.3.1.js"></script>
	<script src="../staticfiles/js/reusable.js"></script>
    <script type="text/javascript" src="ExportToCSV.js"></script>


</head>
<body>
    <div>
        
                <?php
                    if ($data) {
                    ?>
                    <form>
                
                        <center>
                        <table id="dataTable" border="2">
                        <tr>
                        <br><h1 align=center>Hot Die Steel Consumption Report</h1>
                        </tr>  
                        <tr>
                                <th>Log No</th>
                                <th>Log Diameter</th>
                                <th>Vendor Name</th>
                                <th>Die No</th>
                                <th>Die Component</th>
                                <th>Shift</th>
                                <th>Cutting Length (mm/Mtr)</th>
                                <th>Date of Cutting</th>
                                <th>Release</th>
                                <th>Operator</th>
                            </tr>
                        <?php
                        // output data of each row
                        while($row = $data->fetch_assoc()) {
                ?>
                            <tr>
                            <td><?php echo $row['txtLogNo']; ?> </td>
                            <td><?php echo $row['numDia']; ?> </td>
                            <td><?php echo $row['txtSuppName']; ?> </td>
                            <td><?php echo $row['txtDieNo']; ?> </td>
                            <td><?php echo $row['txtDieCompName']; ?> </td>
                            <td><?php echo $row['txtShift']; ?> </td>
                            <td><?php echo $row['numCuttingLength']; ?> </td>
                            <td><?php echo $row['dtStartTime']; ?> </td>
                            <td><?php echo $row['txtReleaseFlag']; ?> </td>
                            <td><?php echo $row['txtEmpName']; ?> </td>
                        </tr>
				        
                        
				        
				    </form>
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
            </div>
        
</body>


