<?php
include('checkSession.php');
include('UserDefinedLibrary.php');
$txtTrialNo=$_GET['id'];
//$qry = "select * from alpro_prod.mst_section where txtSectionNo = '".$pkTrnLogsheet."'";
$qry = "SELECT txtTrialNo, txtDieNo, dtTrialSent, dtTrialEnd, txtStatus,mst_cons_trialstatus.txtStatusDesc, txtRemarks, txtUser, dtDateTime from alpro_prod.trn_die_sent_trial inner join alpro_prod.mst_cons_trialstatus on trn_die_sent_trial.txtStatus=mst_cons_trialstatus.txtStatusCode  where txtTrialNo='".$txtTrialNo."'";
$data = getDataFromDB($qry);
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
</head>
<body>
    <!-- Start : for menu bar -->
	<div id="menu_bar_php"></div>    
	<!-- End for menu bar -->
    <div class="myDiv">
        <div class="container">
            <div class="contact-form medium-padding120">
            <h1>Update Die Trial Data</h1><br><br>
                
                <?php
                    if ($data) {
                    ?>
                    <form name="TrnDieSentForTrialUpdate" method="post" action="../php/TrnDieSentForTrialUpdate.php">
                        <table id="dataTable" border="2">
                            <tr>
                            <th>Trial Serial No</th>
                            <th>Die No</th>
							<th>Trial Sent Date</th>
							<th>Trial End Date</th>
                            <th>Status</th>
                            <th>Remarks</th>
                            <th>Trasaction Date</th>
                            </tr>
                        <?php
                        // output data of each row
                        while($rowmain = $data->fetch_assoc()) {
                ?>
                            <tr> 
                                <td><?php echo $rowmain['txtTrialNo']; ?> </td>
                             
                            <td>
								<!-- cerate single level drop down -->
								<select name="txtDieNo" id="txtDieNo">
									<option value="<?php echo $rowmain['txtDieNo']; ?>"><?php echo $rowmain['txtDieNo']; ?></option>
									<?php
									$qry = "select distinct txtDieNo from alpro_prod.mst_die_comp where  txtDieNo !="."'".$rowmain['txtDieNo']."'";
									$data = getDataFromDB($qry);
									while($row1 = $data->fetch_assoc()) {
									?>
										<option value="<?php echo $row1['txtDieNo']; ?>"><?php echo $row1['txtDieNo']; ?></option>
									<?php	
									}
									?>
								</select>
							</td>
							<td><input type="datetime-local" name="dtTrialSent" id="dtTrialSent" value="<?php echo $rowmain['dtTrialSent']; ?>" required></td>
                                <td><input type="datetime-local" name="dtTrialEnd" onclick="setEndDate('dtTrialSent','dtTrialEnd')" id="dtTrialEnd" value="<?php echo $rowmain['dtTrialEnd']; ?>" ></td>
								<td>
								<!-- cerate single level drop down Status -->
								<select name="txtStatus" id="txtStatus">
									<option value="<?php echo $rowmain['txtStatus']; ?>"><?php echo $rowmain['txtStatusDesc']; ?></option>
									<?php
									$qry = "select distinct txtStatusCode,txtStatusDesc from alpro_prod.mst_cons_trialstatus where  txtStatusCode !="."'".$rowmain['txtStatus']."'";
									$data = getDataFromDB($qry);
									while($row1 = $data->fetch_assoc()) {
									?>
										<option value="<?php echo $row1['txtStatusCode']; ?>"><?php echo $row1['txtStatusDesc']; ?></option>
									<?php	
									}
									?>
								</select>
								<!-- cerate single level drop down -->
							</td>    
							
								<!-- cerate single level drop down -->								
                                <td><input type="text"  name="txtRemarks" id="txtRemarks" value="<?php echo $rowmain['txtRemarks']; ?>" ></td>
                                
                               
                                <td><?php echo $rowmain['dtDateTime']; ?> </td>
                            </tr>
				        </table>
                        <input type="hidden" name="txtTrialNo" id="txtTrialNo" value="<?php echo($txtTrialNo); ?>">
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
    if ($_POST['dtTrialEnd']==''){
        $dttrialend = 'NULL';
    }
    else {
        $dttrialend="'".$_POST['dtTrialEnd']."'";
    }
    $update_qry = "update alpro_prod.trn_die_sent_trial set txtDieNo = '".$_POST['txtDieNo']."',dtTrialSent='".$_POST['dtTrialSent']."',dtTrialEnd=$dttrialend,txtStatus='".$_POST['txtStatus']."',txtRemarks='".$_POST['txtRemarks']."' where txtTrialNo = '".$_POST['txtTrialNo']."'";
    echo("<br>".$update_qry."<br>");
    $execute_status = executeQuery($update_qry);
    if($execute_status != 'pass'){
    //    echo("<br>".$execute_status."<br>");
    }
    header("Location: ../php/TrnDieSentForTrialView.php");  

}
else{
    echo("<br>Not SUBMITTED<br>");
}
?>

