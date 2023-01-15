<?php
include('checkSession.php');
include('UserDefinedLibrary.php');
$txtDieNo=$_GET['id'];
if ($txtDieNo!="") {
    $qry = "SELECT pkTRLogsheet, pkJobId, trn_trlogsheet.txtDieNo,trn_trlogsheet.txtComponent txtDieCompName, mst_const_oper.txtOperCode, mst_const_oper.txtOperName ,mst_employee.txtEmpNo,mst_employee.txtEmpName, trn_trlogsheet.txtShift, mst_machine.txtMachineNo,mst_machine.txtMachineName, numEstTime, trn_trlogsheet.dtStartTime, trn_trlogsheet.dtEndTime,  numBrkdHrs, NumSettingTime,NumUnloadingTime,trn_trlogsheet.dtDateTime,txtHTFlag FROM alpro_prod.trn_trlogsheet  INNER JOIN  alpro_prod.mst_employee on trn_trlogsheet.txtOperatorCode=mst_employee.txtEmpNo  INNER JOIN  alpro_prod.mst_const_oper on trn_trlogsheet.txtOperationCode= mst_const_oper.txtOperCode inner join alpro_prod.trn_job_log on trn_job_log.pkTrnLogsheet = trn_trlogsheet.pkTRLogsheet inner join alpro_prod.mst_machine on trn_trlogsheet.txtWorkStation = mst_machine.txtMachineNo  where dtStartTime >='2022-11-01' and txtDieNo like '%".$txtDieNo."%' order by dtDateTime desc";
}
if ($txtDieNo=="") {
    $qry = "SELECT pkTRLogsheet, pkJobId, trn_trlogsheet.txtDieNo,trn_trlogsheet.txtComponent txtDieCompName, mst_const_oper.txtOperCode, mst_const_oper.txtOperName ,mst_employee.txtEmpNo,mst_employee.txtEmpName, trn_trlogsheet.txtShift, mst_machine.txtMachineNo,mst_machine.txtMachineName, numEstTime, trn_trlogsheet.dtStartTime, trn_trlogsheet.dtEndTime,  numBrkdHrs, NumSettingTime,NumUnloadingTime,trn_trlogsheet.dtDateTime,txtHTFlag FROM alpro_prod.trn_trlogsheet  INNER JOIN  alpro_prod.mst_employee on trn_trlogsheet.txtOperatorCode=mst_employee.txtEmpNo  INNER JOIN  alpro_prod.mst_const_oper on trn_trlogsheet.txtOperationCode= mst_const_oper.txtOperCode inner join alpro_prod.trn_job_log on trn_job_log.pkTrnLogsheet = trn_trlogsheet.pkTRLogsheet inner join alpro_prod.mst_machine on trn_trlogsheet.txtWorkStation = mst_machine.txtMachineNo  where dtStartTime >='2022-11-01' order by dtDateTime desc";
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
	<title>ToolRoom Logsheet View</title>
    <link rel="icon" href="../staticfiles/img/logo.png">
	<link rel="stylesheet" href="../staticfiles/css/style.css">
	<script src="../staticfiles/js/jquery-3.3.1.js"></script>
	<script src="../staticfiles/js/reusable.js"></script>
    <script>
        function clicked(){
            return confirm('Do you want to continue ..');                                               
        }
        function Checked(flag){
            
                alert("Sent to Heat Treatment. Cannot "+flag+" Entry");
            
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
            <h1>ToolRoom Logsheet View</h1><br><br>
            <input type="text" size="20" id="myInput_1" class="myInputCSS" onkeyup="myFunction('myInput_1','2')" placeholder="Search for Job" title="Type in a name">
            <input type="text" size="20" id="myInput_2" class="myInputCSS" onkeyup="myFunction('myInput_2','4')" placeholder="Search for Die" title="Type in a name">
                <?php
                if ($data) {
                    ?>
                    <br>
                    <input onclick = "exportDatatoCSV('dataTable','BlankCuttingView')" type="submit" name="Submit" id="Submit" value="Download Report" class="submit-btn">
                    <!-- <input onclick = "printPage('dataTable')" type="submit" name="Submit" id="Submit" value="Print" class="submit-btn"> -->
                    <br><br>
                    <table id="dataTable" border="2" >
                        <tr>
                            <th></th>
                            <th></th>
                            <th>Job ID</th>
                            <th>Logsheet Serial</th>
                            <th>Die No</th>
                            <th>Die Component</th>
                            <th>Operation</th>
                            <th>Operator</th>
                            <th>Shift</th>
                            <th>Workstation</th>
                            <th>Estimated Time</th>
                            <th>Start Time</th>
                            <th>End Time</th>
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
                    <?php
                    if($row['txtHTFlag']=="Y"){
                        ?>
                        <td><a class="myButton" onclick="Checked('Edit');">Edit</a></td>
                        <td><a class="myButton" onclick="Checked('Delete');">Delete</a></td>
                        <?php
                    }
                    else{
                        ?>
                        <td><a href="../php/TrnTRLogsheetUpdate.php?id=<?php echo $row['pkTRLogsheet']; ?>" class="myButton" >Edit</a></td>
                        <td><a href="../php/TrnTRLogsheetDelete.php?id=<?php echo $row['pkTRLogsheet']; ?>" class="myButton" onclick="return clicked();">Delete</a></td>
                        <?php
                    }

                    ?>
                    
                        <td><?php echo $row['pkJobId']; ?></td>
                        <td><?php echo $row['pkTRLogsheet']; ?></td>
                        <td><?php echo $row['txtDieNo']; ?></td>
                        <td><?php echo $row['txtDieCompName']; ?></td>
                        <td><?php echo $row['txtOperName']; ?></td>
                        <td><?php echo $row['txtEmpName']; ?></td>
                        <td><?php echo $row['txtShift']; ?></td>
                        <td><?php echo $row['txtMachineName']; ?></td>
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