<?php
include('checkSession.php');
include('UserDefinedLibrary.php');
$txtDieNo=$_GET['id'];
if ($txtDieNo!="") {
    $qry = "select pk_HeatTrtID,txtDieNo, txtCompCode txtDieCompName, dtSentDate,txtHTType,mst_cons_httype.txtHTTypeDesc, dtRecvDate,numFinalHardness, numCompWt, txtVendor,txtChallanNo, dtDateTime from alpro_prod.trn_heattreatment   LEFT OUTER JOIN alpro_prod.mst_cons_httype on trn_heattreatment.txtHTType=mst_cons_httype.txtHTTypeCode where txtDieNo like '%".$txtDieNo."%' order by dtDateTime desc";
}
if ($txtDieNo=="") {
    $qry = "select pk_HeatTrtID,txtDieNo, txtCompCode txtDieCompName, dtSentDate,txtHTType,mst_cons_httype.txtHTTypeDesc, dtRecvDate,numFinalHardness, numCompWt, txtVendor,txtChallanNo, dtDateTime from alpro_prod.trn_heattreatment   LEFT OUTER JOIN alpro_prod.mst_cons_httype on trn_heattreatment.txtHTType=mst_cons_httype.txtHTTypeCode order by dtDateTime desc";
    }


//echo $qry ;
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
	<title>Heat Treatment</title>
    <link rel="icon" href="../staticfiles/img/logo.png">
	<link rel="stylesheet" href="../staticfiles/css/style.css">
	<script src="../staticfiles/js/jquery-3.3.1.js"></script>
	<script src="../staticfiles/js/reusable.js"></script>
    <script>
        function clicked(){
            return confirm('Do you want to continue ..');                                               
        }
        function Checked(flag){
            
                alert("Already Received. Cannot "+flag+" Entry");
            
        }
    </script>

</head>
<body>
    <!-- Start : for menu bar -->
	<div id="menu_bar_php"></div>    
	<!-- End for menu bar -->
    <div class="myDiv">
        <div class="container">
            <div class="contact-form medium-padding120">
            <h1>Heat Treatment Data</h1><br><br>
            <input type="text" size="20" id="myInput_1" class="myInputCSS" onkeyup="myFunction('myInput_1','2')" placeholder="Search for Die" title="Type in a name">
            <input type="text" size="20" id="myInput_2" class="myInputCSS" onkeyup="myFunction('myInput_2','3')" placeholder="Search for Component" title="Type in a name">
                <?php
                if ($data) {
                    ?>
                    <br>
                    <input onclick = "exportDatatoCSV('dataTable','BlankCuttingView')" type="submit" name="Submit" id="Submit" value="Download Report" class="submit-btn">
                    <!-- <input onclick = "printPage('dataTable')" type="submit" name="Submit" id="Submit" value="Print" class="submit-btn"> -->
                    <br><br>
                    <table id="dataTable" border="2">
                        <tr>
                            <th></th>
                            <th>Heat Treatment ID</th>
                            <th>Die No</th>
                            <th>Die Component</th>
                            <th>Sent Date</th>
                            <th>Heat Treatment Type</th>
                            <th>Received Date</th>
                            <th>Final Hardness (BHN)</th>
                            <th>Component Weight</th>
                            <th>Vendor</th>
                            <th>Challan No</th>                            
                            <th>Trasaction Date</th>
                        </tr>
                    <?php
                    // output data of each row
                    while($row = $data->fetch_assoc()) {
                ?>
                    <tr>
                    <?php
                    if($row['dtRecvDate']==""){
                        ?>
                        <td><a href="../php/TrnHeatTreatmentUpdate.php?id=<?php echo $row['pk_HeatTrtID']; ?>" class="myButton" >Edit</a></td>
                        <?php
                    }
                    else{
                        ?>
                        <td><a href="../php/TrnHeatTreatmentUpdate.php?id=<?php echo $row['pk_HeatTrtID']; ?>" class="myButton" >Edit</a></td>
                        <?php
                    }

                    ?>                   
                        <td><?php echo $row['pk_HeatTrtID']; ?></td>
                        <td><?php echo $row['txtDieNo']; ?></td>
                        <td><?php echo $row['txtDieCompName']; ?></td>
                        <td><?php echo $row['dtSentDate']; ?></td>
                        <td><?php echo $row['txtHTTypeDesc']; ?></td>
                        <td><?php echo $row['dtRecvDate']; ?></td>
                        <td><?php echo $row['numFinalHardness']; ?></td>
                        <td><?php echo $row['numCompWt']; ?></td>
                        <td><?php echo $row['txtVendor']; ?></td>
                        <td><?php echo $row['txtChallanNo']; ?></td>
                        <td><?php echo $row['dtDateTime']; ?></td>
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
                <br><br>
            </div>
        </div>
    </div>

</body>