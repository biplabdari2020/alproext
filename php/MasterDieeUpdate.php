<?php
include('checkSession.php');
include('UserDefinedLibrary.php');
$txtSectionNo=$_GET['id1'];
$txtDieNo=$_GET['id2'];
$qry = "select txtSectionNo, txtDieNo, txtPress, NumCavity, txtAlloy, txtAlloy, numDieWt, numEstLife, numEstTrial,numEstInputRate,ifnull(numEstOutputRate,0) numEstOutputRate, numNitdrFreq, numLastRunWt, txtMfgBy, dtDateTime,txtDieMfgRqrd,numOututRate  from alpro_prod.mst_die where txtSectionNo = '".$txtSectionNo."' and txtDieNo = '".$txtDieNo."'";
$data = getDataFromDB($qry);
?>

<!-- HTML -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Die Master Data Update</title>
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
            <h1>Update Die Master Data</h1><br><br>
                
                <?php
                    if ($data) {
                    ?>
                    <form name="MasterDieeUpdate" method="post" action="../php/MasterDieeUpdate.php">
                        <table id="dataTable" border="2">
                            <tr>
                                <th>Section no</th>
                                <th>Die No</th>
                                <th>Press</th>
                                <th>Cavity</th>
                                <th>Alloy</th>
                                <th>Nominal Weight (Kg/mtr)</th>
                                <th>Est. Die Life (MT)</th>
                                <th>Est. Die Trial</th>
                                <th>Est. Input Rate (Kg/Hr)</th>
                                <th>Est. Output Rate (Kg/Hr)</th>                               
                                <th>Nitriding Frequency (Kg)</th>
                                <th>Last Run Weight (Kg/12Ft)</th>
                                <th>Manufactured by</th>    
                                <th>Manufacturing Required </th>                         
                                <th>Transaction Date</th>
                            </tr>
                        <?php
                        // output data of each row
                        while($row = $data->fetch_assoc()) {
                ?>
                            <tr> 
                                <td><?php echo $row['txtSectionNo']; ?> </td>
                                <td><?php echo $row['txtDieNo']; ?> </td>
                                <td><?php echo $row['txtPress']; ?> </td>
                                <!-- <td>
                                    <input type="text" size="2" name="txtPress" id="txtPress" placeholder="" value="<?php echo $row['txtPress']; ?>" required>
                                </td> -->
                                <td>
                                    <input type="number" style="width: 4em"  name="NumCavity" id="NumCavity" placeholder="" value="<?php echo $row['NumCavity']; ?>" required>
                                </td>
                                <td>
                                    <input type="text" size="5" name="txtAlloy" id="txtAlloy" placeholder="" value="<?php echo $row['txtAlloy']; ?>" required>
                                </td>
                                <td>
                                    <input type="float" size="4" name="numDieWt" id="numDieWt" placeholder="" value="<?php echo $row['numDieWt']; ?>" required>
                                </td>
                                <td>
                                    <input type="float" size="6" name="numEstLife" id="numEstLife" placeholder="" value="<?php echo $row['numEstLife']; ?>"required>
                                </td>
                                <td>
                                    <input type="number" style="width: 4em" name="numEstTrial" id="numEstTrial" placeholder="" value="<?php echo $row['numEstTrial']; ?>" required>
                                </td>
                                <td>
                                    <input type="number" style="width: 4em" name="numEstInputRate" id="numEstInputRate" placeholder="" value="<?php echo $row['numEstInputRate']; ?>" required>
                                </td>
                                <td>
                                    <input type="number" style="width: 4em" name="numEstOutputRate" id="numEstOutputRate" placeholder="" value="<?php echo $row['numEstOutputRate']; ?>" required>
                                </td>
                                <td>
                                    <input type="float" size="4" name="numNitdrFreq" id="numNitdrFreq" placeholder="" value="<?php echo $row['numNitdrFreq']; ?>" required>
                                </td>
                                <td>
                                    <input type="float" size="6" name="numLastRunWt" id="numLastRunWt" placeholder="" value="<?php echo $row['numLastRunWt']; ?>" required>
                                </td>
                                <td>
                                    <input type="text" size="8" name="txtMfgBy" id="txtMfgBy" placeholder="" value="<?php echo $row['txtMfgBy']; ?>" required>
                                </td>
                                <td>
                                    <select name="txtDieMfgRqrd" id="txtDieMfgRqrd">
                                    <?php
                                    if ($row['txtDieMfgRqrd']=="Y"){ 
                                    ?>
                                    <option value="<?php echo $row['txtDieMfgRqrd']; ?>"><?php echo $row['txtDieMfgRqrd']; ?></option>
                                    <option value="N">N</option>
                                    <?php
                                    }
                                    else { 
                                    ?>
                                    <option value="<?php echo $row['txtDieMfgRqrd']; ?>"><?php echo $row['txtDieMfgRqrd']; ?></option>
                                    <option value="Y">Y</option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                </td>
                                <td><?php echo $row['dtDateTime']; ?> </td>
                            </tr>
				        </table>
                        <input type="hidden" name="txtSectionNo" id="txtSectionNo" value="<?php echo($txtSectionNo); ?>">
				        <input type="hidden" name="txtDieNo" id="txtDieNo" value="<?php echo($txtDieNo); ?>">
				        <br><br>
				        <input type="submit" name="Submit" id="Submit" value="Update" class="myButton">
                        <a href="../php/MasterDieeView.php" class="myButton">Back</a>

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
    $update_qry = "update alpro_prod.mst_die set NumCavity='".$_POST['NumCavity']."',txtAlloy='".$_POST['txtAlloy']."',numDieWt='".$_POST['numDieWt']."',numEstLife='".$_POST['numEstLife']."',numEstTrial='".$_POST['numEstTrial']."',numEstInputRate='".$_POST['numEstInputRate']."',numEstOutputRate='".$_POST['numEstOutputRate']."',numNitdrFreq='".$_POST['numNitdrFreq']."',numLastRunWt='".$_POST['numLastRunWt']."',txtMfgBy='".$_POST['txtMfgBy']."',txtDieMfgRqrd='".$_POST['txtDieMfgRqrd']."', dtDateTime = now() where txtSectionNo = '".$_POST['txtSectionNo']."' and txtDieNo = '".$_POST['txtDieNo']."'";
    //echo("<br>".$update_qry."<br>");
    $execute_status = executeQuery($update_qry);
    if($execute_status != 'pass'){
        echo("<br>".$execute_status."<br>");
    }
    //echo $update_qry;
    header("Location: ../php/MasterDieeView.php");  

}
else{
    echo("<br>Not SUBMITTED<br>");
}
?>

