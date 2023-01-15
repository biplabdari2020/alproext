<?php
include('checkSession.php');
include('UserDefinedLibrary.php');
$pkTRLogsheet = generatePk('TR','trn_trlogsheet','pkTRLogsheet');

$txtSessionId = session_id();
$txtUserCode = $_SESSION["username"];

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tool Room Logsheet Entry</title>
	<link rel="icon" href="../staticfiles/img/logo.png">
	<link rel="stylesheet" href="../staticfiles/css/style.css">
	<script src="../staticfiles/js/jquery-3.3.1.js"></script>
	<script src="../staticfiles/js/reusable.js"></script>
	<script>
		
		function getComponent(){
			var id = document.getElementById("txtDieNo").value;
			console.log(id);
			console.log("welcome")
			$.ajax({
				url: 'dependantDataAjax.php',
				dataType: "json",
				data: {'action': 'getCompCodefromDieNo','id':id},
				success: function(return_data){
					console.log(return_data);
					$('select[name="txtCompCode"]').empty();					
					$.each(return_data,function(key,value){
						$('select[name="txtCompCode"]').append('<option value="'+ value +'">'+ value +'</option>');						
					});
				}
			});
		}

		function populate_settingTime_unloadingTime(){
			var operation_id = document.getElementById("txtWorkStation").value;
			console.log(operation_id);
			if(operation_id=="M008" || operation_id=="M009" || operation_id=="M011" || operation_id=="M013" || operation_id=="M014" || operation_id=="M010"){
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
				<form name="TrnTRLogsheetAdd" method="post" action="../php/TrnTRLogsheetAdd.php">
					<h2>Toolroom Logsheet Entry</h2><br><br>
					
					<table id="dataTable" border="2">
						<tr>
							<!-- <th>Blank Cutting Order</th>
							<th>Log No</th> -->
							<th>Die</th>
							<th>Component</th>
							<th>Operator</th>
							<th>Shift</th>
							<th>Operation</th>
							<th>Work Station</th>
							<th>Estimated Time</th>
							<th>Start Time</th>
							<th>End Time</th>
							<th>Breakdown Hr</th>
							<th>Setting Time</th>
							<th>Unloading Time</th>
						</tr>
						<tr>
							
							<td>
								<!-- cerate single level drop down -->
								<select name="txtDieNo" id="txtDieNo" class="die_class" onclick="getComponent()">
									<option value="">--Select--</option>
									<?php
									$qry = "SELECT distinct txtDieNo FROM alpro_prod.mst_die where txtDieStatus in ('New','Under Manufacturing','Converted','Correction') order by txtDieNo";
									$data = getDataFromDB($qry);
									while($row = $data->fetch_assoc()) {
									?>
										<option value="<?php echo $row['txtDieNo']; ?>"><?php echo $row['txtDieNo']; ?></option>
									<?php	
									}
									?>
								</select>
								<!-- cerate single level drop down -->
							</td>
							<td>
								<select name="txtCompCode" id="txtCompCode" class="comp_code_class">
								<option value="">Select Comp Code</option>
								</select>
							</td>
							<?php
							$qry = "select distinct pkTrnLogsheet from alpro_prod.trn_log_blank_cutting where txtReleaseFlag='Y' order by dtDateTime desc";
							$data = getDataFromDB($qry);
							?>
							<!-- <td id="txtLogNo"></td>
							<td id="txtDieNo"></td> -->
							<!-- <td id="txtCompCode"></td> -->
							<td>
								<!-- cerate single level drop down -->
								<select name="txtOperatorCode" id="txtOperatorCode">
									<option value="">--Select--</option>
									<?php
									$qry = "select distinct txtEmpNo,txtEmpName from alpro_prod.mst_employee where txtActiveFlag ="."'".'Y'."'";
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
									<option value="">--Select--</option>
									<?php
									$qry = "select distinct txtShiftCOde,txtShiftDesc from alpro_prod.mst_const_shift";
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
								<select name="txtOperation" id="txtOperation" >
									<option value="">--Select--</option>
									<?php
									$qry = "select distinct txtOperCode, txtOperName from alpro_prod.mst_const_oper order by txtOperCode";
									$data = getDataFromDB($qry);
									while($row = $data->fetch_assoc()) {
									?>
										<option value="<?php echo $row['txtOperCode']; ?>"><?php echo $row['txtOperName']; ?></option>
									<?php	
									}
									?>
								</select>
							</td>
							<td>
								<select name="txtWorkStation" id="txtWorkStation" onclick="populate_settingTime_unloadingTime()">
									<option value="">--Select--</option>
									<?php
									$qry = "select distinct txtMachineNo, txtMachineName from alpro_prod.mst_machine where txtActiveFlag='Y'";
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
								<input type="float" size =5 name="numEstTime" id="numEstTime" placeholder="Enter Estimated Time"
									value="">
							</td>
							<td>
								<input type="datetime-local" name="dtStartTime" id="dtStartTime" placeholder="" value=""
									>
							</td>
							<td>
								<input type="datetime-local" name="dtEndTime" id="dtEndTime" onclick="setEndDate('dtStartTime','dtEndTime')" placeholder="" value=""
									>
							</td>
							<td>
								<input type="float" size =5 name="numBrkdHrs" id="numBrkdHrs" placeholder="Enter Breakdown Time"
									value="">
							</td>
							<td>
								<input type="float" size =5 name="NumSettingTime" id="NumSettingTime" value="0" readonly>
							</td>
							<td>
								<input type="float" size =5 name="NumUnloadingTime" id="NumUnloadingTime" value="0" readonly>
							</td>
							<!-- <td>
							<select name="txtHTFlag" id="txtHTFlag">
										<option value="N">N</option>
										<option value="Y">Y</option>
									</select>
							</td> -->
							<td>
							<input type="submit" name="Add" id="Add" value="Add" class="submit-btn">
							</td>									
						</tr>
					</table>
                    <input type="hidden" name="pkTRLogsheet" id="pkTRLogsheet" value="<?php echo($pkTRLogsheet); ?>">
					<br><br>
					
					<!-- Add Anirban Start -->
				</form>
				
				<form name="TrnTRLogsheetSubmit" method="post" action="../php/TrnTRLogsheetRedirect.php">
					<?php
						$qry = "SELECT count(*) cntRecord FROM alpro_prod.trn_trlogsheet_temp where txtSessionId='$txtSessionId'";                    
										
						$data = getDataFromDB($qry);      
						$row = $data->fetch_assoc();

						$checkrecord = 1;
						
						if ($row['cntRecord'] > 0)
						{						
						
						
							$qryS = "SELECT pkTRLogsheet, trn_trlogsheet_temp.txtDieNo,trn_trlogsheet_temp.txtComponent txtDieCompName, mst_const_oper.txtOperName ,mst_employee.txtEmpName, trn_trlogsheet_temp.txtShift, txtWorkStation, numEstTime, trn_trlogsheet_temp.dtStartTime, trn_trlogsheet_temp.dtEndTime, numBrkdHrs, trn_trlogsheet_temp.dtDateTime,NumSettingTime,NumUnloadingTime FROM alpro_prod.trn_trlogsheet_temp INNER JOIN  alpro_prod.mst_employee on trn_trlogsheet_temp.txtOperatorCode=mst_employee.txtEmpNo INNER JOIN  alpro_prod.mst_const_oper on trn_trlogsheet_temp.txtOperationCode= mst_const_oper.txtOperCode where txtSessionId = '$txtSessionId' order by dtDateTime desc";
							//echo $qryS ;
							$data = getDataFromDB($qryS);
							//echo($data);

							if ($data) 
							{
								?>
								<center><table id="dataTable2" border="2">
								<tr>
								<th></th>
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
								while($row = $data->fetch_assoc()) 
								{
									?>
									<tr>
									
									<td><a href="../php/TrnTRLogsheetDeleteTemp.php?id=<?php echo $row['pkTRLogsheet']; ?>" class="myButton" onclick="return clicked();">Delete</a></td>
								
							
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
                			else
							{
							?>
							<p style="color:red;">No Record Found</p>
							<?php
                			}
						}
                			?>					
					<!-- Add Anirban End -->

					<br><br>
					</table></center>
					<br><br>
					<input type="submit" name="Submit" id="Submit" value="Submit" class="submit-btn">
					
				</form>
			</div>
		</div>
	</div>
</body>

</html>