<?php
include('checkSession.php');
include('UserDefinedLibrary.php');
$pkTrnLogsheet=$_GET['id'];
//$qry = "select * from alpro_prod.mst_section where txtSectionNo = '".$pkTrnLogsheet."'";
$qry = "select pkTrnLogsheet, txtLogNo,txtdieno,txtComponent txtCompCode, txtOperatorCode, txtShift, numCuttingLength,numCuttingTolerence,numFinishLength, dtStartTime, dtEndTime, txtReleaseFlag, dtDateTime FROM alpro_prod.trn_log_blank_cutting  where pkTrnLogsheet='".$pkTrnLogsheet."'";
$data = getDataFromDB($qry);
echo $qry;
?>

<!-- HTML -->

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Blank Cutting Entry View</title>
    <link rel="icon" href="../html/staticfiles/img/logo.png">
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
<body>
    <!-- Start : for menu bar -->
	<div id="menu_bar_php"></div>    
	<!-- End for menu bar -->
    <div class="myDiv">
        <div class="container">
            <div class="contact-form medium-padding120">
            <h1>Update Blank Cutting Data</h1><br><br>
                
                <?php
                    if ($data) {
                    ?>
                    <form name="TrnBlankCuttingUpdate" method="post" action="../php/TrnBlankCuttingUpdate.php">
                        <table id="dataTable" border="2">
                            <tr>
                            <th>Cuttng Serial</th>
                            <th>Log No</th>
							<th>Die No</th>
							<th>Die Component</th>
                            <th>Operator</th>
                            <th>Shift</th>
                            <th>Cutting Length (mm)</th>
							<th>Cutting Tolerence (mm)</th>
							<th>Finish Length (mm)</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Released (Y/N)</th>
                            <th>Trasaction Date</th>
                            </tr>
                        <?php
                        // output data of each row
                        while($rowmain = $data->fetch_assoc()) {
                ?>
                            <tr> 
                                <td><?php echo $rowmain['pkTrnLogsheet']; ?> </td>
                             
                            <td><?php echo $rowmain['txtLogNo']; ?></td>
							<td><?php echo $rowmain['txtdieno']; ?></td>
							<td><?php echo $rowmain['txtCompCode']; ?></td> 
                            <td>
								<!-- cerate single level drop down -->
								<select name="txtOperatorCode" id="txtOperatorCode">
                                <?php
									$qry = "select distinct txtEmpNo,txtEmpName from alpro_prod.mst_employee where txtEmpNo ="."'".$rowmain['txtOperatorCode']."'";
									$data = getDataFromDB($qry);
                                    $rowEmp = $data->fetch_assoc()
                                ?>    
									<option value="<?php echo $rowEmp['txtEmpNo']; ?>"><?php echo $rowEmp['txtEmpName']; ?></option>
									<?php
									$qry = "select distinct txtEmpNo,txtEmpName from alpro_prod.mst_employee where txtActiveFlag ="."'".'Y'."' "." And txtEmpNo!="."'".$rowmain['txtOperatorCode']."'";
									$data = getDataFromDB($qry);
									while($rowEmp = $data->fetch_assoc()) {
									?>
										<option value="<?php echo $rowEmp['txtEmpNo']; ?>"><?php echo $rowEmp['txtEmpName']; ?></option>
									<?php	
									}
									?>
								</select>
								<!-- cerate single level drop down -->
							</td>
							<td>
								<!-- cerate single level drop down -->
								<select name="txtShift" id="txtShift">
									<option value="<?php echo $rowmain['txtShift']; ?>"><?php echo $rowmain['txtShift']; ?></option>
									<?php
									$qry = "select distinct txtShiftCOde,txtShiftDesc from alpro_prod.mst_const_shift where txtShiftCOde !="."'".$rowmain['txtShift']."'";
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
                                <td><?php echo $rowmain['numCuttingLength']; ?></td>
                                <td><?php echo $rowmain['numCuttingTolerence']; ?></td>
                                <td><?php echo $rowmain['numFinishLength']; ?></td>
                                <td><input type="datetime-local" name="dtStartTime" id="dtStartTime" value="<?php echo $rowmain['dtStartTime']; ?>" required></td>
                                <td><input type="datetime-local" name="dtEndTime" onclick="setEndDate('dtStartTime','dtEndTime')" id="dtEndTime" value="<?php echo $rowmain['dtEndTime']; ?>" required></td>
                                <td>
							        <select name="txtReleaseFlag" id="txtReleaseFlag">
										<option value="N">N</option>
										<option value="Y">Y</option>
									</select>
							    </td>
                               
                                <td><?php echo $rowmain['dtDateTime']; ?> </td>
                            </tr>
				        </table>
                        <input type="hidden" name="pkTrnLogsheet" id="pkTrnLogsheet" value="<?php echo($pkTrnLogsheet); ?>">
				        <br><br>
				        <input type="submit" name="Submit" id="Submit" value="Submit" class="submit-btn">
                
				        <br><br>
				    </form>
                <?php
                    }
                }
                else{
                    ?>
                    <p style="color:red;">No Record Found</p>
                    <?php
                }
                ?>
                <br><br>
            </div>
        </div>
    </div>
</body>

<?php

if (isset($_POST['Submit'])){
    echo("<br>SUBMITTED<br>");   
    $update_qry = "update alpro_prod.trn_log_blank_cutting set txtOperatorCode='".$_POST['txtOperatorCode']."',txtShift='".$_POST['txtShift']."', dtStartTime='".$_POST['dtStartTime']."', dtEndTime='".$_POST['dtEndTime']."', txtReleaseFlag='".$_POST['txtReleaseFlag']."', dtDateTime = now() where pkTrnLogsheet = '".$_POST['pkTrnLogsheet']."'";
    echo("<br>".$update_qry."<br>");
    $execute_status = executeQuery($update_qry);
    if($execute_status != 'pass'){
    //    echo("<br>".$execute_status."<br>");
    }
    header("Location: ../php/TrnBlankCuttingView.php");  

}
else{
    echo("<br>Not SUBMITTED<br>");
}
?>

