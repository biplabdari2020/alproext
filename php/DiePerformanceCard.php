<?php
include('checkSession.php');
include('UserDefinedLibrary.php');

$txtDieNo = $_GET['txtDieNo'];
$qry = "select a.txtDieNo,a.numCavity,date(a.dtIssue) dtIssue,ifnull(a.dtOkDate,date(a.dtIssue)) dtOkDate,a.txtSectionNo,b.txtSectionDesc,a.dtRejectedDate,a.txtPress from alpro_prod.mst_die a inner join alpro_prod.mst_section b on a.txtSectionNo=b.txtSectionNo where txtDieNo = '$txtDieNo'";
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
	<title>Die Performance Card</title>
    <link rel="icon" href="../staticfiles/img/logo.png">
	<link rel="stylesheet" href="../staticfiles/css/style.css">
	<script src="../staticfiles/js/jquery-3.3.1.js"></script>
	<script src="../staticfiles/js/reusable.js"></script>
    <script type="text/javascript" src="ExportToCSV.js"></script>


</head>
<body>
    
    <div>
        <div class="container">
            <div class="contact-form medium-padding120">
            <center><h1>Die Performance</h1><br>                           
                    <!-- <input type="text" size="20" id="myInput_lgNo" class="myInputCSS" onkeyup="myFunction('myInput_lgNo','0')" placeholder="Search for Log No">
            
                    <input type="text" size="20" id="myInput_op" class="myInputCSS" onkeyup="myFunction('myInput_op','1')" placeholder="Search for Operator"> -->
                        <center><table id="dataTable" border="1" size ="20%">
                        
                            <tr>
                                <th>Die No</th>
                                <th>Cavity</th>
                                <th>Date Of Manufacturing</th>    
                                <th>Date Of OK</th>                                
                            </tr>
                        <?php
                        // output data of each row
                        while($row = $data->fetch_assoc()) {
                    ?>
                                                  
                            <td size ="20"><?php echo $row['txtDieNo']; ?> </td>
                            <td size ="20"><?php echo $row['numCavity']; ?> </td>
                            <td size ="20"><?php echo $row['dtIssue']; ?> </td>
                            <td size ="20"><?php echo $row['dtOkDate']; ?> </td>
                        </tr>
                    <?php
                        }
                    
                    ?> 
                
                        <tr>
                            <th>Section No</th>
                            <th>Section Description</th>
                            <th>Press</th>
                            <th>Date Of Rejection</th>                               
                        </tr>
                    <?php
                    // output data of each row
                    $qry = "select a.txtDieNo,a.numCavity,date(a.dtIssue) dtIssue,ifnull(a.dtOkDate,date(a.dtIssue)) dtOkDate,a.txtSectionNo,b.txtSectionDesc,a.dtRejectedDate,a.txtPress from alpro_prod.mst_die a inner join alpro_prod.mst_section b on a.txtSectionNo=b.txtSectionNo where txtDieNo = '$txtDieNo'";
                    $data = getDataFromDB($qry);

                    while($row = $data->fetch_assoc()) {
                ?>
                                              
                        <td size ="20"><?php echo $row['txtSectionNo']; ?> </td>
                        <td size ="20"><?php echo $row['txtSectionDesc']; ?> </td>
                        <td size ="20"><?php echo $row['txtPress']; ?> </td>
                        <td size ="20"><?php echo $row['dtRejectedDate']; ?> </td>
                    </tr>
                <?php
                    }
                
                ?>
                <tr>
                            <th>Nominal Weight (Kg/12ft)</th>
                            <th>Min Weight Range (Kg/12ft)</th>
                            <th>Max Weight Range (Kg/12ft)</th>
                            <th>Die Starting Weight (Kg)</th>                               
                        </tr>
                    <?php
                    // output data of each row
                    $qry = "select a.txtDieNo,a.numCavity,txtNormalWt,numDieWt,txtMaxWtRange,txtMinWtRange,date(a.dtIssue) dtIssue,ifnull(a.dtOkDate,date(a.dtIssue)) dtOkDate,a.txtSectionNo,b.txtSectionDesc,a.dtRejectedDate,a.txtPress from alpro_prod.mst_die a inner join alpro_prod.mst_section b on a.txtSectionNo=b.txtSectionNo where txtDieNo = '$txtDieNo'";
                    $data = getDataFromDB($qry);

                    while($row = $data->fetch_assoc()) {
                ?>
                                              
                        <td size ="20"><?php echo $row['txtNormalWt']; ?> </td>
                        <td size ="20"><?php echo $row['txtMinWtRange']; ?> </td>
                        <td size ="20"><?php echo $row['txtMaxWtRange']; ?> </td>
                        <td size ="20"><?php echo $row['numDieWt']; ?> </td>
                    </tr>
                <?php
                    }
                
                ?>
                 <tr>
                                                       
                            <th>Estimated Die Life (Kg)</th>
                            <th>Estimated Input Rate (Kg/Hr)</th>
                            <th>Estimated Output Rate (Kg/Hr)</th>   
                            <th>Input Till Date (Kg)</th> 
                                                          
                        </tr>
                    <?php
                    // output data of each row
                    $qry = "select a.txtDieNo,a.numCavity,date(a.dtIssue) dtIssue,ifnull(a.dtOkDate,date(a.dtIssue)) dtOkDate,a.txtSectionNo,b.txtSectionDesc,date(a.dtRejectedDate) dtRejectedDate,a.txtPress,a.txtAlloy,a.numEstInputRate,a.numEstOutputRate,(numEstLife*1000) numEstLife,a.numInputTillDate from alpro_prod.mst_die a inner join alpro_prod.mst_section b on a.txtSectionNo=b.txtSectionNo where txtDieNo = '$txtDieNo'";
                    $data = getDataFromDB($qry);

                    while($row = $data->fetch_assoc()) {
                ?>
                                              
                        
                        <td size ="20"><?php echo $row['numEstLife']; ?> </td>
                        <td size ="20"><?php echo $row['numEstInputRate']; ?> </td>
                        <td size ="20"><?php echo $row['numEstOutputRate']; ?> </td>
                        <td size ="20"><?php echo $row['numInputTillDate']; ?> </td>
                        
                    </tr>
                <?php
                    }
                
                ?>
                
                    <?php
                
                
                ?>
                
                </table>
                <table id="dataTable2" border="1">

                <tr>
                            <th>Die No</th>
                            <th>Date</th>
                            <th>Shift</th>
                            <th>Press</th>
                            <th>Alloy</th>
                            <th>Start Time</th>                                
                            <th>End Time</th>                                
                            <th>Running Hours</th>        
                            <th>Wt/Pc (Kg/12ft)</th>                        
                            <th>Input Weight (Kg)</th>                                
                            <th>OutPut Weight (Kg)</th>                                                                                            
                            <th>Input Rate (Kg/Hr)</th>                                
                            <th>Output Rate (Kg/Hr)</th>                              
                            <th>Unloading Reason</th>     
                            <th>Remarks</th>                       
                        </tr>
                        <b><br>Production Details<br>   
                    <?php
                    // output data of each row
                    $qry1 = "select txtDieNo, numCavity,prodtxtPress,numWtPerPc, dtIssue,txtBilletAlloy, txtSectionNo, txtSectionDesc, dtRejectedDate, dtLogDate, txtPress, dtStartTime, dtEndTime, numRunningHour, numInputWt, numOutputWt, round(inpRate) inpRate,round(outputpRate) outputpRate, dtDateTime, txtShift,round(numInputTillDate) numInputTillDate,txtReason,txtRemarks from alpro_prod.v_dieperformancecard where txtDieNo = '$txtDieNo'". " union all select txtDieNo, numCavity,prodtxtPress,numWtPerPc, dtIssue,txtBilletAlloy, txtSectionNo, txtSectionDesc, dtRejectedDate, dtLogDate, txtPress, dtStartTime, dtEndTime, numRunningHour, numInputWt, numOutputWt, round(inpRate) inpRate,round(outputpRate) outputpRate, dtDateTime, txtShift,round(numInputTillDate) numInputTillDate,txtReason,txtRemarks from alpro_prod.v_dieperformancecard where txtDieNo = '".$txtDieNo."'";
                    $qry = "select txtDieNo, numCavity,prodtxtPress,numWtPerPc, dtIssue,txtBilletAlloy, txtSectionNo, txtSectionDesc, dtRejectedDate, date(dtLogDate) dtLogDate, txtPress, dtStartTime, dtEndTime, numRunningHour, numInputWt, numOutputWt, round(inpRate) inpRate,round(outputpRate) outputpRate, dtDateTime, txtShift,round(numInputTillDate) numInputTillDate,txtReason,txtRemarks from alpro_prod.v_dieperformancecard where txtDieNo = '$txtDieNo'". " union all select txtDieNo, numCavity,prodtxtPress,numWtPerPc, dtIssue,txtBilletAlloy, txtSectionNo, txtSectionDesc, dtRejectedDate, date(dtLogDate) dtLogDate, txtPress, dtStartTime, dtEndTime, numRunningHour, numInputWt, numOutputWt, round(inpRate) inpRate,round(outputpRate) outputpRate, dtDateTime, txtShift,round(numInputTillDate) numInputTillDate,txtReason,txtRemarks from alpro_prod.v_dieperformancecard where txtDieNo in (select txtDieNo from alpro_prod.trn_die_conversion where txtDieNoConv="."'$txtDieNo'".")";
                    //$qry = "select distinct t.* from (".$qry1." UNION ALL ".$qry2.") t";
                   // echo $qry;
                    $data = getDataFromDB($qry);                    
                    while($row = $data->fetch_assoc()) {
                ?>
                                                                   
                        <td ><?php echo $row['txtDieNo']; ?> </td>
                        <td ><?php echo $row['dtLogDate']; ?> </td>
                        <td ><?php echo $row['txtShift']; ?> </td>
                        <td ><?php echo $row['prodtxtPress']; ?> </td>
                        <td ><?php echo $row['txtBilletAlloy']; ?> </td>
                        <td ><?php echo $row['dtStartTime']; ?> </td>
                        <td ><?php echo $row['dtEndTime']; ?> </td>
                        <td ><?php echo $row['numRunningHour']; ?> </td>
                        <td ><?php echo $row['numWtPerPc']; ?> </td>
                        <td ><?php echo $row['numInputWt']; ?> </td>
                        <td ><?php echo $row['numOutputWt']; ?> </td>                        
                        <td ><?php echo $row['inpRate']; ?> </td>
                        <td ><?php echo $row['outputpRate']; ?> </td>                        
                        <td ><?php echo $row['txtReason']; ?> </td>
                        <td ><?php echo $row['txtRemarks']; ?> </td>
                    </tr>                        
                <?php
                    }
                
                ?>
                 <?php
                 $qry1 = "select txtDieNo, numCavity,prodtxtPress,numWtPerPc, dtIssue,txtBilletAlloy, txtSectionNo, txtSectionDesc, dtRejectedDate, dtLogDate, txtPress, dtStartTime, dtEndTime, numRunningHour, numInputWt, numOutputWt, round(inpRate) inpRate,round(outputpRate) outputpRate, dtDateTime, txtShift,round(numInputTillDate) numInputTillDate,txtReason,txtRemarks from alpro_prod.v_dieperformancecard where txtDieNo = '$txtDieNo'". " union all select txtDieNo, numCavity,prodtxtPress,numWtPerPc, dtIssue,txtBilletAlloy, txtSectionNo, txtSectionDesc, dtRejectedDate, dtLogDate, txtPress, dtStartTime, dtEndTime, numRunningHour, numInputWt, numOutputWt, round(inpRate) inpRate,round(outputpRate) outputpRate, dtDateTime, txtShift,round(numInputTillDate) numInputTillDate,txtReason,txtRemarks from alpro_prod.v_dieperformancecard where txtDieNo = '".$txtDieNo."'";
                 $qry = "select txtDieNo, numCavity,prodtxtPress,numWtPerPc, dtIssue,txtBilletAlloy, txtSectionNo, txtSectionDesc, dtRejectedDate, dtLogDate, txtPress, dtStartTime, dtEndTime, numRunningHour, numInputWt, numOutputWt, round(inpRate) inpRate,round(outputpRate) outputpRate, dtDateTime, txtShift,round(numInputTillDate) numInputTillDate,txtReason,txtRemarks from alpro_prod.v_dieperformancecard where txtDieNo = '$txtDieNo'". " union all select txtDieNo, numCavity,prodtxtPress,numWtPerPc, dtIssue,txtBilletAlloy, txtSectionNo, txtSectionDesc, dtRejectedDate, dtLogDate, txtPress, dtStartTime, dtEndTime, numRunningHour, numInputWt, numOutputWt, round(inpRate) inpRate,round(outputpRate) outputpRate, dtDateTime, txtShift,round(numInputTillDate) numInputTillDate,txtReason,txtRemarks from alpro_prod.v_dieperformancecard where txtDieNo in (select txtDieNo from alpro_prod.trn_die_conversion where txtDieNoConv="."'$txtDieNo'".")";
                 //echo $qry2;
                 //$qry = "select distinct t.* from (".$qry1." UNION ALL ".$qry2.") t";
                 $qry = "select sum(numInputWt) numInputWt, sum(numOutputWt) numOutputWt,sum(ifnull(numRunningHour,0)) run_hr,round(sum(numInputWt)/sum(ifnull(numRunningHour,0))) inp_rate,round(sum(numOutputWt)/sum(ifnull(numRunningHour,0))) op_rate from alpro_prod.v_dieperformancecard where (txtDieNo ="."'$txtDieNo'"."or txtDieNo in (select txtDieNo from alpro_prod.trn_die_conversion where txtDieNoConv="."'$txtDieNo'))";
                    $data = getDataFromDB($qry);                    
                    while($row = $data->fetch_assoc()) {
                ?>
                        <td ><b>Total : </td>
                        <td ></td>
                        <td > </td>
                        <td > </td>
                        <td > </td>
                        <td > </td>
                        <td > </td>
                        <td ><b><?php echo $row['run_hr']; ?> </td>
                        <td ></td>
                        <td ><b><?php echo $row['numInputWt']; ?> </td>
                        <td ><b><?php echo $row['numOutputWt']; ?> </td>                        
                        <td ><b><?php echo $row['inp_rate']; ?> </td>
                        <td ><b><?php echo $row['op_rate']; ?> </td>                        
                        <td ></td>
                        <td ></td>
                        <?php
                    }
                
                ?>
                </table>
            </div>
        </div>
    </div>

</body>