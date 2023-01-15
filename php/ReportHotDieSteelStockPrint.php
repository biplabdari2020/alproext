<?php
include('checkSession.php');
include('UserDefinedLibrary.php');

$txtLogDiaFrom = $_GET['txtLogDiaFrom'];
$txtLogDiaTo = $_GET['txtLogDiaTo'];
$txtSuppName = $_GET['txtSuppName'];

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
	    
	<!-- End for menu bar -->
    <div>
        <div class="container">
            <div class="contact-form medium-padding120">
            <br><center><h1>Hot Die Steel Stock Report</h1>

                
                <?php
                
                    
                        $qry = "SELECT *
                        from alpro_prod.Report_Hotdiesteelstock  where (txtSuppName like '%$txtSuppName%' and numDia between $txtLogDiaFrom and $txtLogDiaTo)";                    
                    
                    $data = getDataFromDB($qry);
                    
                    
                    if ($data) {
                        ?>
                    <!-- <input type="text" size="20" id="myInput_lgNo" class="myInputCSS" onkeyup="myFunction('myInput_lgNo','0')" placeholder="Search for Log No">
            
                    <input type="text" size="20" id="myInput_op" class="myInputCSS" onkeyup="myFunction('myInput_op','1')" placeholder="Search for Operator"> -->
                    <center><table id="dataTable" border="2">
                        
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
                    
                    

                    <?php
                
                
                ?>
                
                <br>
            </div>
        </div>
    </div>

</body>