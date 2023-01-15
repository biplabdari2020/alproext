<?php
include('checkSession.php');
include('UserDefinedLibrary.php');
$pk_HeatTrtID=$_GET['id'];
//$qry = "select * from alpro_prod.mst_section where txtSectionNo = '".$pkTrnLogsheet."'";
$qry = "select pk_HeatTrtID,txtDieNo, txtCompCode txtDieCompName, dtSentDate,txtHTType,mst_cons_httype.txtHTTypeDesc, dtRecvDate,numFinalHardness, numCompWt, txtVendor,txtChallanNo, dtDateTime from alpro_prod.trn_heattreatment  LEFT OUTER JOIN alpro_prod.mst_cons_httype on trn_heattreatment.txtHTType=mst_cons_httype.txtHTTypeCode  where trn_heattreatment.pk_HeatTrtID='".$pk_HeatTrtID."'";
$data = getDataFromDB($qry);
?>

<!-- HTML -->

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Heat Treatment Update</title>
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
            <h1>Heat Treatment Data Update</h1><br><br>
                
                <?php
                    if ($data) {
                    ?>
                    <form name="TrnBlankCuttingUpdate" method="post" action="../php/TrnHeatTreatmentUpdate.php">
                        <table id="dataTable" border="2">
                            <tr>
							<th>Heat Treatment ID</th>
                            <th>Die No</th>
                            <th>Die Component</th>
                            <th>Sent Date</th>
                            <th>Heat Treatment Type</th>
                            <th>Received Date</th>
                            <th>Final Hardness (BHN)</th>
                            <th>Component Weight</th>
                            <th>Vendor</th>
                            <th>Challan No</th>
                            <th>Trasaction Date</th>					
                            </tr>
                        <?php
                        // output data of each row
                        while($rowmain = $data->fetch_assoc()) {
                ?>
                            <tr> 
                                <td id="pk_HeatTrtID"> <?php echo $rowmain['pk_HeatTrtID']; ?> </td>							
								<td> <?php echo $rowmain['txtDieNo']; ?> </td>
								<td> <?php echo $rowmain['txtDieCompName']; ?> </td>
								<td>
								<input type="datetime-local" name="dtSentDate" id="dtSentDate"  placeholder="" value="<?php echo $rowmain['dtSentDate'];?>"
									>
							</td>
								<!-- Heat Treatment Type Dropdown -->
							<td>
								<select name="txtHTType" id="txtHTType">
								<option value="<?php echo $rowmain['txtHTType']; ?>"><?php echo $rowmain['txtHTTypeDesc']; ?></option>
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
								<input type="datetime-local" name="dtRecvDate" id="dtRecvDate" onclick="setEndDate('dtSentDate','dtRecvDate')" placeholder="" value="<?php echo $rowmain['dtRecvDate'];?>"
									>
							</td>
							<td>
							<input type="float" size =5 name="numFinalHardness" id="numFinalHardness" placeholder="" value="<?php echo $rowmain['numFinalHardness'];?>"
								>
							</td>
							<td>
								<input type="float" size =5 name="numCompWt" id="numCompWt" placeholder="" value="<?php echo $rowmain['numCompWt'];?>"
								>
							<td>
								<input type="text" size =5 name="txtVendor" id="txtVendor" placeholder="" value="<?php echo $rowmain['txtVendor'];?>"
								>
							</td>
							<td>
								<input type="text" size =10 name="txtChallanNo" id="txtChallanNo" placeholder="" value="<?php echo $rowmain['txtChallanNo'];?>"
								>
							</td>
							
								<td size =20><?php echo $rowmain['dtDateTime']; ?></td>													
								
				        </table>
                        <input type="hidden" name="pk_HeatTrtID" id="pk_HeatTrtID" value="<?php echo($pk_HeatTrtID); ?>">
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
	//echo $pkTRLogsheet;
	echo "<br>";
	$dtRecvDate = $_POST['dtRecvDate'];
	if ($dtRecvDate=="") {
		$dtRecvDate = "NULL";
	}
	
	
	$numFinalHardness = $_POST['numFinalHardness'];
	$txtChallanNo = $_POST['txtChallanNo'];

	if ($numFinalHardness=="") {
		$numFinalHardness = 0;		
	}
	$numCompWt = $_POST['numCompWt'];
	if ($numCompWt=="") {
		$numCompWt = 0;		
	}
	$dtSentDate        =   $_POST['dtSentDate'];
    if ($dtSentDate=='') {        
        $dtSentDate = "NULL";
    }
    else {
        $dtSentDate = "'".$dtSentDate."'";
    }
	$dtRecvDate        =   $_POST['dtRecvDate'];
    if ($dtRecvDate=='') {        
        $dtRecvDate = "NULL";
    }
    else {
        $dtRecvDate = "'".$dtRecvDate."'";
    }
	

    $update_qry = "update alpro_prod.trn_heattreatment set dtSentDate = ".$dtSentDate.",txtHTType='".$_POST['txtHTType']."',dtRecvDate=".$dtRecvDate.",numFinalHardness='".$numFinalHardness."',numCompWt='".$numCompWt."',txtChallanNo='".$txtChallanNo."',txtVendor='".$_POST['txtVendor']."' where pk_HeatTrtID = '".$_POST['pk_HeatTrtID']."'"; 
    echo("<br>".$update_qry."<br>");
    $execute_status = executeQuery($update_qry);
    if($execute_status != 'pass'){
    //    echo("<br>".$execute_status."<br>");
    }
    header("Location: ../php/TrnHeatTreatmentView.php");  

}
else{
    echo("<br>Not SUBMITTED<br>");
}
?>

