<?php
include('checkSession.php');
include('UserDefinedLibrary.php');
$pkSentTrial = generatePk('ST','trn_die_sent_trial','txtTrialNo');
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Die Sent to Trial Entry</title>
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
				<form name="TrnBlankCuttingAdd" method="post" action="../php/TrnDieSentForTrialAdd.php">
					<h2>Die Sent to Trial Entry</h2><br><br>
					
					<table id="dataTable" border="2">
						<tr>
							<th>Die No</th>
							<th>Trial Sent Date</th>
							<th>Trial End Date</th>
							<th>Result</th>
							<th>Remarks</th>
						</tr>
						<tr>							
							<td>
								<!-- cerate single level drop down -->
								<select name="txtDieNo" id="txtDieNo" required>
									<option value="">--Select--</option>
									<?php
									$qry = "select distinct txtDieNo from alpro_prod.mst_die where txtDieStatus IN ('Manufacturing Complete','Converted','Correction')";
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
								<input type="datetime-local" name="dtTrialSent" id="dtTrialSent" placeholder="" value=""
									required>
							</td>
							<td>
								<input type="datetime-local" name="dtTrialEnd" id="dtTrialEnd" onclick="setEndDate('dtTrialSent','dtTrialEnd')" placeholder="" value=""
									>
							</td>
							<td>
							<select name="txtStatus" id="txtStatus">
							<?php
									$qry = "select distinct txtStatusCode, txtStatusDesc from alpro_prod.mst_cons_trialstatus order by 1 desc";
									$data = getDataFromDB($qry);
									while($row = $data->fetch_assoc()) {
									?>
										<option value="<?php echo $row['txtStatusCode']; ?>"><?php echo $row['txtStatusDesc']; ?></option>
									<?php
									}
									?>
									</select>
							</td>
							<td>
								<input type="text" name="txtRemarks" id="txtRemarks" placeholder="" value=""
									>
							</td>
						</tr>
					</table>
                    <input type="hidden" name="pkSentTrial" id="pkSentTrial" value="<?php echo($pkSentTrial); ?>">
					<br><br>
					<input type="submit" name="Submit" id="Submit" value="Submit" class="submit-btn">
					<br><br>
				</form>
			</div>
		</div>
	</div>
</body>
</html>

<!-- HTML -->