<?php
include('checkSession.php');
include('UserDefinedLibrary.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Generate Report</title>
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
				<form name="MasterSectionAdd" method="post" action="../php/DynamicReportGeneration.php">
					<h2>Generate Report</h2><br><br>
					<select name="txtName" id="txtName"  title="Report Name" onclick = "getFilterGenerateReport()" required>
						<option value="">Select Report Name</option>
							<?php
								$qry = "select distinct txtName from alpro_prod.mst_report where txtActive = 'Y'";
									// echo $qry;
								$data = getDataFromDB($qry);
								while($row = $data->fetch_assoc()) {
							?>
									<option value="<?php echo $row['txtName']; ?>"><?php echo $row['txtName']; ?></option>
							<?php	
									}
							?>
					</select><br><br>
					<select name="txtLogNo" id="txtLogNo"  title="Log No">
						<option value="">Select Log No</option>
							<?php
								$qry = "select distinct txtLogNo from alpro_prod.mst_hot_die_steel";
									// echo $qry;
								$data = getDataFromDB($qry);
								while($row = $data->fetch_assoc()) {
							?>
									<option value="<?php echo $row['txtLogNo']; ?>"><?php echo $row['txtLogNo']; ?></option>
							<?php	
									}
							?>
					</select>
					<select name="txtDieNo" id="txtDieNo"  title="Die No">
						<option value="">Select Die No</option>
							<?php
								$qry = "select distinct txtDieNo from alpro_prod.mst_die";
									// echo $qry;
								$data = getDataFromDB($qry);
								while($row = $data->fetch_assoc()) {
							?>
									<option value="<?php echo $row['txtDieNo']; ?>"><?php echo $row['txtDieNo']; ?></option>
							<?php	
									}
							?>
					</select>
					<br><br>
					<select name="txtComponent" id="txtComponent"  title="Die Component">
						<option value="">Select Die Component</option>
							<?php
								$qry = "select distinct txtCompName from alpro_prod.mst_die_comp";
									// echo $qry;
								$data = getDataFromDB($qry);
								while($row = $data->fetch_assoc()) {
							?>
									<option value="<?php echo $row['txtCompName']; ?>"><?php echo $row['txtCompName']; ?></option>
							<?php	
									}
							?>
					</select>
					<select name="txtEmpName" id="txtEmpName"  title="Operator">
						<option value="">Select Operator</option>
							<?php
								$qry = "select distinct txtEmpName from alpro_prod.mst_employee";
									// echo $qry;
								$data = getDataFromDB($qry);
								while($row = $data->fetch_assoc()) {
							?>
									<option value="<?php echo $row['txtEmpName']; ?>"><?php echo $row['txtEmpName']; ?></option>
							<?php	
									}
							?>
					</select>
					<br><br>
					<select name="txtSuppName" id="txtSuppName"  title="Vendor Name">
						<option value="">Select Vendor Name</option>
							<?php
								$qry = "select distinct hdssup from alpro_prod.mst_cons_hdsmakesup";
									// echo $qry;
								$data = getDataFromDB($qry);
								while($row = $data->fetch_assoc()) {
							?>
									<option value="<?php echo $row['hdssup']; ?>"><?php echo $row['hdssup']; ?></option>
							<?php	
									}
							?>
					</select>
					<br><br>
					<input type="date" name="dtStartTime" id="dtStartTime" title="Start Date">
					<input type="date" name="dtEndTime" id="dtEndTime"  title="End Date" onclick="setEndDate('dtStartTime','dtEndTime')">
					<br><br>
					<select name="txtPress" id="txtPress"  title="Press" display="none">
						<option value="">Select Press</option>
							<?php
								$qry = "select distinct txtPressCode from alpro_prod.mst_const_press";
									// echo $qry;
								$data = getDataFromDB($qry);
								while($row = $data->fetch_assoc()) {
							?>
									<option value="<?php echo $row['txtPressCode']; ?>"><?php echo $row['txtPressCode']; ?></option>
							<?php	
									}
							?>
					</select>
					<select name="txtShift" id="txtShift"  title="Shift" display="none">
						<option value="">Select Shift</option>
							<?php
								$qry = "select distinct txtShiftCOde from alpro_prod.mst_const_shift";
									// echo $qry;
								$data = getDataFromDB($qry);
								while($row = $data->fetch_assoc()) {
							?>
									<option value="<?php echo $row['txtShiftCOde']; ?>"><?php echo $row['txtShiftCOde']; ?></option>
							<?php	
									}
							?>
					</select>
					<br><br>
					
					<br><br>
					<input type="submit" name="Submit" id="Submit" value="Generate Report" class="submit-btn"  formtarget="_blank">
					<input type="submit" name="DownloadReport" id="DownloadReport" value="Download Report" class="submit-btn"  formtarget="_blank">
					<br><br>
				</form>
			</div>
		</div>
	</div>
</body>

</html>


