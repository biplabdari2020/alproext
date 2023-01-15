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
	<title>Blank Cutting Data Entry</title>
	<link rel="icon" href="../staticfiles/img/logo.png">
	<link rel="stylesheet" href="../staticfiles/css/style.css">
	<script src="../staticfiles/js/jquery-3.3.1.js"></script>
	<script src="../staticfiles/js/reusable.js"></script>
	<script>
		function validateLen(){
	var id = parseInt(document.getElementById("availableLength").innerText);		
	var id1 = document.getElementById("numCuttingLength").value;	
	var id2 = document.getElementById("numCuttingTolerence").value;		
	var id4 = parseInt(id1) + parseInt(id2);
	document.getElementById("numFinishLength").value = id4;
	if (id4 > id) {
		alert("Cutting Length is Greater than Available Length");
		document.getElementById("numCuttingLength").value="";
		document.getElementById("numCuttingTolerence").value="0";
		document.getElementById("numFinishLength").value="0";
	}
		}

		function getComponent(){
			var id = document.getElementById("txtDieNo").value;
			console.log(id);
			console.log("welcome")
			$.ajax({
				url: 'dependantDataAjax.php',
				dataType: "json",
				data: {'action': 'getCompfromDie_BC','id':id},
				success: function(return_data){
					console.log(return_data);
					$('select[name="txtDieCompCode"]').empty();					
					$.each(return_data,function(key,value){
						$('select[name="txtDieCompCode"]').append('<option value="'+ value +'">'+ value +'</option>');						
					});
				}
			});
		}

	</script>
</head>

