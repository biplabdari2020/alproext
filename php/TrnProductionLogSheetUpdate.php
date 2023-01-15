<?php
include('checkSession.php');
include('UserDefinedLibrary.php');
$pkProdLogSheet=$_GET['id'];
$qry = "select * from alpro_prod.v_trn_prod_logsheet where pkProdLogSheet = '".$pkProdLogSheet."'";

$data = getDataFromDB($qry);
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Production Log Sheet Update</title>
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
			<?php
                    if ($data) {
                    ?>
				<form name="TrnProductionLogSheetUpdate" method="post" action="../php/TrnProductionLogSheetUpdateQry.php">
					<h2>Production Log Sheet Update</h2><br><br>
					
					<div>
						
					<?php
                        // output data of each row
                        while($rowmain = $data->fetch_assoc()) {
                ?>
					<b>Date : </b> <input type="datetime-local" name="dtLogDate" id="dtLogDate" placeholder="" value="<?php echo $rowmain['dtLogDate']; ?>"
									required>
						<b>Press</b> : <select name="txtPress" id="txtPress" onclick="getDiaFromPress()">
									<option value="<?php echo $rowmain['txtPress']; ?>"><?php echo $rowmain['txtPress']; ?></option>
									<?php
									$qry = "select distinct txtPressCode,txtPressDesc from alpro_prod.mst_const_press where txtPressCode!='".$rowmain['txtPress']."' order by txtPressCode";
									$data = getDataFromDB($qry);
									while($row = $data->fetch_assoc()) {
									?>
										<option value="<?php echo $row['txtPressCode']; ?>"><?php echo $row['txtPressCode']; ?></option>
									<?php	
									}
									?>
								</select>
								<b>Shift</b> : <select name="txtShift" id="txtShift">
								<option value="<?php echo $rowmain['txtShift']; ?>"><?php echo $rowmain['txtShift']; ?></option>
									<?php
									$qry = "select distinct txtShiftCOde,txtShiftDesc from alpro_prod.mst_const_shift where txtShiftCOde!='".$rowmain['txtShift']."' order by txtShiftCOde";
									$data = getDataFromDB($qry);
									while($row = $data->fetch_assoc()) {
									?>
										<option value="<?php echo $row['txtShiftCOde']; ?>"><?php echo $row['txtShiftCOde']; ?></option>
									<?php	
									}
									?>
								</select>
								<b>Production Type</b> : <select name="txtProductionType" id="txtProductionType">
								<option value="<?php echo $rowmain['txtProductionType']; ?>"><?php echo $rowmain['txtProductionType']; ?></option>
									<?php
									$qry = "select distinct txtProductionType from alpro_prod.mst_cons_prodtype where txtProductionType!='".$rowmain['txtProductionType']."'";
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
								<option value="<?php echo $rowmain['txtDieNo']; ?>"><?php echo $rowmain['txtDieNo']; ?></option>
									<?php
									$qry = "select distinct txtDieNo from alpro_prod.mst_die_comp where txtDieNo not in (select txtDieNo from alpro_prod.trn_die_sent_trial where txtStatus='OK') and txtDieNo!='".$rowmain['txtDieNo']."'";
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
							<td><input type="text" name="numCavity" id="numCavity" value="<?php echo $rowmain['numCavity']; ?>" size="6" readonly></td>
							<td>
							<select name="txtQuenchMedia" id="txtQuenchMedia" >
							<option value="<?php echo $rowmain['txtQuenchMedia']; ?>"><?php echo $rowmain['txtQuenchMedia']; ?></option>
										<option value="Water">Water</option>
										<option value="Air">Air</option>
										<option value="Both">Both</option>
									</select>
							</td>
							<td>
								<input type="datetime-local" name="dtStartTime" id="dtStartTime" placeholder="" value="<?php echo $rowmain['dtStartTime']; ?>"
									required>
							</td>
							<td>
								<input type="datetime-local" name="dtEndTime" id="dtEndTime" onclick="setEndDate('dtStartTime','dtEndTime')" placeholder="" value="<?php echo $rowmain['dtEndTime']; ?>"
									required>
							</td>
							<!-- <td id ="numRunningHour"> </td> -->
							<td><input type="text" name="numRunningHour" id="numRunningHour" value="<?php echo $rowmain['numRunningHour']; ?>" onclick="getrunninghr()"></td>
							<td>
							<input type="text" name="txtLotNo" id="txtLotNo" size="5" value="<?php echo $rowmain['txtLotNo']; ?>"
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
							<input type="text" name="txtBilletAlloy" id="txtBilletAlloy" size="8" value="<?php echo $rowmain['txtBilletAlloy']; ?>"
									>
							</td>							
							<td>
								<input type="text" name="txtCastNo" id="txtCastNo" size="8" value="<?php echo $rowmain['txtCastNo']; ?>"
									>
							</td>
							<td>
							<input type="text" name="numBilletTemp" id="numBilletTemp" size="8" value="<?php echo $rowmain['numBilletTemp']; ?>" required
									>
							</td>
							<td>
							<input type="text" name="numBilletDia" id="numBilletDia" size="8" value="<?php echo $rowmain['numBilletDia']; ?>"
									required>
							</td>
							<td>
							<input type="text" name="numBilletLength" id="numBilletLength" size="8" value="<?php echo $rowmain['numBilletLength']; ?>"
									required>
							</td>
							<td>
							<input type="text" name="numNoOfBillet" id="numNoOfBillet" size="8" value="<?php echo $rowmain['numNoOfBillet']; ?>"
									required>
							</td>
							<td>
							<input type="text" name="numInputWt" id="numInputWt" value="<?php echo $rowmain['numInputWt']; ?>"
							 onclick ="setParamTrnProdLogSheetinp()">
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
								<input type="float" name="numDischThick" id="numDischThick" placeholder="" value="<?php echo $rowmain['numDischThick']; ?>"
									>
							</td>
							<td>
							<input type="float" name="numCuttingLegth" id="numCuttingLegth" placeholder="" value="<?php echo $rowmain['numCuttingLegth']; ?>"
									required>
							</td>
							<td>
							<input type="float" name="numWtPerPc" id="numWtPerPc" placeholder="" value="<?php echo $rowmain['numWtPerPc']; ?>"
									required>
							</td>
							<td>
							<input type="number" name="numNoOfGoodPcs" id="numNoOfGoodPcs" placeholder="" value="<?php echo $rowmain['numNoOfGoodPcs']; ?>"
									required>
							</td>
							<td>
							<input type="float" name="numOutputWt" id="numOutputWt" placeholder="" value="<?php echo $rowmain['numOutputWt']; ?>"
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
							<input type="float" name="numRecovery" id="numRecovery" placeholder="" value="<?php echo $rowmain['numRecovery']; ?>"
									required>
							</td>
							<td>
							<input type="float" name="numOutputPerHour" id="numOutputPerHour" placeholder="" value="<?php echo $rowmain['numOutputPerHour']; ?>"
									required>
							</td>
							<td>
							<select name="numReasonCode" id="numReasonCode" >
									<option value="<?php echo $rowmain['numReasonCode']; ?>"><?php echo $rowmain['txtReason']; ?></option>
									<?php
									$qry = "select numReasonCode, txtReason from alpro_prod.mst_cons_unload_reason where numReasonCode!='".$rowmain['numReasonCode']."' order by numReasonCode";
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
							<textarea id="txtRemarks" name="txtRemarks" rows="2" cols="50"><?php echo $rowmain['txtRemarks']; ?></textarea>
							
							</td>
						</tr>
					</table><br>
					<input type="submit" name="Submit" id="Submit" value="Submit" class="submit-btn">
					<input type="hidden" name="pkProdLogSheet" id="pkProdLogSheet" value="<?php echo($pkProdLogSheet); ?>">
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
</html>

<!-- HTML -->
