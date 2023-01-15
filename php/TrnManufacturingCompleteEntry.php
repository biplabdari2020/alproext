<?php
include('checkSession.php');
include('UserDefinedLibrary.php');
$txtSessionId = session_id();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Die Manufacturing Complete</title>
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
					$('select[name="txtComponent"]').empty();					
					$.each(return_data,function(key,value){
						$('select[name="txtComponent"]').append('<option value="'+ value +'">'+ value +'</option>');						
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
				<form name="TrnManufacturingCompleteAdd" method="post" action="../php/TrnManufacturingCompleteAdd.php">
					<h2>Die Manufacturing Complete</h2><br><br>
					<!-- <INPUT type="button" class="myButton" value="Delete Row" onclick="delRow()" /> -->
					<!-- <INPUT type="button" class="myButton" value="Add Row" onclick="addRow()" /><br><br> -->
					<center><table id="dataTable" border="2">
						<tr>
							<th></th>
							<th>Die No</th>
							<th>Component Name</th>
							<!-- <th>Component Name</th> -->
						</tr>
						<tr>
							<td><INPUT type="checkbox" name="checkbox_name" id="checkbox_id" /></td>
							<td>
							<select name="txtDieNo" id="txtDieNo" onclick="getComponent()">
								<option value="">--Select--</option>
								<?php
								$qry = "SELECT distinct a.txtDieNo FROM alpro_prod.mst_die a where txtDieStatus in ('New','Under Manufacturing') and exists  (select txtDieNo from alpro_prod.trn_trlogsheet b where b.txtDieNo=a.txtDieNo) Order by a.txtDieNo";
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
								<select name="txtComponent" id="txtComponent" required>
									<option value="">--All--</option>
									
								</select>
							</td>
							<td><input type="submit" name="Add" id="Add" value="Add" class="submit-btn"></td>
							<td><input type="hidden" name="txtSessionId" id="txtSessionId" value="<?php echo($txtSessionId); ?>"></td>
								<input type="hidden" name="txtCompleteFlag" id="txtCompleteFlag" placeholder=""
									value="Y" required>
							
						</tr>
					</table></center>
					<br><br>
					</form>
					<form name="MfgComplete" method="post" action="../php/TrnManufacturingCompleteRedirect.php">
				<?php
				$qry = "SELECT count(*) cntRecord FROM alpro_prod.trn_mfg_complete_tmp where txtSessionId='$txtSessionId'";                    
								
				$data = getDataFromDB($qry);      
				$row = $data->fetch_assoc();

                $checkrecord = 1;
				
                if ($row['cntRecord'] > 0)
                {
                    // $txtLogNo = $_POST['txtLogNo'];
                    // $txtDieNo = $_POST['txtDieNo'];
                    // $txtCompCode = $_POST['txtCompCode'];
                    // $dtStartTime = $_POST['dtStartTime'];
                    // $dtEndTime = $_POST['dtEndTime'];
                    // $StartDateLength = strlen($dtStartTime);
                    // $EndDateLength = strlen($dtEndTime);
                   
                    
                    $qry = "SELECT txtDieNo, txtComponent, txtCompleteFlag FROM alpro_prod.trn_mfg_complete_tmp where txtSessionId='$txtSessionId'";                    
                  
                    $data = getDataFromDB($qry);
                   
                    if ($data) {
                        ?>
                    <!-- <input type="text" size="20" id="myInput_lgNo" class="myInputCSS" onkeyup="myFunction('myInput_lgNo','0')" placeholder="Search for Log No">
            
                    <input type="text" size="20" id="myInput_op" class="myInputCSS" onkeyup="myFunction('myInput_op','1')" placeholder="Search for Operator"> -->
                    <center>
					<table id="dataTable2" border="2">
					<br><br>
                            <tr>
							<th></th>
							<th>Die No</th>
							<th>Component No</th>
                            <th>Status</th>                            
                            </tr>
                        <?php
                        // output data of each row
                        while($row = $data->fetch_assoc()) {
                    ?>
                        <tr size =5>
						<td><a href="../php/TrnHeatTreatmentDeleteTemp.php?id=<?php echo $row['txtComponent']; ?>" class="myButton" onclick="return clicked();">Delete</a></td>
						<td><?php echo $row['txtDieNo']; ?></td>
                        <td><?php echo $row['txtComponent']; ?></td>
                        <td><?php echo $row['txtCompleteFlag']; ?></td>                        
                        </tr>
												
                    <?php
                        }
                    }
                    else{
                        ?>
                        <p style="color:red;">No Record Found</p>
                        <?php
                    }
                    ?>
                    <br>
					
                    	
                    

                    <?php
                }
                
                ?>
				</table></center>
				<br><br>
				<input type="submit" name="Complete" id="Complete" value="Complete" class="submit-btn">
				<td><input type="hidden" name="txtSessionId" id="txtSessionId" value="<?php echo($txtSessionId); ?>"></td>
					
					<br><br>
					</form>
					
					<br><br>
				
			</div>
		</div>
	</div>
</body>

</html>