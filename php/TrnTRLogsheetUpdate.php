<?php
include('checkSession.php');
include('UserDefinedLibrary.php');
$pkTRLogsheet=$_GET['id'];
//$qry = "select * from alpro_prod.mst_section where txtSectionNo = '".$pkTrnLogsheet."'";
$qry = "SELECT pkTRLogsheet, pkJobId, trn_trlogsheet.txtDieNo,trn_trlogsheet.txtComponent txtDieCompName, mst_const_oper.txtOperCode, mst_const_oper.txtOperName ,mst_employee.txtEmpNo,mst_employee.txtEmpName, trn_trlogsheet.txtShift, mst_machine.txtMachineNo,mst_machine.txtMachineName, numEstTime, trn_trlogsheet.dtStartTime, trn_trlogsheet.dtEndTime,  numBrkdHrs, NumSettingTime,NumUnloadingTime,trn_trlogsheet.dtDateTime,txtHTFlag FROM alpro_prod.trn_trlogsheet  INNER JOIN  alpro_prod.mst_employee on trn_trlogsheet.txtOperatorCode=mst_employee.txtEmpNo  INNER JOIN  alpro_prod.mst_const_oper on trn_trlogsheet.txtOperationCode= mst_const_oper.txtOperCode inner join alpro_prod.trn_job_log on trn_job_log.pkTrnLogsheet = trn_trlogsheet.pkTRLogsheet inner join alpro_prod.mst_machine on trn_trlogsheet.txtWorkStation = mst_machine.txtMachineNo where trn_trlogsheet.pkTRLogsheet='".$pkTRLogsheet."'";
$data = getDataFromDB($qry);
?>

