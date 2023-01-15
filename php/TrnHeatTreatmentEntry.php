<?php
include('checkSession.php');
include('UserDefinedLibrary.php');
$txtSessionId = session_id();
$txtUserCode = $_SESSION["username"];
$pk_HeatTrtID = generatePk('HT','trn_heattreatment_tmp','pk_HeatTrtID');
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Heat Treatment Entry</title>
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
					$('select[name="txtCompCode"]').empty();					
					$.each(return_data,function(key,value){
						$('select[name="txtCompCode"]').append('<option value="'+ value +'">'+ value +'</option>');						
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
				<form name="TrnHeatTreatmentAdd" method="post" action="../php/TrnHeatTreatmentAdd.php">
					<h2>Heat Treatment Entry</h2><br><br>
					
					<table id="dataTable" border="2">
						<tr>
							<th>Die No</th>
                            <th>Die Component</th>
                            <th>Sent Date</th>
                            <th>Heat Treatment Type</th>
                            <th>Received Date</th>
                            <th>Final Hardness (BHN)</th>
                            <th>Vendor</th>
                            <th>Component Weight</th>
                            <th>Challan No</th>
						</tr>
						<tr>							
							<td>
								<!-- cerate single level drop down -->
								<select name="txtDieNo" id="txtDieNo" onclick ="getComponent()">
									<option value="">--Select--</option>
									<?php
									$qry = "select distinct txtDieNo from alpro_prod.trn_log_blank_cutting where txtDieNo is not null";
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
							<select name="txtCompCode" id="txtCompCode" required>
									<option value="">--Select--</option>
									
								</select>
							</td>
							<td>
								<input type="datetime-local" name="dtSentDate" id="dtSentDate" placeholder="" value=""
									>
							</td>
							<td>
								<select name="txtHTType" id="txtHTType">
								<?php
									$qry = "select distinct txtHTTypeCode, txtHTTypeDesc from alpro_prod.mst_cons_httype where txtHTTypeCode !="."'".$rowmain['txtHTType']."'";
									$data = getDataFromDB($qry);
									while($row = $data->fetch_assoc()) {
									?>
										<option value="<?php echo $row['txtHTTypeCode']; ?>"><?php echo $row['txtHTTypeDesc']; ?></option>
									<?php	
									}
									?>
								</select>
								<!-- cerate single level drop down -->
							</td>
							<td>
								<input type="datetime-local" name="dtRecvDate" id="dtRecvDate" placeholder="" value=""
									>
							</td>
							<td>
								<input type="float" name="numFinalHardness" id="numFinalHardness" placeholder="" value="0"
									>
							</td>
							<td>
								<input type="text" name="txtVendor" id="txtVendor" placeholder="" value=""
									>
							</td>
							<td>
								<input type="float" name="numCompWt" id="numCompWt" placeholder="" value="0">
							</td>
							<td>
								<input type="text" name="txtChallanNo" id="txtChallanNo" placeholder="" value="">
							</td>
							<td><input type="submit" name="Add" id="Add" value="Add" class="submit-btn"></td>

						</tr>
					</table>										

                    <input type="hidden" name="pk_HeatTrtID" id="pk_HeatTrtID" value="<?php echo($pk_HeatTrtID); ?>">
					<input type="hidden" name="txtSessionId" id="txtSessionId" value="<?php echo($txtSessionId); ?>">
					</form>
					<form name="TrnHeatTreatmentSubmit" method="post" action="../php/TrnHeatTreatmentAddRedirect.php">
				<?php
				$qry = "SELECT count(*) cntRecord FROM alpro_prod.trn_heattreatment_tmp where txtSessionId='$txtSessionId'";                    
								
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
                   
                    
                    $qry = "SELECT pk_HeatTrtID, txtDieNo, txtCompCode, dtSentDate, txtHTType,txtHTTypeDesc, dtRecvDate, numFinalHardness, dtDateTime, txtVendor, numCompWt, txtChallanNo FROM alpro_prod.trn_heattreatment_tmp a inner join alpro_prod.mst_cons_httype b on a.txtHTType=b.txtHTTypeCode where txtSessionId='$txtSessionId'";                    
                  
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
							<th>Serial</th>
							<th>Die No</th>
                            <th>Die Component</th>
                            <th>Sent Date</th>
                            <th>Heat Treatment Type</th>
                            <th>Received Date</th>
                            <th>Final Hardness (BHN)</th>
							<th>Component Weight</th>
                            <th>Vendor</th>                            
                            <th>Challan No</th>
							<th>Transaction Date</th>
                            </tr>
                        <?php
                        // output data of each row
                        while($row = $data->fetch_assoc()) {
                    ?>
                        <tr size =5>
						<td><a href="../php/TrnHeatTreatmentDeleteTemp.php?id=<?php echo $row['pk_HeatTrtID']; ?>" class="myButton" onclick="return clicked();">Delete</a></td>
						<td><?php echo $row['pk_HeatTrtID']; ?></td>
                        <td><?php echo $row['txtDieNo']; ?></td>
                        <td><?php echo $row['txtCompCode']; ?></td>
                        <td><?php echo $row['dtSentDate']; ?></td>
                        <td><?php echo $row['txtHTTypeDesc']; ?></td>
                        <td><?php echo $row['dtRecvDate']; ?></td>
                        <td><?php echo $row['numFinalHardness']; ?></td>
                        <td><?php echo $row['numCompWt']; ?></td>
                        <td><?php echo $row['txtVendor']; ?></td>
                        <td><?php echo $row['txtChallanNo']; ?></td>
                        <td><?php echo $row['dtDateTime']; ?></td>
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
				<input type="submit" name="Submit" id="Submit" value="Submit" class="submit-btn">
				
					
					<br><br>
					</form>
			</div>
		</div>
	</div>
</body>
</html>

<!-- HTML -->