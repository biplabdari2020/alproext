<?php
include('checkSession.php');
include('UserDefinedLibrary.php');
//if (strlen($_GET['id'])>0 and strlen($_GET['id2'])>0){
$txtDieNo=$_GET['id'];
$txtCompCode=$_GET['id2'];
//$txtCompName=$_GET['id3'];
$txtCompCode=str_replace("||"," ",$txtCompCode);
$qry = "select txtDieNo, txtCompCode, txtCompName, dtDateTime from alpro_prod.mst_die_comp where txtDieNo = '".$txtDieNo."' and txtCompName = '".$txtCompCode."'";
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
                    <form name="MasterDieCompUpdate" method="post" action="../php/MasterDieCompUpdate.php">
                        <table id="dataTable" border="2">
                            <tr>
                                <th>Die No</th>
                                <th>Component</th>
                                <th>Component ID</th>
                                <!-- <th>Component Name</th> -->
                                <th>Trasaction Date</th>
                            </tr>
                        <?php
                        // output data of each row
                        while($row = $data->fetch_assoc()) {
                            $varcompcode=$row['txtCompCode'];
                            $varcomp=$row['txtCompName'];
                            
                ?>
                            <tr> 
                                <td><?php echo $row['txtDieNo']; ?> </td>
                                <td>
                                <select name="txtCompCode" id="txtCompCode" onclick="getComponent()">
                                    <?php
									$qry = "select distinct txtDieCompCode, txtDieCompName from alpro_prod.mst_const_diecomp where txtDieCompCode ="."'".$varcompcode."'";
									$data = getDataFromDB($qry);
									while($row1 = $data->fetch_assoc()) {
									?>
										<option value="<?php echo $row1['txtDieCompCode']; ?>"><?php echo $row1['txtDieCompName']; ?></option>
									<?php	
									}
									?>
                                    <?php
									$qry = "select distinct txtDieCompCode, txtDieCompName from alpro_prod.mst_const_diecomp where txtDieCompCode !="."'".$varcompcode."'";
									$data = getDataFromDB($qry);
									while($row2 = $data->fetch_assoc()) {
									?>
										<option value="<?php echo $row2['txtDieCompCode']; ?>"><?php echo $row2['txtDieCompName']; ?></option>
									<?php	
									}
									?>
								</select>
                                </td> 
                                <!-- <td>       
                                <select name="txtCompName" id="txtCompName">
                                    <?php
									$qry = "SELECT distinct txtComp txtComponent FROM alpro_prod.v_diecomponent where txtComp ="."'".$varcomp."'";
									$data = getDataFromDB($qry);
									while($row1 = $data->fetch_assoc()) {
									?>
										<option value="<?php echo $row1['txtComponent']; ?>"><?php echo $row1['txtComponent']; ?></option>
									<?php	
									}
									?>
                                    <?php
									$qry = "SELECT distinct txtComp txtComponent FROM alpro_prod.v_diecomponent where txtComp !="."'".$varcomp."' and txtCompCode="."'".$varcompcode."'";
									$data = getDataFromDB($qry);
									while($row2 = $data->fetch_assoc()) {
									?>
										<option value="<?php echo $row2['txtComponent']; ?>"><?php echo $row2['txtComponent']; ?></option>
									<?php	
									}
									?>
								</select>
                                </td>                                 -->
                                <td><input type="text" name="txtCompName" id="txtCompName" value="<?php echo $row['txtCompName']; ?>" required></td>
                                
                                <td><?php echo $row['dtDateTime']; ?> </td>
                            </tr>
				        </table>
                        <input type="hidden" name="txtDieNo" id="txtDieNo" value="<?php echo($txtDieNo); ?>">
                        <input type="hidden" name="txtDieCompCodeTemp" id="txtDieCompCodeTemp" value="<?php echo($txtCompCode); ?>">
                        <br><br>
				        <input type="submit" name="Submit" id="Submit" value="Update" class="myButton">
                        <a href="../php/MasterDieCompView.php" class="myButton">Back</a>

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
    $update_qry = "update alpro_prod.mst_die_comp set txtCompCode = '".$_POST['txtCompCode']."',txtCompName = '".$_POST['txtCompName']."', dtDateTime = now() where txtDieNo = '".$_POST['txtDieNo']."' and txtCompName='".$_POST['txtDieCompCodeTemp']."'" ;
    echo("<br>".$update_qry."<br>");
    $execute_status = executeQuery($update_qry);
    if($execute_status != 'pass'){
        echo("<br>".$execute_status."<br>");
        //echo $update_qry;
    }
    else
    {
        echo("<br>".$execute_status."<br>");
        //echo $update_qry;
        header("Location: ../php/MasterDieCompView.php");  
   }

}
else{
    echo("<br>Not SUBMITTED<br>");
}
?>