<!-- HTML -->

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ToolRoom Logsheet Update</title>
    <link rel="icon" href="../html/staticfiles/img/logo.png">
	<link rel="stylesheet" href="../staticfiles/css/style.css">
	<script src="../staticfiles/js/jquery-3.3.1.js"></script>
	<script src="../staticfiles/js/reusable.js"></script>
	<script>
		
		function populate_settingTime_unloadingTime(){
			var operation_id = document.getElementById("txtOperation").value;
			console.log(operation_id);
			if(operation_id==4){
				document.getElementById("NumSettingTime").outerHTML="<input type=\"float\" size=\"5\" name=\"NumSettingTime\" id=\"NumSettingTime\" required>";
				document.getElementById("NumUnloadingTime").outerHTML="<input type=\"float\" size=\"5\" name=\"NumUnloadingTime\" id=\"NumUnloadingTime\" required>";
			}else{
				document.getElementById("NumSettingTime").outerHTML="<input type=\"float\" size =5 name=\"NumSettingTime\" id=\"NumSettingTime\" value=\"0\" readonly>";
				document.getElementById("NumUnloadingTime").outerHTML="<input type=\"float\" size =5 name=\"NumUnloadingTime\" id=\"NumUnloadingTime\" value=\"0\" readonly>";
			}
        
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
            <h1>ToolRoom Logsheet Update</h1><br><br>
                
                <?php
                    if ($data) {
                    ?>
                    <form name="TrnBlankCuttingUpdate" method="post" action="../php/TrnTRLogsheetUpdate.php">
                        <table id="dataTable" border="2">
                            <tr>
							<th>Logsheet Serial</th>
                            <th>Die No</th>
                            <th>Die Component</th>
                            <th>Operator</th>
                            <th>Shift</th>
                            <th>Operation</th>
                            <th>Workstation</th>
                            <th>Estimated Time</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Breakdown Hrs</th>
							<th>Setting Time</th>
							<th>Unloading Time</th>						
                            </tr>
                        <?php
                        // output data of each row
                        while($rowmain = $data->fetch_assoc()) {
                ?>
                            <tr> 
                                <td> <?php echo $rowmain['pkTRLogsheet']; ?> </td>							
                                <td> <?php echo $rowmain['txtDieNo']; ?> </td>							
                                <td> <?php echo $rowmain['txtDieCompName']; ?> </td>
							<td>
								<!-- cerate single level drop down -->
								<select name="txtOperatorCode" id="txtOperatorCode">
								<option value="<?php echo $rowmain['txtEmpNo']; ?>"><?php echo $rowmain['txtEmpName']; ?></option>
									<?php
									$qry = "select distinct txtEmpNo,txtEmpName from alpro_prod.mst_employee where txtActiveFlag='Y' and txtEmpNo !="."'".$rowmain['txtOperatorCode']."'";
									$data = getDataFromDB($qry);
									while($row = $data->fetch_assoc()) {
									?>
										<option value="<?php echo $row['txtEmpNo']; ?>"><?php echo $row['txtEmpName']; ?></option>
									<?php	
									}
									?>
								</select>
								<!-- cerate single level drop down -->
							</td>
							<td>
								<!-- cerate single level drop down -->
								<select name="txtShift" id="txtShift">
								<option value="<?php echo $rowmain['txtShift']; ?>"><?php echo $rowmain['txtShift']; ?></option>
									<?php
									$qry = "select distinct txtShiftCOde,txtShiftDesc from alpro_prod.mst_const_shift where txtShiftCOde !="."'".$rowmain['txtShift']."'";
									$data = getDataFromDB($qry);
									while($row = $data->fetch_assoc()) {
									?>
										<option value="<?php echo $row['txtShiftCOde']; ?>"><?php echo $row['txtShiftCOde']; ?></option>
									<?php	
									}
									?>
								</select>
								<!-- cerate single level drop down -->
							</td>
						
							
							<td>
								<!-- cerate single level drop down -->
								<select name="txtOperation" id="txtOperation" onclick="populate_settingTime_unloadingTime()">
								<option value="<?php echo $rowmain['txtOperCode']; ?>"><?php echo $rowmain['txtOperName']; ?></option>
									<?php
									$qry = "select distinct txtOperCode,txtOperName from alpro_prod.mst_const_oper where txtOperCode !="."'".$rowmain['txtOperCode']."'";
									$data = getDataFromDB($qry);
									while($row = $data->fetch_assoc()) {
									?>
										<option value="<?php echo $row['txtOperCode']; ?>"><?php echo $row['txtOperName']; ?></option>
									<?php	
									}
									?>
								</select>
								<!-- cerate single level drop down -->
							</td>
							<td>
							<!-- <input type="text" size =10 name="txtWorkStation" id="txtWorkStation" placeholder="" value="<?php echo $rowmain['txtWorkStation'];?>"
									> -->
									<select name="txtWorkStation" id="txtWorkStation">
									
								<option value="<?php echo $rowmain['txtMachineNo']; ?>"><?php echo $rowmain['txtMachineName']; ?></option>
									<?php
									$qry = "select distinct txtMachineNo, txtMachineName from alpro_prod.mst_machine where txtActiveFlag='Y' and txtMachineName!='".$rowmain['txtMachineName']."'";
									$data = getDataFromDB($qry);
									while($row = $data->fetch_assoc()) {
									?>
										<option value="<?php echo $row['txtMachineNo']; ?>"><?php echo $row['txtMachineName']; ?></option>
									<?php	
									}
									?>
								</select>
										
							</td>
							<td>
							<input type="float" size =5 name="numEstTime" id="numEstTime" placeholder="" value="<?php echo $rowmain['numEstTime'];?>"
								>
										
							</td>
							<td>
								<input type="datetime-local" name="dtStartTime" id="dtStartTime" placeholder="" value="<?php echo $rowmain['dtStartTime'];?>"
									>
							</td>
							<td>
								<input type="datetime-local" name="dtEndTime" id="dtEndTime" onclick="setEndDate('dtStartTime','dtEndTime')" placeholder="" value="<?php echo $rowmain['dtEndTime'];?>"
									>
							</td>
							<td>
							<input type="float" size =5 name="numBrkdHrs" id="numBrkdHrs" placeholder="" value="<?php echo $rowmain['numBrkdHrs'];?>"
								>
										
							</td>
							<td>
								<input type="float" name="NumSettingTime" id="NumSettingTime" placeholder="" value="<?php echo $rowmain['NumSettingTime'];?>"
									>
							</td>
							<td>
								<input type="float" name="NumUnloadingTime" id="NumUnloadingTime" placeholder="" value="<?php echo $rowmain['NumUnloadingTime'];?>"
									>
							</td>
								
				        </table>
                        <input type="hidden" name="pkTRLogsheet" id="pkTRLogsheet" value="<?php echo($pkTRLogsheet); ?>">
				        <br><br>
				        <input type="submit" name="Submit" id="Submit" value="Submit" class="submit-btn">
                
				        <br><br>
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
                <br><br>
            </div>
        </div>
    </div>
</body>

<?php

if (isset($_POST['Submit'])){
    echo("<br>SUBMITTED<br>");   
	//echo $pkTRLogsheet;
	echo "<br>";
    $update_qry = "update alpro_prod.trn_trlogsheet set txtOperatorCode='".$_POST['txtOperatorCode']."',txtShift='".$_POST['txtShift']."',txtOperationCode='".$_POST['txtOperation']."', txtWorkStation='".$_POST['txtWorkStation']."', numEstTime='".$_POST['numEstTime']."', dtStartTime='".$_POST['dtStartTime']."',dtEndTime='".$_POST['dtEndTime']."',numBrkdHrs='".$_POST['numBrkdHrs']."',NumSettingTime='".$_POST['NumSettingTime']."',NumUnloadingTime='".$_POST['NumUnloadingTime']."',dtDateTime = now() where pkTRLogsheet = '".$_POST['pkTRLogsheet']."'";
    echo("<br>".$update_qry."<br>");
    $execute_status = executeQuery($update_qry);
    if($execute_status != 'pass'){
    //    echo("<br>".$execute_status."<br>");
    }
    header("Location: ../php/TrnTRLogsheetView.php");  

}
else{
    echo("<br>Not SUBMITTED<br>");
}
?>

