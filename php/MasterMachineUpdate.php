<?php
include('checkSession.php');
include('UserDefinedLibrary.php');
$txtMachineNo=$_GET['id'];
$qry = "select txtMachineNo, txtMachineName, txtMake, txtActiveFlag, dtDateTime  from alpro_prod.mst_machine where txtMachineNo = '".$txtMachineNo."'";
$data = getDataFromDB($qry);
?>

<!-- HTML -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Update Machine Master Data</title>
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
            <h1>Update Machine Master Data</h1><br><br>
                
                <?php
                    if ($data) {
                    ?>
                    <form name="MasterMachineUpdate" method="post" action="../php/MasterMachineUpdate.php">
                        <table id="dataTable" border="2">
                            <tr>
                                <th>Machine No</th>
                                <th>Machine Name</th>
                                <th>Make</th>
                                <th>Machine Status</th>
                                <th>Trasaction Date</th>
                            </tr>
                        <?php
                        // output data of each row
                        while($row = $data->fetch_assoc()) {
                ?>
                            <tr> 
                                <td><?php echo $row['txtMachineNo']; ?> </td>
                                <!-- <td><input type="text" name="txtSectionNo" id="txtSectionNo" value="<?php echo $row['txtMachineNo']; ?>" required></td> -->
                                <td><input type="text" name="txtMachineName" id="txtMachineName" value="<?php echo $row['txtMachineName']; ?>" required></td>
                                <td><input type="text" name="txtMake" id="txtMake" value="<?php echo $row['txtMake']; ?>" required></td>								
								<td>								
                                    <select name="txtActiveFlag" id="txtActiveFlag">
                                        <?php
                                        $ddqry = "select * from (select 'Y' DDCode, 'Active' DDName from dual union select 'N' , 'Inctive' from dual) mst_status where DDCode = '".$row['txtActiveFlag']."'";
                                        $dddata = getDataFromDB($ddqry);
                                        while($ddrow = $dddata->fetch_assoc()) {
                                        ?>
                                            <option value="<?php echo $ddrow['DDCode']; ?>"><?php echo $ddrow['DDName']; ?></option>
                                        <?php	
                                        }
                                        ?>
                                        <?php
                                        $ddqry = "select * from (select 'Y' DDCode, 'Active' DDName from dual union select 'N' , 'Inctive' from dual) mst_status where DDCode != '".$row['txtActiveFlag']."'";
                                        $dddata = getDataFromDB($ddqry);
                                        while($ddrow = $dddata->fetch_assoc()) {
                                        ?>
                                            <option value="<?php echo $ddrow['DDCode']; ?>"><?php echo $ddrow['DDName']; ?></option>
                                        <?php	
                                        }
                                        ?>
							        </select>
                                    
                                </td>
                                <td><?php echo $row['dtDateTime']; 
                                ?> </td>
                            </tr>
				        </table>
                        <input type="hidden" name="txtMachineNo" id="txtMachineNo" value="<?php echo($txtMachineNo); ?>">
				        <br><br>
				        <input type="submit" name="Submit" id="Submit" value="Update" class="myButton">
                        <a href="../php/MasterMachineView.php" class="myButton">Back</a>

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
    $update_qry = "update alpro_prod.mst_machine set txtMachineName = '".$_POST['txtMachineName']."',txtMake='".$_POST['txtMake']."',txtActiveFlag='".$_POST['txtActiveFlag']."',dtDateTime = now() where txtMachineNo = '".$_POST['txtMachineNo']."'";
    //echo("<br>".$update_qry."<br>");
    $execute_status = executeQuery($update_qry);
    if($execute_status != 'pass'){
        echo("<br>".$execute_status."<br>");
    }
    header("Location: ../php/MasterMachineView.php");  

}
else{
    echo("<br>Not SUBMITTED<br>");
}
?>

