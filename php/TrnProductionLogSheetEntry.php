<?php
include('checkSession.php');
include('UserDefinedLibrary.php');
$pkProdLogSheet = generatePk('PRD','trn_prod_logsheet','pkProdLogSheet');
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Production Log Sheet Entry</title>
	<link rel="icon" href="../staticfiles/img/logo.png">
	<link rel="stylesheet" href="../staticfiles/css/style.css">
	<script src="../staticfiles/js/jquery-3.3.1.js"></script>
	<script src="../staticfiles/js/reusable.js"></script>
	<script>

		function dependantDataTRProdLog(){
			var id = document.getElementById("txtDieNo").value;
			console.log(id)
			$.ajax({
				url: 'dependantDataAjax.php',
				dataType: "json",
				data: {'action': 'dependantDataTRProdLog','id':id},
				success: function(return_data){
					console.log(return_data)
					// $("#numCavity").text(return_data.NumCavity);
					document.getElementById("numCavity").value =(return_data.NumCavity);
					
				}
			});
      }

	  function getrecovery() {
		var recovery = ((document.getElementById("numOutputWt").value/document.getElementById("numInputWt").value)*100).toFixed(2);
		//console.log(recovery)
		document.getElementById("numRecovery").value=(recovery);
		var startDt = document.getElementById("dtStartTime").value;
		var endDt = document.getElementById("dtEndTime").value;
		var dt1 = new Date(startDt);
		var dt2 = new Date(endDt);
		var diff = ((dt2-dt1)/ 1000 / 60 / 60).toFixed(2);
		document.getElementById("numOutputPerHour").value=(document.getElementById("numOutputWt").value/diff).toFixed(2);
	}

	function getrunninghr() {
		var startDt = document.getElementById("dtStartTime").value;
		var endDt = document.getElementById("dtEndTime").value;
		var dt1 = new Date(startDt);
		var dt2 = new Date(endDt);
		var diff = ((dt2-dt1)/ 1000 / 60 / 60).toFixed(2);
		//console.log(diff)
		document.getElementById("numRunningHour").value=(diff);
	}
		function setParamTrnProdLogSheetinp(){
		// Set Running Hour
		var startDt = document.getElementById("dtStartTime").value;
		var endDt = document.getElementById("dtEndTime").value;
		var dt1 = new Date(startDt);
		var dt2 = new Date(endDt);
		var diff = ((dt2-dt1)/ 1000 / 60 / 60).toFixed(2);
		//console.log(diff)
		//document.getElementById("numRunningHour").value=(diff);
		//Set Input Weight
		const input_wt_const = 0.0027;
		var billetDia = document.getElementById("numBilletDia").value;
		var billetLen = document.getElementById("numBilletLength").value;
		var billetCount = document.getElementById("numNoOfBillet").value;
		var billetRadius = billetDia/2;
		var inputWT = (3.14*billetRadius*billetRadius*billetLen*input_wt_const*billetCount).toFixed(2);
		//console.log(inputWT)
		document.getElementById("numInputWt").value=(inputWT);
		
	}

	function setParamTrnProdLogSheetOp(){
		// Set Running Hour
		var startDt = document.getElementById("dtStartTime").value;
		var endDt = document.getElementById("dtEndTime").value;
		var dt1 = new Date(startDt);
		var dt2 = new Date(endDt);
		var diff = ((dt2-dt1)/ 1000 / 60 / 60).toFixed(2);
		//console.log(diff)
		
		//Set Output Weight
		var wtPerPc = document.getElementById("numWtPerPc").value;
		var NoOfGoodPcs = document.getElementById("numNoOfGoodPcs").value;
		var cuttingLength = document.getElementById("numCuttingLegth").value;
		var outputWT = (wtPerPc*NoOfGoodPcs*cuttingLength).toFixed(2);
		//console.log(outputWT)
		document.getElementById("numOutputWt").value=(outputWT);
		//Set Output Rate
		var outputRate = (outputWT/diff).toFixed(2);
		document.getElementById("numOutputPerHour").value=(outputRate);
		//Set Recovery
		var recovery = ((outputWT/inputWT)*100).toFixed(2);
		//console.log(recovery)
		document.getElementById("numRecovery").value=(recovery);
	}

		function getDiaFromPress(){
			var id = document.getElementById("txtPress").value;
			
			$.ajax({
				url: 'dependantDataAjax.php',
				dataType: "json",
				data: {'action': 'getDiaFromPress','id':id},
				success: function(return_data){
					console.log(return_data);
					document.getElementById("numBilletDia").value =(return_data.txtPressDia); 
				}
			});
		}
  	</script>

