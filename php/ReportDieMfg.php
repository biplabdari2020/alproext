<?php
include('checkSession.php');
include('UserDefinedLibrary.php');
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
	<div id="menu_bar_php"></div>    
	<!-- End for menu bar -->
    <div class="myDiv">
        <div class="container">
            <div class="contact-form medium-padding120">
            <h1>Die Manufacturing details</h1><br>
            <form name="ReportLogSheet" method="post" action="../php/ReportDieMfg.php">
                <br>   
            <!-- Log No  :  <input type="text" name="txtLogNo" id="txtLogNo" placeholder="" value="" >
            <br>Start Date(From)  :  <input type="date" name="dtStartTime" id="dtStartTime" placeholder="">
            <br>Start Date(To)  :  <input type="date" name="dtEndTime" id="dtEndTime" placeholder="" value="">
                                                        <?php //$date=date_create("2022-01-01"); echo date_format($date,"Y-m-d H:i:s"); ?> -->
                             
            <center><table id="dataTable_1" border="2">
                        <tr>
                            <th>Press</th>
                            <th>Shift</th>
                            <th>Start Date (From)</th>
                            <th>Start Date (To)</th>
                            <th>Alloy</th>
                        </tr>        
                        <tr>
                            <td>                
                                
                                <select name="txtPress" id="txtPress">
								    <option value="">--All--</option>
									<?php
									$qry = "select distinct txtPressCode from alpro_prod.mst_const_press";
									$data = getDataFromDB($qry);
									while($row = $data->fetch_assoc()) {
									?>
										<option value="<?php echo $row['txtPressCode']; ?>"><?php echo $row['txtPressCode']; ?></option>
									<?php	
									}
									?>
								</select>
                            </td>
                            <td>                
                                <!-- <input type="text" name="txtCompCode" id="txtCompCode" placeholder="" value="" > -->
                                <select name="txtShiftCode" id="txtShiftCode">
									<option value="">--All--</option>
									<?php
									$qry = "select distinct txtShiftCode, txtShiftDesc from alpro_prod.mst_const_shift order by txtShiftCode";
									$data = getDataFromDB($qry);
									while($row = $data->fetch_assoc()) {
									?>
										<option value="<?php echo $row['txtShiftCode']; ?>"><?php echo $row['txtShiftCode']; ?></option>
									<?php	
									}
									?>
								</select>
                            </td>
                            <td>
                                <input type="date" name="dtStartTime" id="dtStartTime" placeholder="" value="">
                                
                            </td>
                            <td>
                                <input type="date" name="dtEndTime" id="dtEndTime" onclick="setEndDate('dtStartTime','dtEndTime')" placeholder="" value="">
                            </td>
                            <td>
                            <select name="txtBilletAlloy" id="txtBilletAlloy">
								    <option value="">--All--</option>
									<?php
									$qry = "select distinct txtBilletAlloy from alpro_prod.trn_prod_logsheet order by txtBilletAlloy";
									$data = getDataFromDB($qry);
									while($row = $data->fetch_assoc()) {
									?>
										<option value="<?php echo $row['txtBilletAlloy']; ?>"><?php echo $row['txtBilletAlloy']; ?></option>
									<?php	
									}
									?>
								</select>                                
                            </td>
                        </tr>
                    </table>
                    <br>
                    <input type="submit" name="Submit" id="Submit" value="View Report" class="myButton">   
                         
                               
                </form>
                
                <?php
                
                $checkrecord = count($_POST);
                if ($checkrecord >= 1)
                {
                    $txtPress = $_POST['txtPress'];
                    $txtShiftCode = $_POST['txtShiftCode'];
                    $dtStartTime = $_POST['dtStartTime'];
                    $dtEndTime = $_POST['dtEndTime'];
                    $txtBilletAlloy = $_POST['txtBilletAlloy'];
                    $StartDateLength = strlen($dtStartTime);
                    $EndDateLength = strlen($dtEndTime);
                    $txtFilter = getFilterData_mfg($_POST);
                    // echo $txtFilter ;
                     $qry = "SELECT c.txtSectionNo,c.txtSectionDesc,c.txtTypeOfSection,a.txtDieNo,a.txtComponent,b.txtPress,b.NumCavity,b.txtAlloy,min(a.dtStartTime) mfg_startdt,d.dtTrialSent,DATEDIFF(max(a.dtEndTime) ,min(a.dtStartTime)) days_taken FROM alpro_prod.trn_trlogsheet a inner join alpro_prod.mst_die b on a.txtDieNo=b.txtDieNo inner join alpro_prod.mst_section c  on c.txtSectionNo=b.txtSectionNo left outer join alpro_prod.trn_die_sent_trial d on a.txtDieNo=d.txtDieNo ".$txtFilter." group by c.txtSectionNo,c.txtSectionDesc,c.txtTypeOfSection,a.txtDieNo,a.txtComponent,b.txtPress,b.NumCavity,b.txtAlloy";  
                    // echo "<br>".$qry;                     
                    
                    $data = getDataFromDB($qry);
                    
                    $param = 'txtPress='.$txtPress.'&txtShiftCode='.$txtShiftCode.'&dtStartTime='.$dtStartTime.'&dtEndTime='.$dtEndTime.'&txtBilletAlloy='.$txtBilletAlloy;
                    //$param = 'qryInput='.$qry;
                    ?>
                    <td><a href="../php/ReportDieMfgPrint.php?<?php echo $param; ?>" class="myButton" target="_blank">Print</a></td>
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
                                <th>Days Taken</th>
                                
                                							
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
                    }
                    else{
                        ?>
                        <p style="color:red;">No Record Found</p>
                        <?php
                    }
                    ?>
                    <br>
                    <button type="button" class="myButton" onclick="exportDatatoCSV('dataTable', 'LogSheetReport')">
                    Download
                    </button>
                    

                    <?php
                }
                
                ?>
                
                <br><br>
            </div>
        </div>
    </div>

</body>