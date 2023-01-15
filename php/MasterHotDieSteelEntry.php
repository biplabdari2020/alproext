<?php
include('checkSession.php');
include('UserDefinedLibrary.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Hot Die Steel Master Data Entry</title>
	<link rel="icon" href="../staticfiles/img/logo.png">
	<link rel="stylesheet" href="../staticfiles/css/style.css">
	<script src="../staticfiles/js/jquery-3.3.1.js"></script>
	<script src="../staticfiles/js/reusable.js"></script>
	<script>
		function getLogwt(){			
	var numDia = document.getElementById("numDia").value;	
	var numLength = document.getElementById("numLength").value;
	numDia = numDia /100;
	var numrad = numDia /2;
	var numWt = 3.14 * (numrad * numrad) * (0.0785 * numLength);
	numWt = numWt.toFixed(3);
	document.getElementById("numLogWt").value=numWt;
	//confirm(numWt);
		}

		function fillfirstlenwt(){			
	var numwt = document.getElementById("numLogWt").value;	
	var numLength = document.getElementById("numLength").value;
	
	document.getElementById("numFirstLength").value=numLength;
	document.getElementById("numFirstWeight").value=numwt;
	//confirm(numWt);
		}	
	</script>
</head>

<body>
	<!-- Start : for menu bar -->
	<div id="menu_bar_php"></div>
	<!-- End for menu bar -->

	<div class="myDiv" onclick="fillfirstlenwt()">
		<div class="container">
			<div class="contact-form medium-padding120">
				<form name="MasterHotDieSteelAdd" method="post" action="../php/MasterHotDieSteelAdd.php">
					<h2>Hot Die Steel Master Data Entry</h2><br><br>
					<INPUT type="button" class="myButton" value="Delete Row" onclick="delRow()" />
					<INPUT type="button" class="myButton" value="Add Row" onclick="addRow()" /><br><br>
					<table id="dataTable" border="2">
						<tr>
							<th></th>
							<th>Log No</th>
							<th>Log Type</th>
							<th>Diameter</th>
							<th>Length</th>
							<th>Weight (MT)</th>
							<th>Make</th>
							<th>Supplier Name</th>
							<th>Invoice No</th>
							<th>Log Received</th>
							<th>Hardness</th>
						</tr>
						<tr>
							<td><INPUT type="checkbox" name="checkbox_name" id="checkbox_id" /></td>
							<td>
								<input type="text" size="5" name="txtLogNo" id="txtLogNo" placeholder="" value=""
									required>
							</td>
							<td>
								<select name="txtLogType" id="txtLogType">
									<option value="">--Select--</option>
									<?php
									$qry = "select distinct hdstypecode, hdstype from alpro_prod.mst_cons_hdstype order by hdstypecode";
									$data = getDataFromDB($qry);
									while($row = $data->fetch_assoc()) {
									?>
										<option value="<?php echo $row['hdstype']; ?>"><?php echo $row['hdstype']; ?></option>
									<?php	
									}
									?>
								</select>
							</td>								
							<td>
								<input type="float" size="5" name="numDia" id="numDia" placeholder="" value="" onblur="getLogwt();"
									required>
							</td>
							<td>
								<input type="number" size="2" name="numLength" id="numLength" placeholder="" value="" onblur="getLogwt();"
									required>
							</td>
							<td>
								<input type="float" size="5" name="numLogWt" id="numLogWt" placeholder="" 
									required>
							</td>
							<td>
								<select name="txtMake" id="txtMake">
									<option value="">--Select--</option>
									<?php
									$qry = "select distinct hdsmake from alpro_prod.mst_cons_hdsmakesup order by hdsmake";
									$data = getDataFromDB($qry);
									while($row = $data->fetch_assoc()) {
									?>
										<option value="<?php echo $row['hdsmake']; ?>"><?php echo $row['hdsmake']; ?></option>
									<?php	
									}
									?>
								</select>
							</td>
							<td>
								<select name="txtSuppName" id="txtSuppName">
									<option value="">--Select--</option>
									<?php
									$qry = "select distinct hdssup from alpro_prod.mst_cons_hdsmakesup order by hdssup";
									$data = getDataFromDB($qry);
									while($row = $data->fetch_assoc()) {
									?>
										<option value="<?php echo $row['hdssup']; ?>"><?php echo $row['hdssup']; ?></option>
									<?php	
									}
									?>
								</select>
							</td>
							
							<td>
								<input type="text" size="12" name="txtInvNo" id="txtInvNo" placeholder="" value=""
									required>
							</td>
							<td>
								<input type="date" size="4" name="dtLogRecv" id="dtLogRecv" placeholder="" value=""
									>
							</td>
							<td>
								<input type="float" size="5" name="numHardness" id="numHardness" placeholder="" value=""
									required>
							</td>
						</tr>
					</table>
					<input type="hidden" name="numFirstLength" id="numFirstLength" value="">
				        <input type="hidden" name="numFirstWeight" id="numFirstWeight" value="">
					<br><br>
					<input type="submit" name="Submit" id="Submit" value="Submit" class="submit-btn">
					<br><br>
				</form>
			</div>
		</div>
	</div>
</body>

</html>