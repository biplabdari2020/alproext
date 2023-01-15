<?php
include('checkSession.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Employee Master Data Entry</title>
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
				<form name="MasterEmployeeAdd" method="post" action="../php/MasterEmployeeAdd.php">
					<h2>Employee Master Data Entry</h2><br><br>
					<INPUT type="button" class="myButton" value="Delete Row" onclick="delRow()" />
					<INPUT type="button" class="myButton" value="Add Row" onclick="addRow()" /><br><br>
					<table id="dataTable" border="2">
						<tr>
							<th></th>
							<th>Employee ID</th>
							<th>Employee Name</th>
							<th>Designation</th>
							<th>Status</th>
						</tr>
						<tr>
							<td><INPUT type="checkbox" name="checkbox_name" id="checkbox_id" /></td>
							<td>
								<input type="text" name="txtEmpNo" id="txtEmpNo" placeholder="" value=""
									required>
							</td>
							<td>
								<input type="text" name="txtEmpName" id="txtEmpName" placeholder=""
									value="" required>
							</td>
							<td>
								<input type="txtMessage" name="txtDesg" id="txtDesg" placeholder=""
									value="" required>
							</td>
							<td>								
								<select name="txtActiveFlag" id="txtActiveFlag" required>
									<option value="" >Select</option>
									<option value="Y">Active</option>
									<option value="N">Inactive</option>
								</select>
							</td>
						</tr>
					</table>
					<br><br>
					<input type="submit" name="Submit" id="Submit" value="Submit" class="submit-btn">
					<br><br>
				</form>
			</div>
		</div>
	</div>
</body>

</html>