<body >
	<!-- Start : for menu bar -->
	<div id="menu_bar_php"></div>
	<!-- End for menu bar -->

	<div class="myDiv">
		<div class="container">
			<div class="contact-form medium-padding120">
				<form name="TrnBlankCuttingAdd" method="post" action="../php/TrnBlankCuttingAdd.php">
					<h2>Blank Cutting Data Entry</h2><br><br>
					
					<table id="dataTable" border="2">
						<tr>
							<th>Log No</th>
							<th>Die No</th>
							<th>Component</th>
							<th>Operator</th>
							<th>Shift</th>
							<th>Available Length</th>
							<th>Cutting Length (mm)/Mtr</th>							
							<th>Cutting Tolerence (mm)/Mtr</th>							
							<th>Finish Length (mm)/Mtr</th>							
							<th>Start Date/Time</th>
							<th>End Date/Time</th>
							<th>Release</th>
						</tr>
						<tr>							
							<td>
								<!-- cerate single level drop down -->
								<select name="txtLogNo" id="txtLogNo" onclick = "jsgetLogAvailableLegth()">
									<option value="">--Select--</option>
									<?php
									$qry = "select distinct txtLogNo from alpro_prod.mst_hot_die_steel where numLength >10";
									$data = getDataFromDB($qry);
									while($row = $data->fetch_assoc()) {
									?>
										<option value="<?php echo $row['txtLogNo']; ?>"><?php echo $row['txtLogNo']; ?></option>
									<?php
									}
									?>
								</select>
								<!-- cerate single level drop down -->
							</td>
							<td>
								<!-- cerate Die Number drop down -->
								<select name="txtDieNo" id="txtDieNo" onclick ="getComponent()" required>
									<option value="">--Select--</option>
									<?php
									$qry = "SELECT distinct txtdieno FROM alpro_prod.mst_die";
									$data = getDataFromDB($qry);
									while($row = $data->fetch_assoc()) {?>
									<option value="<?php echo $row['txtdieno'];?>"><?php echo $row['txtdieno'];?></option>
									<?php
									}
									?>
								</select>
								<!-- cerate single level drop down -->
							</td>
							<td>
								<!-- cerate Die Number drop down -->
								<select name="txtDieCompCode" id="txtDieCompCode" required>
									<option value="">--Select--</option>									
								</select>
								<!-- cerate single level drop down -->
							</td>
							<td>
								<!-- cerate single level drop down -->
								<select name="txtOperatorCode" id="txtOperatorCode" required>
									<option value="">--Select--</option>
									<?php
									$qry = "select distinct txtEmpNo,txtEmpName from alpro_prod.mst_employee where txtActiveFlag ="."'".'Y'."'";
									$data = getDataFromDB($qry);
									while($row = $data->fetch_assoc()) {
									?>
										<option value="<?php echo $row['txtEmpNo']; ?>"><?php echo $row['txtEmpName']; ?></option>
									<?php
									}
									?>
								</select>
								<!-- cerate single level drop down -->
							</td>
							<td>
								<!-- cerate single level drop down -->
								<select name="txtShift" id="txtShift" required>
									<option value="">--Select--</option>
									<?php
									$qry = "select distinct txtShiftCOde,txtShiftDesc from alpro_prod.mst_const_shift";
									$data = getDataFromDB($qry);
									while($row = $data->fetch_assoc()) {
									?>
										<option value="<?php echo $row['txtShiftCOde']; ?>"><?php echo $row['txtShiftCOde']; ?></option>
									<?php	
									}
									?>
								</select>
								<!-- cerate single level drop down -->
							</td>
							<td id="availableLength"></td>
							<td>
								<input type="float" name="numCuttingLength" id="numCuttingLength" placeholder=""
									onblur ="validateLen();" required>
							</td>
							<td>
								<input type="float" name="numCuttingTolerence" id="numCuttingTolerence" placeholder="" value="0"
									onblur ="validateLen();" required>
							</td>
							<td>
								<input type="float" name="numFinishLength" id="numFinishLength" placeholder="" value="0"
									onblur ="validateLen();" required>
							</td>
							<td>
								<input type="datetime-local" name="dtStartTime" id="dtStartTime" placeholder="" value="" onclick="validateLen();"
									>
							</td>
							<td>
								<input type="datetime-local" name="dtEndTime" id="dtEndTime" onclick="setEndDate('dtStartTime','dtEndTime')" placeholder="" value=""
									>
							</td>
							<td>
							<select name="txtReleaseFlag" id="txtReleaseFlag">
										<option value="N">N</option>
										<option value="Y">Y</option>
									</select>
							</td>
							<td>
							<input type="submit" name="Add" id="Add" value="Add.." class="submit-btn">
							</td>
						</tr>
					</table>
                    <!-- <input type="hidden" name="pkTrnLogsheet" id="pkTrnLogsheet" value="<?php echo($pkTrnLogsheet); ?>"> -->
															
					
				</form>
				<form name="TrnBlankCuttingSubmit" method="post" action="../php/TrnBlankCuttingRedirect.php">
				<?php
				$qry = "SELECT count(*) cntRecord FROM alpro_prod.trn_log_blank_cutting_temp where txtSessionId='$txtSessionId'";                    
								
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
                   
                    
                    $qry = "SELECT pkTrnLogsheet,txtLogNo, txtDieNo, txtCompCode txtDieCompName, txtEmpName, txtShift, numCuttingLength,numCuttingTolerence,numFinishLength, dtStartTime, dtEndTime, case when txtReleaseFlag = 'Y' then 'Yes' else 'No' end txtReleaseFlag FROM alpro_prod.trn_log_blank_cutting_temp a inner join alpro_prod.mst_employee b inner join alpro_prod.mst_const_shift c  on (a.txtOperatorCode=b.txtEmpNo and a.txtShift=c.txtShiftCode) where txtSessionId='$txtSessionId'";                    
                  
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
                                <th>Log No</th>
                                <th>Die No</th>
                                <th>Die Component</th>
                                <th>Operator</th>
                                <th>Shift</th>
                                <th>Cutting Length (mm/Mtr)</th>
								<th>Cutting Tolerence (mm)/Mtr</th>							
								<th>Finish Length (mm)/Mtr</th>
                                <th>Start Date/Time</th>
                                <th>End Date/Time</th>
                                <th>Release</th>
                            </tr>
                        <?php
                        // output data of each row
                        while($row = $data->fetch_assoc()) {
                    ?>
                        <tr size =5>
						<td><a href="../php/TrnBlankCuttingDeleteTemp.php?id=<?php echo $row['pkTrnLogsheet']; ?>" class="myButton" onclick="return clicked();">Delete</a></td>
                            <td><?php echo $row['txtLogNo']; ?> </td>
                            <td><?php echo $row['txtDieNo']; ?> </td>
                            <td><?php echo $row['txtDieCompName']; ?> </td>
                            <td><?php echo $row['txtEmpName']; ?> </td>
                            <td><?php echo $row['txtShift']; ?> </td>
                            <td size=5><?php echo $row['numCuttingLength']; ?> </td>
							<td size=5><?php echo $row['numCuttingTolerence']; ?> </td>
							<td size=5><?php echo $row['numFinishLength']; ?> </td>
                            <td><?php echo $row['dtStartTime']; ?> </td>
                            <td><?php echo $row['dtEndTime']; ?> </td>
                            <td><?php echo $row['txtReleaseFlag']; ?> </td>
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
				</form>
				
			</div>
		</div>
	</div>
	
</body>
</html>


