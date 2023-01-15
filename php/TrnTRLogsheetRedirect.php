<?php
include('checkSession.php');
include('UserDefinedLibrary.php');
$txtSessionId = session_id();
$txtUserCode = $_SESSION["username"];
if (isset($_POST['Submit'])){
    $qry = "select * from alpro_prod.trn_trlogsheet_temp where txtSessionId='$txtSessionId'";
                  
    $data = getDataFromDB($qry);
                   
    if ($data){
        $pkJobId = generatePk('JB','trn_job_log','pkJobId');
        //echo($pkJobId);
        while($row = $data->fetch_assoc()) {
            $pkTRLogsheet = generatePk('TR','trn_trlogsheet','pkTRLogsheet');
            //echo("<br>".$pkTRLogsheet);
            $fk_trnbclogsheet=$row['fk_trnbclogsheet'];
            $txtOperatorCode=$row['txtOperatorCode'];
            $txtShift=$row['txtShift'];
            $txtOperationCode=$row['txtOperationCode'];
            $txtWorkStation=$row['txtWorkStation'];

            //$txtHTFlag=$row['txtHTFlag'];
            $NumSettingTime = $row['NumSettingTime'];
            $NumUnloadingTime = $row['NumUnloadingTime'];

            $txtUserCode=$row['txtUser'];
            $txtSessionId=$row['txtSessionId'];
            $dtStartTime=$row['dtStartTime'];
            $dtEndTime=$row['dtEndTime'];
            $txtDieNo = $row['txtDieNo'];
            $txtComponent = $row['txtComponent'];

            $numEstTime	=$row['numEstTime'];
            if ($numEstTime=='') {        
                $numEstTime = "NULL";
            }
            else {
                $numEstTime = "'".$numEstTime."'";
            }

            
            $numBrkdHrs	=	$row['numBrkdHrs'];
            if ($numBrkdHrs=='') {        
                $numBrkdHrs = "NULL";
            }
            else {
                $numBrkdHrs = "'".$numBrkdHrs."'";
            }
    
            if ($dtStartTime=='') {        
                $dtStartTime = "NULL";
            }
            else {
                $dtStartTime = "'".$dtStartTime."'";
            }
            if ($dtEndTime=='') {        
                $dtEndTime = "NULL";
            }
            else {
                $dtEndTime = "'".$dtEndTime."'";
            }
            
            
            $insert_qry ="INSERT INTO alpro_prod.trn_trlogsheet (pkTRLogsheet,fk_trnbclogsheet,txtOperatorCode, txtShift, txtOperationCode, txtWorkStation, numEstTime, dtStartTime, dtEndTime, numBrkdHrs, txtUser, txtSessionID,txtDieNo,txtComponent,NumSettingTime,NumUnloadingTime) VALUES ('$pkTRLogsheet','$fk_trnbclogsheet','$txtOperatorCode','$txtShift','$txtOperationCode','$txtWorkStation',$numEstTime,$dtStartTime,$dtEndTime,$numBrkdHrs, '$txtUserCode', '$txtSessionId','$txtDieNo','$txtComponent','$NumSettingTime','$NumUnloadingTime')";
            //echo("<br>".$insert_qry) ;
            $execute_status = executeQuery($insert_qry);
            if($execute_status != 'pass'){
                echo("<br>".$execute_status."<br>");
                exit;
                //delete temp table
            }
            else{
                //echo("<br> Insert Sucessfull in trn_log_blank_cutting");
            }
            $insert_job_qry = "INSERT INTO alpro_prod.trn_job_log (pkJobId,pkTrnLogsheet, fk_TrnLogsheet, txtFromProcess) VALUES ('$pkJobId', '$pkTRLogsheet','$fk_trnbclogsheet', 'TRLogSheet')";
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
        $delete_temp_qry = "Delete from alpro_prod.trn_trlogsheet_temp where txtSessionId='$txtSessionId'";
        $execute_status = executeQuery($delete_temp_qry);
            if($execute_status != 'pass'){
                echo("<br>".$execute_status."<br>");
                exit;
            }
            else{
                //echo("<br> Delete Sucessfull in trn_log_blank_cutting_temp");
            }


    }
    
    $redirect_qry = "SELECT pkTRLogsheet, trn_trlogsheet.txtDieNo,trn_trlogsheet.txtComponent txtDieCompName, mst_const_oper.txtOperName ,mst_employee.txtEmpName, trn_trlogsheet.txtShift, txtWorkStation, numEstTime, trn_trlogsheet.dtStartTime, trn_trlogsheet.dtEndTime, numBrkdHrs, NumSettingTime,NumUnloadingTime, trn_trlogsheet.dtDateTime FROM alpro_prod.trn_trlogsheet INNER JOIN alpro_prod.mst_employee on trn_trlogsheet.txtOperatorCode=mst_employee.txtEmpNo INNER JOIN alpro_prod.mst_const_oper on trn_trlogsheet.txtOperationCode= mst_const_oper.txtOperCode inner join alpro_prod.trn_job_log on trn_job_log.pkTrnLogsheet = trn_trlogsheet.pkTRLogsheet and trn_job_log.pkJobId = '$pkJobId'  order by dtDateTime desc";
    //echo $redirect_qry;
    $data = getDataFromDB($redirect_qry);
    ?>
    <!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tool Room Logsheet View</title>
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
                            <th>Job ID</th>
                            <th>Logsheet Serial</th>
                            <th>Die No</th>
                            <th>Die Component</th>
                            <th>Operation</th>
                            <th>Operator</th>
                            <th>Shift</th>
                            <th>Workstation</th>
                            <th>Estimated Time</th>
                            <th>StartTime</th>
                            <th>EndTime</th>
                            <th>Breakdown Hrs</th>
							<th>Setting Time</th>
							<th>Unloading Time</th>
                            <th>Trasaction Date</th>
                        </tr>
                    <?php
                    // output data of each row
                    while($row = $data->fetch_assoc()) {
                ?>
                    <tr>                    
                        <td><?php echo $pkJobId; ?></td>
                        <td><?php echo $row['pkTRLogsheet']; ?></td>
                        <td><?php echo $row['txtDieNo']; ?></td>
                        <td><?php echo $row['txtDieCompName']; ?></td>
                        <td><?php echo $row['txtOperName']; ?></td>
                        <td><?php echo $row['txtEmpName']; ?></td>
                        <td><?php echo $row['txtShift']; ?></td>
                        <td><?php echo $row['txtWorkStation']; ?></td>
                        <td><?php echo $row['numEstTime']; ?></td>
                        <td><?php echo $row['dtStartTime']; ?></td>
                        <td><?php echo $row['dtEndTime']; ?></td>
                        <td><?php echo $row['numBrkdHrs']; ?></td>
                        <td><?php echo $row['NumSettingTime']; ?></td>
                        <td><?php echo $row['NumUnloadingTime']; ?></td>
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


    <?php
}
    ?>