<?php
include('checkSession.php');
include('UserDefinedLibrary.php');
//if (strlen($_GET['id'])>0 and strlen($_GET['id2'])>0){
$PkAssemblyNo=$_GET['id'];

//$txtCompName=$_GET['id3'];

$qry = "select * from alpro_prod.trn_die_assembly where PkAssemblyNo ='".$PkAssemblyNo."'";
$data = getDataFromDB($qry);

?>

<!-- HTML -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Die Component Update</title>
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
            <h1>Die Component Master Update</h1><br><br>
                
                <?php
                    if ($data) {
                    ?>
                    <form name="MasterDieCompUpdate" method="post" action="../php/TrnDieAssemblyUpdate.php">
                        <table id="dataTable" border="2">
                            <tr>                            
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
                            </tr>
                        <?php
                        // output data of each row
                        while($row = $data->fetch_assoc()) {
                            
                            
                ?>
                            <tr> 
                                <td><?php echo $row['txtDieNo']; ?> </td>
                                <td>
                                <select name="txtDiePlate" id="txtDiePlate">
                                <option value="<?php echo $row['txtDiePlate']; ?>"><?php if($row['txtDiePlate']=='0') {echo "--Select--";} else { echo $row['txtDiePlate'] ;}  ?></option>
                                    <?php
									$qry = "select distinct txtCompName  from alpro_prod.mst_die_comp where txtCompCode='DP' and txtCompName !="."'".$row['txtDiePlate']."'";
									$data = getDataFromDB($qry);
									while($row1 = $data->fetch_assoc()) {
									?>
										<option value="<?php echo $row1['txtCompName']; ?>"><?php echo $row1['txtCompName']; ?></option>
									<?php	
									}
									?>
                                    
								</select>
                                </td>
                                <td>
                                <select name="txtBacker" id="txtBacker">
                                <option value="<?php echo $row['txtBacker']; ?>"><?php if($row['txtBacker']=='0') {echo "--Select--";} else { echo $row['txtBacker'] ;}  ?></option>
                                    <?php
									$qry = "select distinct txtCompName  from alpro_prod.mst_die_comp where txtCompCode='BA' and txtCompName !="."'".$row['txtBacker']."'";
									$data = getDataFromDB($qry);
									while($row1 = $data->fetch_assoc()) {
									?>
										<option value="<?php echo $row1['txtCompName']; ?>"><?php echo $row1['txtCompName']; ?></option>
									<?php	
									}
									?>                                    
								</select>
                                </td> 
                                <td>
                                <select name="txtIB" id="txtIB">
                                <option value="<?php echo $row['txtIB']; ?>"><?php if($row['txtIB']=='0') {echo "--Select--";} else { echo $row['txtIB'] ;}  ?></option>
                                    <?php
									$qry = "select distinct txtCompName  from alpro_prod.mst_die_comp where txtCompCode='IB' and txtCompName !="."'".$row['txtIB']."'";
									$data = getDataFromDB($qry);
									while($row1 = $data->fetch_assoc()) {
									?>
										<option value="<?php echo $row1['txtCompName']; ?>"><?php echo $row1['txtCompName']; ?></option>
									<?php	
									}
									?>                                    
								</select>
                                </td> 
                                <td>
                                <select name="txtFeeder" id="txtFeeder">
                                <option value="<?php echo $row['txtFeeder']; ?>"><?php if($row['txtFeeder']=='0') {echo "--Select--";} else { echo $row['txtFeeder'] ;}  ?></option>
                                    <?php
									$qry = "select distinct txtCompName  from alpro_prod.mst_die_comp where txtCompCode='FD' and txtCompName !="."'".$row['txtFeeder']."'";
									$data = getDataFromDB($qry);
									while($row1 = $data->fetch_assoc()) {
									?>
										<option value="<?php echo $row1['txtCompName']; ?>"><?php echo $row1['txtCompName']; ?></option>
									<?php	
									}
									?>                                    
								</select>
                                </td> 
                                <td>
                                <select name="txtMandrel" id="txtMandrel">
                                <option value="<?php echo $row['txtMandrel']; ?>"><?php if($row['txtMandrel']=='0') {echo "--Select--";} else { echo $row['txtMandrel'] ;}  ?></option>
                                    <?php
									$qry = "select distinct txtCompName  from alpro_prod.mst_die_comp where txtCompCode='MD' and txtCompName !="."'".$row['txtMandrel']."'";
									$data = getDataFromDB($qry);
									while($row1 = $data->fetch_assoc()) {
									?>
										<option value="<?php echo $row1['txtCompName']; ?>"><?php echo $row1['txtCompName']; ?></option>
									<?php	
									}
									?>                                    
								</select>
                                </td> 
                                <td>
                                <select name="txtInsertBacker" id="txtInsertBacker">
                                <option value="<?php echo $row['txtInsertBacker']; ?>"><?php if($row['txtInsertBacker']=='0') {echo "--Select--";} else { echo $row['txtInsertBacker'] ;}  ?></option>
                                    <?php
									$qry = "select distinct txtCompName from alpro_prod.mst_die_comp where txtCompCode='BI' and txtCompName !="."'".$row['txtInsertBacker']."'";
									$data = getDataFromDB($qry);
									while($row1 = $data->fetch_assoc()) {
									?>
										<option value="<?php echo $row1['txtCompName']; ?>"><?php echo $row1['txtCompName']; ?></option>
									<?php	
									}
									?>                                    
								</select>
                                </td> 
                                <td>
                                <select name="txtBolstarRing" id="txtBolstarRing">
                                <option value="<?php echo $row['txtBolstarRing']; ?>"><?php if($row['txtBolstarRing']=='0') {echo "--Select--";} else { echo $row['txtBolstarRing'] ;}  ?></option>
                                    <?php
									$qry = "select distinct txtCompName from alpro_prod.mst_die_comp where txtCompCode='BR' and txtCompName !="."'".$row['txtBolstarRing']."'";
									$data = getDataFromDB($qry);
									while($row1 = $data->fetch_assoc()) {
									?>
										<option value="<?php echo $row1['txtCompName']; ?>"><?php echo $row1['txtCompName']; ?></option>
									<?php	
									}
									?>                                    
								</select>
                                </td> 
                                <td>
                                <select name="txtDieAdopter" id="txtDieAdopter">
                                <option value="<?php echo $row['txtDieAdopter']; ?>"><?php if($row['txtDieAdopter']=='0') {echo "--Select--";} else { echo $row['txtDieAdopter'] ;}  ?></option>
                                    <?php
									$qry = "select distinct txtCompName from alpro_prod.mst_die_comp where txtCompCode='DA' and txtCompName !="."'".$row['txtDieAdopter']."'";
									$data = getDataFromDB($qry);
									while($row1 = $data->fetch_assoc()) {
									?>
										<option value="<?php echo $row1['txtCompName']; ?>"><?php echo $row1['txtCompName']; ?></option>
									<?php	
									}
									?>                                    
								</select>
                                </td> 
                                <td>
                                <select name="txtDieInsert" id="txtDieInsert">
                                <option value="<?php echo $row['txtDieInsert']; ?>"><?php if($row['txtDieInsert']=='0') {echo "--Select--";} else { echo $row['txtDieInsert'] ;}  ?></option>
                                    <?php
									$qry = "select distinct txtCompName from alpro_prod.mst_die_comp where txtCompCode='DI' and txtCompName !="."'".$row['txtDieInsert']."'";
									$data = getDataFromDB($qry);
									while($row1 = $data->fetch_assoc()) {
									?>
										<option value="<?php echo $row1['txtCompName']; ?>"><?php echo $row1['txtCompName']; ?></option>
									<?php	
									}
									?>                                    
								</select>
                                </td> 
                                <td>
                                <select name="txtDieRing" id="txtDieRing">
                                <option value="<?php echo $row['txtDieRing']; ?>"><?php if($row['txtDieRing']=='0') {echo "--Select--";} else { echo $row['txtDieRing'] ;}  ?></option>
                                    <?php
									$qry = "select distinct txtCompName from alpro_prod.mst_die_comp where txtCompCode='DR' and txtCompName !="."'".$row['txtDieRing']."'";
									$data = getDataFromDB($qry);
									while($row1 = $data->fetch_assoc()) {
									?>
										<option value="<?php echo $row1['txtCompName']; ?>"><?php echo $row1['txtCompName']; ?></option>
									<?php	
									}
									?>                                    
								</select>
                                </td>
                                <td><?php echo $row['dtDateTime']; ?> </td>
                            </tr>
				        </table>
                        <input type="hidden" name="txtDieNo" id="txtDieNo" value="<?php echo $row['txtDieNo']; ?>">
                        <input type="hidden" name="txtDieCompCodeTemp" id="txtDieCompCodeTemp" value="<?php echo($txtCompCode); ?>">
                        <br><br>
				        <input type="submit" name="Submit" id="Submit" value="Update" class="myButton">
                        <a href="../php/TrnDieAssemblyView.php" class="myButton">Back</a>

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
    $update_qry = "update alpro_prod.trn_die_assembly set     txtDiePlate = '".$_POST['txtDiePlate']."',    txtBacker = '".$_POST['txtBacker']."',    txtIB = '".$_POST['txtIB']."',    txtFeeder = '".$_POST['txtFeeder']."',    txtMandrel = '".$_POST['txtMandrel']."',    txtInsertBacker = '".$_POST['txtInsertBacker']."',    txtBolstarRing = '".$_POST['txtBolstarRing']."',    txtDieAdopter = '".$_POST['txtDieAdopter']."',    txtDieInsert = '".$_POST['txtDieInsert']."',    txtDieRing = '".$_POST['txtDieRing']."',    dtDateTime = now() where txtDieNo = '".$_POST['txtDieNo']."'" ;
    echo("<br>".$update_qry."<br>");
    $execute_status = executeQuery($update_qry);
    if($execute_status != 'pass'){
        echo("<br>".$execute_status."<br>");
        echo $update_qry;
    }
    else
    {
        echo("<br>".$execute_status."<br>");
        //echo $update_qry;
        header("Location: ../php/TrnDieAssemblyView.php");  
   }

}
else{
    echo("<br>Not SUBMITTED<br>");
}
?>

