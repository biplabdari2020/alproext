<?php
include('checkSession.php');
include('UserDefinedLibrary.php');
$txtSessionId = session_id();
$txtUserCode = $_SESSION["username"];
if (isset($_POST['Submit'])){
    $qry = "select * from alpro_prod.trn_log_blank_cutting_temp where txtSessionId='$txtSessionId'";
                  
    $data = getDataFromDB($qry);
                   
    if ($data){
        $pkJobId = generatePk('JB','trn_job_log','pkJobId');
        //echo($pkJobId);
        while($row = $data->fetch_assoc()) {
            $pkTrnLogsheet = generatePk('BC','trn_log_blank_cutting','pkTrnLogsheet');
            echo("<br>".$pkTrnLogsheet);
            $txtLogNo=$row['txtLogNo'];	
            $txtOperatorCode=$row['txtOperatorCode'];
            $txtShift=$row['txtShift'];
            $numCuttingLength=$row['numCuttingLength'];
            $numCuttingTolerence=$row['numCuttingTolerence'];
            $numFinishLength=$row['numFinishLength'];
            $dtStartTime=$row['dtStartTime'];
            $dtEndTime=$row['dtEndTime'];
            
    
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

            $txtReleaseFlag=$row['txtReleaseFlag'];
            $txtUserCode=$row['txtUserCode'];
            $txtDieNo=$row['txtDieNo'];
            $txtCompCode=$row['txtCompCode'];

            $insert_qry = "INSERT INTO alpro_prod.trn_log_blank_cutting (pkTrnLogsheet, txtLogNo, txtOperatorCode, txtShift, numCuttingLength, dtStartTime, dtEndTime, txtReleaseFlag, txtUserCode, txtDieNo, txtComponent,numCuttingTolerence,numFinishLength) VALUES ('$pkTrnLogsheet','$txtLogNo','$txtOperatorCode','$txtShift',$numCuttingLength,$dtStartTime,$dtEndTime,'$txtReleaseFlag','$txtUserCode','$txtDieNo','$txtCompCode',$numCuttingTolerence,$numFinishLength)";
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
            $insert_job_qry = "INSERT INTO alpro_prod.trn_job_log (pkJobId,pkTrnLogsheet, txtFromProcess) VALUES ('$pkJobId','$pkTrnLogsheet','BlankCutting')";
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
        $delete_temp_qry = "Delete from alpro_prod.trn_log_blank_cutting_temp where txtSessionId='$txtSessionId'";
        $execute_status = executeQuery($delete_temp_qry);
            if($execute_status != 'pass'){
                echo("<br>".$execute_status."<br>");
                exit;
            }
            else{
                //echo("<br> Delete Sucessfull in trn_log_blank_cutting_temp");
            }


    }
    $redirect_qry = "SELECT a.pkTrnLogsheet,txtLogNo, txtDieNo, txtCompCode txtDieCompName, txtEmpName, txtShift, numCuttingLength,numCuttingTolerence,numFinishLength, dtStartTime, dtEndTime,a.dtDateTime, case when txtReleaseFlag = 'Y' then 'Yes' else 'No' end txtReleaseFlag FROM alpro_prod.trn_log_blank_cutting a inner join alpro_prod.mst_employee b inner join alpro_prod.mst_const_shift c inner join alpro_prod.trn_job_log e  on (a.txtOperatorCode=b.txtEmpNo and a.txtShift=c.txtShiftCode and a.pkTrnLogsheet=e.pkTrnLogsheet)  where e.pkJobId = '$pkJobId'";
    
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
                            <th>Cuttng Serial</th>
                            <th>Log No</th>
                            <th>Die No</th>
                            <th>Die Component</th>
                            <th>Operator</th>
                            <th>Shift</th>
                            <th>Cutting Length (mm)</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Released (Y/N)</th>
                            <th>Trasaction Date</th>
                        </tr>
                    <?php
                    // output data of each row
                    while($row = $data->fetch_assoc()) {
                ?>
                    <tr>                    
                        <td><?php echo $row['pkTrnLogsheet']; ?></td>
                        <td><?php echo $row['txtLogNo']; ?></td>
                        <td><?php echo $row['txtDieNo']; ?></td>
                        <td><?php echo $row['txtDieCompName']; ?></td>
                        <td><?php echo $row['txtEmpName']; ?></td>
                        <td><?php echo $row['txtShift']; ?></td>
                        <td><?php echo $row['numCuttingLength']; ?></td>
                        <td><?php echo $row['dtStartTime']; ?></td>
                        <td><?php echo $row['dtEndTime']; ?></td>
                        <td><?php echo $row['txtReleaseFlag']; ?></td>
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