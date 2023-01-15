<?php
include('checkSession.php');
include('UserDefinedLibrary.php');
$txtDieNo=$_GET['id'];
if ($txtDieNo!="") {
$qry = "select * from alpro_prod.vv_trn_prod_logsheet where txtDieNo like '%".$txtDieNo."%' order by dtDateTime desc";
}
if ($txtDieNo=="") {
    $qry = "select * from alpro_prod.vv_trn_prod_logsheet order by dtDateTime desc";
    }

$data = getDataFromDB($qry);
//echo($data);
?>
<!-- HTML -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Production Logsheet View</title>
	<link rel="icon" href="../staticfiles/img/logo.png">
	<link rel="stylesheet" href="../staticfiles/css/style.css">
	<script src="../staticfiles/js/jquery-3.3.1.js"></script>
	<script src="../staticfiles/js/reusable.js"></script>
    <script>
        function clicked(){
            return confirm('Do you want to continue ..');
        }

        function makeTableScroll() {
            // Constant retrieved from server-side via JSP
            var maxRows = 10;

            var table = document.getElementById('dataTable');
            var wrapper = table.parentNode;
            var rowsInTable = table.rows.length;
            var height = 0;
            if (rowsInTable > maxRows) {
                for (var i = 0; i < maxRows; i++) {
                    height += table.rows[i].clientHeight;
                }
                wrapper.style.height = height + "px";
            }
        }
    </script>

</head>
<body>
    <!-- Start : for menu bar -->
	<div id="menu_bar_php"></div>    
	<!-- End for menu bar -->
    <div>
        <div class="container">
            <div class="contact-form medium-padding120">
            <br><br><br><br><br><h1><center>Production Logsheet View</center></h1><br><br>
            <center><input type="text" size="20" id="myInput_1" class="myInputCSS" onkeyup="myFunction('myInput_1','7')" placeholder="Search for Die No">
            <input type="text" size="20" id="myInput_2" class="myInputCSS" onkeyup="myFunction('myInput_2','27')" placeholder="Search for Remarks"></center>
            
            <div  class="table-container"  >
            
                <?php
                if ($data) {
                    ?>
                    <table id="dataTable" border="2"  onload="makeTableScroll();">
                        <tr>
                            <th></th>
                            <th></th>
                            <th>Prod Log ID</th>
                            <th>Date</th>
                            <th>Press</th>
                            <th>Shift</th>
                            <th>Production Type</th>
                            <th>Die No</th>
                            <th>Cavity</th>
                            <th>Quenching Media</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Running Hour</th>
                            <th>Lot No</th>
                            <th>Alloy</th>
                            <th>Temper</th>
                            <th>Temparature</th>
                            <th>Billet Dia</th>
                            <th>Billet Length</th>
                            <th>No Of Billet</th>  
                            <th>Input Weight (Kg)</th>
                            <th>Discharge Thickness</th>
                            <th>Cutting Length (Mtr)</th>
                            <th>Weight/Pc (Kg/Mtr)</th>
                            <th>Good Pcs</th>
                            <th>Output Wt (Kg)</th>
                            <th>Recovery %</th>
                            <th>Output Rate</th>
                            <th>Unload Reason</th>
                            <th>Remarks</th>
                            <th>Trasaction Date</th>
                        </tr>
                    <?php
                    // output data of each row
                    while($row = $data->fetch_assoc()) {
                    $param = 'id='.$row['pkProdLogSheet'];
                ?>
                    <tr>
                         <!-- <td><a href="../php/TrnProductionLogSheetUpdate.php?<?php echo $param; ?>" class="myButton">Edit</a></td>
                        <td><a href="../php/TrnProductionLogSheetDelete.php?<?php echo $param; ?>" class="myButton" onclick="return clicked();">Delete</a></td> -->
                        <?php
                        $td_obj = edit_delete_role_based("TrnProductionLogSheetUpdate","TrnProductionLogSheetDelete",$param,"ProdUser,Admin");
                        echo($td_obj);
                        ?>
                        <td><?php echo $row['pkProdLogSheet']; ?> </td>
                        <td><?php echo $row['dtLogDate']; ?> </td>
                        <td><?php echo $row['txtPress']; ?> </td>
                        <td><?php echo $row['txtShift']; ?> </td>
                        <td><?php echo $row['txtProductionType']; ?> </td>
                        <td><?php echo $row['txtDieNo']; ?> </td>
                        <td><?php echo $row['numCavity']; ?> </td>
                        <td><?php echo $row['txtQuenchMedia']; ?> </td>
                        <td><?php echo $row['dtStartTime']; ?> </td>
                        <td><?php echo $row['dtEndTime']; ?> </td>
                        <td><?php echo $row['numRunningHour']; ?> </td>
                        <td><?php echo $row['txtLotNo']; ?> </td>
                        <td><?php echo $row['txtBilletAlloy']; ?> </td>
                        <td><?php echo $row['txtCastNo']; ?> </td>
                        <td><?php echo $row['numBilletTemp']; ?> </td>
                        <td><?php echo $row['numBilletDia']; ?> </td>
                        <td><?php echo $row['numBilletLength']; ?> </td>
                        <td><?php echo $row['numNoOfBillet']; ?> </td>
                        <td><?php echo $row['numInputWt']; ?> </td>
                        <td><?php echo $row['numDischThick']; ?> </td>
                        <td><?php echo $row['numCuttingLegth']; ?> </td>
                        <td><?php echo $row['numWtPerPc']; ?> </td>
                        <td><?php echo $row['numNoOfGoodPcs']; ?> </td>
                        <td><?php echo $row['numOutputWt']; ?> </td>
                        <td><?php echo $row['numRecovery']; ?> </td>
                        <td><?php echo $row['numOutputPerHour']; ?> </td>
                        <td><?php echo $row['txtReason']; ?> </td>
                        <td><?php echo $row['txtRemarks']; ?> </td>
                        <td><?php echo $row['dtDateTime']; ?></td>
                    </tr>
                </div>
                <?php
                    }
                }
                else{
                    ?>
                    <p style="color:red;">No Record Found</p>
                    <?php
                }
                ?>
                <br><br>
            </div>
        </div>
    </div>

</body>