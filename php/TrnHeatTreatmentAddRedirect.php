<?php
include('checkSession.php');
include('UserDefinedLibrary.php');
$txtSessionId = session_id();
$txtUserCode = $_SESSION["username"];
if (isset($_POST['Submit'])){
    $qry = "select * from alpro_prod.trn_heattreatment_tmp where txtSessionId='$txtSessionId'";
                  
    $data = getDataFromDB($qry);
                   
    if ($data){
        $pkJobId = generatePk('JB','trn_job_log','pkJobId');
        //echo($pkJobId);
        while($row = $data->fetch_assoc()) {
            $pk_HeatTrtID = generatePk('HT','trn_heattreatment','pk_HeatTrtID');
            echo("<br>".$pk_HeatTrtID);
            $txtDieNo=$row['txtDieNo'];	
            $txtCompCode=$row['txtCompCode'];
            $txtHTType=$row['txtHTType'];
            $numFinalHardness=$row['numFinalHardness'];
            $txtVendor=$row['txtVendor'];
            $numCompWt=$row['numCompWt'];
            $dtSentDate=$row['dtSentDate'];
            $dtRecvDate=$row['dtRecvDate'];
            $txtChallanNo = $row['txtChallanNo'];
                
            if ($dtSentDate=='') {        
                $dtSentDate = "NULL";
            }
            else {
                $dtSentDate = "'".$dtSentDate."'";
            }
            if ($dtRecvDate=='') {        
                $dtRecvDate = "NULL";
            }
            else {
                $dtRecvDate = "'".$dtRecvDate."'";
            }

            // $txtUserCode=$row['txtUserCode'];
            $txtDieNo=$row['txtDieNo'];
            $txtCompCode=$row['txtCompCode'];

            $insert_qry = "INSERT INTO alpro_prod.trn_heattreatment (pk_HeatTrtID, txtDieNo, txtCompCode, dtSentDate, txtHTType, dtRecvDate, numFinalHardness, txtVendor, numCompWt, txtChallanNo) VALUES  ('$pk_HeatTrtID','$txtDieNo','$txtCompCode',$dtSentDate,'$txtHTType',$dtRecvDate,'$numFinalHardness','$txtVendor',$numCompWt,'$txtChallanNo')";
            // echo("<br>".$insert_qry) ;
            $execute_status = executeQuery($insert_qry);
            if($execute_status != 'pass'){
                echo("<br>".$execute_status."<br>");
                exit;
                //delete temp table
            }
            else{
                //echo("<br> Insert Sucessfull in trn_log_blank_cutting");
            }
            $insert_job_qry = "INSERT INTO alpro_prod.trn_job_log (pkJobId,pkTrnLogsheet, txtFromProcess) VALUES ('$pkJobId','$pk_HeatTrtID','HeatTreatment')";
            //echo("<br>".$insert_job_qry);
            $execute_status = executeQuery($insert_job_qry);
            if($execute_status != 'pass'){
                echo("<br>".$execute_status."<br>");
                exit;
                //delete temp table
            }
            else{
                //echo("<br> Insert Sucessfull in trn_job_log");
            }
        }
        $delete_temp_qry = "Delete from alpro_prod.trn_heattreatment_tmp where txtSessionId='$txtSessionId'";
        $execute_status = executeQuery($delete_temp_qry);
            if($execute_status != 'pass'){
                echo("<br>".$execute_status."<br>");
                exit;
            }
            else{
                //echo("<br> Delete Sucessfull in trn_log_blank_cutting_temp");
            }


    }
    $redirect_qry = "SELECT pk_HeatTrtID, txtDieNo, txtCompCode, dtSentDate, txtHTType,txtHTTypeDesc, dtRecvDate, numFinalHardness, dtDateTime, txtVendor, numCompWt, txtChallanNo FROM alpro_prod.trn_heattreatment a inner join alpro_prod.mst_cons_httype b on a.txtHTType=b.txtHTTypeCode inner join alpro_prod.trn_job_log c on a.pk_HeatTrtID=c.pkTrnLogsheet  where c.pkJobId = '$pkJobId'";
    
    $data = getDataFromDB($redirect_qry);
    ?>
    <!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Blank Cutting Entry View</title>
    <link rel="icon" href="../staticfiles/img/logo.png">
	<link rel="stylesheet" href="../staticfiles/css/style.css">
	<script src="../staticfiles/js/jquery-3.3.1.js"></script>
	<script src="../staticfiles/js/reusable.js"></script>

</head>
<body>
    <!-- Start : for menu bar -->
	<div id="menu_bar_php"></div>    
	<!-- End for menu bar -->
    <div class="myDiv">
        <div class="container">
            <div class="contact-form medium-padding120">
            <h1>Data Sucessfully entered ... JOB ID : <?php echo $pkJobId?></h1><br><br>
            <?php
                if ($data) {
                    ?>
                    <br>
                    <input onclick = "exportDatatoCSV('dataTable','BlankCuttingView')" type="submit" name="Submit" id="Submit" value="Download Report" class="submit-btn">
                    <!-- <input onclick = "printPage('dataTable')" type="submit" name="Submit" id="Submit" value="Print" class="submit-btn"> -->
                    <br><br>
                    <table id="dataTable" border="2">
                        <tr>
                            <th>Serial</th>
                            <th>Die No</th>
                            <th>Die Component</th>
                            <th>Sent Date</th>
                            <th>Heat Treatment Type</th>
                            <th>Received Date</th>
                            <th>Final Hardness (BHN)</th>
                            <th>Vendor</th>
                            <th>Component Weight</th>
                            <th>Challan No</th>
                        </tr>
                    <?php
                    // output data of each row
                    while($row = $data->fetch_assoc()) {
                ?>
                    <tr>                    
                    <td><?php echo $row['pk_HeatTrtID']; ?></td>
                        <td><?php echo $row['txtDieNo']; ?></td>
                        <td><?php echo $row['txtCompCode']; ?></td>
                        <td><?php echo $row['dtSentDate']; ?></td>
                        <td><?php echo $row['txtHTTypeDesc']; ?></td>
                        <td><?php echo $row['dtRecvDate']; ?></td>
                        <td><?php echo $row['numFinalHardness']; ?></td>                        
                        <td><?php echo $row['txtVendor']; ?></td>
                        <td><?php echo $row['numCompWt']; ?></td>
                        <td><?php echo $row['txtChallanNo']; ?></td>
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


    <?php
}
    ?>