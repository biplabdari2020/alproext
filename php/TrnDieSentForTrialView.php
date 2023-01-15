<?php
include('checkSession.php');
include('UserDefinedLibrary.php');
$txtDieNo=$_GET['id'];
if ($txtDieNo!="") {
    $qry = "SELECT txtTrialNo, txtDieNo, dtTrialSent, dtTrialEnd, txtStatus,mst_cons_trialstatus.txtStatusDesc, txtRemarks, txtUser, dtDateTime from alpro_prod.trn_die_sent_trial inner join alpro_prod.mst_cons_trialstatus on trn_die_sent_trial.txtStatus=mst_cons_trialstatus.txtStatusCode where trn_die_sent_trial.txtDieNo like '%".$txtDieNo."%' order by dtDateTime desc";
}
if ($txtDieNo=="") {
    $qry = "SELECT txtTrialNo, txtDieNo, dtTrialSent, dtTrialEnd, txtStatus,mst_cons_trialstatus.txtStatusDesc, txtRemarks, txtUser, dtDateTime from alpro_prod.trn_die_sent_trial inner join alpro_prod.mst_cons_trialstatus on trn_die_sent_trial.txtStatus=mst_cons_trialstatus.txtStatusCode order by dtDateTime desc";
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
	<title>Die Sent For Trial View</title>
    <link rel="icon" href="../staticfiles/img/logo.png">
	<link rel="stylesheet" href="../staticfiles/css/style.css">
	<script src="../staticfiles/js/jquery-3.3.1.js"></script>
	<script src="../staticfiles/js/reusable.js"></script>
    <script>
        function clicked(){
            return confirm('Do you want to continue ..');                                               
        }
        function Checked(flag){
            
                alert("Die already Sent for Trail. Cannot "+flag+" Entry");
            
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
            <h1>Die Sent For Trial</h1><br><br>
            <input type="text" size="20" id="myInput_1" class="myInputCSS" onkeyup="myFunction('myInput_1','3')" placeholder="Search for Die No" title="Type in a name">
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
                            <th>Trial Serial No</th>
                            <th>Die No</th>
                            <th>Trial Sent Date</th>
                            <th>Trial End Date</th>
                            <th>Result</th>
                            <th>Remarks</th>
                            <th>Trasaction Date</th>
                        </tr>
                    <?php
                    // output data of each row
                    while($row = $data->fetch_assoc()) {
                        $param = 'id='.$row['txtTrialNo'];   
                        
                ?>
                    <tr>
                    <?php
                    if($row['txtStatus']=="2"){
                        ?>
                        <td><a class="myButton" onclick="Checked('Edit');">Edit</a></td>
                        <td><a class="myButton" onclick="Checked('Delete');">Delete</a></td>
                        <?php
                    }
                    else{
                        ?>
                        <!-- <td><a href="../php/TrnDieSentForTrialUpdate.php?id=<?php echo $row['txtTrialNo']; ?>" class="myButton" >Edit</a></td>
                        <td><a href="../php/TrnDieSentForTrialDelete.php?id=<?php echo $row['txtTrialNo']; ?>" class="myButton" onclick="return clicked();">Delete</a></td> -->
                        <?php
                        $td_obj = edit_delete_role_based("TrnDieSentForTrialUpdate","TrnDieSentForTrialDelete",$param,"ToolroomUser,ProdUser,Admin");
                        echo($td_obj);
                        ?>
                        <?php
                    }

                    ?>
                    
                        <td><?php echo $row['txtTrialNo']; ?></td>
                        <td><?php echo $row['txtDieNo']; ?></td>
                        <td><?php echo $row['dtTrialSent']; ?></td>
                        <td><?php echo $row['dtTrialEnd']; ?></td>
                        <td><?php echo $row['txtStatusDesc']; ?></td>
                        <td><?php echo $row['txtRemarks']; ?></td>
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