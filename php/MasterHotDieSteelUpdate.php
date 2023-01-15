<?php
include('checkSession.php');
include('UserDefinedLibrary.php');
$txtLogNo=$_GET['id1'];
$qry = "select * from alpro_prod.mst_hot_die_steel where txtLogNo = '".$txtLogNo."'";
$data = getDataFromDB($qry);
?>

<!-- HTML -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Hot Die Steel Master Data Update</title>
	<link rel="icon" href="../staticfiles/img/logo.png">
	<link rel="stylesheet" href="../staticfiles/css/style.css">
	<script src="../staticfiles/js/jquery-3.3.1.js"></script>
	<script src="../staticfiles/js/reusable.js"></script>
    
    <script>
		function getLogwt(){			
	var numDia = document.getElementById("numDia").value;	
	var numLength = document.getElementById("numLength").value;
	numDia = numDia /100;
	var numrad = numDia /2;
	var numWt = 3.14 * (numrad * numrad) * (0.0785 * numLength);
	numWt = numWt.toFixed(3);
	document.getElementById("numLogWt").value=numWt;
	//confirm(numWt);
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
            <h1>Update Hot Die Steel Master Data</h1><br><br>
                
                <?php
                    if ($data) {
                    ?>
                    <form name="MasterHotDieSteelUpdate" method="post" action="../php/MasterHotDieSteelUpdate.php">
                        <table id="dataTable" border="2">
                            <tr>
                                <th>Log No</th>
                                <th>Log Type</th>
                                <th>Diameter</th>
                                <th>Length</th>
                                <th>Weight</th>
                                <th>Make</th>
                                <th>Supplier Name</th>
                                <th>Invoice No</th>
                                <th>Log Received</th>
                                <th>Hardness</th>                            
                                <th>Transaction Date</th> 
                            </tr>
                        <?php
                        // output data of each row
                        while($row = $data->fetch_assoc()) {
                ?>
                            <tr> 
                                <td><?php echo $row['txtLogNo']; ?> </td>
                                <td>
                                    <input type="text" size="5" name="txtLogType" id="txtLogType" placeholder="" value="<?php echo $row['txtLogType']; ?>" required>
                                </td>
                                <td>
                                    <input type="float" size="5" name="numDia" id="numDia" placeholder="" value="<?php echo $row['numDia']; ?>" onblur="getLogwt();" required>
                                </td>
                                <td>
                                    <input type="number" size="2" name="numLength" id="numLength" placeholder="" value="<?php echo $row['numLength']; ?>" onblur="getLogwt();" required>
                                </td>
                                <td>
                                    <input type="float" size="5" name="numLogWt" id="numLogWt" placeholder="" value="<?php echo $row['numLogWt']; ?>" required>
                                </td>
                                <td>
                                    <input type="text" size="12" name="txtMake" id="txtMake" placeholder="" value="<?php echo $row['txtMake']; ?>" required>
                                </td>
                                <td>
                                    <input type="text" size="12" name="txtSuppName" id="txtSuppName" placeholder="" value="<?php echo $row['txtSuppName']; ?>" required>
                                </td>
                                <td>
                                    <input type="text" size="12" name="txtInvNo" id="txtInvNo" placeholder="" value="<?php echo $row['txtInvNo']; ?>" required>
                                </td>
                                <td>
                                    <input type="date" size="10" name="dtLogRecv" id="dtLogRecv" placeholder="" value="<?php echo $row['dtLogRecv'];?>" required>
                                </td>
                                <td>
                                    <input type="float" size="5" name="numHardness" id="numHardness" placeholder="" value="<?php echo $row['numHardness']; ?>" required>
                                </td>
                                <td><?php echo $row['dtDateTime']; ?> </td>
                            </tr>
				        </table>
                        <input type="hidden" name="txtLogNo" id="txtLogNo" value="<?php echo($txtLogNo); ?>">
				        <br><br>
				        <input type="submit" name="Submit" id="Submit" value="Update" class="myButton">
                        <a href="../php/MasterHotDieSteelView.php" class="myButton">Back</a>

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
    $update_qry = "update alpro_prod.mst_hot_die_steel set txtLogType = '".$_POST['txtLogType']."',numDia='".$_POST['numDia']."',numLength='".$_POST['numLength']."',numLogWt='".$_POST['numLogWt']."',txtMake='".$_POST['txtMake']."',txtSuppName='".$_POST['txtSuppName']."',txtInvNo='".$_POST['txtInvNo']."',dtLogRecv='".$_POST['dtLogRecv']."',numHardness='".$_POST['numHardness']."', dtDateTime = now() where txtLogNo = '".$_POST['txtLogNo']."'";
    //echo("<br>".$update_qry."<br>");
    $execute_status = executeQuery($update_qry);
    if($execute_status != 'pass'){
        echo("<br>".$execute_status."<br>");
    }
    //echo $update_qry;
    header("Location: ../php/MasterHotDieSteelView.php");  

}
else{
    echo("<br>Not SUBMITTED<br>");
}
?>

