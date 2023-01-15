<?php
include('checkSession.php');
include('UserDefinedLibrary.php');
$txtSessionId = session_id();
$txtUserCode = $_SESSION["username"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Die Rejection</title>
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
				data: {'action': 'getCompCodefromDieNo2','id':id},
				success: function(return_data){
					console.log(return_data);
					$('select[name="txtCompCode"]').empty();					
					$.each(return_data,function(key,value){
						$('select[name="txtCompCode"]').append('<option value="'+ value +'">'+ value +'</option>');						
					});
				}
			});
		}
		function getComponentConv(){
			var id = document.getElementById("txtDieNoConv").value;
			console.log(id);
			console.log("welcome")
			$.ajax({
				url: 'dependantDataAjax.php',
				dataType: "json",
				data: {'action': 'getCompCodefromDieNo2','id':id},
				success: function(return_data){
					console.log(return_data);
					$('select[name="txtComponentConv"]').empty();					
					$.each(return_data,function(key,value){
						$('select[name="txtComponentConv"]').append('<option value="'+ value +'">'+ value +'</option>');						
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
				<form name="DieConversionEntry" method="post" action="../php/DieConversionAdd.php">
					<h2>Die Conversion</h2><br><br>
					
					<table id="dataTable" border="2">
						<tr>							
							<th>Rejected Die No</th>
							<th>Rejected Component</th>
							<th>Converted Die No</th>
							<th>Converted Component</th>
							<th>Remarks</th>
							<!-- <th>Component Name</th> -->
						</tr>
						<tr>
							
							<td>
							<select name="txtDieNo" id="txtDieNo" onclick="getComponent()">
								<option value="">--Select--</option>
								<?php
								$qry = "select distinct txtDieNo from alpro_prod.mst_die where txtDieStatus='Rejected' order by txtDieNo";
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
								<select name="txtCompCode" id="txtCompCode">
									<option value="">--All--</option>
								
								</select>
							</td>
							<td>
							<select name="txtDieNoConv" id="txtDieNoConv" onclick="getComponentConv()">
								<option value="">--Select--</option>
								<?php
								$qry = "select distinct txtDieNo from alpro_prod.mst_die where txtDieStatus in ('NEW','OK') order by txtDieNo";
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
								<select name="txtComponentConv" id="txtComponentConv">
									<option value="">--All--</option>
								
								</select>
							</td>
							<td><input type="textarea" rows="5" style="width:200px; height:35px;"  name="txtRemarks" id="txtRemarks" value="" ></td>
							<td><input type="submit" name="Add" id="Add" value="Add" class="submit-btn"></td>
							<!-- <td>
								<input type="text" name="txtCompName" id="txtCompName" placeholder=""
									value="" required>
							</td> -->
						</tr>
					</table>
					<?php
								$qry = "select count(1) cnt from alpro_prod.trn_die_conversion_temp where txtSessionId='".$txtSessionId."'";
								$data = getDataFromDB($qry);
								while($row = $data->fetch_assoc()) 
								{
									$datacnt = $row['cnt'];
								}
					if ($datacnt) {
						
						?>			
					<br><br>
					<center>
					<table id="dataTable2" border="2">
					<br>
                            <tr>
								<th></th>
							<th>Conv Srl No</th>
							<th>Rejected Die No</th>
							<th>Rejected Component</th>
							<th>Converted Die No</th>
							<th>Converted Component</th>
							<th>Remarks</th>
                            </tr>
                        <?php
                        // output data of each row
						$qry = "select *  from alpro_prod.trn_die_conversion_temp where txtSessionId='".$txtSessionId."'";
						$data = getDataFromDB($qry);
                        while($row = $data->fetch_assoc()) {
                    ?>
                        <tr>
						<td><a href="../php/DieConversionDeleteTemp.php?id=<?php echo $row['pkdieconv']; ?>" class="myButton" onclick="return clicked();">Delete</a></td>
						<td><?php echo $row['pkdieconv']; ?></td>
						<td><?php echo $row['txtDieNo']; ?></td>
                        <td><?php echo $row['txtComponent']; ?></td>
                        <td><?php echo $row['txtDieNoConv']; ?></td>                        
                        <td><?php echo $row['txtComponentConv']; ?></td>                        
                        <td><?php echo $row['txtRemarks']; ?></td>                        
                        </tr>
					
					<br><br>
					<?php
					}
					?>
					</table>
					<br>
					<input type="submit" name="Submit" id="Submit" value="Submit" class="submit-btn">
					<?php
					}
					?>
				</form>
			</div>
		</div>
	</div>
</body>

</html>