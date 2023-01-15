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
	<title>Backup Die Requirement</title>
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
            <br><h1>Backup Die Requirement</h1><br>
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
                     $qry = "SELECT * 
                        FROM alpro_prod.v_pendingdiemfg ";  
                                          
                    
                    $data = getDataFromDB($qry);
                    
                    // $param = 'txtPress='.$txtPress.'&txtShiftCode='.$txtShiftCode.'&dtStartTime='.$dtStartTime.'&dtEndTime='.$dtEndTime.'&txtBilletAlloy='.$txtBilletAlloy;
                    //$param = 'qryInput='.$qry;
                    ?>
                    
                    <?php

                    if ($data) {
                        ?>
                    <!-- <input type="text" size="20" id="myInput_lgNo" class="myInputCSS" onkeyup="myFunction('myInput_lgNo','0')" placeholder="Search for Log No">
            
                    <input type="text" size="20" id="myInput_op" class="myInputCSS" onkeyup="myFunction('myInput_op','1')" placeholder="Search for Operator"> -->
                        <table id="dataTable" border="2">
                        
                            <tr>
                                <th>DieNo</th>
                                <th>Press</th>
                                <th>Cavity</th>
                                <th>Estimated Input Rate (Kg/Hr)</th>
                                <th>Actual Input Rate (Kg/Hr)</th>
                                <th>Estimated Output Rate (Kg/Hr)</th>
                                <th>Actual Output Rate (Kg/Hr)</th>
                                <th>Estimated Die Life (Kg)</th>
                                <th>Output Till Date (Kg)</th>                                							
                            </tr>
                        <?php
                        // output data of each row
                        while($row = $data->fetch_assoc()) {
                    ?>
                        <tr size=100>
                            <td><?php echo $row['txtDieNo']; ?> </td>
                            <td><?php echo $row['txtPress']; ?> </td>
                            <td><?php echo $row['NumCavity']; ?> </td>
                            <td><?php echo $row['numEstInputRate']; ?> </td>
                            <td><?php echo $row['numInputRate']; ?> </td>
                            <td><?php echo $row['numEstOutputRate']; ?> </td>
                            <td><?php echo $row['numOututRate']; ?> </td>
                            <td><?php echo $row['numEstLife']; ?> </td>
                            <td><?php echo $row['numInputTillDate']; ?> </td>
                           
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
                    
                    

                    <?php
                }
                
                ?>
                
            </div>
        </div>
    </div>

</body>