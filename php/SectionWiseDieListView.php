<?php
include('checkSession.php');
include('UserDefinedLibrary.php');
$qry = "select count(1) cnt from alpro_prod.v_secdieview";
$data = getDataFromDB($qry);
//echo($data);
?>
<!-- HTML -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Section Wise Die Availability</title>
	<link rel="icon" href="../staticfiles/img/logo.png">
	<link rel="stylesheet" href="../staticfiles/css/style.css">
	<script src="../staticfiles/js/jquery-3.3.1.js"></script>
	<script src="../staticfiles/js/reusable.js"></script>
    <script>
        function clicked(){
            return confirm('Do you want to continue ..');
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
            <h1>Section Wise Die Availability</h1><br><br>
            <input type="text" size="20" id="myInput_1" class="myInputCSS" onkeyup="myFunction('myInput_1','0')" placeholder="Search for Section" title="Type Section No">

                <?php
                if ($data) {
                    ?>
                    <table id="dataTable" border="2" width="50%">
                        <tr>
                            <th>Section</th> 
                            <th>Section Description</th>                        
							<th>OutPut (P1)</th>
							<th>OutPut (P2)</th>
							<th>OutPut (P3)</th>
							<th>OK DieCount P1P3</th>
							<th>OKDieCount P2</th>
							<th>OKDieCount All</th>
							<th>MFGDieCount P1P3</th>
							<th>MFGDieCount P2</th>
							<th>MFGDieCount All</th>
							<th>Mfg Complete DieCount P1P3</th>
							<th>Mfg Complete DieCount P2</th>
							<th>Mfg Complete DieCount All</th>
							<th>Converted DieCount P1P3</th>
							<th>Converted DieCount P2</th>
							<th>Converted DieCount All</th>
							<th>Rejected DieCount P1P3</th>
							<th>Rejected DieCount P2</th>
							<th>Rejected DieCount All</th>
							<th>Correction DieCount P1P3</th>
							<th>Correction DieCount P2</th>
							<th>Correction DieCount All</th>
							<th>New DieCount P1P3</th>
							<th>New DieCount P2</th>
							<th>New DieCount All</th>
							
                        </tr>
                    <?php
                    // output data of each row
                    $qry = "select * from alpro_prod.v_secdieview";
                    $data = getDataFromDB($qry);

                    while($row = $data->fetch_assoc()) {
                    
                    
                ?>
                    <tr>
                        <td><?php echo $row['txtSectionNo']; ?> </td>
                        <td><?php echo $row['txtSectionDesc']; ?> </td>
                        <td><?php echo $row['Output_P1']; ?> </td>
                        <td><?php echo $row['Output_P2']; ?> </td>
                        <td><?php echo $row['Output_P3']; ?> </td>
                        <td><?php echo $row['OKDieCount_P1P3']; ?> </td>
                        <td><?php echo $row['OKDieCount_P2']; ?> </td>
                        <td><?php echo $row['OKDieCount_All']; ?> </td>
                        <td><?php echo $row['MFGDieCount_P1P3']; ?> </td>
                        <td><?php echo $row['MFGDieCount_P2']; ?> </td>
                        <td><?php echo $row['MFGDieCount_All']; ?> </td>
                        <td><?php echo $row['MFGCompDieCount_P1P3']; ?> </td>
                        <td><?php echo $row['MFGCompDieCount_P2']; ?> </td>
                        <td><?php echo $row['MFGCompDieCount_All']; ?> </td>
                        <td><?php echo $row['ConvDieCount_P1P3']; ?> </td>
                        <td><?php echo $row['ConvDieCount_P2']; ?> </td>
                        <td><?php echo $row['ConvDieCount_All']; ?> </td>
                        <td><?php echo $row['RejDieCount_P1P3']; ?> </td>
                        <td><?php echo $row['RejDieCount_P2']; ?> </td>
                        <td><?php echo $row['RejDieCount_All']; ?> </td>
                        <td><?php echo $row['CorrDieCount_P1P3']; ?> </td>
                        <td><?php echo $row['CorrDieCount_P2']; ?> </td>
                        <td><?php echo $row['CorrDieCount_All']; ?> </td>
                        <td><?php echo $row['NewDieCount_P1P3']; ?> </td>
                        <td><?php echo $row['NewDieCount_P2']; ?> </td>
                        <td><?php echo $row['NewDieCount_All']; ?> </td>
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