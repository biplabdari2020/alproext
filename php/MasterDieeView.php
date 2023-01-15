<?php
include('checkSession.php');
include('UserDefinedLibrary.php');
$txtDieNo=$_GET['id'];
if ($txtDieNo!="") {
    $qry = "select a.txtSectionNo, txtDieNo, txtPress, NumCavity, txtAlloy, numOfBillet, numInputRate, b.txtNormalWt numDieWt, numLastRunWt, dtIssue, numEstLife, numEstTrial, numNitdrFreq, txtMfgBy, a.dtDateTime, txtDieMfgRqrd, numInputTillDate, txtDieStatus, dtRejectedDate, dtConvertDateDate, dtOkDate, numEstInputRate, numEstOutputRate, numOututRate  from alpro_prod.mst_die a inner join alpro_prod.mst_section b on a.txtSectionNo=b.txtSectionNo where txtDieNo like '%".$txtDieNo."%' order by a.txtDieNo desc";
}
if ($txtDieNo=="") {
    $qry = "select a.txtSectionNo, txtDieNo, txtPress, NumCavity, txtAlloy, numOfBillet, numInputRate, b.txtNormalWt numDieWt, numLastRunWt, dtIssue, numEstLife, numEstTrial, numNitdrFreq, txtMfgBy, a.dtDateTime, txtDieMfgRqrd, numInputTillDate, txtDieStatus, dtRejectedDate, dtConvertDateDate, dtOkDate, numEstInputRate, numEstOutputRate, numOututRate  from alpro_prod.mst_die a inner join alpro_prod.mst_section b on a.txtSectionNo=b.txtSectionNo order by a.txtDieNo desc";
    }



$data = getDataFromDB($qry);
//echo($data);
?>
<!-- HTML -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Section Master Data View</title>
    <style>

</style>
	<link rel="icon" href="../staticfiles/img/logo.png">
	<link rel="stylesheet" href="../staticfiles/css/style.css">
	<script src="../staticfiles/js/jquery-3.3.1.js"></script>
	<script src="../staticfiles/js/reusable.js"></script>
    <script>
        function clicked(){
            return confirm('Do you want to continue ..');
        }

        $(document).ready(function () {
    $('#dataTable').DataTable({
        scrolly: true,
    });
});    
    </script>

</head>
<body>
    <!-- Start : for menu bar -->
	<div id="menu_bar_php"></div>    
	<!-- End for menu bar -->
    <div class="myDiv">
        <div class="container">
            <div class="contact-form medium-padding120">
            <h1>Die Master Data View</h1><br><br>
            <input type="text" size="20" id="myInput_1" class="myInputCSS" onkeyup="myFunction('myInput_1','2')" placeholder="Search for Section No">
            <input type="text" size="20" id="myInput_2" class="myInputCSS" onkeyup="myFunction('myInput_2','3')" placeholder="Search for Die No">

                <?php
                if ($data) {
                    ?>
                    <table id="dataTable" border="2" class="display nowrap" style="width:100%">
                        <tr>
                            <th></th>
                            <th></th>
                            <th>Section no</th>
                            <th>Die No</th>
                            <th>Press</th>
                            <th>Cavity</th>
                            <th>Alloy</th>
                            <th>Nominal Weight (Kg/mtr)</th>
                            <th>Est.Die Life (MT)</th>
                            <th>Est. Die Trial</th>
                            <th>Est. Input Rate (Kg/Hr)</th>
                            <th>Est. Output Rate (Kg/Hr)</th>
                            <th>Actual Input Rate (Kg/Hr)</th>
                            <th>Actual Output Rate (Kg/Hr)</th>
                            <th>Nitriding Frequency (Kg)</th>
                            <th>Last Run Weight (Kg/12Ft)</th>
                            <th>Manufactured by</th> 
                            <th>Input Till Date (Kg)</th>  
                            <th>Current Status</th>  
                            <th>Manufacturing Required</th>  
                            <th>Transaction Date</th>
                        </tr>
                    <?php
                    // output data of each row
                    while($row = $data->fetch_assoc()) {
                    $param = 'id1='.$row['txtSectionNo'].'&id2='.str_replace(' ','***',$row['txtDieNo']);
                    
                ?>
                    <tr>
                         <!-- <td><a href="../php/MasterDieeUpdate.php?<?php echo $param; ?>" class="myButton">Edit</a></td>
                        <td><a href="../php/MasterDieeDelete.php?<?php echo $param; ?>" class="myButton" onclick="return clicked();">Delete</a></td> -->
                        <?php
                        $td_obj = edit_delete_role_based("MasterDieeUpdate","MasterDieeDelete",$param,"ToolroomUser,Admin");
                        echo($td_obj);
                        ?>
                        <td><?php echo $row['txtSectionNo']; ?> </td>
                        <td><?php echo $row['txtDieNo']; ?> </td>
                        <td><?php echo $row['txtPress']; ?> </td>
                        <td><?php echo $row['NumCavity']; ?> </td>
                        <td><?php echo $row['txtAlloy']; ?> </td>
                        <td><?php echo $row['numDieWt']; ?> </td>
                        <td><?php echo $row['numEstLife']; ?> </td>
                        <td><?php echo $row['numEstTrial']; ?> </td>
                        <td><?php echo $row['numEstInputRate']; ?> </td>
                        <td><?php echo $row['numEstOutputRate']; ?> </td>
                        <td><?php echo $row['numInputRate']; ?> </td>
                        <td><?php echo $row['numOututRate']; ?> </td>
                        <td><?php echo $row['numNitdrFreq']; ?> </td>
                        <td><?php echo $row['numLastRunWt']; ?> </td>
                        <td><?php echo $row['txtMfgBy']; ?> </td>
                        <td><?php echo $row['numInputTillDate']; ?> </td>
                        <td><?php echo $row['txtDieStatus']; ?> </td>
                        <td><?php echo $row['txtDieMfgRqrd']; ?> </td>
                        <td><?php echo $row['dtDateTime']; ?> </td>
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
                <br><br>
            </div>
        </div>
    </div>

</body>