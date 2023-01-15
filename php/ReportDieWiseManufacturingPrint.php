<?php
include('checkSession.php');
include('UserDefinedLibrary.php');
$txtDieNo = $_GET['txtDieNo'];
$txtEmpName = $_GET['txtEmpName'];
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
	<title>Die Wise Manufacturing Report</title>
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
            <center><br><h1>Die Wise Manufacturing Report</h1>
                
                <?php
                
                $checkrecord = count($_POST);
               
                    if ($StartDateLength > 0 or $EndDateLength > 0){
                        $qry = "SELECT * from alpro_prod.Report_Diewisemanufacturing where (txtEmpName like '%$txtEmpName%' and txtDieNo like '%$txtDieNo%') and (dtStartTime between '$dtStartTime' and '$dtEndTime')";                    
                    }
                    else{
                        $qry = "SELECT * from alpro_prod.Report_Diewisemanufacturing where (txtEmpName like '%$txtEmpName%' and txtDieNo like '%$txtDieNo%')";                    
                    }
                    $data = getDataFromDB($qry);
                    
                    if ($data) {
                        ?>
                    <!-- <input type="text" size="20" id="myInput_lgNo" class="myInputCSS" onkeyup="myFunction('myInput_lgNo','0')" placeholder="Search for Log No">
            
                    <input type="text" size="20" id="myInput_op" class="myInputCSS" onkeyup="myFunction('myInput_op','1')" placeholder="Search for Operator"> -->
                        <center><table id="dataTable" border="2">
                        
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
                    
                    

                    <?php
                
                
                ?>
                
                <br>
            </div>
        </div>
    </div>

</body>