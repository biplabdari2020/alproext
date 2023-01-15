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
	<title>Die Assembly</title>
	<link rel="icon" href="../staticfiles/img/logo.png">
	<link rel="stylesheet" href="../staticfiles/css/style.css">
	<script src="../staticfiles/js/jquery-3.3.1.js"></script>
	<script src="../staticfiles/js/reusable.js"></script>
	<script>
function getComponent(){
			var id = document.getElementById("txtCompCode").value;
			console.log(id);
			console.log("welcome")
			$.ajax({
				url: 'dependantDataAjax.php',
				dataType: "json",
				data: {'action': 'getCompCodefromDieNo1','id':id},
				success: function(return_data){
					console.log(return_data);
					$('select[name="txtCompName"]').empty();					
					$.each(return_data,function(key,value){
						$('select[name="txtCompName"]').append('<option value="'+ value +'">'+ value +'</option>');						
					});
				}
			});
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
				<form name="MasterDieCompAdd" method="post" action="../php/TrnDieAssemblyEntryAdd.php">
					<h2>Die Assembly Generation</h2><br><br>
					<INPUT type="button" class="myButton" value="Delete Row" onclick="delRow()" />
					<INPUT type="button" class="myButton" value="Add Row" onclick="addRow()" /><br><br>					
					<table id="dataTable" border="2">
						<tr>
							<th></th>
							<th>Die No</th>
							<th>Die Plate</th>
							<th>Backer</th>
							<th>Insert Bolster</th>
							<th>Feeder</th>
							<th>Mandrel</th>
							<th>Backer Insert</th>
							<th>Bolster Ring</th>
							<th>Die Adopter</th>
							<th>Die Insert</th>
							<th>Die Ring </th>
							<!-- <th>Component Name</th> -->
						</tr>
						<tr>
							<td><INPUT type="checkbox" name="checkbox_name" id="checkbox_id" /></td>
							<td>
							<select name="txtDieNo" id="txtDieNo"">
								<option value="">--Select--</option>
								<?php
								$qry = "select distinct txtDieNo from alpro_prod.trn_mfg_complete union select distinct txtDieNo from alpro_prod.mst_die where txtDieStatus IN ('OK','Converted','Manufacturing Complete') order by txtDieNo";
								$data = getDataFromDB($qry);
								while($row = $data->fetch_assoc()) {
								?>
									<option value="<?php echo $row['txtDieNo']; ?>"><?php echo $row['txtDieNo']; ?></option>
								<?php	
								}
								?>
							</select>
							</td>
							<td>
							<select name="txtDiePlate" id="txtDiePlate">
								<option value="0">--Select--</option>
								<?php
								$qry = "select distinct txtCompName  from alpro_prod.mst_die_comp where txtCompCode='DP'";
								$data = getDataFromDB($qry);
								while($row = $data->fetch_assoc()) {
								?>
									<option value="<?php echo $row['txtCompName']; ?>"><?php echo $row['txtCompName']; ?></option>
								<?php	
								}
								?>
							</select>
							</td>
							<td>
							<select name="txtBacker" id="txtBacker">
								<option value="0">--Select--</option>
								<?php
								$qry = "select distinct txtCompName  from alpro_prod.mst_die_comp where txtCompCode='BA'";
								$data = getDataFromDB($qry);
								while($row = $data->fetch_assoc()) {
								?>
									<option value="<?php echo $row['txtCompName']; ?>"><?php echo $row['txtCompName']; ?></option>
								<?php	
								}
								?>
							</select>
							</td>
							<td>
							<select name="txtIB" id="txtIB">
								<option value="0">--Select--</option>
								<?php
								$qry = "select distinct txtCompName  from alpro_prod.mst_die_comp where txtCompCode='IB'";
								$data = getDataFromDB($qry);
								while($row = $data->fetch_assoc()) {
								?>
									<option value="<?php echo $row['txtCompName']; ?>"><?php echo $row['txtCompName']; ?></option>
								<?php	
								}
								?>
							</select>
							</td>
							<td>
							<select name="txtFeeder" id="txtFeeder">
								<option value="0">--Select--</option>
								<?php
								$qry = "select distinct txtCompName  from alpro_prod.mst_die_comp where txtCompCode='FD'";
								$data = getDataFromDB($qry);
								while($row = $data->fetch_assoc()) {
								?>
									<option value="<?php echo $row['txtCompName']; ?>"><?php echo $row['txtCompName']; ?></option>
								<?php	
								}
								?>
							</select>
							</td>
							<td>
							<select name="txtMandrel" id="txtMandrel">
								<option value="0">--Select--</option>
								<?php
								$qry = "select distinct txtCompName  from alpro_prod.mst_die_comp where txtCompCode='MD'";
								$data = getDataFromDB($qry);
								while($row = $data->fetch_assoc()) {
								?>
									<option value="<?php echo $row['txtCompName']; ?>"><?php echo $row['txtCompName']; ?></option>
								<?php	
								}
								?>
							</select>
							</td>
							<td>
							<select name="txtInsertBacker" id="txtInsertBacker">
								<option value="0">--Select--</option>
								<?php
								$qry = "select distinct txtCompName  from alpro_prod.mst_die_comp where txtCompCode='BI'";
								$data = getDataFromDB($qry);
								while($row = $data->fetch_assoc()) {
								?>
									<option value="<?php echo $row['txtCompName']; ?>"><?php echo $row['txtCompName']; ?></option>
								<?php	
								}
								?>
							</select>
							</td>
							<td>
							<select name="txtBolstarRing" id="txtBolstarRing">
								<option value="0">--Select--</option>
								<?php
								$qry = "select distinct txtCompName  from alpro_prod.mst_die_comp where txtCompCode='BR'";
								$data = getDataFromDB($qry);
								while($row = $data->fetch_assoc()) {
								?>
									<option value="<?php echo $row['txtCompName']; ?>"><?php echo $row['txtCompName']; ?></option>
								<?php	
								}
								?>
							</select>
							</td>
							<td>
							<select name="txtDieAdopter" id="txtDieAdopter">
								<option value="0">--Select--</option>
								<?php
								$qry = "select distinct txtCompName  from alpro_prod.mst_die_comp where txtCompCode='DA'";
								$data = getDataFromDB($qry);
								while($row = $data->fetch_assoc()) {
								?>
									<option value="<?php echo $row['txtCompName']; ?>"><?php echo $row['txtCompName']; ?></option>
								<?php	
								}
								?>
							</select>
							</td>
							<td>
							<select name="txtDieInsert" id="txtDieInsert">
								<option value="0">--Select--</option>
								<?php
								$qry = "select distinct txtCompName  from alpro_prod.mst_die_comp where txtCompCode='DI'";
								$data = getDataFromDB($qry);
								while($row = $data->fetch_assoc()) {
								?>
									<option value="<?php echo $row['txtCompName']; ?>"><?php echo $row['txtCompName']; ?></option>
								<?php	
								}
								?>
							</select>
							</td>
							<td>
							<select name="txtDieRing" id="txtDieRing">
								<option value="0">--Select--</option>
								<?php
								$qry = "select distinct txtCompName  from alpro_prod.mst_die_comp where txtCompCode='DR'";
								$data = getDataFromDB($qry);
								while($row = $data->fetch_assoc()) {
								?>
									<option value="<?php echo $row['txtCompName']; ?>"><?php echo $row['txtCompName']; ?></option>
								<?php	
								}
								?>
							</select>
							</td>
							<!-- <td>
								<input type="text" name="txtCompName" id="txtCompName" placeholder=""
									value="" required>
							</td> -->
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