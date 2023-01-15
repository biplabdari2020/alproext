<?php
include('checkSession.php');
include('UserDefinedLibrary.php');
//if (strlen($_GET['id'])>0 and strlen($_GET['id2'])>0){
$txtDieNo=$_GET['id'];
$txtDieNo=str_replace("||"," ",$txtDieNo);
$qry = "select * from alpro_prod.trn_die_rejection where txtDieNo = '".$txtDieNo."'";
$data = getDataFromDB($qry);
echo $qry ;
?>

<!-- HTML -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Die Rejection</title>
	<link rel="icon" href="../staticfiles/img/logo.png">
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
            <h1>Die Rejection</h1><br><br>
                
                <?php                
                
                    if ($data) {
                    ?>
                    <form name="DieRejectionUpdate" method="post" action="../php/DieRejectionUpdate.php">
                        <table id="dataTable" border="2">
                            <tr>
                            <th>Die No</th>
							<th>Rejection Reason</th>
							<th>Remarks</th>
                            <th>Last Updated</th>
                            </tr>
                        <?php
                        // output data of each row
                        while($row = $data->fetch_assoc()) {
                ?>
                            <tr> 
                                <td><?php echo $row['txtDieNo']; ?> </td>                                
                                <td>
                                <select name="txtRejectionReason" id="txtRejectionReason">
                                <option value="<?php echo $row['txtRejectionReason']; ?>"><?php echo $row['txtRejectionReason']; ?></option>
                                    <?php
									$qry1 = "select distinct txtRejectionReason from alpro_prod.mst_cons_rejection where txtRejectionReason !="."'".$row['txtRejectionReason']."'";
									$data1 = getDataFromDB($qry1);
									while($row2 = $data1->fetch_assoc()) {
									?>
										<option value="<?php echo $row2['txtRejectionReason']; ?>"><?php echo $row2['txtRejectionReason']; ?></option>
									<?php	
									}
									?>
								</select>
                                </td>                                                                
                                <td><input type="textarea" rows="5" style="width:200px; height:35px;"  name="txtRemarks" id="txtRemarks" value="<?php echo $row['txtRemarks']; ?>"></td>							
                                <td><?php echo $row['dtDateTime']; ?> </td>
                            </tr>
				        </table>
                        <input type="hidden" name="txtDieNo1" id="txtDieNo1" value="<?php echo $row['txtDieNo']; ?>" >                        
                        <br><br>
				        <input type="submit" name="Submit" id="Submit" value="Update" class="myButton">
                        <a href="../php/DieRejectionView.php" class="myButton">Back</a>

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
    $update_qry = "update alpro_prod.trn_die_rejection set txtRejectionReason = '".$_POST['txtRejectionReason']."', txtRemarks = '".$_POST['txtRemarks']."',dtDateTime = now() where txtDieNo = '".$_POST['txtDieNo1']."'";
    //echo("<br>".$update_qry."<br>");
    $execute_status = executeQuery($update_qry);
    if($execute_status != 'pass'){
        echo("<br>".$execute_status."<br>");
        echo $update_qry;
    }
    else
    {
        echo("<br>".$execute_status."<br>");
        echo $update_qry;
        header("Location: ../php/DieRejectionView.php");  
   }

}
else{
    echo("<br>Not SUBMITTED<br>");
}
?>

