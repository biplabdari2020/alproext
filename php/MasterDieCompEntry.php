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
	<title>Die Component Master</title>
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
				<form name="MasterDieCompAdd" method="post" action="../php/MasterDieCompAdd.php">
					<h2>Die Component Master</h2><br><br>
					<INPUT type="button" class="myButton" value="Delete Row" onclick="delRow()" />
					<INPUT type="button" class="myButton" value="Add Row" onclick="addRow()" /><br><br>
					<table id="dataTable" border="2">
						<tr>
							<th></th>
							<th>Die No</th>
							<th>Component</th>
							<th>Component ID</th>
							<!-- <th>Component Name</th> -->
						</tr>
						<tr>
							<td><INPUT type="checkbox" name="checkbox_name" id="checkbox_id" /></td>
							<td>
							<select name="txtDieNo" id="txtDieNo" onclick="getComponent()">
								<option value="">--Select--</option>
								<?php
								$qry = "select distinct txtDieNo from alpro_prod.mst_die order by txtDieNo";
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
							<select name="txtCompCode" id="txtCompCode" onclick="getComponent()">
								<option value="">--Select--</option>
								<?php
								$qry = "select distinct txtDieCompCode, txtDieCompName from alpro_prod.mst_const_diecomp";
								$data = getDataFromDB($qry);
								while($row = $data->fetch_assoc()) {
								?>
									<option value="<?php echo $row['txtDieCompCode']; ?>"><?php echo $row['txtDieCompName']; ?></option>
								<?php	
								}
								?>
							</select>
							</td>
							<td>
								
								<input type="text" name="txtCompName" id="txtCompName" placeholder=""
									value="" required>
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