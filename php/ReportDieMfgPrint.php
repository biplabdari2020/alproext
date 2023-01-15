<?php
include('checkSession.php');
include('UserDefinedLibrary.php');
$txtPress = $_GET['txtPress'];
$txtShiftCode = $_GET['txtShiftCode'];
$dtStartTime = $_GET['dtStartTime'];
$dtEndTime = $_GET['dtEndTime'];
$txtBilletAlloy = $_GET['txtBilletAlloy'];
$StartDateLength = strlen($dtStartTime);
$EndDateLength = strlen($dtEndTime);
$txtFilter = getFilterData_mfg($_GET);

//$qry = "select * from alpro_prod.mst_section where txtSectionNo = '$txtIdentificationNo'";
//$data = getDataFromDB($qry);
//echo($data);
?>
<!-- HTML -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Log Sheet</title>
    <link rel="icon" href="../staticfiles/img/logo.png">
	<link rel="stylesheet" href="../staticfiles/css/style.css">
	<script src="../staticfiles/js/jquery-3.3.1.js"></script>
	<script src="../staticfiles/js/reusable.js"></script>
    <script type="text/javascript" src="ExportToCSV.js"></script>


</head>
<body>
    <!-- Start : for menu bar -->
	<!-- End for menu bar -->
    <center><div >
        <div class="container">
            <div class="contact-form medium-padding120">
            <br><h1>Log Sheet Report</h1><br>
            <form name="ReportLogSheet" method="post" action="../php/ReportLogSheet.php">   
            <!-- Log No  :  <input type="text" name="txtLogNo" id="txtLogNo" placeholder="" value="" >
            <br>Start Date(From)  :  <input type="date" name="dtStartTime" id="dtStartTime" placeholder="">
            <br>Start Date(To)  :  <input type="date" name="dtEndTime" id="dtEndTime" placeholder="" value="">
                                                        <?php //$date=date_create("2022-01-01"); echo date_format($date,"Y-m-d H:i:s"); ?> -->
                             
            <table id="dataTable_1" border="2">
                        
                               
                </form>
                
                <?php
                
                $checkrecord = count($_POST);
                if ($checkrecord >= 0)
                {
                   
                    // echo $txtFilter ;
                     $qry = "SELECT c.txtSectionNo,c.txtSectionDesc,e.txtTypeOfSectionDesc txtTypeOfSection,a.txtDieNo,a.txtComponent,b.txtPress,b.NumCavity,b.txtAlloy,min(a.dtStartTime) mfg_startdt,d.dtTrialSent,TIMEDIFF(max(a.dtEndTime) ,min(a.dtStartTime)) days_taken FROM alpro_prod.trn_trlogsheet a inner join alpro_prod.mst_die b on a.txtDieNo=b.txtDieNo inner join alpro_prod.mst_section c  on c.txtSectionNo=b.txtSectionNo inner join alpro_prod.mst_cons_sectiontype e on e.txtTypeOfSection=c.txtTypeOfSection left outer join alpro_prod.trn_die_sent_trial d on a.txtDieNo=d.txtDieNo ".$txtFilter." group by c.txtSectionNo,c.txtSectionDesc,c.txtTypeOfSection,a.txtDieNo,a.txtComponent,b.txtPress,b.NumCavity,b.txtAlloy";  
                     //echo "<br>".$qry;                       
                    
                    $data = getDataFromDB($qry);
                    
                    $param = 'txtPress='.$txtPress.'&txtShiftCode='.$txtShiftCode.'&dtStartTime='.$dtStartTime.'&dtEndTime='.$dtEndTime.'&txtBilletAlloy='.$txtBilletAlloy;
                    //$param = 'qryInput='.$qry;
                    ?>
                    
                    <?php

                    if ($data) {
                        ?>
                    <!-- <input type="text" size="20" id="myInput_lgNo" class="myInputCSS" onkeyup="myFunction('myInput_lgNo','0')" placeholder="Search for Log No">
            
                    <input type="text" size="20" id="myInput_op" class="myInputCSS" onkeyup="myFunction('myInput_op','1')" placeholder="Search for Operator"> -->
                        <table id="dataTable" border="2">
                        
                            <tr>
                            <th>Section No</th>
                                <th>Section Description</th>
                                <th>Type Of Section</th>
                                <th>DieNo</th>
                                <th>Component</th>
                                <th>Press</th>
                                <th>Cavity</th>
                                <th>Alloy</th>
                                <th>Manufacturing Start Date</th>
                                <th>Trial Sent Date</th>
                                <th>Hours Taken</th>
                                							
                            </tr>
                        <?php
                        // output data of each row
                        while($row = $data->fetch_assoc()) {
                    ?>
                        <tr size=100>
                        <td><?php echo $row['txtSectionNo']; ?> </td>
                            <td><?php echo $row['txtSectionDesc']; ?> </td>
                            <td><?php echo $row['txtTypeOfSection']; ?> </td>
                            <td><?php echo $row['txtDieNo']; ?> </td>
                            <td><?php echo $row['txtComponent']; ?> </td>
                            <td><?php echo $row['txtPress']; ?> </td>
                            <td><?php echo $row['NumCavity']; ?> </td>
                            <td><?php echo $row['txtAlloy']; ?> </td>
                            <td><?php echo $row['mfg_startdt']; ?> </td>
                            <td><?php echo $row['dtTrialSent']; ?> </td>
                            <td><?php echo $row['days_taken']; ?> </td>                            
                        </tr>                  
                  <?php
                        }
                        $qry = "SELECT now()";  
                                          
                    
                    $data = getDataFromDB($qry);
                        while($row = $data->fetch_assoc()) {
                            ?>
                               
                                <?php 
                    }
                }
                    else{
                        ?>
                        <p style="color:red;">No Record Found</p>
                        <?php   
                    }
                    ?>
                    <br>
                    
                    

                    <?php
                }
                
                ?>
                
            </div>
        </div>
    </div>

</body>