</head>

<body  onClick="getrecovery()">
	<!-- Start : for menu bar -->
	<div id="menu_bar_php"></div>
	<!-- End for menu bar -->

	<div class="myDiv">
		<div class="container">
			<div class="contact-form medium-padding120">
				<form name="TrnBlankCuttingAdd" method="post" action="../php/TrnProductionLogSheetAdd.php">
					<h2>Production Log Sheet Entry</h2><br><br>
					
					<div>
					<b>Date : </b> <input type="date" name="dtLogDate" id="dtLogDate" placeholder="" value=""
									required>
						<b>Press</b> : <select name="txtPress" id="txtPress" onclick="getDiaFromPress()">
									<option value="">--Select--</option>
									<?php
									$qry = "select distinct txtPressCode,txtPressDesc from alpro_prod.mst_const_press order by txtPressCode";
									$data = getDataFromDB($qry);
									while($row = $data->fetch_assoc()) {
									?>
										<option value="<?php echo $row['txtPressCode']; ?>"><?php echo $row['txtPressCode']; ?></option>
									<?php	
									}
									?>
								</select>
								<b>Shift</b> : <select name="txtShift" id="txtShift">
									<option value="">--Select--</option>
									<?php
									$qry = "select distinct txtShiftCOde,txtShiftDesc from alpro_prod.mst_const_shift order by txtShiftCOde";
									$data = getDataFromDB($qry);
									while($row = $data->fetch_assoc()) {
									?>
										<option value="<?php echo $row['txtShiftCOde']; ?>"><?php echo $row['txtShiftCOde']; ?></option>
									<?php	
									}
									?>
								</select>	
								<b>Production Type</b> : <select name="txtProductionType" id="txtProductionType">
									<option value="">--Select--</option>
									<?php
									$qry = "select distinct txtProductionType from alpro_prod.mst_cons_prodtype";
									$data = getDataFromDB($qry);
									while($row = $data->fetch_assoc()) {
									?>
										<option value="<?php echo $row['txtProductionType']; ?>"><?php echo $row['txtProductionType']; ?></option>
									<?php	
									}
									?>
								</select>						
					</div>	<br>						
					<table id="dataTable1" border="2">
						<tr>
							<th>Die No</th>
							<th>Cavity</th>
							<th>Quenching Media</th>
							<th>Start Time</th>
							<th>End Time</th>			
							<th>Running Hour</th>			
							<th>Lot No</th>				
						</tr>
						<tr>							
							<td>
								<!-- cerate single level drop down -->
								<select name="txtDieNo" id="txtDieNo" required onclick = "dependantDataTRProdLog()">
									<option value="">--Select--</option>
									<?php
									$qry = "select distinct txtDieNo from alpro_prod.mst_die where txtDieStatus !='Rejected' order by txtDieNo";
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
							<!-- <td id="numCavity" name="numCavity"></td> -->
							<td><input type="text" name="numCavity" id="numCavity" size="6" readonly></td>
							<td>
							<select name="txtQuenchMedia" id="txtQuenchMedia" >
										<option value="0">--Select--</option>
										<option value="Water">Water</option>
										<option value="Air">Air</option>
										<option value="Both">Both</option>
									</select>
							</td>
							<td>
								<input type="datetime-local" name="dtStartTime" id="dtStartTime" placeholder="" value=""
									required>
							</td>
							<td>
								<input type="datetime-local" name="dtEndTime" id="dtEndTime" onclick="setEndDate('dtStartTime','dtEndTime')" placeholder="" value=""
									required>
							</td>
							<!-- <td id ="numRunningHour"> </td> -->
							<td><input type="text" name="numRunningHour" id="numRunningHour" onclick ="getrunninghr()"></td>
							<td>
							<input type="text" name="txtLotNo" id="txtLotNo" size="5" value=""
									>
							</td>
							
						</tr>
					</table>
					<br>
					<table id="dataTable2" border="2">
						<tr>
							<th>Alloy</th>
							<th>Temper</th>
							<th>Temparature</th>
							<th>Billet Dia</th>
							<th>Billet Length</th>
							<th>No Of Billet</th>	
							<th>Input Weight (Kg)</th>							
						</tr>
						<tr>
							<td>
							<input type="text" name="txtBilletAlloy" id="txtBilletAlloy" size="8" value=""
									>
							</td>							
							<td>
								<input type="text" name="txtCastNo" id="txtCastNo" size="8" value=""
									>
							</td>
							<td>
							<input type="text" name="numBilletTemp" id="numBilletTemp" size="8" value="" required
									>
							</td>
							<td>
							<input type="text" name="numBilletDia" id="numBilletDia" size="8" value=""
									required>
							</td>
							<td>
							<input type="text" name="numBilletLength" id="numBilletLength" size="8" value=""
									required>
							</td>
							<td>
							<input type="text" name="numNoOfBillet" id="numNoOfBillet" size="8" value=""
									required>
							</td>
							<td>
							<input type="text" name="numInputWt" id="numInputWt" value=""
							onclick="setParamTrnProdLogSheetinp()">
							</td>
							
						</tr>
					</table><br>
					<table id="dataTable3" border="2">
						<tr>
							<th>Discard Thickness</th>
							<th>Cutting Length (Mtr)</th>
							<th>Weight/Pc (Kg/Mtr)</th>
							<th>Good Pcs</th>
							<th>Output Wt (Kg)</th>		
							
											
						</tr>
						<tr>							
						<td>
								<input type="float" name="numDischThick" id="numDischThick" placeholder="" value=""
									>
							</td>
							<td>
							<input type="float" name="numCuttingLegth" id="numCuttingLegth" placeholder="" value=""
									required>
							</td>
							<td>
							<input type="float" name="numWtPerPc" id="numWtPerPc" placeholder="" value=""
									required>
							</td>
							<td>
							<input type="number" name="numNoOfGoodPcs" id="numNoOfGoodPcs" placeholder="" value=""
									required>
							</td>
							<td>
							<input type="float" name="numOutputWt" id="numOutputWt" placeholder="" value=""
									required onclick="setParamTrnProdLogSheetOp()">
							</td>
							
						</tr>
					</table><br>
					<table id="dataTable4" border="2">
						<tr>
									
							<th>Recovery %</th>
							<th>Output Rate</th>
							<th>Unload Reason</th>
							<th>Remarks</th>
											
						</tr>
						<tr>		
							<td>											
							<input type="float" name="numRecovery" id="numRecovery" placeholder="" value=""
									required>
							</td>
							<td>
							<input type="float" name="numOutputPerHour" id="numOutputPerHour" placeholder="" value=""
									required>
							</td>
							<td>
							<select name="numReasonCode" id="numReasonCode" >
									<option value="0">--Select--</option>
									<?php
									$qry = "select numReasonCode, txtReason from alpro_prod.mst_cons_unload_reason order by numReasonCode";
									$data = getDataFromDB($qry);
									while($row = $data->fetch_assoc()) {
									?>
										<option value="<?php echo $row['numReasonCode']; ?>"><?php echo $row['txtReason']; ?></option>
									<?php	
									}
									?>
								</select>
							</td>
							<td>
							<textarea id="txtRemarks" name="txtRemarks" rows="2" cols="50"></textarea>
							
							</td>
						</tr>
					</table><br>
					<input type="submit" name="Submit" id="Submit" value="Submit" class="submit-btn">
					<input type="hidden" name="pkProdLogSheet" id="pkProdLogSheet" value="<?php echo($pkProdLogSheet); ?>">
					<br><br>
				</form>
			</div>
		</div>
	</div>
</body>
</html>

<!-- HTML -->