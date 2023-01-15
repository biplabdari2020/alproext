<?php
include('checkSession.php');
include('UserDefinedLibrary.php');
$txtDieNo=$_GET['id'];
if ($txtDieNo!="") {
    $qry = "SELECT trn_log_blank_cutting.pkTrnLogsheet, pkJobId, txtLogNo,txtComponent, txtOperatorCode,mst_employee.txtEmpName, txtShift, numCuttingLength,numCuttingTolerence,numFinishLength,dtStartTime, dtEndTime, txtReleaseFlag, trn_log_blank_cutting.dtDateTime,trn_log_blank_cutting.txtdieno ,trn_log_blank_cutting.txtCompCode txtDieCompName FROM alpro_prod.trn_log_blank_cutting INNER JOIN  alpro_prod.mst_employee on trn_log_blank_cutting.txtOperatorCode=mst_employee.txtEmpNo  INNER JOIN alpro_prod.trn_job_log ON trn_job_log.pkTrnLogsheet = trn_log_blank_cutting.pkTrnLogsheet where trn_log_blank_cutting.txtDieNo like '%".$txtDieNo."%' order by dtDateTime desc ";
}
if ($txtDieNo=="") {
    $qry = "SELECT trn_log_blank_cutting.pkTrnLogsheet, pkJobId, txtLogNo,txtComponent, txtOperatorCode,mst_employee.txtEmpName, txtShift, numCuttingLength,numCuttingTolerence,numFinishLength,dtStartTime, dtEndTime, txtReleaseFlag, trn_log_blank_cutting.dtDateTime,trn_log_blank_cutting.txtdieno ,trn_log_blank_cutting.txtCompCode txtDieCompName FROM alpro_prod.trn_log_blank_cutting INNER JOIN  alpro_prod.mst_employee on trn_log_blank_cutting.txtOperatorCode=mst_employee.txtEmpNo  INNER JOIN alpro_prod.trn_job_log ON trn_job_log.pkTrnLogsheet = trn_log_blank_cutting.pkTrnLogsheet order by dtDateTime desc ";
    }


//echo $qry ;
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
	<title>Blank Cutting Entry View</title>
    <link rel="icon" href="../staticfiles/img/logo.png">
	<link rel="stylesheet" href="../staticfiles/css/style.css">
	<script src="../staticfiles/js/jquery-3.3.1.js"></script>
	<script src="../staticfiles/js/reusable.js"></script>
    <script>
        function clicked(){
            return confirm('Do you want to continue ..');                                               
        }
        function Checked(flag){
            
                alert("Log Cutting Released. Cannot "+flag+" Entry");
            
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
            <h1>Blank Cutting Data View</h1><br><br>
            <input type="text" size="20" id="myInput_1" class="myInputCSS" onkeyup="myFunction('myInput_1','2')" placeholder="Search for Job ID" title="Type Job No">
            <input type="text" size="20" id="myInput_2" class="myInputCSS" onkeyup="myFunction('myInput_2','5')" placeholder="Search for Die No" title="Type Die No">
            <input type="text" size="20" id="myInput_3" class="myInputCSS" onkeyup="myFunction('myInput_3','6')" placeholder="Search for Component" title="Type Component">
                <?php
                if ($data) {
                    ?>
                    <br>
                    <input onclick = "exportDatatoCSV('dataTable','BlankCuttingView')" type="submit" name="Submit" id="Submit" value="Download Report" class="submit-btn">
                    <!-- <input onclick = "printPage('dataTable')" type="submit" name="Submit" id="Submit" value="Print" class="submit-btn"> -->
                    <br><br>
                    <table id="dataTable" border="2">
                        <tr>
                            <th></th>
                            <th></th>
                            <th>Job No</th>
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
                    while($row = $data->fetch_assoc()) {
                ?>
                    <tr>
                    <?php
                    if($row['txtReleaseFlag']=="Y"){
                        ?>
                        <td><a class="myButton" onclick="Checked('Edit');">Edit</a></td>
                        <td><a class="myButton" onclick="Checked('Delete');">Delete</a></td>
                        <?php
                    }
                    else{
                        ?>
                        <!-- <td><a href="../php/TrnBlankCuttingUpdate.php?id=<?php echo $row['pkTrnLogsheet']; ?>" class="myButton" >Edit</a></td>
                        <td><a href="../php/TrnBlankCuttingDelete.php?id=<?php echo $row['pkTrnLogsheet']; ?>" class="myButton" onclick="return clicked();">Delete</a></td> -->
                        <?php
                        $param = 'id='.$row['pkTrnLogsheet'];
                        $td_obj = edit_delete_role_based("TrnBlankCuttingUpdate","TrnBlankCuttingDelete",$param,"ToolroomUser,Admin");
                        echo($td_obj);
                        ?>
                        <?php
                    }

                    ?>
                    
                        <td><?php echo $row['pkJobId']; ?></td>
                        <td><?php echo $row['pkTrnLogsheet']; ?></td>
                        <td><?php echo $row['txtLogNo']; ?></td>
                        <td><?php echo $row['txtdieno']; ?></td>
                        <td><?php echo $row['txtComponent']; ?></td>
                        <td><?php echo $row['txtEmpName']; ?></td>
                        <td><?php echo $row['txtShift']; ?></td>
                        <td><?php echo $row['numCuttingLength']; ?></td>
                        <td><?php echo $row['numCuttingTolerence']; ?></td>
                        <td><?php echo $row['numFinishLength']; ?></td>                        
                        <td><?php echo $row['dtStartTime']; ?></td>
                        <td><?php echo $row['dtEndTime']; ?></td>
                        <td><?php echo $row['txtReleaseFlag']; ?></td>
                        <td><?php echo $row['dtDateTime']; ?></td>
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